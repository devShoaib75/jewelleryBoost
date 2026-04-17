@extends('admin.layout')

@section('page-title', 'Carousel Gallery')
@section('page-subtitle', 'Manage product image slides')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-images"></i> Slides</span>
                <a href="{{ route('admin.carousel.create') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus-circle"></i> Add Slide
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Tag</th>
                            <th>Caption</th>
                            <th>Image Preview</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($slides as $slide)
                            <tr>
                                <td style="font-size: 24px;">{{ $slide->icon }}</td>
                                <td><strong>{{ $slide->tag }}</strong></td>
                                <td style="font-size: 13px; color: #666;">{{ Str::limit($slide->caption, 40) }}</td>
                                <td>
                                    @if($slide->image_path)
                                        <div style="width: 60px; height: 60px; border-radius: 4px; overflow: hidden; background: #f5f5f5;">
                                            <img src="{{ asset('storage/' . $slide->image_path) }}" 
                                                 style="width: 100%; height: 100%; object-fit: cover;"
                                                 alt="{{ $slide->caption }}">
                                        </div>
                                    @else
                                        <div style="width: 60px; height: 60px; border-radius: 4px; background: linear-gradient(135deg, #1a1208, #2d2010); display: flex; align-items: center; justify-content: center; color: #C9A84C; font-size: 28px;">
                                            {{ $slide->icon }}
                                        </div>
                                    @endif
                                </td>
                                <td><span class="badge bg-info">{{ $slide->sort_order }}</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.carousel.edit', $slide->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.carousel.delete', $slide->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this slide?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4" style="color: #999;">
                                    <i class="bi bi-inbox"></i> No carousel slides yet.
                                    <a href="{{ route('admin.carousel.create') }}">Add a slide</a>
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
