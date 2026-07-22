<?php
// wishlist.php – Premium Wishlist (Optiq) – Staggered Slide‑In (GSAP) – BOOTSTRAP RESPONSIVE
include 'templates/header.php';
include 'templates/navbar.php';
?>

<!-- ===== SVG CLIP PATH (Curved Bottom Crop) ===== -->
<svg width="0" height="0" style="position:absolute;pointer-events:none;">
    <defs>
        <clipPath id="curveClip" clipPathUnits="objectBoundingBox">
            <path d="M 0,0.05 Q 0,0 0.05,0 L 0.95,0 Q 1,0 1,0.05 L 1,0.75 C 0.9,0.85 0.8,0.7 0.7,0.8 C 0.6,0.9 0.5,0.72 0.4,0.82 C 0.3,0.92 0.2,0.78 0.1,0.85 C 0.05,0.88 0.02,0.82 0,0.78 Z" />
        </clipPath>
    </defs>
</svg>

<!-- ===== MAIN CONTENT ===== -->
<section class="bg-cream py-4 py-md-5" style="min-height: 100vh; padding-top: clamp(80px, 12vh, 100px) !important;">
    <div class="container">

        <!-- Header – Bootstrap Flex -->
        <div class="wishlist-header d-flex flex-wrap align-items-center justify-content-between gap-2 gap-sm-3 mb-4 mb-md-5 pb-3 border-bottom">
            <div class="d-flex align-items-center gap-2 gap-sm-3 flex-wrap">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-heart-fill" style="color: #ec4899; font-size: clamp(1.2rem, 2.5vw, 1.6rem);"></i>
                    <h1 class="fw-bold text-primary mb-0" style="font-family: 'Poppins', sans-serif; font-size: clamp(1.3rem, 3vw, 2rem);">Wishlist</h1>
                    <span class="badge bg-light text-muted px-2 px-sm-3 py-1 rounded-pill" style="font-size: clamp(0.65rem, 1vw, 0.85rem);">
                        <span id="wishlistCount">0</span> items
                    </span>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2 gap-sm-3 flex-wrap">
                <span class="text-muted small" style="font-size: clamp(0.6rem, 0.9vw, 0.75rem);">
                    <i class="bi bi-bookmark me-1"></i>Saved Items
                </span>
   <div style="position: relative; display: inline-block; width: auto;">
    <select id="sortSelect" class="form-select form-select-sm rounded-pill" style="
        border: 1px solid rgba(15, 61, 46, 0.12); 
        background: rgba(255, 255, 255, 0.55); 
        backdrop-filter: blur(12px); 
        -webkit-backdrop-filter: blur(12px); 
        font-size: clamp(0.65rem, 0.9vw, 0.8rem); 
        font-weight: 500; 
        font-family: 'Poppins', sans-serif; 
        color: #0F3D2E; 
        padding: clamp(0.35rem, 0.6vw, 0.45rem) clamp(2.5rem, 5vw, 3.5rem) clamp(0.35rem, 0.6vw, 0.45rem) clamp(1rem, 1.8vw, 1.5rem); 
        appearance: none !important; 
        background-image: none !important; 
        width: auto; 
        min-width: 120px; 
        cursor: pointer; 
        border-radius: 100px !important; 
        box-shadow: 0 2px 12px rgba(15, 61, 46, 0.04); 
        transition: all 0.3s ease;
    ">
        <option value="recent" style="background: #F7F5F0; color: #0F3D2E; font-family: 'Poppins', sans-serif; font-weight: 500; padding: 10px 16px;">Recently Added</option>
        <option value="price-low" style="background: #F7F5F0; color: #0F3D2E; font-family: 'Poppins', sans-serif; font-weight: 500; padding: 10px 16px;">Price: Low → High</option>
        <option value="price-high" style="background: #F7F5F0; color: #0F3D2E; font-family: 'Poppins', sans-serif; font-weight: 500; padding: 10px 16px;">Price: High → Low</option>
        <option value="rating" style="background: #F7F5F0; color: #0F3D2E; font-family: 'Poppins', sans-serif; font-weight: 500; padding: 10px 16px;">Top Rated</option>
        <option value="name" style="background: #F7F5F0; color: #0F3D2E; font-family: 'Poppins', sans-serif; font-weight: 500; padding: 10px 16px;">Alphabetical</option>
    </select>
    <!-- Premium Arrow -->
    <span style="
        position: absolute; 
        right: clamp(0.6rem, 1.2vw, 1rem); 
        top: 50%; 
        transform: translateY(-50%); 
        pointer-events: none; 
        font-size: clamp(0.5rem, 0.8vw, 0.8rem); 
        color: #C8A951; 
        font-weight: 700; 
        opacity: 0.6;
    ">▼</span>
</div>
            </div>
        </div>

        <!-- Empty State -->
        <div id="emptyState" class="text-center py-5 d-none">
            <div class="glass-card p-4 p-md-5 d-inline-block">
                <i class="bi bi-heart fs-1 text-muted mb-3"></i>
                <h3 class="text-primary" style="font-size: clamp(1.2rem, 2.5vw, 1.8rem);">Your wishlist is empty</h3>
                <p class="text-muted" style="font-size: clamp(0.85rem, 1.2vw, 1rem);">Discover premium eyewear and save your favorites.</p>
                <a href="category.php" class="btn btn-emerald mt-3" style="font-size: clamp(0.8rem, 1.2vw, 1rem); padding: clamp(0.4rem, 1vw, 0.6rem) clamp(1.2rem, 2.5vw, 2rem);">Browse Frames</a>
            </div>
        </div>

        <!-- Wishlist Grid – Bootstrap Row -->
        <div class="row g-3 g-sm-4" id="wishlistGrid"></div>

    </div>
</section>

<!-- ========================== search-overlay.php ================================== -->
<?php include 'search-overlay.php'; ?>

<?php include 'templates/footer.php'; ?>

<!-- GSAP (for animations) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ─── WISHLIST DATA FROM LOCAL STORAGE ───
        let wishlistItems = JSON.parse(localStorage.getItem('optiq_wishlist')) || [];
        const grid = document.getElementById('wishlistGrid');
        const emptyState = document.getElementById('emptyState');
        const countEl = document.getElementById('wishlistCount');
        const sortSelect = document.getElementById('sortSelect');

        // ─── GSAP STAGGERED SLIDE‑IN ───
        function staggerCards(cards) {
            if (!cards || cards.length === 0) return;
            gsap.killTweensOf(cards);
            gsap.set(cards, {
                opacity: 0,
                y: 40,
                scale: 0.95
            });
            gsap.to(cards, {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.7,
                ease: 'power3.out',
                stagger: {
                    each: 0.1,
                    from: 'start',
                    ease: 'power1.inOut'
                },
                clearProps: 'transform'
            });
        }

        // ─── RENDER WISHLIST ───
        function renderWishlist(items) {
            grid.innerHTML = '';
            if (items.length === 0) {
                emptyState.classList.remove('d-none');
                countEl.textContent = '0';
                return;
            }
            emptyState.classList.add('d-none');
            countEl.textContent = items.length;

            items.forEach((item) => {
                const col = document.createElement('div');
                col.className = 'col-6 col-md-4 col-lg-3';

                const card = document.createElement('div');
                card.className = 'product-card h-100';
                card.dataset.id = item.id;
                card.style.opacity = '0';
                card.style.transform = 'translateY(40px) scale(0.95)';
                card.innerHTML = `
                <div class="product-image-wrap">
                    <img src="${item.image}" alt="${item.name}" loading="lazy" />
                    <button class="remove-heart" data-id="${item.id}"><i class="bi bi-heart-fill"></i></button>
                </div>
                <div class="product-body">
                    <div class="product-name">${item.name}</div>
                    <div class="product-meta">
                        <span>${item.color || 'Standard'}</span>
                        <span class="sep">·</span>
                        <span>${item.material || ''}</span>
                    </div>
                    <div class="product-rating">
                        <span class="stars">⭐⭐⭐⭐⭐</span>
                        <span class="rating-num">4.8</span>
                        <span class="rating-count">(124)</span>
                    </div>
                    <div class="product-price">₹${item.price.toLocaleString('en-IN')}</div>
                    <div class="product-actions">
                        <button class="add-btn" data-id="${item.id}"><i class="bi bi-cart-plus"></i> Cart</button>
                        <button class="remove-btn" data-id="${item.id}"><i class="bi bi-heart-fill"></i> Remove</button>
                    </div>
                </div>
            `;
                col.appendChild(card);
                grid.appendChild(col);
            });

            requestAnimationFrame(() => {
                const cards = document.querySelectorAll('.product-card');
                staggerCards(cards);
            });

            attachEvents();
        }

        // ─── ATTACH EVENTS ───
        function attachEvents() {
            document.querySelectorAll('.remove-heart').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const id = this.dataset.id;
                    removeFromWishlist(id, this.closest('.product-card'));
                });
            });

            document.querySelectorAll('.remove-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const id = this.dataset.id;
                    removeFromWishlist(id, this.closest('.product-card'));
                });
            });

            document.querySelectorAll('.add-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const id = this.dataset.id;
                    const item = wishlistItems.find(i => i.id === id);
                    if (!item) return;

                    if (typeof addToCartFly === 'function') {
                        const tempBtn = document.createElement('button');
                        tempBtn.dataset.img = item.image;
                        tempBtn.dataset.name = item.name;
                        tempBtn.dataset.price = item.price;
                        tempBtn.dataset.id = item.id;
                        tempBtn.dataset.color = item.color || 'default';
                        tempBtn.dataset.size = item.size || 'medium';
                        addToCartFly(tempBtn);
                    }

                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="bi bi-check-lg"></i> Added';
                    this.classList.add('added');
                    showToast(item.name + ' added to cart');
                    setTimeout(() => {
                        this.innerHTML = originalText;
                        this.classList.remove('added');
                    }, 1500);
                });
            });

            sortSelect.addEventListener('change', function() {
                const value = this.value;
                let sorted = [...wishlistItems];
                switch (value) {
                    case 'recent':
                        break;
                    case 'price-low':
                        sorted.sort((a, b) => a.price - b.price);
                        break;
                    case 'price-high':
                        sorted.sort((a, b) => b.price - a.price);
                        break;
                    case 'rating':
                        sorted.sort((a, b) => (b.rating || 4.8) - (a.rating || 4.8));
                        break;
                    case 'name':
                        sorted.sort((a, b) => a.name.localeCompare(b.name));
                        break;
                }
                wishlistItems = sorted;
                renderWishlist(wishlistItems);
            });
        }

        // ─── REMOVE FROM WISHLIST ───
        function removeFromWishlist(id, card) {
            const rect = card.getBoundingClientRect();
            burstHearts(rect.left + rect.width / 2, rect.top + rect.height / 2);

            gsap.to(card, {
                scale: 0.8,
                opacity: 0,
                duration: 0.35,
                ease: 'power2.in',
                onComplete: () => {
                    wishlistItems = wishlistItems.filter(i => i.id !== id);
                    localStorage.setItem('optiq_wishlist', JSON.stringify(wishlistItems));
                    const total = wishlistItems.length;
                    localStorage.setItem('optiq_wishlistCount', total);
                    if (typeof updateWishlistBadge === 'function') {
                        globalWishlistCount = total;
                        updateWishlistBadge();
                    }
                    renderWishlist(wishlistItems);
                }
            });
        }

        // ─── HEART BURST ───
        function burstHearts(x, y) {
            const colors = ['#ec4899', '#f472b6', '#f9a8d4', '#fbcfe8', '#db2777'];
            for (let i = 0; i < 16; i++) {
                const heart = document.createElement('div');
                heart.className = 'heart-particle';
                heart.textContent = '♥';
                const angle = (i / 16) * Math.PI * 2 + Math.random() * 0.3;
                const dist = 30 + Math.random() * 70;
                const color = colors[Math.floor(Math.random() * colors.length)];
                heart.style.color = color;
                heart.style.left = x + 'px';
                heart.style.top = y + 'px';
                heart.style.fontSize = (0.5 + Math.random() * 0.9) + 'rem';
                document.body.appendChild(heart);
                gsap.to(heart, {
                    x: Math.cos(angle) * dist,
                    y: Math.sin(angle) * dist - 20,
                    rotation: Math.random() * 360,
                    opacity: 0,
                    scale: 0.15,
                    duration: 0.7 + Math.random() * 0.3,
                    ease: 'power2.out',
                    onComplete: () => heart.remove()
                });
            }
        }

        // ─── TOAST ───

        function showToast(message) {
            const existing = document.querySelector('.toast-notification');
            if (existing) existing.remove();
            const toast = document.createElement('div');
            toast.className = 'toast-notification';
            toast.innerHTML = `<i class="bi bi-check-circle-fill" style="color:#22c55e;font-size:1.1rem;"></i> <span>${message}</span>`;
            document.body.appendChild(toast);
            gsap.to(toast, {
                x: 0,
                duration: 0.5,
                ease: 'power2.out',
                onComplete: () => {
                    setTimeout(() => {
                        gsap.to(toast, {
                            x: '120%',
                            duration: 0.4,
                            ease: 'power2.in',
                            onComplete: () => toast.remove()
                        });
                    }, 2000);
                }
            });
        }

        // ─── INIT ───
        renderWishlist(wishlistItems);
    });
</script>

<style>
    /* ===== WISHLIST CUSTOM STYLES (Scoped) ===== */
    :root {
        --primary: #0F3D2E;
        --accent: #C8A951;
        --cream: #F7F5F0;
        --glass-bg: rgba(255, 255, 255, 0.65);
        --glass-border: rgba(200, 169, 81, 0.06);
        --glass-blur: 20px;
        --shadow-sm: 0 4px 20px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(200, 169, 81, 0.015);
        --shadow-md: 0 10px 40px rgba(0, 0, 0, 0.03);
        --shadow-lg: 0 20px 60px rgba(0, 0, 0, 0.04);
        --radius: 20px;
        --ease-luxury: cubic-bezier(0.23, 1, 0.32, 1);
    }

    /* ─── Grid via Bootstrap row/col – no custom grid ─── */

    /* ─── Product Card ─── */
    .product-card {
        background: var(--glass-bg);
        backdrop-filter: blur(var(--glass-blur));
        -webkit-backdrop-filter: blur(var(--glass-blur));
        border: 1px solid var(--glass-border);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: box-shadow 0.5s var(--ease-luxury), border-color 0.5s var(--ease-luxury), transform 0.5s var(--ease-luxury);
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-20px) scale(1.01);
        box-shadow: var(--shadow-lg);
        border-color: rgba(200, 169, 81, 0.08);
    }

    .product-image-wrap {
        position: relative;
        width: 100%;
        padding-top: 100%;
        overflow: hidden;
        background: linear-gradient(135deg, #f0ebe0, #e5dfd4);
        clip-path: url(#curveClip);
        -webkit-clip-path: url(#curveClip);
    }

    .product-image-wrap img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.7s ease;
    }

    .product-card:hover .product-image-wrap img {
        transform: scale(1.06);
    }

    /* ─── Remove Heart Button ─── */
    .remove-heart {
        position: absolute;
        top: 10px;
        right: 10px;
        width: clamp(30px, 5vw, 38px);
        height: clamp(30px, 5vw, 38px);
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ec4899;
        cursor: pointer;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
        transition: all 0.3s ease;
        z-index: 5;
        font-size: clamp(0.6rem, 1vw, 0.85rem);
    }

    .remove-heart:hover {
        transform: scale(1.1);
    }

    /* ─── Product Body ─── */
    .product-body {
        padding: clamp(0.6rem, 1.5vw, 1.2rem) clamp(0.6rem, 1.5vw, 1.2rem) clamp(0.8rem, 2vw, 1.5rem);
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-name {
        font-size: clamp(0.8rem, 1.2vw, 1.05rem);
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 0.15rem;
    }

    .product-meta {
        font-size: clamp(0.6rem, 0.9vw, 0.82rem);
        color: rgba(0, 0, 0, 0.35);
        margin-bottom: 0.3rem;
    }

    .product-meta .sep {
        margin: 0 0.3rem;
        opacity: 0.3;
    }

    .product-rating {
        font-size: clamp(0.55rem, 0.8vw, 0.75rem);
        color: var(--accent);
        margin-bottom: 0.4rem;
        display: flex;
        align-items: center;
        gap: 0.2rem;
        flex-wrap: wrap;
    }

    .product-price {
        font-size: clamp(0.9rem, 1.4vw, 1.2rem);
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 0.6rem;
        margin-top: auto;
    }

    /* ─── Product Actions ─── */
    .product-actions {
        display: flex;
        gap: clamp(0.3rem, 0.8vw, 0.6rem);
        margin-top: 0.2rem;
        flex-wrap: wrap;
    }

    .add-btn {
        flex: 1;
        padding: clamp(0.25rem, 0.8vw, 0.6rem) clamp(0.4rem, 1.2vw, 1.2rem);
        border-radius: 100px;
        background: var(--primary);
        color: #fff;
        border: none;
        font-size: clamp(0.55rem, 0.9vw, 0.8rem);
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.3rem;
        min-width: fit-content;
    }

    .add-btn:hover {
        background: #0A2A1F;
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(15, 61, 46, 0.12);
    }

    .add-btn.added {
        background: #22c55e;
    }

    .add-btn i {
        font-size: clamp(0.5rem, 0.8vw, 0.7rem);
    }

    .remove-btn {
        padding: clamp(0.25rem, 0.8vw, 0.6rem) clamp(0.4rem, 0.8vw, 0.8rem);
        border-radius: 100px;
        background: rgba(0, 0, 0, 0.02);
        color: rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(0, 0, 0, 0.04);
        font-size: clamp(0.5rem, 0.8vw, 0.75rem);
        font-weight: 500;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.2rem;
        white-space: nowrap;
        transition: all 0.3s ease;
    }

    .remove-btn i {
        font-size: clamp(0.45rem, 0.7vw, 0.65rem);
    }

    .remove-btn:hover {
        color: #ec4899;
        background: rgba(236, 72, 153, 0.04);
        border-color: rgba(236, 72, 153, 0.08);
    }

    /* ─── Heart Particles ─── */
    .heart-particle {
        position: fixed;
        pointer-events: none;
        z-index: 999;
        color: #ec4899;
        font-weight: 700;
    }

    /* ─── Toast Notification ─── */
    .toast-notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(20px);
        padding: 0.8rem 1.5rem;
        border-radius: 12px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08);
        font-size: clamp(0.7rem, 1vw, 0.85rem);
        font-weight: 500;
        color: var(--primary);
        display: flex;
        align-items: center;
        gap: 0.6rem;
        z-index: 9999;
        transform: translateX(120%);
        transition: transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
    }

    /* ─── Glass Card (empty state) ─── */
    .glass-card {
        background: var(--glass-bg);
        backdrop-filter: blur(var(--glass-blur));
        -webkit-backdrop-filter: blur(var(--glass-blur));
        border: 1px solid var(--glass-border);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
    }

    /* ─── Bootstrap Override for Buttons ─── */
    .btn-emerald {
        background: #0F3D2E !important;
        border-color: #0F3D2E !important;
        color: #fff !important;
        border-radius: 50px !important;
        font-weight: 600 !important;
        transition: all 0.3s ease !important;
    }

    .btn-emerald:hover {
        background: #1a4f3a !important;
        border-color: #1a4f3a !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(15, 61, 46, 0.25);
    }

    /* ─── Responsive Overrides ─── */
    @media (max-width: 576px) {
        .product-body {
            padding: 0.5rem 0.5rem 0.8rem;
        }

        .product-actions {
            gap: 0.3rem;
        }

        .add-btn {
            font-size: 0.5rem;
            padding: 0.2rem 0.4rem;
        }

        .remove-btn {
            font-size: 0.45rem;
            padding: 0.2rem 0.4rem;
        }

        .product-rating .stars {
            font-size: 0.5rem;
        }

        .product-rating .rating-num,
        .product-rating .rating-count {
            font-size: 0.5rem;
        }

        .remove-heart {
            width: 26px;
            height: 26px;
            font-size: 0.5rem;
            top: 6px;
            right: 6px;
        }

        .product-price {
            font-size: 0.8rem;
            margin-bottom: 0.3rem;
        }

        .product-name {
            font-size: 0.7rem;
        }

        .product-meta {
            font-size: 0.5rem;
        }

        .wishlist-header h1 {
            font-size: 1.1rem !important;
        }

        .wishlist-header .badge {
            font-size: 0.55rem !important;
            padding: 0.1rem 0.5rem !important;
        }

        .form-select-sm {
            font-size: 0.6rem !important;
            padding: 0.1rem 0.4rem !important;
        }
    }

/* ===== PREMIUM DROPDOWN STYLES ===== */

/* The dropdown box itself */
#sortSelect {
    transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1) !important;
}

#sortSelect:hover {
    background: rgba(255, 255, 255, 0.8) !important;
    border-color: rgba(15, 61, 46, 0.25) !important;
    box-shadow: 0 4px 20px rgba(15, 61, 46, 0.08) !important;
}

#sortSelect:focus {
    outline: none !important;
    border-color: #C8A951 !important;
    box-shadow: 0 0 0 3px rgba(200, 169, 81, 0.15) !important;
    background: rgba(255, 255, 255, 0.85) !important;
}

/* ===== PREMIUM OPTIONS (The dropdown list items) ===== */
#sortSelect option {
    background: #F7F5F0 !important;
    color: #0F3D2E !important;
    font-family: 'Poppins', sans-serif !important;
    font-size: 0.6rem !important;
    font-weight: 500 !important;
    padding: 12px 18px !important;
    transition: all 0.2s ease !important;
    border-bottom: 1px solid rgba(15, 61, 46, 0.04) !important;
    letter-spacing: 0.3px !important;
}

/* Selected option (when highlighted) */
#sortSelect option:checked {
    background: #0F3D2E !important;
    color: #F7F5F0 !important;
    font-weight: 600 !important;
}

/* Hover effect on options (works in Firefox) */
#sortSelect option:hover {
    background: rgba(15, 61, 46, 0.08) !important;
    color: #0F3D2E !important;
}

/* Gold accent for the active/selected text */
#sortSelect option[value="recent"]:checked {
    background: #0F3D2E !important;
    color: #C8A951 !important;
}

/* Custom scrollbar for the dropdown (WebKit) */
#sortSelect::-webkit-scrollbar {
    width: 6px;
}
#sortSelect::-webkit-scrollbar-track {
    background: rgba(15, 61, 46, 0.04);
    border-radius: 10px;
}
#sortSelect::-webkit-scrollbar-thumb {
    background: rgba(15, 61, 46, 0.15);
    border-radius: 10px;
}
#sortSelect::-webkit-scrollbar-thumb:hover {
    background: rgba(15, 61, 46, 0.25);
}

/* ===== FIREFOX STYLING FOR OPTIONS ===== */
@-moz-document url-prefix() {
    #sortSelect option {
        padding: 10px 16px !important;
    }
    #sortSelect option:checked {
        background: #0F3D2E !important;
        color: #C8A951 !important;
    }
}



</style>
</body>

</html>