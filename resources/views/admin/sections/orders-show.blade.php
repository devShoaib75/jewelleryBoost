@extends('admin.layout')

@section('page-title', 'Order Details')
@section('page-subtitle', $order->order_number)

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-person-check"></i> Customer Information
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                        <p><strong>Phone:</strong> 
                            <a href="tel:{{ $order->customer_phone }}">{{ $order->customer_phone }}</a>
                        </p>
                        <p><strong>WhatsApp:</strong> 
                            @if($order->customer_whatsapp)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->customer_whatsapp) }}" target="_blank">
                                    {{ $order->customer_whatsapp }}
                                </a>
                            @else
                                <span class="text-muted">Same as phone</span>
                            @endif
                        </p>
                        <p><strong>Email:</strong> {{ $order->customer_email ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Delivery Address:</strong> {{ $order->delivery_address }}</p>
                        <p><strong>City:</strong> {{ $order->city ?? 'N/A' }}</p>
                        <p><strong>Necklace Size:</strong> {{ $order->necklace_size ?? 'Not specified' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-bag-heart"></i> Order Details
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Product:</strong> {{ $order->product_name }}</p>
                        <p><strong>Material:</strong> {{ $order->material_option }}</p>
                        <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y H:i A') }}</p>
                        <p><strong>Order Status:</strong>
                            <span class="badge bg-{{ $order->status === 'pending' ? 'warning' : ($order->status === 'confirmed' ? 'info' : ($order->status === 'shipped' ? 'primary' : ($order->status === 'delivered' ? 'success' : 'danger'))) }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-receipt"></i> Price Breakdown
            </div>
            <div class="card-body">
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                    <span>Product Price:</span>
                    <strong>৳ {{ number_format($order->product_price) }}</strong>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                    <span>Making Charge:</span>
                    <strong>৳ {{ number_format($order->making_charge) }}</strong>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                    <span>Delivery Charge:</span>
                    <strong>৳ {{ number_format($order->delivery_charge) }}</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding-top: 10px; background: #f5f5f5; padding: 10px; border-radius: 4px;">
                    <span style="font-size: 16px; font-weight: bold; color: #C9A84C;">Total Payable:</span>
                    <span style="font-size: 18px; font-weight: bold; color: #C9A84C;">৳ {{ number_format($order->total_price) }}</span>
                </div>
            </div>
        </div>

        @if($order->special_notes)
        <div class="card">
            <div class="card-header">
                <i class="bi bi-chat-left-text"></i> Special Notes
            </div>
            <div class="card-body">
                <p>{{ $order->special_notes }}</p>
            </div>
        </div>
        @endif
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-arrow-repeat"></i> Update Status
            </div>
            <div class="card-body">
                <form action="{{ route('admin.orders.status', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label class="form-label">Order Status</label>
                        <select name="status" class="form-control" required>
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>
                                Pending ⏳
                            </option>
                            <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>
                                Confirmed ✓
                            </option>
                            <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>
                                Shipped 📦
                            </option>
                            <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>
                                Delivered ✓✓
                            </option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>
                                Cancelled ✕
                            </option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-circle"></i> Update Status
                    </button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <i class="bi bi-trash"></i> Danger Zone
            </div>
            <div class="card-body">
                <form action="{{ route('admin.orders.delete', $order->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure? This will permanently delete this order.')">
                        <i class="bi bi-trash"></i> Delete Order
                    </button>
                </form>
            </div>
        </div>

        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary w-100 mt-3">
            <i class="bi bi-arrow-left"></i> Back to Orders
        </a>
    </div>
</div>

@endsection
