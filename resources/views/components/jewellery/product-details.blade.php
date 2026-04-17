{{-- Product Details Section Component --}}
<section style="background: var(--dark); padding: 100px 20px;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <p class="section-label">✦ Featured Product</p>
        <h2 class="section-title">{{ $product?->product_name ?? 'The Maharani Bridal Set' }}</h2>
        
        <div class="product-grid">

            {{-- Product Image Section --}}
            <div class="product-image-wrap">
                <div class="product-img-placeholder">
                    💎
                </div>
                <div class="product-img-badge">{{ $product?->gold_purity ?? '22K Pure Gold' }}</div>
                <div class="product-img-corner"></div>
            </div>

            {{-- Product Information Section --}}
            <div class="product-info">
                <p class="product-category">✦ {{ $product?->category ?? 'Bridal Collection · 2025' }}</p>
                <h2 class="product-name">{{ $product?->product_name ?? 'Maharani' }}<br>Bridal Necklace Set</h2>
                
                {{-- Price Section --}}
                <div class="product-price-wrap">
                    <span class="product-price">৳ {{ number_format($product?->current_price ?? 185000) }}</span>
                    @if($product?->old_price)
                        <span class="product-price-old">৳ {{ number_format($product->old_price) }}</span>
                    @endif
                </div>

                {{-- Divider --}}
                <div class="product-divider"></div>

                {{-- Product Description --}}
                <p class="product-desc">
                    {{ $product?->description ?? 'Handcrafted by master artisans over 15 days, the Maharani Set is a celebration of heritage goldsmithing. Featuring intricate Kundan stonework, hand-set with natural ruby and polki diamonds. Each piece is hallmark certified and delivered in a premium gift box with authenticity certificate.' }}
                </p>

                {{-- Product Specifications --}}
                <div class="product-specs">
                    <div class="spec-item">
                        <p class="spec-label">Gold Purity</p>
                        <p class="spec-value">{{ $product?->gold_purity ?? '22 Karat' }}</p>
                    </div>
                    <div class="spec-item">
                        <p class="spec-label">Total Weight</p>
                        <p class="spec-value">{{ $product?->total_weight ?? '~85 Grams' }}</p>
                    </div>
                    <div class="spec-item">
                        <p class="spec-label">Stone Setting</p>
                        <p class="spec-value">{{ $product?->stone_setting ?? 'Kundan + Ruby' }}</p>
                    </div>
                    <div class="spec-item">
                        <p class="spec-label">Includes</p>
                        <p class="spec-value">{{ $product?->includes ?? 'Necklace + Earrings + Tikka' }}</p>
                    </div>
                    <div class="spec-item">
                        <p class="spec-label">Certification</p>
                        <p class="spec-value">{{ $product?->certification ?? 'BIS Hallmark' }}</p>
                    </div>
                    <div class="spec-item">
                        <p class="spec-label">Delivery</p>
                        <p class="spec-value">{{ $product?->delivery ?? '5–7 Days' }}</p>
                    </div>
                </div>

                {{-- Product Tags --}}
                <div class="product-tags">
                    <span class="product-tag">Bridal</span>
                    <span class="product-tag">{{ $product?->gold_purity ?? '22K Gold' }}</span>
                    <span class="product-tag">Handcrafted</span>
                    <span class="product-tag">Hallmarked</span>
                    <span class="product-tag">Gift Ready</span>
                </div>

                {{-- Call to Action Button --}}
                <a href="#order" class="btn-primary">Place Your Order</a>
            </div>

        </div>
    </div>
</section>
