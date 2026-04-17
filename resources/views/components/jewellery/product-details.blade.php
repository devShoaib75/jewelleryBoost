{{-- Product Details Section Component --}}
<section style="background: var(--dark); padding: 100px 20px;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <p class="section-label">✦ Featured Product</p>
        <h2 class="section-title">The Maharani Bridal Set</h2>
        
        <div class="product-grid">

            {{-- Product Image Section --}}
            <div class="product-image-wrap">
                <div class="product-img-placeholder">
                    💎
                    {{-- Replace with: <img src="{{ asset('images/maharani-necklace.jpg') }}" class="product-main-img" alt="Maharani Bridal Set"> --}}
                </div>
                <div class="product-img-badge">22K Pure Gold</div>
                <div class="product-img-corner"></div>
            </div>

            {{-- Product Information Section --}}
            <div class="product-info">
                <p class="product-category">✦ Bridal Collection · 2025</p>
                <h2 class="product-name">Maharani<br>Bridal Necklace Set</h2>
                
                {{-- Price Section --}}
                <div class="product-price-wrap">
                    <span class="product-price">৳ 1,85,000</span>
                    <span class="product-price-old">৳ 2,10,000</span>
                </div>

                {{-- Divider --}}
                <div class="product-divider"></div>

                {{-- Product Description --}}
                <p class="product-desc">
                    Handcrafted by master artisans over 15 days, the Maharani Set is a celebration of heritage goldsmithing. 
                    Featuring intricate Kundan stonework, hand-set with natural ruby and polki diamonds. 
                    Each piece is hallmark certified and delivered in a premium gift box with authenticity certificate.
                </p>

                {{-- Product Specifications --}}
                <div class="product-specs">
                    <div class="spec-item">
                        <p class="spec-label">Gold Purity</p>
                        <p class="spec-value">22 Karat</p>
                    </div>
                    <div class="spec-item">
                        <p class="spec-label">Total Weight</p>
                        <p class="spec-value">~85 Grams</p>
                    </div>
                    <div class="spec-item">
                        <p class="spec-label">Stone Setting</p>
                        <p class="spec-value">Kundan + Ruby</p>
                    </div>
                    <div class="spec-item">
                        <p class="spec-label">Includes</p>
                        <p class="spec-value">Necklace + Earrings + Tikka</p>
                    </div>
                    <div class="spec-item">
                        <p class="spec-label">Certification</p>
                        <p class="spec-value">BIS Hallmark</p>
                    </div>
                    <div class="spec-item">
                        <p class="spec-label">Delivery</p>
                        <p class="spec-value">5–7 Days</p>
                    </div>
                </div>

                {{-- Product Tags --}}
                <div class="product-tags">
                    <span class="product-tag">Bridal</span>
                    <span class="product-tag">22K Gold</span>
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
