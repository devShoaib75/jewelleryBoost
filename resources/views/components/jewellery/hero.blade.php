{{-- Hero Section Component --}}
<section class="hero">
    <div class="hero-bg-pattern"></div>
    <div class="hero-content">
        <div class="hero-badge">{{ $hero?->badge ?? '✦ New Arrival 2025 ✦' }}</div>
        <h1 class="hero-title">{{ $hero?->title_main ?? 'Bridal' }} <em>{{ $hero?->title_highlight ?? 'Gold' }}</em><br>Collection</h1>
        <p class="hero-sub">{{ $hero?->subtitle ?? '22K Hallmark Certified · Handcrafted Heritage' }}</p>
        <a href="#order" class="hero-cta">{{ $hero?->cta_text ?? 'Order Now' }}</a>
    </div>
    <div class="hero-scroll">
        <span>Explore</span>
        <div class="scroll-line"></div>
    </div>
</section>
