@extends('admin.layout')

@section('page-title', 'Material Options')
@section('page-subtitle', 'Manage product variants and pricing')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-palette"></i> Material Variants</span>
                <a href="{{ route('admin.material.create') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus-circle"></i> Add New Material
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price (৳)</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($materials as $material)
                            <tr>
                                <td style="font-size: 24px;">{{ $material->icon }}</td>
                                <td>
                                    <strong>{{ $material->name }}</strong>
                                </td>
                                <td style="font-size: 13px; color: #666;">{{ $material->sub_text }}</td>
                                <td>
                                    <span class="badge-gold">৳ {{ number_format($material->price, 0) }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $material->sort_order }}</span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.material.edit', $material->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.material.delete', $material->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this material?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4" style="color: #999;">
                                    <i class="bi bi-inbox"></i> No material options yet. 
                                    <a href="{{ route('admin.material.create') }}">Create one now</a>
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
