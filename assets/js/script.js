// assets/js/script.js – Improved with safe cart/wishlist handling

document.addEventListener('DOMContentLoaded', function() {

    // ========== SCROLL REVEAL ==========
    function revealOnScroll() {
        document.querySelectorAll('.reveal').forEach(el => {
            const windowHeight = window.innerHeight;
            const elementTop = el.getBoundingClientRect().top;
            if (elementTop < windowHeight - 100) el.classList.add('active');
        });
    }
    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll();

    // ========== FAQ ACCORDION ==========
    document.querySelectorAll('.faq-question').forEach(btn => {
        btn.addEventListener('click', function() {
            const item = this.parentElement;
            document.querySelectorAll('.faq-item').forEach(other => {
                if (other !== item) other.classList.remove('active');
            });
            item.classList.toggle('active');
        });
    });

    // ========== NEW ARRIVALS SLIDER ==========
    const naTrack = document.getElementById('newArrivalsTrack');
    if (naTrack) {
        const naCards = naTrack.querySelectorAll('.new-arrival-card');
        const naDotsContainer = document.getElementById('newArrivalsDots');
        const naPrevBtn = document.getElementById('naPrevBtn');
        const naNextBtn = document.getElementById('naNextBtn');
        const cardGap = 16;
        const cardWidth = 280;
        let naCurrentIndex = 0;
        let naAutoSlideInterval;

        if (naDotsContainer) {
            naCards.forEach((_, index) => {
                const dot = document.createElement('button');
                dot.className = 'new-arrival-dot';
                dot.addEventListener('click', () => naGoToSlide(index));
                naDotsContainer.appendChild(dot);
            });
        }
        const naDots = naDotsContainer ? naDotsContainer.querySelectorAll('.new-arrival-dot') : [];

        function naUpdateDots(index) { naDots.forEach((dot, i) => dot.classList.toggle('active', i === index)); }
        function naGoToSlide(index) {
            if (index < 0) index = 0;
            if (index >= naCards.length) index = naCards.length - 1;
            naCurrentIndex = index;
            naTrack.style.transform = `translateX(-${naCurrentIndex * (cardWidth + cardGap)}px)`;
            naUpdateDots(naCurrentIndex);
        }
        function naNextSlide() { naCurrentIndex = (naCurrentIndex + 1) % naCards.length; naGoToSlide(naCurrentIndex); }
        function naPrevSlide() { naCurrentIndex = (naCurrentIndex - 1 + naCards.length) % naCards.length; naGoToSlide(naCurrentIndex); }
        function naStartAutoSlide() { naAutoSlideInterval = setInterval(naNextSlide, 3000); }
        function naStopAutoSlide() { clearInterval(naAutoSlideInterval); }
        if (naPrevBtn) naPrevBtn.addEventListener('click', () => { naPrevSlide(); naStopAutoSlide(); naStartAutoSlide(); });
        if (naNextBtn) naNextBtn.addEventListener('click', () => { naNextSlide(); naStopAutoSlide(); naStartAutoSlide(); });
        const sliderContainer = naTrack.parentElement?.parentElement;
        if (sliderContainer) {
            sliderContainer.addEventListener('mouseenter', naStopAutoSlide);
            sliderContainer.addEventListener('mouseleave', naStartAutoSlide);
        }
        let naTouchStartX = 0;
        naTrack.addEventListener('touchstart', (e) => { naTouchStartX = e.touches[0].clientX; naStopAutoSlide(); });
        naTrack.addEventListener('touchend', (e) => {
            const diff = naTouchStartX - e.changedTouches[0].clientX;
            if (Math.abs(diff) > 50) diff > 0 ? naNextSlide() : naPrevSlide();
            naStartAutoSlide();
        });
        naGoToSlide(0);
        naStartAutoSlide();
    }

    // ========== HORIZONTAL SCROLL DRAG ==========
    document.querySelectorAll('.scroll-container').forEach(container => {
        let isDown = false, startX, scrollLeft;
        container.addEventListener('mousedown', (e) => { isDown = true; startX = e.pageX - container.offsetLeft; scrollLeft = container.scrollLeft; });
        container.addEventListener('mouseleave', () => isDown = false);
        container.addEventListener('mouseup', () => isDown = false);
        container.addEventListener('mousemove', (e) => { if (!isDown) return; e.preventDefault(); container.scrollLeft = scrollLeft - (e.pageX - container.offsetLeft - startX) * 2; });
    });

    // ========== INITIALIZE BADGES FROM LOCAL STORAGE ==========
    const cartItems = JSON.parse(localStorage.getItem('optiq_cart')) || [];
    const totalCartQty = cartItems.reduce((sum, item) => sum + (item.qty || 1), 0);
    const wishlistItems = JSON.parse(localStorage.getItem('optiq_wishlist')) || [];
    const totalWishlistCount = wishlistItems.length;

    globalWishlistCount = totalWishlistCount;

    const cartIcon = document.querySelector('.cart-icon');
    if (cartIcon) {
        const cartBadge = cartIcon.querySelector('.cart-badge');
        if (cartBadge) {
            cartBadge.textContent = totalCartQty;
            localStorage.setItem('optiq_cartCount', totalCartQty);
        }
    }

    const wishlistBadge = document.querySelector('.wishlist-badge');
    if (wishlistBadge) {
        wishlistBadge.textContent = totalWishlistCount;
        wishlistBadge.style.display = totalWishlistCount > 0 ? 'flex' : 'none';
        localStorage.setItem('optiq_wishlistCount', totalWishlistCount);
    }

    // ========== GLOBAL LISTENERS ==========
    document.querySelectorAll('.wishlist-btn, .wishlist-product-btn, .related-wishlist-btn, .related-wishlist-btn-global').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleWishlist(this);
        });
    });

    document.querySelectorAll('.add-to-cart, .add-to-cart-btn, .add-to-bag-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            addToCartFly(this);
        });
    });

    // ========== GRID ANIMATION ==========
    const gridItems = document.querySelectorAll('.grid-item');
    if (gridItems.length > 0) {
        const gridObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => { if (entry.isIntersecting) entry.target.classList.add('animate'); });
        }, { threshold: 0.2 });
        gridItems.forEach(item => gridObserver.observe(item));
    }

    console.log('Optiq - Premium Eyewear Ready 👓✨');
});

// ========== SEARCH OVERLAY ==========
document.addEventListener('DOMContentLoaded', function() {
    const openBtn = document.getElementById('openSearchOverlay');
    const overlay = document.getElementById('searchOverlay');
    const closeBtn = document.getElementById('closeSearchOverlay');
    const backdrop = document.getElementById('searchOverlayBackdrop');
    const searchInput = document.getElementById('overlaySearchInput');
    const searchBtn = document.getElementById('overlaySearchBtn');

    function showOverlay() {
        overlay.classList.remove('d-none');
        setTimeout(() => overlay.classList.add('show'), 10);
        searchInput.focus();
        document.body.style.overflow = 'hidden';
    }
    function hideOverlay() {
        overlay.classList.remove('show');
        setTimeout(() => { overlay.classList.add('d-none'); document.body.style.overflow = ''; }, 300);
    }
    if (openBtn) openBtn.addEventListener('click', (e) => { e.preventDefault(); showOverlay(); });
    if (closeBtn) closeBtn.addEventListener('click', hideOverlay);
    if (backdrop) backdrop.addEventListener('click', hideOverlay);

    function doSearch() {
        const query = searchInput.value.trim();
        if (query) window.location.href = 'search.php?q=' + encodeURIComponent(query);
    }
    if (searchBtn) searchBtn.addEventListener('click', doSearch);
    if (searchInput) searchInput.addEventListener('keypress', (e) => { if (e.key === 'Enter') doSearch(); });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && overlay?.classList.contains('show')) hideOverlay(); });
});

// ========== REUSABLE LIVE SEARCH ==========
function setupSearch(inputId, cardSelector, redirectOnEnter) {
    const input = document.getElementById(inputId);
    if (!input) return;
    if (cardSelector) {
        const cards = document.querySelectorAll(cardSelector);
        function filterCards(query) {
            const q = query.toLowerCase().trim();
            cards.forEach(card => {
                const name = card.querySelector('.product-name')?.textContent.toLowerCase() || '';
                const material = card.querySelector('.text-muted')?.textContent.toLowerCase() || '';
                card.style.display = (q === '' || name.includes(q) || material.includes(q)) ? '' : 'none';
            });
        }
        input.addEventListener('input', () => filterCards(input.value));
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                filterCards(this.value);
                document.getElementById('searchResults')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
        const params = new URLSearchParams(window.location.search);
        const query = params.get('q');
        if (query) { input.value = query; filterCards(query); setTimeout(() => document.getElementById('searchResults')?.scrollIntoView({ behavior: 'smooth', block: 'start' }), 300); }
    }
    input.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && redirectOnEnter && (!cardSelector || document.querySelectorAll(cardSelector).length === 0)) {
            window.location.href = 'search.php?q=' + encodeURIComponent(input.value.trim());
        }
    });
}

// ========== GLOBAL VARIABLES ==========
let globalWishlistCount = parseInt(localStorage.getItem('optiq_wishlistCount')) || 0;

// ========== SAFE PRODUCT DATA EXTRACTION ==========
function getProductDataFromButton(button) {
    // Use data attributes from the button, but fallback to a unique ID generated from the image
    const id = button.dataset.id || (button.dataset.img ? button.dataset.img.replace(/[^a-zA-Z0-9]/g, '-') : 'unknown');
    const name = button.dataset.name || 'Product';
    const price = parseInt(button.dataset.price) || 0;
    const image = button.dataset.img || '';
    const material = button.dataset.material || '';
    const color = button.dataset.color || 'default';
    const size = button.dataset.size || 'medium';
    return { id, name, price, image, material, color, size, qty: 1 };
}

// ========== ADD TO CART ==========
function addToCartFly(button) {
    const imgSrc = button.dataset.img;
    if (!imgSrc) return;

    const product = getProductDataFromButton(button);
    let cart = JSON.parse(localStorage.getItem('optiq_cart')) || [];
    const existing = cart.find(item => item.id === product.id);
    if (existing) {
        existing.qty = (existing.qty || 1) + 1;
    } else {
        cart.push(product);
    }
    localStorage.setItem('optiq_cart', JSON.stringify(cart));
    const totalQty = cart.reduce((sum, item) => sum + (item.qty || 1), 0);
    localStorage.setItem('optiq_cartCount', totalQty);
    updateCartBadge(totalQty);

    // Fly animation
    const icon = button.querySelector('i');
    if (icon) { icon.classList.add('icon-spin'); setTimeout(() => icon.classList.remove('icon-spin'), 600); }
    const cartIcon = document.querySelector('.cart-icon');
    if (!cartIcon) return;
    const btnRect = button.getBoundingClientRect();
    const cartRect = cartIcon.getBoundingClientRect();
    const flyingImg = document.createElement('img');
    flyingImg.src = imgSrc;
    flyingImg.style.cssText = `position:fixed;z-index:9999;width:100px;height:100px;object-fit:contain;border-radius:16px;pointer-events:none;transition:all 2.5s cubic-bezier(0.34,1.2,0.64,1);left:${btnRect.left+btnRect.width/2-50}px;top:${btnRect.top-40}px;opacity:1;box-shadow:0 20px 60px rgba(0,0,0,0.5);transform:scale(1) rotate(0deg);background:#0A192F;padding:4px;`;
    document.body.appendChild(flyingImg);
    void flyingImg.offsetWidth;
    setTimeout(() => {
        flyingImg.style.left = (cartRect.left + cartRect.width/2 - 25) + 'px';
        flyingImg.style.top = (cartRect.top + cartRect.height/2 - 25) + 'px';
        flyingImg.style.width = '40px'; flyingImg.style.height = '40px'; flyingImg.style.opacity = '0.8'; flyingImg.style.transform = 'scale(0.3) rotate(720deg)'; flyingImg.style.boxShadow = '0 0 40px rgba(0,0,0,0.8)';
        setTimeout(() => {
            document.body.removeChild(flyingImg);
            cartIcon.style.transform = 'scale(1.3)'; setTimeout(() => { cartIcon.style.transform = 'scale(1)'; cartIcon.style.transition = 'transform 0.3s ease'; }, 200);
        }, 2500);
    }, 200);
}

function updateCartBadge(count) {
    const cartIcon = document.querySelector('.cart-icon');
    if (!cartIcon) return;
    const badge = cartIcon.querySelector('.cart-badge');
    if (!badge) return;
    badge.textContent = count;
    badge.style.transform = 'scale(1.8)'; setTimeout(() => { badge.style.transform = 'scale(1)'; badge.style.transition = 'transform 0.3s ease'; }, 200);
}

// ========== TOGGLE WISHLIST ==========
function toggleWishlist(button) {
    const icon = button.querySelector('i');
    if (!icon) return;
    icon.classList.add('icon-spin'); setTimeout(() => icon.classList.remove('icon-spin'), 600);

    const product = getProductDataFromButton(button);
    let wishlist = JSON.parse(localStorage.getItem('optiq_wishlist')) || [];
    const existingIndex = wishlist.findIndex(item => item.id === product.id);

    if (existingIndex === -1) {
        wishlist.push(product);
        icon.classList.replace('bi-heart', 'bi-heart-fill'); icon.style.color = '#D4AF37'; button.classList.add('active');
        globalWishlistCount++;
    } else {
        wishlist.splice(existingIndex, 1);
        icon.classList.replace('bi-heart-fill', 'bi-heart'); icon.style.color = ''; button.classList.remove('active');
        globalWishlistCount = Math.max(0, globalWishlistCount - 1);
    }
    localStorage.setItem('optiq_wishlist', JSON.stringify(wishlist));
    localStorage.setItem('optiq_wishlistCount', globalWishlistCount);
    updateWishlistBadge();
}

function updateWishlistBadge() {
    const badge = document.querySelector('.wishlist-badge');
    if (!badge) return;
    badge.textContent = globalWishlistCount;
    badge.style.display = globalWishlistCount > 0 ? 'flex' : 'none';
}

// ========== DOUBLE‑CLICK LIKE ==========
document.addEventListener('dblclick', function(e) {
    const card = e.target.closest('.product-card, .new-arrival-card, .masonry-item');
    if (!card || e.target.closest('button, a, input')) return;
    const heartBtn = card.querySelector('.wishlist-btn, .wishlist-product-btn');
    if (!heartBtn) return;
    toggleWishlist(heartBtn);
    const imgContainer = card.querySelector('.position-relative, .bg-light.rounded-3, img');
    if (imgContainer) {
        const popup = document.createElement('i'); popup.className = 'bi bi-heart-fill floating-heart-popup';
        popup.style.cssText = `position:absolute;top:50%;left:50%;transform:translate(-50%,-50%) scale(0);font-size:60px;color:#D4AF37;z-index:20;pointer-events:none;opacity:1;transition:transform 0.4s,opacity 0.4s;`;
        imgContainer.style.position = 'relative'; imgContainer.appendChild(popup);
        requestAnimationFrame(() => { popup.style.transform = 'translate(-50%,-50%) scale(1.2)'; });
        setTimeout(() => { popup.style.transform = 'translate(-50%,-50%) scale(1.6)'; popup.style.opacity = '0'; setTimeout(() => popup.remove(), 400); }, 200);
    }
    const icon = heartBtn.querySelector('i');
    if (icon) { icon.classList.add('icon-spin'); setTimeout(() => icon.classList.remove('icon-spin'), 600); }
    card.style.transition = 'box-shadow 0.2s ease'; card.style.boxShadow = 'inset 0 0 80px rgba(212,175,55,0.15)'; setTimeout(() => card.style.boxShadow = '', 300);
});

