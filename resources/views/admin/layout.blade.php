<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Zara Gold</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --gold: #C9A84C;
            --gold-light: #E8C97A;
            --gold-dark: #8B6914;
            --dark: #1A1410;
            --charcoal: #2D2520;
        }

        body {
            background: #f8f9fa;
            font-family: 'Jost', sans-serif;
        }

        .sidebar {
            background: var(--dark);
            min-height: 100vh;
            padding: 20px 0;
            position: fixed;
            width: 250px;
            left: 0;
            top: 0;
        }

        .sidebar-brand {
            color: var(--gold) !important;
            font-size: 24px;
            font-weight: 600;
            padding: 20px;
            text-decoration: none;
            display: block;
            border-bottom: 1px solid var(--gold);
            margin-bottom: 20px;
        }

        .sidebar-nav a {
            color: #bbb;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background: var(--charcoal);
            color: var(--gold);
            border-left-color: var(--gold);
        }

        .sidebar-nav strong {
            color: var(--gold);
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            display: block;
            padding: 15px 20px 10px;
            margin-top: 10px;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .top-navbar {
            background: white;
            padding: 15px 30px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title {
            color: var(--dark);
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }

        .page-subtitle {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }

        .card-header {
            background: var(--gold) !important;
            color: var(--dark) !important;
            font-weight: 600;
            border-radius: 8px 8px 0 0 !important;
            padding: 15px 20px;
        }

        .btn-primary {
            background: var(--gold);
            border-color: var(--gold);
            color: var(--dark);
            font-weight: 600;
        }

        .btn-primary:hover {
            background: var(--gold-dark);
            border-color: var(--gold-dark);
            color: white;
        }

        .btn-outline-primary {
            color: var(--gold);
            border-color: var(--gold);
        }

        .btn-outline-primary:hover {
            background: var(--gold);
            border-color: var(--gold);
            color: white;
        }

        .btn-sm {
            padding: 5px 12px;
            font-size: 13px;
        }

        .form-label {
            color: var(--dark);
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
            margin-top: 15px;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 10px 15px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 0.2rem rgba(201, 168, 76, 0.25);
        }

        .alert {
            border-radius: 8px;
            border: none;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
        }

        .alert-info {
            background: #d1ecf1;
            color: #0c5460;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            text-align: center;
            margin-bottom: 20px;
        }

        .stat-card h5 {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-card .number {
            font-size: 36px;
            font-weight: 700;
            color: var(--gold);
        }

        .table {
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .table thead {
            background: var(--charcoal);
            color: white;
        }

        .table tbody tr:hover {
            background: #f5f5f5;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .badge-gold {
            background: var(--gold);
            color: var(--dark);
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 100;
                transition: transform 0.3s;
                width: 220px;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
    @yield('extra-css')
</head>
<body>

    {{-- SIDEBAR NAVIGATION --}}
    <div class="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <i class="bi bi-gem"></i> Admin
        </a>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" @if(Route::currentRouteName() == 'admin.dashboard') class="active" @endif>
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <strong><i class="bi bi-pencil-square"></i> Content Management</strong>
            
            <a href="{{ route('admin.hero.edit') }}" @if(Route::currentRouteName() == 'admin.hero.edit') class="active" @endif>
                <i class="bi bi-image"></i> Hero Section
            </a>
            
            <a href="{{ route('admin.carousel.index') }}" @if(strpos(Route::currentRouteName(), 'admin.carousel') !== false) class="active" @endif>
                <i class="bi bi-images"></i> Carousel Gallery
            </a>
            
            <a href="{{ route('admin.orders.index') }}" @if(strpos(Route::currentRouteName(), 'admin.orders') !== false) class="active" @endif>
                <i class="bi bi-bag-heart"></i> Orders
            </a>
            
            <a href="{{ route('admin.product.edit') }}" @if(Route::currentRouteName() == 'admin.product.edit') class="active" @endif>
                <i class="bi bi-shop"></i> Product Details
            </a>

            <strong><i class="bi bi-gear"></i> Settings</strong>
            
            <a href="{{ route('admin.material.index') }}" @if(strpos(Route::currentRouteName(), 'admin.material') !== false) class="active" @endif>
                <i class="bi bi-palette"></i> Material Options
            </a>
            
            <a href="{{ route('admin.size.index') }}" @if(strpos(Route::currentRouteName(), 'admin.size') !== false) class="active" @endif>
                <i class="bi bi-rulers"></i> Size Chart
            </a>
            
            <a href="{{ route('admin.contact.edit') }}" @if(Route::currentRouteName() == 'admin.contact.edit') class="active" @endif>
                <i class="bi bi-telephone"></i> Contact Info
            </a>
        </nav>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="main-content">
        <div class="top-navbar">
            <div>
                <h1 class="page-title">@yield('page-title')</h1>
                <p class="page-subtitle">@yield('page-subtitle')</p>
            </div>
            <a href="/" class="btn btn-outline-primary" target="_blank">
                <i class="bi bi-eye"></i> View Website
            </a>
        </div>

        {{-- Success/Error Messages --}}
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="bi bi-exclamation-circle"></i> Error!</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Page Content --}}
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('extra-js')
</body>
</html>
