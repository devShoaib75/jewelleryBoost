@extends('admin.layout')

@section('page-title', 'Edit Hero Section')
@section('page-subtitle', 'Customize the hero banner content')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil-square"></i> Hero Banner Content
            </div>
            <div class="card-body">
                <form action="{{ route('admin.hero.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="form-label">Badge Text</label>
                        <input type="text" name="badge" class="form-control" 
                               value="{{ $hero->badge ?? '' }}" required>
                        <small class="text-muted">Displayed at top (e.g., ✦ New Arrival 2025 ✦)</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Main Title Text</label>
                        <input type="text" name="title_main" class="form-control" 
                               value="{{ $hero->title_main ?? '' }}" required>
                        <small class="text-muted">First part of title</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Highlighted Title Text</label>
                        <input type="text" name="title_highlight" class="form-control" 
                               value="{{ $hero->title_highlight ?? '' }}" required>
                        <small class="text-muted">Highlighted in gold color (e.g., Gold)</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" 
                               value="{{ $hero->subtitle ?? '' }}" required>
                        <small class="text-muted">Below the main title</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Call-to-Action Button Text</label>
                        <input type="text" name="cta_text" class="form-control" 
                               value="{{ $hero->cta_text ?? '' }}" required>
                        <small class="text-muted">Button text (e.g., Order Now)</small>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Save Changes
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ms-2">
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
            <div class="card-body" style="background: linear-gradient(160deg, #0e0b08 0%, #1a1410 50%, #0e0b08 100%); 
                                          color: #FAF6EE; padding: 30px; text-align: center; border-radius: 8px;">
                <div style="border: 1px solid #C9A84C; color: #C9A84C; font-size: 10px; letter-spacing: 2px; 
                           text-transform: uppercase; padding: 8px 16px; margin-bottom: 20px; display: inline-block;">
                    <span id="preview-badge">✦ New Arrival 2025 ✦</span>
                </div>
                <h1 style="font-size: 48px; color: #FAF6EE; margin: 15px 0;">
                    <span id="preview-main">Bridal</span> <em style="color: #E8C97A;"><span id="preview-highlight">Gold</span></em>
                </h1>
                <p style="font-size: 12px; letter-spacing: 2px; text-transform: uppercase; color: #7A6A5A; margin: 20px 0;">
                    <span id="preview-subtitle">22K Hallmark Certified · Handcrafted Heritage</span>
                </p>
                <button type="button" style="background: linear-gradient(135deg, #C9A84C, #8B6914); color: #1A1410; 
                                             border: none; padding: 12px 30px; font-size: 11px; font-weight: 600; 
                                             letter-spacing: 2px; text-transform: uppercase; cursor: pointer; border-radius: 4px;">
                    <span id="preview-cta">Order Now</span>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-js')
<script>
    // Real-time preview updates
    document.querySelector('input[name="badge"]').addEventListener('input', function() {
        document.getElementById('preview-badge').textContent = this.value;
    });
    document.querySelector('input[name="title_main"]').addEventListener('input', function() {
        document.getElementById('preview-main').textContent = this.value;
    });
    document.querySelector('input[name="title_highlight"]').addEventListener('input', function() {
        document.getElementById('preview-highlight').textContent = this.value;
    });
    document.querySelector('input[name="subtitle"]').addEventListener('input', function() {
        document.getElementById('preview-subtitle').textContent = this.value;
    });
    document.querySelector('input[name="cta_text"]').addEventListener('input', function() {
        document.getElementById('preview-cta').textContent = this.value;
    });
</script>
@endsection
