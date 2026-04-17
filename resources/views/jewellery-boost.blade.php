{{-- 
    Jewellery Boost - Blade Template
    Main layout file that composes all sections into a complete professional bridal jewellery showcase
--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zara Gold — 22K Bridal Necklace Set</title>
    
    {{-- CSS Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('css/jewellery-boost.css') }}">
    
    {{-- CSRF Token for Laravel Forms --}}
    @csrf
</head>

<body>

    {{-- ═════════════════════════════════════════════════════════
        HERO SECTION
        - Full viewport hero with animated content
        - Call-to-action button linking to order form
        ═════════════════════════════════════════════════════════ --}}
    @include('components.jewellery.hero')


    {{-- ═════════════════════════════════════════════════════════
        CAROUSEL SECTION
        - Rotating image gallery with 4 product angles
        - Auto-play carousel with manual navigation
        - Responsive touch-friendly controls
        ═════════════════════════════════════════════════════════ --}}
    @include('components.jewellery.carousel')


    {{-- ═════════════════════════════════════════════════════════
        PRODUCT DETAILS SECTION
        - Detailed product information and specifications
        - Price breakdown with old vs current pricing
        - Product tags and features highlight
        ═════════════════════════════════════════════════════════ --}}
    @include('components.jewellery.product-details')


    {{-- ═════════════════════════════════════════════════════════
        SIZE CHART SECTION
        - Reference table for necklace sizing
        - Size recommendations by body type
        - WhatsApp assistance information
        ═════════════════════════════════════════════════════════ --}}
    @include('components.jewellery.size-chart')


    {{-- ═════════════════════════════════════════════════════════
        ORDER FORM SECTION
        - Material and weight selection with dynamic pricing
        - Customer information form with validation
        - Real-time price calculator
        - Order submission with confirmation modal
        ═════════════════════════════════════════════════════════ --}}
    @include('components.jewellery.order-form')


    {{-- ═════════════════════════════════════════════════════════
        CONTACT / SHOP SECTION
        - Store location and hours
        - Social media links (Facebook, WhatsApp)
        - Direct contact information
        ═════════════════════════════════════════════════════════ --}}
    @include('components.jewellery.contact')


    {{-- ═════════════════════════════════════════════════════════
        FOOTER SECTION
        - Brand information and tagline
        - Quick navigation links
        - Copyright and legal information
        ═════════════════════════════════════════════════════════ --}}
    @include('components.jewellery.footer')


    {{-- ═════════════════════════════════════════════════════════
        SUCCESS MODAL
        - Order confirmation overlay
        - Thank you message with order details
        - Continue shopping button to close modal
        ═════════════════════════════════════════════════════════ --}}
    @include('components.jewellery.modal-success')


    {{-- ═════════════════════════════════════════════════════════
        JAVASCRIPT FILES
        - Carousel functionality and auto-rotation
        - Material selection and price calculator
        - Order form validation and submission
        ═════════════════════════════════════════════════════════ --}}
    <script src="{{ asset('js/jewellery-boost.js') }}"></script>

</body>
</html>
