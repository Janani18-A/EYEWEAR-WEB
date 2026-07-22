<!-- search-overlay.php – Premium Search Modal with GSAP Staggered Suggestions -->
<div class="search-overlay d-none" id="searchOverlay">
    <!-- ===== NO BACKDROP BACKGROUND – Only blur overlay ===== -->
    <div class="search-overlay-backdrop" id="searchOverlayBackdrop"></div>
    
    <!-- Content -->
    <div class="search-overlay-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7 col-11 glass-box-inner">
                    
                    <!-- ===== CLOSE BUTTON INSIDE BOX (Top-Right) ===== -->
                    <button class="search-overlay-close" id="closeSearchOverlay">
                        <i class="bi bi-x-lg"></i>
                    </button>
                    
                    <!-- Heading -->
                    <h2 class="text-dark text-center mb-3 fw-bold" style="font-family: 'Poppins', sans-serif; font-size: 1.4rem; text-shadow: 0 2px 20px rgba(0,0,0,0.3);">
                        What are you looking for?
                    </h2>
                    
                    <!-- Search Bar + Suggestions Dropdown -->
                    <div class="search-wrapper" style="position: relative;">
                        <div class="search-overlay-bar glass-search-bar">
                            <input type="text" id="overlaySearchInput" class="form-control bg-transparent border-0 text-dark placeholder-white-50 fs-6 py-3 px-3" 
                                   placeholder="Search frames, styles, or colours…" autofocus>
                            <button class="btn btn-emerald px-3 py-2 fs-6" id="overlaySearchBtn">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>

                        <!-- Suggestions Dropdown (Glass, Staggered) -->
                        <div class="suggestions-dropdown" id="searchSuggestions" style="display:none;">
                            <!-- Dynamic items -->
                        </div>
                    </div>
                    
                    <!-- ===== INTENT CHIPS REMOVED ===== -->
                    
                    <!-- Browse All -->
                    <p class="text-white-50 text-center mt-3 small" style="font-size: 1.3rem;">
                        Or <a href="search.php" class="text-dark fw-bold">browse all frames</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- ===== STYLES – Premium Glass + Dropdown ===== -->
<!-- ============================================================ -->
<style>
    /* ================================================================
       SEARCH OVERLAY – TRANSPARENT BACKGROUND (Only Blur)
       ================================================================ */

    /* ----- Overlay Container ----- */
    .search-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 10500;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.5s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .search-overlay.show {
        opacity: 1;
        pointer-events: all;
    }

    /* ===== NO BACKGROUND COLOR – Only transparent blur ===== */
    .search-overlay-backdrop {
        position: absolute;
        width: 100%;
        height: 100%;
        background: transparent !important;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        transition: backdrop-filter 0.5s ease;
        pointer-events: none;
    }

    /* ----- Content Container (Centered) ----- */
    .search-overlay-content {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 1.5rem;
        animation: overlayFadeUp 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards;
        pointer-events: none;
    }

    .search-overlay-content .container {
        max-width: 580px;
        margin: 0 auto;
        pointer-events: none;
    }

    .search-overlay-content .row {
        pointer-events: none;
    }

    .search-overlay-content .glass-box-inner {
        background: rgba(255, 255, 255, 0.04);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border: 1px solid rgba(200, 169, 81, 0.08);
        border-radius: 28px;
        padding: 2.2rem 2rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2), 0 0 40px rgba(200, 169, 81, 0.02);
        max-height: 80vh;
        overflow-y: auto;
        width: 100%;
        pointer-events: all;
        position: relative;
    }

    .search-overlay-content .glass-box-inner::-webkit-scrollbar {
        width: 4px;
    }
    .search-overlay-content .glass-box-inner::-webkit-scrollbar-track {
        background: transparent;
    }
    .search-overlay-content .glass-box-inner::-webkit-scrollbar-thumb {
        background: rgba(200, 169, 81, 0.2);
        border-radius: 10px;
    }

    .search-overlay-close {
        position: absolute;
        top: 16px;
        right: 18px;
        background: none;
        border: none;
        color: var(--accent, #C8A951);
        font-size: 1.6rem;
        cursor: pointer;
        z-index: 10;
        transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), color 0.3s ease;
        opacity: 0.6;
        line-height: 1;
        padding: 0.2rem 0.4rem;
    }

    .search-overlay-close:hover {
        transform: rotate(90deg) scale(1.1);
        color: #ffffff;
        opacity: 1;
    }

    @keyframes overlayFadeUp {
        0% { opacity: 0; transform: translateY(20px) scale(0.96); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    .glass-search-bar {
        display: flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(200, 169, 81, 0.12);
        border-radius: 60px;
        overflow: hidden;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1), 0 0 0 1px rgba(200, 169, 81, 0.02);
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .glass-search-bar:focus-within {
        border-color: rgba(200, 169, 81, 0.3);
        box-shadow: 0 4px 40px rgba(0, 0, 0, 0.15), 0 0 0 3px rgba(200, 169, 81, 0.05);
    }

    .glass-search-bar input {
        flex: 1;
        min-width: 0;
        box-shadow: none;
        outline: none;
        background: transparent !important;
        color: rgba(0, 0, 0, 0.85) !important;
        font-weight: 500;
        letter-spacing: 0.3px;
        padding: 0.8rem 1.2rem;
        font-size: 1rem;
    }

    .glass-search-bar input::placeholder {
        color: rgba(0, 0, 0, 0.35) !important;
        font-weight: 400;
    }

    .glass-search-bar input:focus {
        box-shadow: none !important;
        outline: none !important;
    }

    .search-overlay .btn-emerald {
        flex-shrink: 0;
        background: linear-gradient(135deg, var(--primary, #0F3D2E), var(--primary-light, #1B5E4A));
        color: #1A1A1A;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        border: none;
        padding: 0.6rem 1.5rem;
        border-radius: 50px;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 20px rgba(15, 61, 46, 0.15);
        transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        position: relative;
        overflow: hidden;
        margin: 4px 4px 4px 0;
        text-transform: uppercase;
        font-size: 0.8rem;
        white-space: nowrap;
    }

    .search-overlay .btn-emerald::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 50px;
        background: linear-gradient(135deg, rgba(255,255,255,0.08), transparent);
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .search-overlay .btn-emerald:hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 8px 30px rgba(15, 61, 46, 0.25);
        background: linear-gradient(135deg, var(--primary-dark, #0A2A1F), var(--primary, #0F3D2E));
        color: var(--white, #FFFFFF);
    }

    .search-overlay .btn-emerald:hover::before {
        opacity: 1;
    }

    .search-overlay .btn-emerald:active {
        transform: scale(0.96);
    }

    /* ===== SUGGESTIONS DROPDOWN (Glass) ===== */
    .suggestions-dropdown {
        position: absolute;
        top: calc(100% + 10px);
        left: 0;
        right: 0;
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: 16px;
        border: 1px solid rgba(200, 169, 81, 0.08);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08);
        z-index: 10600;
        max-height: 220px;
        overflow-y: auto;
        display: none;
        padding: 0.2rem 0;
    }

    .suggestions-dropdown.show {
        display: block;
    }

    .suggestion-item {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 0.6rem 1.2rem;
        cursor: pointer;
        border-bottom: 1px solid rgba(0, 0, 0, 0.02);
        transition: background 0.2s ease;
    }

    .suggestion-item:last-child {
        border-bottom: none;
    }

    .suggestion-item:hover {
        background: rgba(200, 169, 81, 0.06);
    }

    .suggestion-item .product-img {
        width: 36px;
        height: 36px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid rgba(0, 0, 0, 0.04);
        flex-shrink: 0;
    }

    .suggestion-item .product-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .suggestion-item .product-name {
        font-weight: 600;
        color: #0F3D2E;
        font-size: 0.85rem;
    }

    .suggestion-item .product-meta {
        font-size: 0.7rem;
        color: rgba(0, 0, 0, 0.35);
    }

    .suggestion-item .product-price {
        font-weight: 700;
        color: #0F3D2E;
        font-size: 0.85rem;
        flex-shrink: 0;
    }

    .no-results {
        padding: 1rem 1.2rem;
        color: rgba(0, 0, 0, 0.3);
        font-size: 0.85rem;
        text-align: center;
    }

    .text-dark {
        color: rgba(0, 0, 0, 0.85) !important;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .text-dark:hover {
        color: var(--accent, #C8A951) !important;
        text-decoration: underline;
    }

    /* ===== BODY BLUR EFFECT ===== */
    body.search-overlay-active .main-content,
    body.search-overlay-active .navbar,
    body.search-overlay-active .hero-section,
    body.search-overlay-active .product-grid,
    body.search-overlay-active .footer {
        filter: blur(8px) brightness(0.8);
        transition: filter 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        pointer-events: none;
        user-select: none;
    }

    body .main-content,
    body .navbar,
    body .hero-section,
    body .product-grid,
    body .footer {
        transition: filter 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    /* ================================================================
       RESPONSIVE
       ================================================================ */
    @media (max-width: 768px) {
        .search-overlay-content .glass-box-inner {
            padding: 1.8rem 1.5rem;
            border-radius: 24px;
            max-height: 85vh;
        }
        .search-overlay-content .glass-box-inner h2 {
            font-size: 1.2rem !important;
        }
        .search-overlay-close {
            top: 14px;
            right: 16px;
            font-size: 1.4rem;
        }
        .glass-search-bar input {
            font-size: 0.95rem !important;
            padding: 0.7rem 1rem !important;
        }
        .search-overlay .btn-emerald {
            padding: 0.5rem 1.2rem;
            font-size: 0.75rem;
        }
        .suggestions-dropdown {
            max-height: 180px;
        }
        .suggestion-item {
            padding: 0.5rem 1rem;
        }
        .suggestion-item .product-img {
            width: 30px;
            height: 30px;
        }
        .suggestion-item .product-name {
            font-size: 0.8rem;
        }
        .suggestion-item .product-price {
            font-size: 0.8rem;
        }
    }

    @media (max-width: 576px) {
        .search-overlay-content {
            padding: 1rem;
        }
        .search-overlay-content .glass-box-inner {
            padding: 1.2rem 1rem;
            border-radius: 20px;
            max-height: 90vh;
        }
        .search-overlay-content .glass-box-inner h2 {
            font-size: 1rem !important;
        }
        .glass-search-bar {
            border-radius: 40px;
            flex-wrap: nowrap;
        }
        .glass-search-bar input {
            font-size: 0.85rem !important;
            padding: 0.6rem 0.8rem !important;
            border-radius: 40px 0 0 40px !important;
        }
        .search-overlay .btn-emerald {
            width: auto;
            border-radius: 0 40px 40px 0;
            padding: 0.6rem 1rem;
            font-size: 0.75rem;
            margin: 0;
        }
        .search-overlay-close {
            top: 10px;
            right: 12px;
            font-size: 1.2rem;
        }
        body.search-overlay-active .main-content,
        body.search-overlay-active .navbar {
            filter: blur(4px) brightness(0.7);
        }
        .glass-search-bar input {
            color: rgba(0, 0, 0, 0.9) !important;
            font-weight: 500;
        }
        .text-dark {
            color: rgba(0, 0, 0, 0.9) !important;
            font-weight: 600;
        }
        .suggestions-dropdown {
            max-height: 160px;
        }
        .suggestion-item {
            padding: 0.4rem 0.8rem;
            gap: 0.6rem;
        }
        .suggestion-item .product-img {
            width: 28px;
            height: 28px;
        }
        .suggestion-item .product-name {
            font-size: 0.75rem;
        }
        .suggestion-item .product-meta {
            font-size: 0.6rem;
        }
        .suggestion-item .product-price {
            font-size: 0.75rem;
        }
    }

    @media (max-width: 380px) {
        .glass-search-bar input {
            font-size: 0.75rem !important;
            padding: 0.4rem 0.6rem !important;
        }
        .search-overlay .btn-emerald {
            font-size: 0.65rem;
            padding: 0.4rem 0.7rem;
        }
        .suggestions-dropdown {
            max-height: 140px;
        }
    }
</style>

<!-- ============================================================ -->
<!-- ===== JAVASCRIPT – Overlay + GSAP Staggered Suggestions ===== -->
<!-- ============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {

    // ============================================================
    // 1. PRODUCT DATA (Matches your Optiq products)
    // ============================================================
    const productData = [
        { id: 1, name: 'Rectangle Black Metal', material: 'Metal · Rectangle', price: 2499, image: 'assets/images/rect-black.jpg' },
        { id: 2, name: 'Round Silver Frame', material: 'Metal · Round', price: 2999, image: 'assets/images/round-silver.jpg' },
        { id: 3, name: 'Aviator Gold Frame', material: 'Metal · Aviator', price: 3499, image: 'assets/images/aviator-gold.jpg' },
        { id: 4, name: 'Wayfarer Black', material: 'Acetate · Wayfarer', price: 1999, image: 'assets/images/wayfarer-black.jpg' },
        { id: 5, name: 'Rimless Office Frame', material: 'Titanium · Rimless', price: 4999, image: 'assets/images/rimless-office.jpg' },
        { id: 6, name: 'Blue Light Glasses', material: 'TR90 · Rectangle', price: 2799, image: 'assets/images/blue-light.jpg' },
        { id: 7, name: 'Classic Round Tortoise', material: 'Acetate · Round', price: 3299, image: 'assets/images/tortoise-round.jpg' },
        { id: 8, name: 'Slim Metal Navigator', material: 'Metal · Navigator', price: 3899, image: 'assets/images/navigator-metal.jpg' },
        { id: 9, name: 'Retro Square Crystal', material: 'Acetate · Square', price: 2599, image: 'assets/images/retro-square.jpg' },
        { id: 10, name: 'Sports Wrap Shield', material: 'TR90 · Shield', price: 4499, image: 'assets/images/sports-shield.jpg' },
        { id: 11, name: 'Kids Round Frame', material: 'Acetate · Kids', price: 2199, image: 'assets/images/kids-round.jpg' }
    ];

    // ============================================================
    // 2. DOM REFS
    // ============================================================
    const overlay = document.getElementById('searchOverlay');
    const backdrop = document.getElementById('searchOverlayBackdrop');
    const closeBtn = document.getElementById('closeSearchOverlay');
    const searchInput = document.getElementById('overlaySearchInput');
    const searchBtn = document.getElementById('overlaySearchBtn');
    const suggestionsContainer = document.getElementById('searchSuggestions');

    // ============================================================
    // 3. SHOW / HIDE OVERLAY
    // ============================================================
    window.showSearchOverlay = function() {
        overlay.classList.remove('d-none');
        setTimeout(() => {
            overlay.classList.add('show');
        }, 10);
        document.body.classList.add('search-overlay-active');
        setTimeout(() => {
            if (searchInput) searchInput.focus();
        }, 400);
        document.body.style.overflow = 'hidden';
        suggestionsContainer.innerHTML = '';
        suggestionsContainer.classList.remove('show');
        searchInput.value = '';
    };

    window.hideSearchOverlay = function() {
        overlay.classList.remove('show');
        document.body.classList.remove('search-overlay-active');
        document.body.style.overflow = '';
        setTimeout(() => {
            overlay.classList.add('d-none');
        }, 500);
        suggestionsContainer.classList.remove('show');
    };

    // ============================================================
    // 4. RENDER SUGGESTIONS WITH GSAP STAGGER (EXACTLY LIKE DELIVERY-AREAS)
    // ============================================================
    function renderSuggestions(query) {
        if (!query.trim()) {
            suggestionsContainer.innerHTML = '';
            suggestionsContainer.classList.remove('show');
            return;
        }

        const q = query.trim().toLowerCase();
        const matches = productData.filter(p =>
            p.name.toLowerCase().includes(q) ||
            p.material.toLowerCase().includes(q)
        );

        if (matches.length === 0) {
            suggestionsContainer.innerHTML = `<div class="no-results">No products found for “${query}”</div>`;
            suggestionsContainer.classList.add('show');
            // Fade in "no results" with GSAP
            const noResult = suggestionsContainer.querySelector('.no-results');
            if (noResult && typeof gsap !== 'undefined') {
                gsap.from(noResult, { opacity: 0, y: -10, duration: 0.3, ease: 'power2.out' });
            }
            return;
        }

        let html = '';
        matches.forEach(product => {
            const imgSrc = product.image || 'assets/images/placeholder.jpg';
            html += `
                <div class="suggestion-item" data-id="${product.id}">
                    <img src="${imgSrc}" alt="${product.name}" class="product-img" loading="lazy">
                    <div class="product-info">
                        <span class="product-name">${product.name}</span>
                        <span class="product-meta">${product.material}</span>
                    </div>
                    <span class="product-price">₹${product.price.toLocaleString('en-IN')}</span>
                </div>
            `;
        });

        suggestionsContainer.innerHTML = html;
        suggestionsContainer.classList.add('show');

        // ─── ✅ GSAP STAGGERED SLIDE-IN (EXACTLY LIKE DELIVERY-AREAS) ───
        const items = suggestionsContainer.querySelectorAll('.suggestion-item');
        if (typeof gsap !== 'undefined' && items.length > 0) {
            // Set initial state
            gsap.set(items, { opacity: 0, x: -15 });
            // Animate with stagger
            gsap.to(items, {
                opacity: 1,
                x: 0,
                duration: 0.4,
                ease: 'power2.out',
                stagger: { each: 0.07, from: 'start' }
            });
        } else if (items.length > 0) {
            // Fallback: CSS transitions if GSAP fails
            items.forEach((item, i) => {
                item.style.opacity = '1';
                item.style.transform = 'translateX(0)';
                item.style.transition = `opacity 0.3s ${i * 0.07}s, transform 0.3s ${i * 0.07}s`;
            });
        }

        // ─── CLICK ON SUGGESTION ───
        items.forEach(item => {
            item.addEventListener('click', function() {
                const id = this.dataset.id;
                const product = productData.find(p => p.id == id);
                if (product) {
                    searchInput.value = product.name;
                    suggestionsContainer.classList.remove('show');
                    window.location.href = 'search.php?q=' + encodeURIComponent(product.name);
                }
            });
        });
    }

    // ============================================================
    // 5. EVENT LISTENERS
    // ============================================================

    // ─── Input event ───
    searchInput.addEventListener('input', function() {
        renderSuggestions(this.value);
    });

    // ─── Close dropdown on outside click ───
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.search-wrapper')) {
            suggestionsContainer.classList.remove('show');
        }
    });

    // ─── ESC key closes dropdown ───
    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            suggestionsContainer.classList.remove('show');
            this.blur();
        }
    });

    // ─── Close button ───
    closeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.hideSearchOverlay();
    });

    // ─── Backdrop click ───
    backdrop.addEventListener('click', function() {
        window.hideSearchOverlay();
    });

    // ─── Search button ───
    searchBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const query = searchInput.value.trim();
        if (query.length > 0) {
            window.location.href = 'search.php?q=' + encodeURIComponent(query);
        } else {
            window.hideSearchOverlay();
        }
    });

    // ─── Enter key ───
    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const query = this.value.trim();
            if (query.length > 0) {
                window.location.href = 'search.php?q=' + encodeURIComponent(query);
            } else {
                window.hideSearchOverlay();
            }
        }
    });

    // ─── Global ESC key ───
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (overlay && overlay.classList.contains('show')) {
                window.hideSearchOverlay();
            }
        }
    });

    // ============================================================
    // 6. NAVBAR BADGE SYNC
    // ============================================================
    const cartBadge = document.querySelector('.cart-badge');
    if (cartBadge) {
        const count = parseInt(localStorage.getItem('optiq_cartCount')) || 0;
        cartBadge.textContent = count;
    }
    const wishlistBadge = document.querySelector('.wishlist-badge');
    if (wishlistBadge) {
        const count = parseInt(localStorage.getItem('optiq_wishlistCount')) || 0;
        wishlistBadge.textContent = count;
        wishlistBadge.style.display = count > 0 ? 'flex' : 'none';
    }

    console.log('✅ Search Overlay with GSAP Staggered Suggestions Loaded!');
});
</script>