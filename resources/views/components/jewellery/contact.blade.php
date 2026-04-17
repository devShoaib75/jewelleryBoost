{{-- Contact / Shop Section Component --}}
<section class="contact-section">
    <div class="contact-inner">
        <p class="section-label">✦ Find Us</p>
        <h2 class="section-title">Shop, Connect & Visit</h2>
        <div class="divider-line"><div class="divider-diamond"></div></div>

        {{-- Contact Grid --}}
        <div class="contact-grid">
            
            {{-- Card 1: Visit Our Shop --}}
            <a class="contact-card" href="https://maps.google.com/?q={{ urlencode($contact?->shop_address ?? '123 Jewellers Lane Dhaka') }}" target="_blank" rel="noopener noreferrer">
                <div class="contact-icon gold">📍</div>
                <p class="contact-card-title">Visit Our Shop</p>
                <p class="contact-card-value">
                    {{ $contact?->shop_address ?? '123 Jewellers Lane' }}
                </p>
                <p class="contact-card-sub">Open: {{ $contact?->shop_hours ?? 'Sat–Thu, 10am – 8pm' }}</p>
            </a>

            {{-- Card 2: Facebook Page --}}
            <a class="contact-card" href="{{ $contact?->facebook_url ?? 'https://facebook.com' }}" target="_blank" rel="noopener noreferrer">
                <div class="contact-icon fb">f</div>
                <p class="contact-card-title">Facebook Page</p>
                <p class="contact-card-value">{{ $contact?->facebook_name ?? 'Zara Gold Jewellers' }}</p>
                <p class="contact-card-sub">Follow for new arrivals & offers</p>
            </a>

            {{-- Card 3: WhatsApp Support --}}
            <a class="contact-card" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact?->whatsapp_number ?? '880123456789') }}" target="_blank" rel="noopener noreferrer">
                <div class="contact-icon wa">💬</div>
                <p class="contact-card-title">WhatsApp</p>
                <p class="contact-card-value">{{ $contact?->whatsapp_number ?? '+880 1XX-XXXXXXX' }}</p>
                <p class="contact-card-sub">24/7 Order Support & Enquiries</p>
            </a>

        </div>
    </div>
</section>
