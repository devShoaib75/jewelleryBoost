{{-- Footer Component --}}
<footer>
    <div class="footer-logo">{{ $contact?->brand_name ?? 'Zara Gold' }}</div>
    <p class="footer-tagline">{{ $contact?->tagline ?? 'Heritage · Craft · Brilliance' }}</p>
    <div class="footer-divider"></div>
    
    {{-- Footer Links --}}
    <div class="footer-links">
        <a href="#order">Order Now</a>
        <a href="{{ $contact?->facebook_url ?? 'https://facebook.com' }}" target="_blank" rel="noopener noreferrer">Facebook</a>
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact?->whatsapp_number ?? '880123456789') }}" target="_blank" rel="noopener noreferrer">WhatsApp</a>
        <a href="mailto:{{ $contact?->email ?? 'info@zaragold.com' }}">Email Us</a>
    </div>
    
    {{-- Copyright --}}
    <p class="footer-copy">
        {{ $contact?->copyright ?? '© 2025 Zara Gold Jewellers · All Rights Reserved · BIS Hallmark Certified' }}
    </p>
</footer>
