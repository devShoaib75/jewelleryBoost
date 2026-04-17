# Jewellery Boost - Professional Blade Template

A professional, modular Blade template for showcasing bridal jewellery with luxury design aesthetics. This template features a complete e-commerce experience with product details, carousel gallery, sizing guide, and order form.

---

## 📁 Project Structure

```
resources/views/
├── jewellery-boost.blade.php          (Main layout template)
└── components/jewellery/
    ├── hero.blade.php                 (Hero banner section)
    ├── carousel.blade.php             (Product image carousel)
    ├── product-details.blade.php      (Product info & specs)
    ├── size-chart.blade.php           (Sizing guide table)
    ├── order-form.blade.php           (Order form with price calc)
    ├── contact.blade.php              (Contact & social links)
    ├── footer.blade.php               (Footer with links)
    └── modal-success.blade.php        (Order confirmation modal)

public/
├── css/
│   └── jewellery-boost.css            (All styles & animations)
└── js/
    └── jewellery-boost.js             (Carousel, form, calculator logic)
```

---

## 🎯 Component Overview

### 1. **Hero Section** (`hero.blade.php`)
- Full-viewport banner with animated background pattern
- Prominent product title with luxury styling
- Call-to-action button linking to order section
- Scroll indicator animation

**Features:**
- Animated fade-up entrance effects
- Responsive typography (scales with viewport)
- Smooth scroll behavior

---

### 2. **Carousel Section** (`carousel.blade.php`)
- Rotating 4-slide image gallery
- Auto-play with manual navigation (prev/next buttons)
- Dot indicators showing current slide
- Smooth cubic-bezier transitions

**Features:**
- Touch-friendly navigation buttons
- Auto-scroll every 4 seconds
- Accessible keyboard navigation support

**To Add Images:**
```blade
<img src="{{ asset('images/necklace-front.jpg') }}" alt="Necklace Front View">
```

---

### 3. **Product Details** (`product-details.blade.php`)
- Two-column grid layout (image + info)
- Product specifications table
- Price with strike-through old price
- Product tags and badge
- Description and call-to-action

**Responsive Behavior:**
- Stacks to single column on mobile (< 768px)
- Maintains readability on all screen sizes

---

### 4. **Size Chart** (`size-chart.blade.php`)
- Comprehensive sizing reference table
- Multiple size options (XS, S, M, L, XL, Custom)
- Conversion between inches and centimeters
- Style recommendations per size
- WhatsApp assistance tip

**Table Columns:**
- Size name and abbreviation
- Length in inches
- Length in centimeters
- Body type recommendation
- Style classification

---

### 5. **Order Form** (`order-form.blade.php`)
- Material selection with 4 options:
  - 22K Gold — 85g (Full Set) — ৳1,85,000
  - 22K Gold — 65g (Necklace + Earrings) — ৳1,45,000
  - 21K Gold — 65g (Budget Option) — ৳1,15,000
  - Gold-Plated — 90g (Imitation) — ৳75,000

- Customer information form:
  - Full name, phone, WhatsApp number
  - Delivery address, city, size selection
  - Payment method dropdown
  - Special requests textarea

- **Real-time Price Calculator:**
  - Base price
  - Making charge (6.5% of base)
  - Delivery charge (৳150)
  - Total payable amount

- **Form Validation:**
  - Requires: Name, Phone, Delivery Address
  - Success modal on submission

---

### 6. **Contact Section** (`contact.blade.php`)
- 3-column contact card grid
- Links to:
  - Google Maps (store location)
  - Facebook page
  - WhatsApp support

**Cards Include:**
- Icon with colored background
- Title and contact details
- Operating hours or description
- Hover animation effects

---

### 7. **Footer** (`footer.blade.php`)
- Brand logo and tagline
- Quick navigation links
- Social media links
- Copyright notice
- Hallmark certification badge

---

### 8. **Success Modal** (`modal-success.blade.php`)
- Order confirmation overlay
- Dynamic message with customer name
- Order details summary
- Close button to return to browse

---

## 🎨 Design System

### Color Palette
```css
--gold: #C9A84C              /* Primary accent *)
--gold-light: #E8C97A       /* Light accent *)
--gold-dark: #8B6914        /* Dark accent *)
--cream: #FAF6EE            (* Text primary *)
--dark: #1A1410             (* Dark background *)
--charcoal: #2D2520         (* Secondary bg *)
--muted: #7A6A5A            (* Secondary text *)
```

### Typography
- **Serif Font:** Cormorant Garamond (headings, prices)
- **Sans-serif Font:** Jost (body text, buttons)
- Imported from Google Fonts via `@import` in CSS

### Spacing & Layout
- Responsive grid system (1fr 1fr on desktop, 1fr on mobile)
- Consistent padding: 20px, 40px, 80px, 100px
- Max-width containers: 800px, 900px, 1000px, 1200px

---

## ⚙️ JavaScript Functions

### Carousel Functions
```javascript
goToSlide(n)              // Navigate to specific slide
changeSlide(dir)          // Change slide by direction (+1 or -1)
startAuto()               // Begin auto-rotation
```

### Form & Pricing Functions
```javascript
selectMaterial(el, price, label)  // Update selected material and price
updateCalc()                       // Recalculate total price
submitOrder()                      // Validate and submit order
closeModal()                       // Close success modal
```

---

## 📱 Responsive Breakpoints

```css
@media (max-width: 768px) {
    .product-grid { grid-template-columns: 1fr; }
}

@media (max-width: 700px) {
    .contact-grid { grid-template-columns: 1fr; }
}

@media (max-width: 600px) {
    .form-grid { grid-template-columns: 1fr; }
}
```

---

## 🚀 How to Use

### 1. Basic Setup
```blade
<!-- In your main layout or route -->
@include('jewellery-boost')
```

### 2. Customize Content
Edit component files in `resources/views/components/jewellery/`:

```blade
<!-- Example: Update product price in order-form.blade.php -->
<span class="pill-price">৳ YOUR_PRICE</span>
```

### 3. Add Product Images
Replace image placeholders with actual images:

```blade
<!-- Original (placeholder) -->
<div class="product-img-placeholder">💎</div>

<!-- Updated (with image) -->
<img src="{{ asset('images/maharani-necklace.jpg') }}" class="product-main-img" alt="Maharani Set">
```

### 4. Update Contact Information
```blade
<!-- In contact.blade.php -->
<a href="https://wa.me/YOUR_NUMBER" target="_blank">
    <p class="contact-card-value">+880 1XX-XXXXXXX</p>
</a>
```

### 5. Customize Links
```blade
<!-- Update all social and email links -->
<a href="https://facebook.com/YOUR_PAGE">Facebook</a>
<a href="mailto:YOUR_EMAIL">Email</a>
```

---

## 🎭 Animation Classes

### Fade Up Animation
```css
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
}
```
Applied to hero elements with staggered delays (0s, 0.2s, 0.4s, 0.6s, 0.8s, 1.2s)

### Scroll Pulse Animation
```css
@keyframes scrollPulse {
    0%, 100% { opacity: 0.3; }
    50%       { opacity: 1; }
}
```
Applied to scroll indicator line in hero section

---

## 📋 Features Checklist

- ✅ Responsive design (mobile-first)
- ✅ Luxury gold color scheme with cream text
- ✅ Smooth animations and transitions
- ✅ Auto-rotating carousel gallery
- ✅ Dynamic price calculator
- ✅ Order form with validation
- ✅ Success confirmation modal
- ✅ Contact information cards
- ✅ Size reference table
- ✅ Product specifications layout
- ✅ Social media integration
- ✅ Accessibility-ready HTML structure
- ✅ Modular Blade components

---

## 🔧 Customization Tips

### Change Primary Color
Update CSS variables in `jewellery-boost.css`:
```css
:root {
    --gold: #YOUR_COLOR;
    --gold-light: #YOUR_LIGHT_COLOR;
    --gold-dark: #YOUR_DARK_COLOR;
}
```

### Modify Price Tiers
Edit material options in `order-form.blade.php`:
```blade
<span class="pill-price">৳ NEW_PRICE</span>
```

### Update Company Information
Search and replace in footer and contact sections:
- "Zara Gold" → Your brand name
- Phone numbers → Your contact
- Store address → Your location
- Email → Your email

### Add New Size Options
Extend the size table in `size-chart.blade.php`:
```blade
<tr>
    <td>New Size</td>
    <td>New Length</td>
    <!-- Add more columns -->
</tr>
```

---

## 🎯 SEO & Performance

### Included Best Practices
- Semantic HTML structure
- Image alt attributes
- Proper heading hierarchy (h1, h2)
- Meta viewport for mobile
- Accessible form labels
- Structured content with sections

### Optimization Notes
- CSS is inline but can be split if needed
- JS functions are organized by feature
- Images use `asset()` for cache busting
- No external API calls (fully static-friendly)

---

## 📝 Notes for Developers

1. **Image Placeholders:** Replace emoji icons with actual product images
2. **Form Submission:** `submitOrder()` currently shows a modal; connect to backend API
3. **Localization:** Text is in Bengali/English; extend for other languages
4. **Currency:** Currently uses Bengali Taka (৳); adjust for other currencies
5. **Integration:** Works with Laravel routes and asset management

---

## 📞 Support

For template modifications or questions:
- Review individual component files for targeted changes
- Check CSS variables for color/spacing adjustments
- Update JavaScript functions for form handling and submissions

---

**Version:** 1.0  
**Last Updated:** April 2025  
**Template:** Professional Bridal Jewellery Showcase  
**Framework:** Laravel Blade
