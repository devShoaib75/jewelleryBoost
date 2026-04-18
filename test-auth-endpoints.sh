#!/bin/bash

BASE_URL="http://localhost:8000/api"
ADMIN_EMAIL="admin@jewellery.local"
ADMIN_PASSWORD="admin12345"

echo "========================================="
echo "Testing Jewellery API Authentication"
echo "========================================="

# Test 1: Login
echo ""
echo "TEST 1: Admin Login"
echo "------"
LOGIN_RESPONSE=$(curl -s -X POST "$BASE_URL/auth/login" \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d "{\"email\":\"$ADMIN_EMAIL\",\"password\":\"$ADMIN_PASSWORD\"}")

echo "$LOGIN_RESPONSE" | jq '.' || echo "$LOGIN_RESPONSE"

# Extract token
TOKEN=$(echo "$LOGIN_RESPONSE" | jq -r '.token // empty')
if [ -z "$TOKEN" ]; then
  echo "❌ Failed to get token"
  exit 1
fi

echo "✅ Token obtained: ${TOKEN:0:20}..."

# Test 2: Get current user (requires authentication)
echo ""
echo "TEST 2: Get Current User (GET /api/auth/me)"
echo "------"
ME_RESPONSE=$(curl -s -X GET "$BASE_URL/auth/me" \
  -H "Authorization: Bearer $TOKEN" \
  -H "Accept: application/json")

echo "$ME_RESPONSE" | jq '.' || echo "$ME_RESPONSE"

# Test 3: Register new user
echo ""
echo "TEST 3: Register New User"
echo "------"
REGISTER_RESPONSE=$(curl -s -X POST "$BASE_URL/auth/register" \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d "{\"name\":\"Test User\",\"email\":\"test@jewellery.local\",\"password\":\"TestPassword123\",\"password_confirmation\":\"TestPassword123\"}")

echo "$REGISTER_RESPONSE" | jq '.' || echo "$REGISTER_RESPONSE"

# Test 4: Login with new user
echo ""
echo "TEST 4: Login with New User"
echo "------"
TEST_LOGIN=$(curl -s -X POST "$BASE_URL/auth/login" \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d "{\"email\":\"test@jewellery.local\",\"password\":\"TestPassword123\"}")

echo "$TEST_LOGIN" | jq '.' || echo "$TEST_LOGIN"

# Extract new token
TEST_TOKEN=$(echo "$TEST_LOGIN" | jq -r '.token // empty')
if [ ! -z "$TEST_TOKEN" ]; then
  echo "✅ Test user login successful: ${TEST_TOKEN:0:20}..."
fi

# Test 5: Logout
echo ""
echo "TEST 5: Logout (POST /api/auth/logout)"
echo "------"
LOGOUT_RESPONSE=$(curl -s -X POST "$BASE_URL/auth/logout" \
  -H "Authorization: Bearer $TOKEN" \
  -H "Accept: application/json")

echo "$LOGOUT_RESPONSE" | jq '.' || echo "$LOGOUT_RESPONSE"

# Test 6: Try to use token after logout (should fail)
echo ""
echo "TEST 6: Try to use token after logout (should fail)"
echo "------"
AFTER_LOGOUT=$(curl -s -X GET "$BASE_URL/auth/me" \
  -H "Authorization: Bearer $TOKEN" \
  -H "Accept: application/json")

echo "$AFTER_LOGOUT" | jq '.' || echo "$AFTER_LOGOUT"

echo ""
echo "========================================="
echo "✅ All tests completed!"
echo "========================================="
