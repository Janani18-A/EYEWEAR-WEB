<?php
// cart.php – Premium Shopping Cart (BOOTSTRAP RESPONSIVE)
include 'templates/header.php';
include 'templates/navbar.php';
?>

<section class="bg-cream py-4 py-md-5" style="min-height: 100vh; padding-top: clamp(80px, 12vh, 100px) !important;">
    <div class="container">
        <div class="text-center mb-4 mb-md-5">
            <h1 class="fw-bold text-primary" style="font-family: 'Poppins', sans-serif; font-size: clamp(1.8rem, 4vw, 2.5rem);">Shopping Cart</h1>
            <p class="text-muted-custom" style="font-size: clamp(1rem, 1.5vw, 1.25rem);">Your premium eyewear selection</p>
        </div>

        <div id="emptyCart" class="text-center py-5 d-none">
            <div class="glass-card p-4 p-md-5 d-inline-block">
                <i class="bi bi-bag fs-1 text-muted-custom mb-3"></i>
                <h3 class="text-primary" style="font-size: clamp(1.2rem, 2.5vw, 1.8rem);">Your cart is empty</h3>
                <p class="text-muted-custom" style="font-size: clamp(0.85rem, 1.2vw, 1rem);">Explore our collections and find your perfect frame.</p>
                <a href="category.php" class="btn btn-emerald mt-3" style="font-size: clamp(0.8rem, 1.2vw, 1rem); padding: clamp(0.4rem, 1vw, 0.6rem) clamp(1.2rem, 2.5vw, 2rem);">Browse Frames</a>
            </div>
        </div>

        <div id="cartContent" class="row g-4 g-lg-5">
            <!-- LEFT: Cart Items -->
            <div class="col-lg-8" id="cartItemsContainer"></div>

            <!-- RIGHT: Order Summary -->
            <div class="col-lg-4">
                <div class="glass-card p-3 p-md-4 rounded-4 position-sticky" style="top: 100px; z-index: 100;" id="orderSummaryCard">
                    <h4 class="text-primary fw-bold mb-3 mb-md-4" style="font-size: clamp(1.1rem, 1.8vw, 1.3rem);">Order Summary</h4>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted-custom" style="font-size: clamp(0.8rem, 1vw, 0.9rem);">Items (<span id="summaryItemCount">0</span>)</span>
                        <span class="text-primary fw-bold" id="summarySubtotal" style="font-size: clamp(0.9rem, 1.2vw, 1rem);">₹0</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted-custom" style="font-size: clamp(0.8rem, 1vw, 0.9rem);">Shipping</span>
                        <span class="text-primary fw-bold" style="font-size: clamp(0.9rem, 1.2vw, 1rem);">FREE</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted-custom" style="font-size: clamp(0.8rem, 1vw, 0.9rem);">GST (est.)</span>
                        <span class="text-primary fw-bold" id="summaryGst" style="font-size: clamp(0.9rem, 1.2vw, 1rem);">₹0</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted-custom" style="font-size: clamp(0.8rem, 1vw, 0.9rem);">Discount</span>
                        <span class="text-accent fw-bold" id="summaryDiscount" style="font-size: clamp(0.9rem, 1.2vw, 1rem);">-₹0</span>
                    </div>
                    <hr class="border-light my-2">
                    <div class="d-flex justify-content-between mb-3 mb-md-4">
                        <span class="fw-bold text-primary" style="font-size: clamp(1rem, 1.5vw, 1.2rem);">Total</span>
                        <span class="fw-bold text-primary" id="summaryTotal" style="font-size: clamp(1.1rem, 1.6vw, 1.3rem);">₹0</span>
                    </div>

                    <!-- 🎁 Offers Badge with sparkle loop -->
                    <div class="offers-badge text-center mb-3" id="offerBadge">
                        <span class="badge bg-accent text-primary px-2 px-sm-3 py-1 py-sm-2 rounded-pill" style="font-size: clamp(0.65rem, 1vw, 0.85rem);">🎁 3 Offers</span>
                    </div>

                    <!-- 📦───📍 Delivery Animation (Summary) -->
                    <div class="delivery-animation mb-3 mb-md-4 text-center">
                        <div class="delivery-icon-path">
                            <span class="delivery-icon-start">📦</span>
                            <span class="delivery-glow-trail"></span>
                            <span class="delivery-icon-end" id="deliveryPin">📍</span>
                        </div>
                        <p class="text-muted-custom small mt-2" style="font-size: clamp(0.65rem, 0.9vw, 0.75rem);">🚚 Delivery by <span id="deliveryDate">Tomorrow</span></p>
                    </div>

                    <!-- 🔒 Checkout Button – Fixed in place, only magnetic CTA -->
                    <a href="order.php" class="btn btn-emerald w-100 py-2 py-md-3 fw-bold magnetic-btn" id="checkoutBtn" style="font-size: clamp(0.75rem, 1.2vw, 0.9rem);">
                        <i class="bi bi-lock me-2"></i> PROCEED TO CHECKOUT
                        <span class="checkout-arrow"><i class="bi bi-arrow-right"></i></span>
                    </a>
                    <p class="text-muted-custom small text-center mt-2" style="font-size: clamp(0.6rem, 0.8vw, 0.7rem);">Secure payment · Easy returns</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'search-overlay.php'; ?>

<?php include 'templates/footer.php'; ?>

<!-- JS libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ======================================================================
    // 1. CART DATA
    // ======================================================================
    let cart = JSON.parse(localStorage.getItem('optiq_cart')) || [];
    const cartContainer = document.getElementById('cartItemsContainer');
    const emptyState = document.getElementById('emptyCart');
    const cartContent = document.getElementById('cartContent');
    const checkoutBtn = document.getElementById('checkoutBtn');

    // ======================================================================
    // 2. RENDER CART – with Bootstrap 12-column grid inside each item
    // ======================================================================
    function renderCart() {
        cartContainer.innerHTML = '';
        let subtotal = 0;
        cart.forEach((item, index) => {
            const itemTotal = (item.price || 0) * (item.qty || 1);
            subtotal += itemTotal;
            const card = document.createElement('div');
            card.className = 'cart-item glass-card p-3 p-md-4 rounded-4 mb-3 mb-md-4';
            card.style.animationDelay = `${index * 80}ms`;
            card.innerHTML = `
                <div class="row g-2 g-sm-3 align-items-center">
                    <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                        <div class="cart-product-img-wrapper position-relative">
                            <img src="${item.image}" alt="${item.name}" class="cart-product-img rounded-3 w-100" style="aspect-ratio:1/1; object-fit:cover;">
                            <div class="reflection-shine"></div>
                        </div>
                    </div>
                    <div class="col-9 col-sm-6 col-md-5 col-lg-6">
                        <h5 class="fw-bold text-primary mb-0" style="font-size: clamp(0.85rem, 1.2vw, 1.05rem);">${item.name}</h5>
                        <p class="text-muted-custom small mb-0" style="font-size: clamp(0.55rem, 0.8vw, 0.7rem);">${item.color||'Standard'} · ${item.size||'Medium'} · ${item.material||''}</p>
                        <!-- Delivery with icon path (per item) -->
                        <div class="delivery-estimate small text-accent mt-1" style="font-size: clamp(0.5rem, 0.7vw, 0.65rem);">
                            <span class="delivery-icon-path-sm">
                                <span class="delivery-icon-start-sm">📦</span>
                                <span class="delivery-glow-trail-sm"></span>
                                <span class="delivery-icon-end-sm">📍</span>
                            </span>
                            <span class="ms-1">Delivery: ${getDeliveryDate()}</span>
                        </div>
                        <div class="d-flex flex-wrap gap-1 mt-2">
                            <button class="btn btn-sm btn-outline-accent cart-wishlist-btn" data-id="${item.id}" data-name="${item.name}" data-img="${item.image}" data-price="${item.price||0}" data-color="${item.color||'default'}" data-size="${item.size||'medium'}" style="font-size: clamp(0.45rem, 0.7vw, 0.65rem); padding: 0.1rem 0.4rem;">
                                <i class="bi bi-heart" style="font-size: clamp(0.4rem, 0.6vw, 0.55rem);"></i> Wishlist
                            </button>
                            <button class="btn btn-sm btn-outline-danger cart-remove-btn" data-id="${item.id}" style="font-size: clamp(0.45rem, 0.7vw, 0.65rem); padding: 0.1rem 0.4rem;">
                                <i class="bi bi-trash" style="font-size: clamp(0.4rem, 0.6vw, 0.55rem);"></i> Remove
                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-md-3 col-lg-3 text-sm-end text-start mt-2 mt-sm-0">
                        <div class="quantity-selector d-flex align-items-center border rounded-pill overflow-hidden" style="border-color:#dee2e6; width:fit-content; margin:0 auto 0.25rem auto;">
                            <button class="btn qty-btn qty-minus" data-id="${item.id}" style="padding: 0.1rem 0.4rem; font-size: clamp(0.6rem, 0.9vw, 0.8rem);"><i class="bi bi-dash"></i></button>
                            <span class="fw-bold px-2 px-sm-3 qty-display" data-id="${item.id}" style="font-size: clamp(0.7rem, 1vw, 0.9rem);">${item.qty||1}</span>
                            <button class="btn qty-btn qty-plus" data-id="${item.id}" style="padding: 0.1rem 0.4rem; font-size: clamp(0.6rem, 0.9vw, 0.8rem);"><i class="bi bi-plus"></i></button>
                        </div>
                        <div class="text-primary fw-bold price-display" data-id="${item.id}" style="font-size: clamp(0.8rem, 1.2vw, 1rem);">₹${(item.price*(item.qty||1)).toLocaleString('en-IN')}</div>
                    </div>
                </div>
            `;
            cartContainer.appendChild(card);
        });

        // Update summary totals
        const gst = Math.round(subtotal * 0.18);
        const discount = subtotal >= 5000 ? Math.round(subtotal * 0.05) : 0;
        const total = subtotal + gst - discount;
        document.getElementById('summaryItemCount').textContent = cart.reduce((s, i) => s + i.qty, 0);
        document.getElementById('summarySubtotal').textContent = '₹' + subtotal.toLocaleString('en-IN');
        document.getElementById('summaryGst').textContent = '₹' + gst.toLocaleString('en-IN');
        document.getElementById('summaryDiscount').textContent = '-₹' + discount.toLocaleString('en-IN');
        document.getElementById('summaryTotal').textContent = '₹' + total.toLocaleString('en-IN');

        // Re‑attach all event listeners
        attachEvents();
        attachMagneticTilt();
        attachImageReflection();
    }

    // ======================================================================
    // 3. HELPER: Delivery date
    // ======================================================================
    function getDeliveryDate() {
        const today = new Date();
        const d = new Date(today);
        d.setDate(today.getDate() + 2);
        return d.toLocaleDateString('en-IN', { day: 'numeric', month: 'short' });
    }

    // ======================================================================
    // 4. EVENT ATTACHMENT (quantity, remove, wishlist)
    // ======================================================================
    function attachEvents() {
        document.querySelectorAll('.qty-minus').forEach(btn =>
            btn.addEventListener('click', () => updateQty(btn.dataset.id, -1))
        );
        document.querySelectorAll('.qty-plus').forEach(btn =>
            btn.addEventListener('click', () => updateQty(btn.dataset.id, 1))
        );
        document.querySelectorAll('.cart-remove-btn').forEach(btn =>
            btn.addEventListener('click', () => removeItem(btn.dataset.id))
        );
        document.querySelectorAll('.cart-wishlist-btn').forEach(btn =>
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                if (typeof toggleWishlist === 'function') {
                    toggleWishlist(this);
                }
                heartBurst(this);
            })
        );
    }

    // ======================================================================
    // 5. UPDATE QUANTITY
    // ======================================================================
    function updateQty(id, change) {
        const item = cart.find(i => i.id === id);
        if (!item) return;
        item.qty = Math.max(1, (item.qty || 1) + change);
        localStorage.setItem('optiq_cart', JSON.stringify(cart));
        const totalQty = cart.reduce((s, i) => s + (i.qty || 1), 0);
        localStorage.setItem('optiq_cartCount', totalQty);
        if (typeof updateCartBadge === 'function') updateCartBadge(totalQty);

        const qtyDisplay = document.querySelector(`.qty-display[data-id="${id}"]`);
        if (qtyDisplay) {
            gsap.to(qtyDisplay, {
                scaleY: 1.5,
                duration: 0.15,
                ease: 'power2.in',
                yoyo: true,
                repeat: 1,
                onStart: () => { qtyDisplay.textContent = item.qty; }
            });
        }

        const priceEl = document.querySelector(`.price-display[data-id="${id}"]`);
        if (priceEl) {
            const newPrice = item.price * item.qty;
            const oldPrice = parseInt(priceEl.textContent.replace(/[₹,]/g, '')) || 0;
            gsap.to({ val: oldPrice }, {
                val: newPrice,
                duration: 0.6,
                ease: 'power2.out',
                onUpdate: function() { priceEl.textContent = '₹' + Math.round(this.targets()[0].val).toLocaleString('en-IN'); }
            });
        }

        renderCartWithRolling();
    }

    // ── Render totals with GSAP rolling numbers ──
    function renderCartWithRolling() {
        let subtotal = cart.reduce((s, i) => s + i.price * i.qty, 0);
        const gst = Math.round(subtotal * 0.18);
        const discount = subtotal >= 5000 ? Math.round(subtotal * 0.05) : 0;
        const total = subtotal + gst - discount;

        animatePriceRoll('summarySubtotal', subtotal);
        animatePriceRoll('summaryGst', gst);
        animatePriceRoll('summaryDiscount', discount, '-₹');
        animatePriceRoll('summaryTotal', total);
        document.getElementById('summaryItemCount').textContent = cart.reduce((s, i) => s + i.qty, 0);
    }

    function animatePriceRoll(elementId, newValue, prefix = '₹') {
        const el = document.getElementById(elementId);
        if (!el) return;
        const oldVal = parseInt(el.textContent.replace(/[₹,−]/g, '')) || 0;
        gsap.to({ val: oldVal }, {
            val: newValue,
            duration: 0.6,
            ease: 'power2.out',
            onUpdate: function() {
                const sign = (prefix === '-₹' && newValue > 0) ? '-' : '';
                el.textContent = sign + prefix.replace(/[−-]/g, '') + Math.round(this.targets()[0].val).toLocaleString('en-IN');
            }
        });
    }

    // ======================================================================
    // 6. REMOVE ITEM – with shatter + particle burst
    // ======================================================================
    function removeItem(id) {
        const card = document.querySelector(`.cart-item [data-id="${id}"]`)?.closest('.cart-item');
        if (!card) return;
        card.classList.add('shatter');
        const rect = card.getBoundingClientRect();
        for (let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.className = 'shatter-particle';
            particle.style.left = rect.left + rect.width / 2 + 'px';
            particle.style.top = rect.top + rect.height / 2 + 'px';
            document.body.appendChild(particle);
            const angle = Math.random() * 2 * Math.PI;
            const dist = 40 + Math.random() * 100;
            gsap.to(particle, {
                x: Math.cos(angle) * dist,
                y: Math.sin(angle) * dist - 30,
                rotation: Math.random() * 720,
                opacity: 0,
                scale: 0.2,
                duration: 0.6 + Math.random() * 0.3,
                ease: 'power2.out',
                onComplete: () => particle.remove()
            });
        }
        setTimeout(() => {
            cart = cart.filter(i => i.id !== id);
            localStorage.setItem('optiq_cart', JSON.stringify(cart));
            const totalQty = cart.reduce((s, i) => s + (i.qty || 1), 0);
            localStorage.setItem('optiq_cartCount', totalQty);
            if (typeof updateCartBadge === 'function') updateCartBadge(totalQty);
            if (cart.length === 0) {
                emptyState.classList.remove('d-none');
                cartContent.classList.add('d-none');
            } else {
                renderCart();
            }
        }, 350);
    }

    // ======================================================================
    // 7. ❤️ HEART BURST (ONLY VISUAL – no logic, no count changes)
    // ======================================================================
    function heartBurst(btn) {
        const rect = btn.getBoundingClientRect();
        for (let i = 0; i < 14; i++) {
            const heart = document.createElement('div');
            heart.className = 'heart-particle';
            heart.textContent = '♥';
            heart.style.left = rect.left + rect.width / 2 + 'px';
            heart.style.top = rect.top + rect.height / 2 + 'px';
            heart.style.fontSize = (0.5 + Math.random() * 0.8) + 'rem';
            heart.style.color = ['#ec4899', '#f472b6', '#f9a8d4', '#fbcfe8', '#db2777'][Math.floor(Math.random() * 5)];
            document.body.appendChild(heart);
            const angle = (i / 14) * Math.PI * 2 + Math.random() * 0.3;
            const dist = 30 + Math.random() * 60;
            gsap.to(heart, {
                x: Math.cos(angle) * dist,
                y: Math.sin(angle) * dist - 20,
                rotation: Math.random() * 360,
                opacity: 0,
                scale: 0.2,
                duration: 0.7 + Math.random() * 0.3,
                ease: 'power2.out',
                onComplete: () => heart.remove()
            });
        }
        gsap.to(btn, { scale: 1.3, duration: 0.2, yoyo: true, repeat: 1, ease: 'back.out(2)' });
    }

    // ======================================================================
    // 8. 🎁 OFFER SPARKLE LOOP (every 10s)
    // ======================================================================
    const offerBadge = document.getElementById('offerBadge');
    if (offerBadge) {
        setTimeout(() => triggerSparkle(), 500);
        setInterval(triggerSparkle, 10000);
        offerBadge.addEventListener('mouseenter', triggerSparkle);

        function triggerSparkle() {
            const rect = offerBadge.getBoundingClientRect();
            for (let i = 0; i < 12; i++) {
                const spark = document.createElement('span');
                spark.className = 'sparkle-particle';
                spark.textContent = ['✦', '✨', '•', '✧'][Math.floor(Math.random() * 4)];
                spark.style.left = (20 + Math.random() * 60) + '%';
                spark.style.top = (10 + Math.random() * 60) + '%';
                spark.style.setProperty('--dx', (Math.random() - 0.5) * 100 + 'px');
                spark.style.setProperty('--dy', (Math.random() - 0.5) * 80 + 'px');
                spark.style.fontSize = (0.5 + Math.random() * 0.7) + 'rem';
                spark.style.color = ['#d4a56a', '#c8a951', '#f0d080', '#e8c060'][Math.floor(Math.random() * 4)];
                spark.style.position = 'absolute';
                spark.style.pointerEvents = 'none';
                spark.style.zIndex = '10';
                spark.style.animation = 'sparkleFloat 1s ease-out forwards';
                offerBadge.appendChild(spark);
                setTimeout(() => spark.remove(), 1000);
            }
        }
    }

    // ======================================================================
    // 9. 🧲 MAGNETIC TILT ON CART ITEMS (2° max)
    // ======================================================================
    function attachMagneticTilt() {
        document.querySelectorAll('.cart-item').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                const rotateX = ((y - centerY) / centerY) * 2;
                const rotateY = ((x - centerX) / centerX) * 2;
                card.style.transform = `perspective(600px) rotateX(${-rotateX}deg) rotateY(${rotateY}deg) translateY(-2px)`;
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'perspective(600px) rotateX(0) rotateY(0) translateY(0)';
            });
        });
    }

    // ======================================================================
    // 10. 🖼️ IMAGE REFLECTION SHINE
    // ======================================================================
    function attachImageReflection() {
        document.querySelectorAll('.cart-product-img-wrapper').forEach(wrapper => {
            wrapper.addEventListener('mouseenter', function() {
                const shine = this.querySelector('.reflection-shine');
                if (shine) {
                    shine.style.animation = 'none';
                    void shine.offsetWidth;
                    shine.style.animation = 'shineMove 0.8s ease forwards';
                }
            });
        });
    }

    // ======================================================================
    // 11. 🧲 MAGNETIC CHECKOUT (no sticky, no floating)
    // ======================================================================
    function attachMagneticCheckout() {
        const btn = document.querySelector('.magnetic-btn');
        if (!btn) return;
        btn.addEventListener('mousemove', (e) => {
            const rect = btn.getBoundingClientRect();
            const x = (e.clientX - rect.left - rect.width / 2) / 10;
            const y = (e.clientY - rect.top - rect.height / 2) / 10;
            btn.style.transform = `translate(${x}px, ${y}px)`;
        });
        btn.addEventListener('mouseleave', () => { btn.style.transform = 'translate(0,0)'; });
    }

    // ======================================================================
    // 12. INIT
    // ======================================================================
    if (cart.length === 0) {
        emptyState.classList.remove('d-none');
        cartContent.classList.add('d-none');
    } else {
        emptyState.classList.add('d-none');
        cartContent.classList.remove('d-none');
        renderCart();
        attachMagneticCheckout();
        const pin = document.getElementById('deliveryPin');
        if (pin) pin.classList.add('pulse');
        // Set delivery date
        const deliveryDateSpan = document.getElementById('deliveryDate');
        if (deliveryDateSpan) deliveryDateSpan.textContent = getDeliveryDate();
    }
});
</script>

<style>
    /* ========== 1. BASE CART STYLES ========== */
    .cart-item {
        animation: fadeInUp 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards;
        opacity: 0;
        transform: translateY(30px);
        transition: transform 0.5s ease, box-shadow 0.5s ease;
        background: rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(200, 169, 81, 0.08);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
    }
    .cart-item:hover {
        transform: translateY(-6px) perspective(800px) rotateX(2deg);
        box-shadow: 0 20px 50px rgba(15, 61, 46, 0.08), 0 0 0 1px rgba(200, 169, 81, 0.1);
    }
    @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }

    .cart-product-img-wrapper {
        animation: productFloat 7s ease-in-out infinite;
        position: relative;
        overflow: hidden;
        border-radius: 12px;
    }
    .cart-product-img { transition: transform 0.5s ease; }
    .cart-item:hover .cart-product-img { transform: scale(1.08); }
    @keyframes productFloat { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-4px)} }

    .shatter { animation: shatter 0.35s ease forwards; }
    @keyframes shatter { 0%{transform:scale(1);opacity:1} 30%{transform:scale(1.05);opacity:0.8} 100%{transform:scale(0.7);opacity:0} }
    .shatter-particle { position:fixed; pointer-events:none; z-index:998; width:8px; height:8px; border-radius:2px; background:var(--accent); opacity:1; }

    .delivery-icon-path, .delivery-icon-path-sm { display:inline-flex; align-items:center; gap:6px; }
    .delivery-glow-trail, .delivery-glow-trail-sm {
        width:60px; height:2px; background:rgba(200,169,81,0.15); position:relative; overflow:hidden; border-radius:2px;
    }
    .delivery-glow-trail::after, .delivery-glow-trail-sm::after {
        content:''; position:absolute; top:0; left:-20px; width:20px; height:100%; background:var(--gold,#d4a56a);
        box-shadow:0 0 15px rgba(212,165,106,0.6); animation:trailMove 2s linear infinite;
    }
    @keyframes trailMove { 0%{left:-20px} 100%{left:calc(100% + 10px)} }
    .delivery-icon-end, .delivery-icon-end-sm { transition:transform 0.3s ease; }
    .delivery-icon-end.pulse { animation:locationPulse 2s ease-in-out infinite; }
    @keyframes locationPulse { 0%,100%{transform:scale(1)} 50%{transform:scale(1.2)} }

    .offers-badge { position:relative; cursor:pointer; transition:transform 0.3s ease; display:inline-block; width:auto; }
    .offers-badge:hover { transform:scale(1.05); }
    .sparkle-particle { position:absolute; pointer-events:none; z-index:10; font-size:0.8rem; animation:sparkleFloat 1s ease-out forwards; }
    @keyframes sparkleFloat { 0%{transform:translate(0,0) scale(1) rotate(0deg); opacity:1} 100%{transform:translate(var(--dx),var(--dy)) scale(0) rotate(180deg); opacity:0} }

    .heart-particle { position:fixed; pointer-events:none; z-index:997; font-size:0.6rem; will-change:transform,opacity; color:#ec4899; font-weight:700; }

    .reflection-shine {
        position:absolute; top:0; left:-50%; width:50%; height:100%;
        background:linear-gradient(90deg,transparent,rgba(255,255,255,0.3),transparent);
        transform:skewX(-20deg); opacity:0; pointer-events:none; z-index:2; animation:none;
    }
    @keyframes shineMove { 0%{left:-50%;opacity:0} 50%{opacity:1} 100%{left:150%;opacity:0} }

    .btn-emerald { transition:transform 0.3s ease,box-shadow 0.3s ease; position:relative; transform:translate(0,0); }
    .checkout-arrow { display:inline-block; transition:transform 0.3s ease; }

    .qty-display { display:inline-block; transition:transform 0.15s ease; }

    /* --- Responsive adjustments for very small screens --- */
    @media (max-width: 576px) {
        .cart-product-img-wrapper { width: 60px; height: 60px; margin: 0 auto; }
        .cart-product-img { width: 100%; height: 100%; object-fit: cover; }
        .delivery-glow-trail, .delivery-glow-trail-sm { width: 30px; }
        .quantity-selector { width: fit-content; margin: 0 auto 0.25rem auto; }
        .btn-emerald { font-size: 0.7rem; padding: 0.4rem 0.8rem; }
        .cart-item .row { text-align: center; }
        .cart-item .col-12.text-sm-end { text-align: center !important; }
        .cart-item .btn { font-size: 0.6rem !important; padding: 0.1rem 0.3rem !important; }
        .offers-badge .badge { font-size: 0.6rem !important; padding: 0.1rem 0.4rem !important; }
    }
</style>
</body>
</html>