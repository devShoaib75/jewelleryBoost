{{-- Order Form Section Component --}}
<section class="order-section" id="order">
    <div class="order-inner">
        <p class="section-label">✦ Place Your Order</p>
        <h2 class="section-title">Reserve Your Piece</h2>
        <div class="divider-line"><div class="divider-diamond"></div></div>

        {{-- Product Summary Bar --}}
        <div class="order-product-summary">
            <div class="order-product-img">💎</div>
            <div class="order-product-meta">
                <p class="order-product-name">Maharani Bridal Necklace Set</p>
                <p class="order-product-detail">22K Gold · BIS Hallmark · Handcrafted</p>
            </div>
            <div class="order-product-price-tag">৳ 1,85,000</div>
        </div>

        {{-- Material / Weight Options --}}
        <p style="font-size:10px; letter-spacing:3px; text-transform:uppercase; color:var(--gold); margin-bottom:16px;">
            Select Material & Weight
        </p>
        <div class="material-pills" id="materialPills">

            @forelse($materials ?? [] as $material)
            {{-- Dynamic Material Option --}}
            <label class="material-pill" onclick="selectMaterial(this, {{ $material->price }}, '{{ addslashes($material->name) }}')">
                <input type="radio" name="material" value="{{ $material->price }}" @if($loop->first) checked @endif>
                <span class="pill-icon">{{ $material->icon }}</span>
                <span class="pill-info">
                    <span class="pill-name">{{ $material->name }}</span>
                    <span class="pill-sub">{{ $material->sub_text }}</span>
                </span>
                <span class="pill-price">৳{{ number_format($material->price) }}</span>
            </label>
            @empty
            {{-- Default Option 1: 22K Gold — 85g Full Set --}}
            <label class="material-pill" onclick="selectMaterial(this, 185000, '22K Gold — 85g')">
                <input type="radio" name="material" value="185000" checked>
                <span class="pill-icon">🏆</span>
                <span class="pill-info">
                    <span class="pill-name">22K Gold — 85g</span>
                    <span class="pill-sub">Full Set · Hallmarked</span>
                </span>
                <span class="pill-price">৳1,85,000</span>
            </label>

            {{-- Default Option 2: 22K Gold — 65g Necklace + Earrings --}}
            <label class="material-pill" onclick="selectMaterial(this, 145000, '22K Gold — 65g')">
                <input type="radio" name="material" value="145000">
                <span class="pill-icon">⭐</span>
                <span class="pill-info">
                    <span class="pill-name">22K Gold — 65g</span>
                    <span class="pill-sub">Necklace + Earrings</span>
                </span>
                <span class="pill-price">৳1,45,000</span>
            </label>

            {{-- Default Option 3: 21K Gold — 65g Budget Bridal --}}
            <label class="material-pill" onclick="selectMaterial(this, 115000, '21K Gold — 65g')">
                <input type="radio" name="material" value="115000">
                <span class="pill-icon">✨</span>
                <span class="pill-info">
                    <span class="pill-name">21K Gold — 65g</span>
                    <span class="pill-sub">Budget Bridal Option</span>
                </span>
                <span class="pill-price">৳1,15,000</span>
            </label>

            {{-- Default Option 4: Gold-Plated -- Imitation --}}
            <label class="material-pill" onclick="selectMaterial(this, 75000, 'Gold-Plated — 90g')">
                <input type="radio" name="material" value="75000">
                <span class="pill-icon">💫</span>
                <span class="pill-info">
                    <span class="pill-name">Gold-Plated — 90g</span>
                    <span class="pill-sub">Artificial / Imitation</span>
                </span>
                <span class="pill-price">৳75,000</span>
            </label>
            @endforelse

        </div>

        {{-- Customer Form Section --}}
        <p style="font-size:10px; letter-spacing:3px; text-transform:uppercase; color:var(--gold); margin-bottom:20px;">
            Your Details
        </p>

        {{-- Form Grid --}}
        <div class="form-grid">
            {{-- Full Name --}}
            <div class="form-group">
                <label class="form-label">Full Name *</label>
                <input class="form-control" id="custName" type="text" placeholder="e.g. Farida Begum" required>
            </div>

            {{-- Phone Number --}}
            <div class="form-group">
                <label class="form-label">Phone Number *</label>
                <input class="form-control" id="custPhone" type="tel" placeholder="01X XXXX XXXX" required>
            </div>

            {{-- WhatsApp Number --}}
            <div class="form-group">
                <label class="form-label">WhatsApp Number</label>
                <input class="form-control" id="custWhatsapp" type="tel" placeholder="Same as phone or different">
            </div>

            {{-- Necklace Size --}}
            <div class="form-group">
                <label class="form-label">Necklace Size</label>
                <select class="form-control" id="custSize">
                    <option value="">— Select Size —</option>
                    <option>XS — Choker (14–15")</option>
                    <option>S — Princess (16–17")</option>
                    <option>M — Matinee (18–20")</option>
                    <option>L — Opera (24–28")</option>
                    <option>XL — Rope (30"+)</option>
                    <option>Custom (mention in notes)</option>
                </select>
            </div>

            {{-- Delivery Address --}}
            <div class="form-group full">
                <label class="form-label">Delivery Address *</label>
                <input class="form-control" id="custAddress" type="text" placeholder="House / Road / Area / District" required>
            </div>

            {{-- City --}}
            <div class="form-group">
                <label class="form-label">City</label>
                <input class="form-control" id="custCity" type="text" placeholder="Dhaka">
            </div>

            {{-- Payment Method --}}
            <div class="form-group">
                <label class="form-label">Payment Method</label>
                <select class="form-control" id="custPayment">
                    <option>Bkash / Nagad (Advance)</option>
                    <option>Cash on Delivery</option>
                    <option>Bank Transfer</option>
                    <option>In-Store Pickup</option>
                </select>
            </div>

            {{-- Special Notes / Custom Request --}}
            <div class="form-group full">
                <label class="form-label">Special Notes / Custom Request</label>
                <textarea class="form-control" id="custNotes" rows="3" placeholder="Any specific requirements, engraving, or custom size details..."></textarea>
            </div>
        </div>

        {{-- Price Calculator --}}
        <div class="price-calc">
            <p class="price-calc-title">🧮 Order Summary</p>
            
            <div class="price-row">
                <span class="label">Selected Item</span>
                <span class="value" id="calcItem">Maharani Set — 22K Gold 85g</span>
            </div>
            
            <div class="price-row">
                <span class="label">Product Price</span>
                <span class="value" id="calcBase">৳ 1,85,000</span>
            </div>
            
            <div class="price-row">
                <span class="label">Making Charge</span>
                <span class="value" id="calcMaking">৳ 12,000</span>
            </div>
            
            <div class="price-row">
                <span class="label">Delivery Charge</span>
                <span class="value" id="calcDelivery">৳ 150</span>
            </div>
            
            <div class="price-row total">
                <span class="label" style="color:var(--gold); font-size:13px; letter-spacing:2px; text-transform:uppercase;">
                    Total Payable
                </span>
                <span class="value" id="calcTotal">৳ 1,97,150</span>
            </div>
        </div>

        {{-- Submit Button --}}
        <button class="order-submit" onclick="submitOrder()">✦ Confirm My Order ✦</button>
    </div>
</section>
