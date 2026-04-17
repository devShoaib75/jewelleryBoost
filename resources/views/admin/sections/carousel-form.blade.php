@extends('admin.layout')

@section('page-title', isset($slide) ? 'Edit Carousel Slide' : 'Add New Slide')
@section('page-subtitle', 'Create a new product showcase slide')

@section('content')
<div class="row">
    <div class="col-lg-8">
            <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil-square"></i> Slide Configuration
            </div>
            <div class="card-body">
                <form action="{{ isset($slide) ? route('admin.carousel.update', $slide->id) : route('admin.carousel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($slide))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label class="form-label">Icon (Emoji)</label>
                        <input type="text" name="icon" class="form-control" maxlength="10"
                               value="{{ $slide->icon ?? '' }}" placeholder="e.g., 💎" required>
                        <small class="text-muted">Shown when image is not loaded</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Slide Tag</label>
                        <input type="text" name="tag" class="form-control"
                               value="{{ $slide->tag ?? '' }}" placeholder="e.g., ✦ Front View" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Slide Caption</label>
                        <input type="text" name="caption" class="form-control"
                               value="{{ $slide->caption ?? '' }}" placeholder="e.g., Bridal Necklace Set — Full View" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control" 
                               accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
                               id="imageInput">
                        <small class="text-muted">Supported: JPEG, PNG, GIF, WebP (Max 5MB)</small>
                        @if(isset($slide) && $slide->image_path)
                            <div class="mt-2">
                                <small class="text-success">✓ Current image uploaded</small>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="sort_order" class="form-control"
                               value="{{ $slide->sort_order ?? 1 }}" min="1" required>
                        <small class="text-muted">Lower numbers appear first</small>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> {{ isset($slide) ? 'Update Slide' : 'Create Slide' }}
                        </button>
                        <a href="{{ route('admin.carousel.index') }}" class="btn btn-secondary ms-2">
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
                <i class="bi bi-eye"></i> Slide Preview
            </div>
            <div class="card-body">
                <div style="position: relative; background: linear-gradient(135deg, #1a1208, #2d2010); 
                           aspect-ratio: 4/3; border-radius: 6px; overflow: hidden; display: flex; 
                           align-items: center; justify-content: center;" id="preview-container">
                    @if(isset($slide) && $slide->image_path)
                        <img id="preview-image" src="{{ asset('storage/' . $slide->image_path) }}" 
                             style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <img id="preview-image" src="" style="width: 100%; height: 100%; object-fit: cover; display: none;">
                        <div id="preview-fallback">
                            <div style="font-size: 60px; margin-bottom: 10px;" id="preview-icon">💎</div>
                            <div style="color: #C9A84C; font-size: 12px; letter-spacing: 1px;" id="preview-tag">✦ Front View</div>
                        </div>
                    @endif
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(10,8,4,0.9) 0%, transparent 100%); 
                               padding: 20px; color: #FAF6EE;">
                        <p style="margin: 0; font-family: 'Cormorant Garamond'; font-size: 18px; color: #FAF6EE;" id="preview-caption">
                            {{ $slide->caption ?? 'Bridal Necklace Set — Full View' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-js')
<script>
    const previewImage = document.getElementById('preview-image');
    const previewFallback = document.getElementById('preview-fallback');
    const previewContainer = document.getElementById('preview-container');
    const imageInput = document.getElementById('imageInput');

    // Handle image file selection
    imageInput.addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(event) {
                previewImage.src = event.target.result;
                previewImage.style.display = 'block';
                if (previewFallback) {
                    previewFallback.style.display = 'none';
                }
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Update other preview fields
    document.querySelector('input[name="icon"]').addEventListener('input', function() {
        const previewIconEl = document.getElementById('preview-icon');
        if (previewIconEl) previewIconEl.textContent = this.value || '💎';
    });
    
    document.querySelector('input[name="tag"]').addEventListener('input', function() {
        const previewTagEl = document.getElementById('preview-tag');
        if (previewTagEl) previewTagEl.textContent = this.value || '✦ Front View';
    });
    
    document.querySelector('input[name="caption"]').addEventListener('input', function() {
        document.getElementById('preview-caption').textContent = this.value || 'Bridal Necklace Set — Full View';
    });
</script>
@endsection
