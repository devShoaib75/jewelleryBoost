@extends('admin.layout')

@section('page-title', 'Size Chart')
@section('page-subtitle', 'Manage necklace sizing options')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-rulers"></i> Size Options</span>
                <a href="{{ route('admin.size.create') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus-circle"></i> Add Size
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Size Name</th>
                            <th>Length (inches)</th>
                            <th>Length (cm)</th>
                            <th>Best For</th>
                            <th>Style</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sizes as $size)
                            <tr>
                                <td><strong>{{ $size->size_name }}</strong></td>
                                <td>{{ $size->length_inches }}</td>
                                <td>{{ $size->length_cm }}</td>
                                <td style="font-size: 13px; color: #666;">{{ $size->best_for }}</td>
                                <td style="font-size: 13px; color: #666;">{{ $size->style }}</td>
                                <td><span class="badge bg-info">{{ $size->sort_order }}</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.size.edit', $size->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.size.delete', $size->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this size?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4" style="color: #999;">
                                    <i class="bi bi-inbox"></i> No sizes configured yet.
                                    <a href="{{ route('admin.size.create') }}">Add a size</a>
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
