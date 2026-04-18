# Sanctum Authentication API Documentation

## Overview
The jewellery application uses **Laravel Sanctum** for stateless API token authentication. This allows secure authentication via API tokens for both admin and public APIs.

## Base URL
```
http://localhost:8000/api
```

## Authentication Headers
All protected endpoints require the `Authorization` header:
```
Authorization: Bearer {token}
```

---

## Public Endpoints (No Auth Required)

### 1. Register User
**POST** `/auth/register`

Create a new user account.

**Request Body:**
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```

**Response (201 Created):**
```json
{
  "success": true,
  "user": {
    "id": 2,
    "name": "John Doe",
    "email": "john@example.com",
    "email_verified_at": null,
    "created_at": "2025-04-18T12:00:00.000000Z",
    "updated_at": "2025-04-18T12:00:00.000000Z"
  },
  "token": "1|abcdef123456...",
  "message": "User registered successfully"
}
```

---

### 2. Login
**POST** `/auth/login`

Authenticate and receive an API token.

**Request Body:**
```json
{
  "email": "admin@jewellery.local",
  "password": "admin12345"
}
```

**Response (200 OK):**
```json
{
  "success": true,
  "user": {
    "id": 1,
    "name": "Admin",
    "email": "admin@jewellery.local",
    "created_at": "2025-04-18T12:00:00.000000Z",
    "updated_at": "2025-04-18T12:00:00.000000Z"
  },
  "token": "1|abcdef123456...",
  "message": "Login successful"
}
```

**Error Response (422 Unprocessable Entity):**
```json
{
  "message": "The provided credentials are incorrect.",
  "errors": {
    "email": ["The provided credentials are incorrect."]
  }
}
```

---

## Protected Endpoints (Auth Required)

### 3. Get Authenticated User
**GET** `/auth/me`

Get information about the currently authenticated user.

**Headers:**
```
Authorization: Bearer {token}
```

**Response (200 OK):**
```json
{
  "success": true,
  "user": {
    "id": 1,
    "name": "Admin",
    "email": "admin@jewellery.local",
    "created_at": "2025-04-18T12:00:00.000000Z",
    "updated_at": "2025-04-18T12:00:00.000000Z"
  }
}
```

---

### 4. Logout (Current Session)
**POST** `/auth/logout`

Revoke the current API token (logout from current device only).

**Headers:**
```
Authorization: Bearer {token}
```

**Response (200 OK):**
```json
{
  "success": true,
  "message": "Logout successful"
}
```

---

### 5. Logout from All Devices
**POST** `/auth/logout-all`

Revoke all API tokens for the user (logout from all devices).

**Headers:**
```
Authorization: Bearer {token}
```

**Response (200 OK):**
```json
{
  "success": true,
  "message": "Logged out from all devices"
}
```

---

## Admin Authentication

### Default Admin Credentials
- **Email:** `admin@jewellery.local`
- **Password:** `admin12345`

### Admin Requirements
Only users with ID `1` can access admin endpoints (`/admin/*`).

To grant admin access to another user, update their `id` to `1` or implement an `is_admin` column.

---

## Example Usage

### JavaScript/Fetch
```javascript
// Login
const response = await fetch('http://localhost:8000/api/auth/login', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify({
    email: 'admin@jewellery.local',
    password: 'admin12345'
  })
});

const data = await response.json();
const token = data.token;

// Use token for protected requests
const userResponse = await fetch('http://localhost:8000/api/auth/me', {
  headers: { 'Authorization': `Bearer ${token}` }
});
```

### cURL
```bash
# Login
curl -X POST http://localhost:8000/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "admin@jewellery.local",
    "password": "admin12345"
  }'

# Get user (with token)
curl -X GET http://localhost:8000/api/auth/me \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"

# Logout
curl -X POST http://localhost:8000/api/auth/logout \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"
```

### Python/Requests
```python
import requests

# Login
response = requests.post('http://localhost:8000/api/auth/login', json={
    'email': 'admin@jewellery.local',
    'password': 'admin12345'
})

data = response.json()
token = data['token']

# Use token
headers = {'Authorization': f'Bearer {token}'}
user = requests.get('http://localhost:8000/api/auth/me', headers=headers).json()
print(user)
```

---

## Error Responses

### 401 Unauthenticated
```json
{
  "error": "Unauthenticated"
}
```

### 403 Unauthorized
```json
{
  "error": "Forbidden - Admin privileges required"
}
```

### 422 Validation Error
```json
{
  "message": "The ... field is required.",
  "errors": {
    "email": ["The email field is required."]
  }
}
```

---

## Security Notes

1. **Never expose tokens** - Keep API tokens private
2. **HTTPS only** - Always use HTTPS in production
3. **Token rotation** - Implement token rotation for sensitive operations
4. **Rate limiting** - API endpoints have rate limiting enabled
5. **CORS** - Configure CORS in production for cross-origin requests
6. **Admin protection** - All admin routes require admin authentication

---

## Related Files

- Controller: `app/Http/Controllers/Auth/SanctumAuthController.php`
- Middleware: `app/Http/Middleware/AdminMiddleware.php`
- Routes: `routes/api.php`
- Config: `config/auth.php`
- Model: `app/Models/User.php`
