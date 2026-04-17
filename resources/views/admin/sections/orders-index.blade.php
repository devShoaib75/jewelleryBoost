@extends('admin.layout')

@section('page-title', 'Orders')
@section('page-subtitle', 'Manage customer orders')

@section('content')
<div class="row">
    <div class="col-12">
        {{-- Filter Tabs --}}
        <div class="card mb-4">
            <div class="card-body">
                <div class="btn-group" role="group">
                    <a href="{{ route('admin.orders.index', 'all') }}" class="btn btn-sm {{ $status === 'all' ? 'btn-primary' : 'btn-outline-primary' }}">
                        All ({{ array_sum($stats) }})
                    </a>
                    <a href="{{ route('admin.orders.index', 'pending') }}" class="btn btn-sm {{ $status === 'pending' ? 'btn-warning' : 'btn-outline-warning' }}">
                        Pending ({{ $stats['pending'] }})
                    </a>
                    <a href="{{ route('admin.orders.index', 'confirmed') }}" class="btn btn-sm {{ $status === 'confirmed' ? 'btn-info' : 'btn-outline-info' }}">
                        Confirmed ({{ $stats['confirmed'] }})
                    </a>
                    <a href="{{ route('admin.orders.index', 'shipped') }}" class="btn btn-sm {{ $status === 'shipped' ? 'btn-primary' : 'btn-outline-primary' }}">
                        Shipped ({{ $stats['shipped'] }})
                    </a>
                    <a href="{{ route('admin.orders.index', 'delivered') }}" class="btn btn-sm {{ $status === 'delivered' ? 'btn-success' : 'btn-outline-success' }}">
                        Delivered ({{ $stats['delivered'] }})
                    </a>
                </div>
            </div>
        </div>

        {{-- Orders Table --}}
        <div class="card">
            <div class="card-header">
                <i class="bi bi-bag-heart"></i> Orders
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Customer</th>
                            <th>Product & Material</th>
                            <th>Phone</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>
                                    <strong style="color: #C9A84C;">{{ $order->order_number }}</strong>
                                </td>
                                <td>
                                    <strong>{{ $order->customer_name }}</strong><br>
                                    <small style="color: #666;">{{ $order->city ?? 'N/A' }}</small>
                                </td>
                                <td style="font-size: 12px;">
                                    <strong>{{ $order->product_name }}</strong><br>
                                    <small>{{ Str::limit($order->material_option, 30) }}</small>
                                </td>
                                <td>
                                    <a href="tel:{{ $order->customer_phone }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-telephone"></i> {{ $order->customer_phone }}
                                    </a>
                                    @if($order->customer_whatsapp)
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->customer_whatsapp) }}" target="_blank" class="btn btn-sm btn-outline-success mt-1">
                                            <i class="bi bi-whatsapp"></i> WhatsApp
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <strong>৳ {{ number_format($order->total_price) }}</strong>
                                </td>
                                <td>
                                    <small>{{ $order->payment_method }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $order->status === 'pending' ? 'warning' : ($order->status === 'confirmed' ? 'info' : ($order->status === 'shipped' ? 'primary' : ($order->status === 'delivered' ? 'success' : 'danger'))) }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td style="font-size: 12px;">
                                    {{ $order->created_at->format('M d, Y') }}<br>
                                    <small>{{ $order->created_at->format('H:i A') }}</small>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4" style="color: #999;">
                                    <i class="bi bi-inbox"></i> No orders found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
