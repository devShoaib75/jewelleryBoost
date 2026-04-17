{{-- Carousel Section Component --}}
<section class="carousel-section">
    <p class="section-label">✦ Gallery</p>
    <h2 class="section-title">Every Angle, Pure Elegance</h2>

    <div class="carousel-wrapper">
        <div class="carousel-track" id="carouselTrack">

            @forelse($slides ?? [] as $slide)
            {{-- Dynamic Carousel Slide --}}
            <div class="carousel-slide">
                <div class="slide-placeholder">
                    <span class="slide-icon">{{ $slide->icon }}</span>
                    @if($slide->image_path)
                        <img src="{{ asset('storage/' . $slide->image_path) }}" alt="{{ $slide->caption }}">
                    @endif
                </div>
                <div class="slide-overlay">
                    <p class="slide-tag">{{ $slide->tag }}</p>
                    <p class="slide-caption">{{ $slide->caption }}</p>
                </div>
            </div>
            @empty
            {{-- Default Slide 1: Front View --}}
            <div class="carousel-slide">
                <div class="slide-placeholder slide-1">
                    <span class="slide-icon">💎</span>
                </div>
                <div class="slide-overlay">
                    <p class="slide-tag">✦ Front View</p>
                    <p class="slide-caption">Bridal Necklace Set — Full View</p>
                </div>
            </div>

            {{-- Default Slide 2: Close Detail --}}
            <div class="carousel-slide">
                <div class="slide-placeholder slide-2">
                    <span class="slide-icon">✨</span>
                </div>
                <div class="slide-overlay">
                    <p class="slide-tag">✦ Close Detail</p>
                    <p class="slide-caption">Intricate Kundan Stonework</p>
                </div>
            </div>

            {{-- Default Slide 3: Earrings --}}
            <div class="carousel-slide">
                <div class="slide-placeholder slide-3">
                    <span class="slide-icon">💍</span>
                </div>
                <div class="slide-overlay">
                    <p class="slide-tag">✦ Earrings</p>
                    <p class="slide-caption">Matching Jhumka Earrings</p>
                </div>
            </div>

            {{-- Default Slide 4: Complete Set --}}
            <div class="carousel-slide">
                <div class="slide-placeholder slide-4">
                    <span class="slide-icon">👑</span>
                </div>
                <div class="slide-overlay">
                    <p class="slide-tag">✦ Complete Set</p>
                    <p class="slide-caption">Necklace + Earrings + Tikka</p>
                </div>
            </div>
            @endforelse

        </div>

        {{-- Carousel Navigation Buttons --}}
        <button class="carousel-btn prev" onclick="changeSlide(-1)">&#8592;</button>
        <button class="carousel-btn next" onclick="changeSlide(1)">&#8594;</button>
    </div>

    {{-- Carousel Indicators --}}
    <div class="carousel-dots" id="carouselDots">
        @if(isset($slides) && count($slides) > 0)
            @foreach($slides as $index => $slide)
                <button class="carousel-dot{{ $index === 0 ? ' active' : '' }}" onclick="goToSlide({{ $index }})"></button>
            @endforeach
        @else
            {{-- Default: 4 fallback dots --}}
            <button class="carousel-dot active" onclick="goToSlide(0)"></button>
            <button class="carousel-dot" onclick="goToSlide(1)"></button>
            <button class="carousel-dot" onclick="goToSlide(2)"></button>
            <button class="carousel-dot" onclick="goToSlide(3)"></button>
        @endif
    </div>
</section>
