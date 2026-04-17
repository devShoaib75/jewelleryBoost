@extends('admin.layout')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Overview of your jewelry business management')

@section('content')
<div class="row">
    {{-- Hero Section Card --}}
    <div class="col-md-6 col-lg-4">
        <div class="stat-card">
            <h5><i class="bi bi-image"></i> Hero Section</h5>
            <div class="number">1</div>
            <p style="color: #999; font-size: 13px;">Active</p>
            <a href="{{ route('admin.hero.edit') }}" class="btn btn-sm btn-primary mt-2">
                <i class="bi bi-pencil"></i> Edit
            </a>
        </div>
    </div>

    {{-- Product Details Card --}}
    <div class="col-md-6 col-lg-4">
        <div class="stat-card">
            <h5><i class="bi bi-shop"></i> Product Details</h5>
            <div class="number">{{ $productCount ?? 0 }}</div>
            <p style="color: #999; font-size: 13px;">Configuration</p>
            <a href="{{ route('admin.product.edit') }}" class="btn btn-sm btn-primary mt-2">
                <i class="bi bi-pencil"></i> Edit
            </a>
        </div>
    </div>

    {{-- Material Options Card --}}
    <div class="col-md-6 col-lg-4">
        <div class="stat-card">
            <h5><i class="bi bi-palette"></i> Material Options</h5>
            <div class="number">{{ $materialCount ?? 0 }}</div>
            <p style="color: #999; font-size: 13px;">Variants</p>
            <a href="{{ route('admin.material.index') }}" class="btn btn-sm btn-primary mt-2">
                <i class="bi bi-list"></i> Manage
            </a>
        </div>
    </div>

    {{-- Size Chart Card --}}
    <div class="col-md-6 col-lg-4">
        <div class="stat-card">
            <h5><i class="bi bi-rulers"></i> Size Options</h5>
            <div class="number">{{ $sizeCount ?? 0 }}</div>
            <p style="color: #999; font-size: 13px;">Sizes</p>
            <a href="{{ route('admin.size.index') }}" class="btn btn-sm btn-primary mt-2">
                <i class="bi bi-list"></i> Manage
            </a>
        </div>
    </div>

    {{-- Carousel Card --}}
    <div class="col-md-6 col-lg-4">
        <div class="stat-card">
            <h5><i class="bi bi-images"></i> Carousel Gallery</h5>
            <div class="number">{{ $carouselCount ?? 0 }}</div>
            <p style="color: #999; font-size: 13px;">Slides</p>
            <a href="{{ route('admin.carousel.index') }}" class="btn btn-sm btn-primary mt-2">
                <i class="bi bi-list"></i> Manage
            </a>
        </div>
    </div>

    {{-- Orders Card --}}
    <div class="col-md-6 col-lg-4">
        <div class="stat-card">
            <h5><i class="bi bi-bag-heart"></i> Orders</h5>
            <div class="number">{{ $totalOrders ?? 0 }}</div>
            <p style="color: #999; font-size: 13px;">
                <span class="badge bg-warning">{{ $pendingOrders ?? 0 }} Pending</span>
                <span class="badge bg-info">{{ $confirmedOrders ?? 0 }} Confirmed</span>
            </p>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-primary mt-2">
                <i class="bi bi-list"></i> View
            </a>
        </div>
    </div>

    {{-- Contact Info Card --}}
    <div class="col-md-6 col-lg-4">
        <div class="stat-card">
            <h5><i class="bi bi-telephone"></i> Contact Info</h5>
            <div class="number">1</div>
            <p style="color: #999; font-size: 13px;">Configuration</p>
            <a href="{{ route('admin.contact.edit') }}" class="btn btn-sm btn-primary mt-2">
                <i class="bi bi-pencil"></i> Edit
            </a>
        </div>
    </div>
</div>

{{-- Quick Actions --}}
<div class="row mt-40">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-lightning"></i> Quick Actions
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('admin.hero.edit') }}" class="btn btn-outline-primary w-100 mb-2">
                            <i class="bi bi-pencil"></i> Update Hero Banner
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.product.edit') }}" class="btn btn-outline-primary w-100 mb-2">
                            <i class="bi bi-pencil"></i> Update Product Price
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.material.index') }}" class="btn btn-outline-primary w-100 mb-2">
                            <i class="bi bi-plus"></i> Add Material Option
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.size.index') }}" class="btn btn-outline-primary w-100 mb-2">
                            <i class="bi bi-plus"></i> Add Size Option
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.carousel.index') }}" class="btn btn-outline-primary w-100 mb-2">
                            <i class="bi bi-plus"></i> Add Carousel Slide
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.contact.edit') }}" class="btn btn-outline-primary w-100 mb-2">
                            <i class="bi bi-pencil"></i> Update Contact Info
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
