@extends('admin.layout')

@section('page-title', isset($material) ? 'Edit Material' : 'Add New Material')
@section('page-subtitle', 'Define a product variant with pricing')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil-square"></i> Material Variant Details
            </div>
            <div class="card-body">
                <form action="{{ isset($material) ? route('admin.material.update', $material->id) : route('admin.material.store') }}" method="POST">
                    @csrf
                    @if(isset($material))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label class="form-label">Icon (Emoji)</label>
                        <input type="text" name="icon" class="form-control" maxlength="10"
                               value="{{ $material->icon ?? '' }}" placeholder="e.g., 🏆" required>
                        <small class="text-muted">Single emoji to represent this material</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Material Name</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ $material->name ?? '' }}" placeholder="e.g., 22K Gold — 85g" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <input type="text" name="sub_text" class="form-control"
                               value="{{ $material->sub_text ?? '' }}" placeholder="e.g., Full Set · Hallmarked" required>
                        <small class="text-muted">Brief description shown below the name</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Price (৳)</label>
                        <input type="number" name="price" class="form-control price-input"
                               value="{{ $material->price ?? 0 }}" step="0.01" min="0" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="sort_order" class="form-control"
                               value="{{ $material->sort_order ?? 1 }}" min="1" required>
                        <small class="text-muted">Lower numbers appear first</small>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> {{ isset($material) ? 'Update Material' : 'Create Material' }}
                        </button>
                        <a href="{{ route('admin.material.index') }}" class="btn btn-secondary ms-2">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Preview --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-eye"></i> Preview
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; gap: 12px; background: rgba(201,168,76,0.1); 
                           border: 1px solid rgba(201,168,76,0.3); padding: 15px; border-radius: 6px;">
                    <span style="font-size: 24px;" id="preview-icon">🏆</span>
                    <div style="flex: 1;">
                        <p style="margin: 0; font-size: 13px; font-weight: 500; color: #FAF6EE;" id="preview-name">
                            22K Gold — 85g
                        </p>
                        <p style="margin: 0; font-size: 11px; color: #7A6A5A;" id="preview-sub">
                            Full Set · Hallmarked
                        </p>
                    </div>
                    <p style="margin: 0; font-family: 'Cormorant Garamond'; font-size: 18px; 
                             color: #E8C97A;" id="preview-price">৳1,85,000</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-js')
<script>
    document.querySelector('input[name="icon"]').addEventListener('input', function() {
        document.getElementById('preview-icon').textContent = this.value || '🏆';
    });
    document.querySelector('input[name="name"]').addEventListener('input', function() {
        document.getElementById('preview-name').textContent = this.value || '22K Gold — 85g';
    });
    document.querySelector('input[name="sub_text"]').addEventListener('input', function() {
        document.getElementById('preview-sub').textContent = this.value || 'Full Set · Hallmarked';
    });
    document.querySelector('.price-input').addEventListener('input', function() {
        const price = parseInt(this.value) || 0;
        document.getElementById('preview-price').textContent = '৳' + price.toLocaleString();
    });
</script>
@endsection
