@extends('admin.layout')

@section('page-title', 'Edit Contact Information')
@section('page-subtitle', 'Update store location, social media, and contact details')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil-square"></i> Contact & Branding
            </div>
            <div class="card-body">
                <form action="{{ route('admin.contact.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <h6 class="mb-3"><i class="bi bi-shop"></i> Store Location</h6>

                    <div class="form-group">
                        <label class="form-label">Shop Address</label>
                        <textarea name="shop_address" class="form-control" rows="2" required>{{ $contact->shop_address ?? '' }}</textarea>
                        <small class="text-muted">Street address shown on the website</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Shop Hours</label>
                        <input type="text" name="shop_hours" class="form-control"
                               value="{{ $contact->shop_hours ?? '' }}" placeholder="e.g., Sat–Thu, 10am – 8pm" required>
                    </div>

                    <hr>

                    <h6 class="mb-3"><i class="bi bi-share"></i> Social Media & Contact</h6>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Facebook Page URL</label>
                                <input type="url" name="facebook_url" class="form-control"
                                       value="{{ $contact->facebook_url ?? '' }}" placeholder="https://facebook.com/..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Facebook Business Name</label>
                                <input type="text" name="facebook_name" class="form-control"
                                       value="{{ $contact->facebook_name ?? '' }}" placeholder="Zara Gold Jewellers" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">WhatsApp Number</label>
                                <input type="text" name="whatsapp_number" class="form-control"
                                       value="{{ $contact->whatsapp_number ?? '' }}" placeholder="+880 1XX-XXXXXXX" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control"
                                       value="{{ $contact->email ?? '' }}" placeholder="info@example.com" required>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h6 class="mb-3"><i class="bi bi-card-text"></i> Branding</h6>

                    <div class="form-group">
                        <label class="form-label">Brand Name</label>
                        <input type="text" name="brand_name" class="form-control"
                               value="{{ $contact->brand_name ?? '' }}" placeholder="Zara Gold" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Brand Tagline</label>
                        <input type="text" name="tagline" class="form-control"
                               value="{{ $contact->tagline ?? '' }}" placeholder="Heritage · Craft · Brilliance" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Copyright / Footer Text</label>
                        <textarea name="copyright" class="form-control" rows="2" required>{{ $contact->copyright ?? '' }}</textarea>
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
                <i class="bi bi-eye"></i> Contact Preview
            </div>
            <div class="card-body">
                <div style="background: #2D2520; color: #FAF6EE; padding: 20px; border-radius: 6px;">
                    <h5 style="color: #E8C97A; margin-bottom: 20px;">📍 Visit Our Shop</h5>
                    <p style="font-size: 14px; margin: 0 0 10px 0; line-height: 1.6;">
                        <span id="preview-address">{{ $contact->shop_address ?? '—' }}</span>
                    </p>
                    <p style="font-size: 12px; color: #999; margin: 0;">
                        <span id="preview-hours">{{ $contact->shop_hours ?? '—' }}</span>
                    </p>

                    <hr style="border-color: #555; margin: 15px 0;">

                    <h5 style="color: #E8C97A; margin: 15px 0 10px 0;">💬 WhatsApp</h5>
                    <p style="font-size: 14px; margin: 0;">
                        <span id="preview-whatsapp">{{ $contact->whatsapp_number ?? '—' }}</span>
                    </p>

                    <h5 style="color: #E8C97A; margin: 15px 0 10px 0;">📧 Email</h5>
                    <p style="font-size: 14px; margin: 0;">
                        <span id="preview-email">{{ $contact->email ?? '—' }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-js')
<script>
    document.querySelector('textarea[name="shop_address"]').addEventListener('input', function() {
        document.getElementById('preview-address').textContent = this.value || '—';
    });
    document.querySelector('input[name="shop_hours"]').addEventListener('input', function() {
        document.getElementById('preview-hours').textContent = this.value || '—';
    });
    document.querySelector('input[name="whatsapp_number"]').addEventListener('input', function() {
        document.getElementById('preview-whatsapp').textContent = this.value || '—';
    });
    document.querySelector('input[name="email"]').addEventListener('input', function() {
        document.getElementById('preview-email').textContent = this.value || '—';
    });
</script>
@endsection
