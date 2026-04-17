// ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
// CAROUSEL FUNCTIONALITY
// ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

let current = 0;
const track = document.getElementById('carouselTrack');
const slides = document.querySelectorAll('.carousel-slide');
const total = slides.length; // Dynamically count actual slides
const dots = document.querySelectorAll('.carousel-dot');
let autoTimer;

/**
 * Navigate to a specific slide
 * @param {number} n - Slide index
 */
function goToSlide(n) {
    current = (n + total) % total;
    track.style.transform = `translateX(-${current * 100}%)`;
    dots.forEach((d, i) => d.classList.toggle('active', i === current));
}

/**
 * Change slide by direction
 * @param {number} dir - Direction: 1 (next) or -1 (previous)
 */
function changeSlide(dir) {
    clearInterval(autoTimer);
    goToSlide(current + dir);
    startAuto();
}

/**
 * Start auto-rotating carousel
 */
function startAuto() {
    autoTimer = setInterval(() => goToSlide(current + 1), 4000);
}

// Initialize carousel
startAuto();


// ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
// MATERIAL & PRICE SELECTION
// ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

let selectedPrice = 185000;
let selectedLabel = 'Maharani Set — 22K Gold 85g';

/**
 * Select material option and update price
 * @param {HTMLElement} el - The material pill element
 * @param {number} price - Price in taka
 * @param {string} label - Product label
 */
function selectMaterial(el, price, label) {
    document.querySelectorAll('.material-pill').forEach(p => p.classList.remove('selected'));
    el.classList.add('selected');
    selectedPrice = price;
    selectedLabel = label;
    updateCalc();
}

// Mark first material as selected on load
document.addEventListener('DOMContentLoaded', () => {
    const firstPill = document.querySelector('.material-pill');
    if (firstPill) {
        firstPill.classList.add('selected');
    }
});

/**
 * Update price calculator display
 */
function updateCalc() {
    const making = Math.round(selectedPrice * 0.065);
    const delivery = 150;
    const total = selectedPrice + making + delivery;

    document.getElementById('calcItem').textContent = selectedLabel;
    document.getElementById('calcBase').textContent = '৳ ' + selectedPrice.toLocaleString('en-IN');
    document.getElementById('calcMaking').textContent = '৳ ' + making.toLocaleString('en-IN');
    document.getElementById('calcDelivery').textContent = '৳ ' + delivery.toLocaleString('en-IN');
    document.getElementById('calcTotal').textContent = '৳ ' + total.toLocaleString('en-IN');
}

// Initialize price calculator
updateCalc();


// ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
// ORDER FORM SUBMISSION
// ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

/**
 * Validate and submit order
 */
function submitOrder() {
    const name = document.getElementById('custName').value.trim();
    const phone = document.getElementById('custPhone').value.trim();
    const address = document.getElementById('custAddress').value.trim();

    // Validation
    if (!name || !phone || !address) {
        alert('Please fill in your Name, Phone Number, and Delivery Address to proceed.');
        return;
    }

    // Calculate totals
    const making = Math.round(selectedPrice * 0.065);
    const total = selectedPrice + making + 150;

    // Prepare order data
    const orderData = {
        customer_name: name,
        customer_phone: phone,
        customer_whatsapp: document.getElementById('custWhatsapp').value.trim() || phone,
        customer_email: document.getElementById('custEmail')?.value?.trim() || null,
        delivery_address: address,
        city: document.getElementById('custCity').value.trim(),
        necklace_size: document.getElementById('custSize').value || null,
        product_name: 'Maharani Bridal Necklace Set',
        material_option: selectedLabel,
        product_price: selectedPrice,
        making_charge: making,
        delivery_charge: 150,
        total_price: total,
        payment_method: document.getElementById('custPayment').value,
        special_notes: document.getElementById('custNotes').value.trim() || null,
    };

    // Submit order via AJAX
    fetch('/api/orders/submit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
        },
        body: JSON.stringify(orderData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message
            document.getElementById('modalMsg').innerHTML =
                `Thank you, <strong>${name}</strong>! 🎉<br><br>
                <strong>Order #:</strong> ${data.order_number}<br>
                <strong>Product:</strong> ${selectedLabel}<br>
                <strong>Total:</strong> ৳ ${total.toLocaleString('en-IN')}<br><br>
                Our team will call you at <strong>${phone}</strong> within 2 hours to confirm your order and payment details.`;

            // Show success modal
            document.getElementById('successModal').classList.add('active');

            // Reset form
            document.querySelectorAll('.form-control, textarea').forEach(el => el.value = '');
            document.getElementById('custSize').value = '';
            document.getElementById('custPayment').value = 'Bkash / Nagad (Advance)';
        } else {
            alert('Error: ' + (data.message || 'Failed to create order'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error submitting order. Please try again.');
    });
}

/**
 * Close success modal
 */
function closeModal() {
    document.getElementById('successModal').classList.remove('active');
}


// ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
// SMOOTH SCROLL REVEAL ANIMATION
// ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

/**
 * Intersection Observer for scroll animations
 */
const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.style.opacity = '1';
            e.target.style.transform = 'translateY(0)';
        }
    });
}, { threshold: 0.1 });
