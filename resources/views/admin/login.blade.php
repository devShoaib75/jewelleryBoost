<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Zara Gold</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --gold: #C9A84C;
            --gold-light: #E8C97A;
            --gold-dark: #8B6914;
            --dark: #1A1410;
            --charcoal: #2D2520;
        }

        body {
            background: linear-gradient(135deg, var(--dark) 0%, var(--charcoal) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Jost', 'Segoe UI', sans-serif;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border: 2px solid var(--gold);
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h1 {
            color: var(--dark);
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .login-header p {
            color: var(--gold-dark);
            font-size: 14px;
            margin: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            color: var(--dark);
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            font-size: 14px;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 10px 14px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 0.2rem rgba(201, 168, 76, 0.25);
            outline: none;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
            color: var(--dark);
            border: none;
            padding: 11px 16px;
            font-weight: 600;
            border-radius: 6px;
            width: 100%;
            font-size: 14px;
            transition: transform 0.2s;
        }

        .btn-login:hover {
            color: var(--dark);
            transform: translateY(-2px);
        }

        .error-message {
            color: #dc3545;
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }

        .alert {
            border-radius: 6px;
            padding: 12px 14px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-danger {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me input {
            margin-right: 8px;
            cursor: pointer;
        }

        .remember-me label {
            margin: 0;
            cursor: pointer;
            font-size: 14px;
            color: var(--dark);
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
        }

        .login-footer a {
            color: var(--gold);
            text-decoration: none;
            font-size: 13px;
        }

        .login-footer a:hover {
            color: var(--gold-dark);
            text-decoration: underline;
        }

        .gold-line {
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h1>✦ Admin Login</h1>
                <p>Zara Gold Jewellery Administration</p>
            </div>

            <div class="gold-line"></div>

            @if ($errors->has('credentials'))
                <div class="alert alert-danger" role="alert">
                    <strong>Login Failed!</strong>
                    {{ $errors->first('credentials') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        value="{{ old('email') }}"
                        placeholder="admin@jewellery.local"
                        required
                        autofocus
                    >
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        placeholder="Enter your password"
                        required
                    >
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember" value="1" class="form-check-input">
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn-login">
                    Sign In
                </button>
            </form>

            <div class="gold-line"></div>

            <div class="login-footer">
                <p style="margin: 0; font-size: 12px; color: var(--charcoal);">
                    🔐 Admin access is restricted to authorized personnel only
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
