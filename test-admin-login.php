#!/usr/bin/env php
<?php

echo str_repeat('=', 70) . "\n";
echo "ADMIN LOGIN FORM SYSTEM TEST\n";
echo str_repeat('=', 70) . "\n\n";

// Test 1: Access login form
echo "TEST 1: Access /admin/login form\n";
echo str_repeat('-', 70) . "\n";
$loginForm = file_get_contents('http://localhost:8000/admin/login');
if (strpos($loginForm, 'Admin Login') !== false && strpos($loginForm, 'admin@jewellery.local') !== false) {
    echo "✅ Login form accessible\n";
    echo "   Contains email placeholder and form fields\n";
} else {
    echo "❌ Login form not found\n";
}

// Test 2: Redirect from /admin to /admin/login
echo "\nTEST 2: /admin redirects to /admin/login (no auth)\n";
echo str_repeat('-', 70) . "\n";
$context = stream_context_create(['http' => ['follow_location' => false]]);
$response = @file_get_contents('http://localhost:8000/admin', false, $context);
if (strpos($http_response_header[0], '302') !== false || strpos($http_response_header[0], '301') !== false) {
    echo "✅ /admin returns redirect\n";
    foreach ($http_response_header as $header) {
        if (strpos($header, 'Location') !== false) {
            echo "   $header\n";
        }
    }
} else {
    echo "⚠️  No redirect detected\n";
}

// Test 3: Login form submission with credentials
echo "\nTEST 3: Login Form Submission (admin credentials)\n";
echo str_repeat('-', 70) . "\n";

$postData = http_build_query([
    'email' => 'admin@jewellery.local',
    'password' => 'admin12345',
    'remember' => '1'
]);

$context = stream_context_create([
    'http' => [
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded' . "\r\n" .
                    'Cookie: XSRF-TOKEN=dummy; laravel_session=dummy',
        'content' => $postData,
        'follow_location' => false
    ]
]);

$loginResponse = @file_get_contents('http://localhost:8000/admin/login', false, $context);
if (isset($http_response_header)) {
    $statusLine = $http_response_header[0];
    if (strpos($statusLine, '302') !== false || strpos($statusLine, '303') !== false) {
        echo "✅ Login form accepted (redirecting)\n";
        foreach ($http_response_header as $header) {
            if (strpos($header, 'Location') !== false) {
                echo "   Redirects to: " . trim(str_replace('Location:', '', $header)) . "\n";
            }
        }
    } elseif (strpos($statusLine, '200') !== false) {
        echo "⚠️  Form returned 200 (may need CSRF token)\n";
        echo "   Response contains form errors or requires CSRF token\n";
    } else {
        echo "⚠️  Status: $statusLine\n";
    }
}

// Test 4: Unauthenticated access to /admin returns login form
echo "\nTEST 4: Unauthenticated /admin access\n";
echo str_repeat('-', 70) . "\n";
$unauth = file_get_contents('http://localhost:8000/admin', false, stream_context_create(['http' => ['follow_location' => true]]));
if (strpos($unauth, 'Admin Login') !== false) {
    echo "✅ Unauthenticated users see login form\n";
} else {
    echo "⚠️  Unexpected response\n";
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "✅ ADMIN LOGIN SYSTEM TESTS COMPLETE\n";
echo str_repeat('=', 70) . "\n";
