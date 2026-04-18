#!/usr/bin/env php
<?php

require_once __DIR__ . '/bootstrap/app.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

// Test data
$payload = [
    'email' => 'admin@jewellery.local',
    'password' => 'admin12345',
];

// Make request to login endpoint
$request = \Illuminate\Http\Request::create(
    '/api/auth/login',
    'POST',
    [],
    [],
    [],
    ['CONTENT_TYPE' => 'application/json'],
    json_encode($payload)
);

try {
    $response = $kernel->handle($request);
    
    echo "Status: " . $response->getStatusCode() . "\n";
    echo "Content-Type: " . $response->headers->get('Content-Type') . "\n";
    echo "\nResponse:\n";
    echo $response->getContent() . "\n";
    
    // Decode JSON response
    $data = json_decode($response->getContent(), true);
    if (json_last_error() === JSON_ERROR_NONE) {
        echo "\n✅ Valid JSON Response\n";
        if (isset($data['token'])) {
            echo "✅ Token generated: " . substr($data['token'], 0, 20) . "...\n";
            echo "✅ User: " . ($data['user']['name'] ?? 'N/A') . "\n";
            echo "✅ Email: " . ($data['user']['email'] ?? 'N/A') . "\n";
        }
    } else {
        echo "\n❌ Invalid JSON Response\n";
    }
    
} catch (\Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
