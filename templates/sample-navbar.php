<!-- navbar.php – Emerald Glassmorphism Pill + GSAP Icon Animations (with Hamburger & Profile updates) -->
<nav class="navbar navbar-expand-lg fixed-top cream-navbar">
    <div class="container">
        <!-- Logo - Left -->
        <a class="navbar-brand logo-slide" href="index.php">
            <span class="logo-text">Optiq</span>
            <span class="logo-text logo-clone">Optiq</span>
            <svg class="floating-glasses" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0F3D2E" stroke-width="1.5">
                <circle cx="6" cy="10" r="3" />
                <circle cx="18" cy="10" r="3" />
                <path d="M3 10h3m12 0h3M9 10h6" stroke-linecap="round" />
                <path d="M6 10v3a6 6 0 0012 0v-3" stroke-linecap="round" />
            </svg>
        </a>

        <!-- Mobile Toggle – Lens Inspired Animation -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation">
            <span class="hamburger-frame">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </span>
        </button>

        <!-- Nav Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- ===== CENTER: Emerald Glass Pill with 4 Icons ===== -->
            <div class="nav-pill-container w-100 d-flex justify-content-center">
                <ul class="navbar-nav nav-pill flex-column flex-lg-row align-items-center gap-1 gap-lg-2 p-2 p-lg-1">
                    <li class="nav-item w-100 w-lg-auto">
                        <a class="nav-link active d-flex flex-row align-items-center gap-2 py-2 py-lg-1 px-3 px-lg-3 w-100 justify-content-center" href="index.php" data-tab="home">
                            <i class="bi bi-house"></i>
                            <span class="nav-label d-none d-lg-inline">Home</span>
                            <span class="nav-label d-lg-none">Home</span>
                        </a>
                    </li>
                    <li class="nav-item w-100 w-lg-auto">
                        <a class="nav-link d-flex flex-row align-items-center gap-2 py-2 py-lg-1 px-3 px-lg-3 w-100 justify-content-center" href="new-arrivals-page.php" data-tab="shop">
                            <i class="bi bi-stars"></i>
                            <span class="nav-label d-none d-lg-inline">NEW ARRIVALS</span>
                            <span class="nav-label d-lg-none">New</span>
                        </a>
                    </li>
                    <li class="nav-item w-100 w-lg-auto">
                        <a class="nav-link d-flex flex-row align-items-center gap-2 py-2 py-lg-1 px-3 px-lg-3 w-100 justify-content-center" href="category.php" data-tab="categories">
                            <i class="bi bi-grid"></i>
                            <span class="nav-label d-none d-lg-inline">Categories</span>
                            <span class="nav-label d-lg-none">Shop</span>
                        </a>
                    </li>
                    <li class="nav-item w-100 w-lg-auto">
                        <a class="nav-link d-flex flex-row align-items-center gap-2 py-2 py-lg-1 px-3 px-lg-3 w-100 justify-content-center" href="track-order.php" data-tab="track">
                            <i class="bi bi-box"></i>
                            <span class="nav-label d-none d-lg-inline">Track</span>
                            <span class="nav-label d-lg-none">Track</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- ===== RIGHT: Search, Wishlist, Cart, Profile ===== -->
            <div class="d-flex align-items-center gap-2 gap-lg-3 pt-3 pt-lg-0 mt-2 mt-lg-0 justify-content-center justify-content-lg-end right-icons">
                <a href="search.php" class="nav-icon position-relative" id="openSearchOverlay">
                    <i class="bi bi-search"></i>
                </a>
                <a href="wishlist.php" class="nav-icon position-relative">
                    <i class="bi bi-heart"></i>
                    <span class="wishlist-badge cart-badge" style="display: none;">0</span>
                </a>
                <a href="cart.php" class="nav-icon position-relative cart-icon">
                    <i class="bi bi-bag"></i>
                    <span class="cart-badge">0</span>
                </a>

                <!-- Profile Dropdown -->
                <div class="dropdown-custom" id="profileDropdownCustom">
                    <a href="#" class="nav-icon position-relative" id="profileToggle">
                        <span class="profile-icon-container pulse-ring">
                            <i class="bi bi-person"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu-custom glass-dropdown" id="profileMenu">
                        <li><a class="dropdown-item" href="login-register.php"><i class="bi bi-person-circle me-2"></i>Account</a></li>
                        <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="orders.php"><i class="bi bi-box-seam me-2"></i>My Orders</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" id="logoutLink"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- ============================================================ -->
<!-- STYLES – Only visual/glass styles remain, no layout @media -->
<!-- ============================================================ -->
<style>
    /* ============================================================
       CREAM/WHITE NAVBAR BACKGROUND
       ============================================================ */
    .cream-navbar {
        background: #F7F5F0 !important;
        backdrop-filter: none !important;
        -webkit-backdrop-filter: none !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.02);
        padding-top: 10px;
        padding-bottom: 10px;
        transition: all 0.3s ease;
    }

    .cream-navbar.scrolled {
        background: #f0eee8 !important;
        box-shadow: 0 2px 24px rgba(0, 0, 0, 0.04);
    }

    /* ===== BRAND ===== */
    .cream-navbar .navbar-brand {
        color: #0F3D2E !important;
        font-weight: 700;
        letter-spacing: -0.5px;
        font-size: 1.3rem;
    }

    /* ============================================================
       HAMBURGER – LENS INSPIRED ANIMATION
       ============================================================ */
    .hamburger-frame {
        position: relative;
        width: 24px;
        height: 18px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.3s ease;
    }

    .hamburger-frame .line {
        display: block;
        width: 100%;
        height: 2px;
        background: #0F3D2E;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    /* When menu is open, lines morph into glasses shape */
    .navbar-toggler[aria-expanded="true"] .hamburger-frame .line1 {
        transform: translateY(8px) rotate(0deg) scaleX(0.7);
        border-radius: 50% 50% 0 0;
        height: 6px;
    }

    .navbar-toggler[aria-expanded="true"] .hamburger-frame .line2 {
        opacity: 0;
    }

    .navbar-toggler[aria-expanded="true"] .hamburger-frame .line3 {
        transform: translateY(-8px) rotate(0deg) scaleX(0.7);
        border-radius: 0 0 50% 50%;
        height: 6px;
    }

    /* ============================================================
       CENTRAL EMERALD GLASS PILL – Watery Glass Effect
       ============================================================ */
    .nav-pill-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 1;
    }

    .nav-pill {
        background: rgba(15, 61, 46, 0.08);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(15, 61, 46, 0.12);
        border-radius: 60px;
        box-shadow: 
            0 4px 24px rgba(15, 61, 46, 0.06),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        position: relative;
        overflow: hidden;
        transition: all 0.4s ease;
    }

    .nav-pill::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(
            ellipse at 30% 50%,
            rgba(255, 255, 255, 0.15) 0%,
            transparent 60%
        );
        pointer-events: none;
        animation: wateryShimmer 4s ease-in-out infinite;
    }

    @keyframes wateryShimmer {
        0%, 100% { transform: translateX(-20%) rotate(0deg); opacity: 0.6; }
        50% { transform: translateX(20%) rotate(5deg); opacity: 1; }
    }

    .nav-pill::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 60px;
        background: linear-gradient(
            135deg,
            rgba(255, 255, 255, 0.05) 0%,
            transparent 50%,
            rgba(255, 255, 255, 0.02) 100%
        );
        pointer-events: none;
    }

    .nav-pill:hover {
        box-shadow: 
            0 8px 32px rgba(15, 61, 46, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.4);
        border-color: rgba(15, 61, 46, 0.18);
    }

    /* ============================================================
       NAV LINKS INSIDE PILL
       ============================================================ */
    .cream-navbar .nav-link {
        color: rgba(15, 61, 46, 0.6) !important;
        font-size: 1.1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.1rem;
        transition: color 0.3s ease;
        position: relative;
        border-radius: 40px;
        text-decoration: none;
        cursor: pointer;
        background: transparent;
        border: none;
        min-width: 52px;
        will-change: transform;
        z-index: 1;
    }

    .cream-navbar .nav-link .nav-label {
        font-size: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: rgba(15, 61, 46, 0.3);
        transition: color 0.3s ease;
        font-weight: 600;
    }

    .cream-navbar .nav-link:hover,
    .cream-navbar .nav-link.active {
        color: #0F3D2E !important;
    }

    .cream-navbar .nav-link:hover .nav-label,
    .cream-navbar .nav-link.active .nav-label {
        color: #0F3D2E !important;
    }

    .cream-navbar .nav-link.active::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 40px;
        background: rgba(15, 61, 46, 0.06);
        z-index: -1;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.6);
    }

    /* ============================================================
       RIGHT ICONS
       ============================================================ */
    .cream-navbar .nav-icon {
        color: rgba(15, 61, 46, 0.7) !important;
        font-size: 1.2rem;
        padding: 0.25rem 0.35rem;
        transition: color 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        will-change: transform;
    }

    .cream-navbar .nav-icon:hover {
        color: #0F3D2E !important;
    }

    /* ===== BADGES ===== */
    .cream-navbar .cart-badge {
        background: #0F3D2E;
        color: #F7F5F0;
        font-size: 0.55rem;
        font-weight: 700;
        padding: 0.1rem 0.35rem;
        border-radius: 50%;
        min-width: 18px;
        height: 18px;
        text-align: center;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: -4px;
        right: -6px;
        box-shadow: 0 2px 8px rgba(15, 61, 46, 0.15);
    }

    /* ============================================================
       PROFILE DROPDOWN
       ============================================================ */
    .dropdown-custom {
        position: relative;
        display: inline-block;
    }

    .dropdown-menu-custom {
        position: absolute;
        top: 100%;
        right: 0;
        z-index: 1000;
        min-width: 200px;
        padding: 0.5rem 0;
        margin: 0.5rem 0 0;
        background: rgba(247, 245, 240, 0.95);
        backdrop-filter: blur(25px);
        border: 1px solid rgba(15, 61, 46, 0.06);
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.06);
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px) scale(0.96);
        transition: opacity 0.25s ease, transform 0.25s ease, visibility 0.25s;
        list-style: none;
    }

    .dropdown-menu-custom.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0) scale(1);
    }

    .dropdown-menu-custom .dropdown-item {
        display: block;
        width: 100%;
        padding: 0.6rem 1.5rem;
        clear: both;
        font-weight: 400;
        color: rgba(15, 61, 46, 0.7);
        text-align: inherit;
        text-decoration: none;
        background: transparent;
        border: 0;
        transition: all 0.2s;
        cursor: pointer;
        font-size: 0.9rem;
    }

    .dropdown-menu-custom .dropdown-item:hover {
        background: rgba(15, 61, 46, 0.04);
        color: #0F3D2E;
    }

    .dropdown-menu-custom .dropdown-divider {
        height: 0;
        margin: 0.5rem 0;
        overflow: hidden;
        border-top: 1px solid rgba(15, 61, 46, 0.06);
    }

    .profile-icon-container {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .pulse-ring {
        position: relative;
    }

    .pulse-ring::before {
        content: '';
        position: absolute;
        inset: -4px;
        border-radius: 50%;
        border: 2px solid rgba(15, 61, 46, 0.1);
        animation: pulseRing 2s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes pulseRing {
        0%, 100% { transform: scale(1); opacity: 0.5; }
        50% { transform: scale(1.3); opacity: 0; }
    }

    /* ===== LOGO SLIDE ===== */
    .logo-slide {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        overflow: hidden;
        height: 2.2rem;
        position: relative;
        text-decoration: none;
    }

    .logo-text {
        display: block;
        font-weight: 800;
        font-size: 1.8rem;
        letter-spacing: -0.5px;
        color: #0F3D2E;
        line-height: 2.2rem;
        white-space: nowrap;
        animation: slideText 6s ease-in-out infinite;
    }

    .logo-clone {
        position: absolute;
        top: 100%;
        left: 0;
        line-height: 2.2rem;
        animation: slideClone 6s ease-in-out infinite;
    }

    @keyframes slideText {
        0%, 20% { transform: translateY(0); }
        45%, 65% { transform: translateY(-100%); }
        90%, 100% { transform: translateY(0); }
    }

    @keyframes slideClone {
        0%, 20% { transform: translateY(0); }
        45%, 65% { transform: translateY(-100%); }
        90%, 100% { transform: translateY(0); }
    }

    /* ============================================================
       LOGOUT CONFIRMATION DIALOG
       ============================================================ */
    .logout-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(15, 61, 46, 0.5);
        backdrop-filter: blur(5px);
        z-index: 2000;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }

    .logout-overlay.active {
        opacity: 1;
        pointer-events: all;
    }

    .logout-dialog {
        background: white;
        padding: 2rem;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0 20px 60px rgba(0,0,0,0.2);
        max-width: 300px;
        width: 90%;
    }

    .logout-dialog h5 {
        color: #0F3D2E;
        margin-bottom: 1rem;
    }

    .logout-dialog .btn {
        margin: 0.5rem;
    }

    /* ============================================================
       RESPONSIVE – ONLY VISUAL TWEAKS (no layout changes)
       ============================================================ */
    @media (max-width: 991.98px) {
        /* The collapse menu becomes a glass overlay – handled by Bootstrap classes */
        /* But we need the backdrop blur on the collapse container */
        .navbar-collapse {
            background: rgba(247, 245, 240, 0.92);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border-radius: 16px;
            border: 1px solid rgba(15, 61, 46, 0.06);
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
        }

        /* Nav pill – already flex-column via Bootstrap, but we keep glass background removal on mobile */
        .nav-pill {
            background: transparent !important;
            backdrop-filter: none !important;
            border: none !important;
            box-shadow: none !important;
            padding: 0 !important;
            width: 100%;
        }
        .nav-pill::before,
        .nav-pill::after {
            display: none !important;
        }

        /* Nav links – already using Bootstrap classes, but we adjust active background */
        .cream-navbar .nav-link.active::before {
            display: none;
        }
        .cream-navbar .nav-link:hover {
            background: rgba(15, 61, 46, 0.04);
        }
    }
</style>

<!-- ============================================================ -->
<!-- SCRIPTS (unchanged) -->
<!-- ============================================================ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Profile dropdown toggle
        var toggle = document.getElementById('profileToggle');
        var menu = document.getElementById('profileMenu');
        if (toggle && menu) {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                menu.classList.toggle('show');
            });

            document.addEventListener('click', function(e) {
                var container = document.getElementById('profileDropdownCustom');
                if (container && !container.contains(e.target)) {
                    menu.classList.remove('show');
                }
            });

            menu.querySelectorAll('.dropdown-item').forEach(function(item) {
                item.addEventListener('click', function() {
                    menu.classList.remove('show');
                });
            });
        }

        // Navbar scroll effect
        var navbar = document.querySelector('.cream-navbar');
        if (navbar) {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        }

        // Active nav link
        const currentPage = window.location.pathname.split('/').pop() || 'index.php';
        document.querySelectorAll('.nav-link').forEach(link => {
            const href = link.getAttribute('href');
            if (href === currentPage) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });

        // GSAP animations for nav icons (desktop only) – unchanged
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            const icon = link.querySelector('i');
            const tab = link.dataset.tab;

            link.addEventListener('mouseenter', function() {
                if (window.innerWidth < 992) return;
                gsap.killTweensOf(icon);
                switch (tab) {
                    case 'home':
                        gsap.to(icon, { rotation: 360, duration: 0.6, ease: 'back.out(1.7)', onComplete: () => gsap.set(icon, { rotation: 0 }) });
                        break;
                    case 'shop':
                        gsap.to(icon, { rotationY: 180, duration: 0.5, ease: 'back.out(1.7)', onComplete: () => gsap.set(icon, { rotationY: 0 }) });
                        break;
                    case 'categories':
                        gsap.to(icon, { scaleX: 1.4, scaleY: 0.7, duration: 0.4, ease: 'back.out(1.7)', onComplete: () => gsap.to(icon, { scaleX: 1, scaleY: 1, duration: 0.3 }) });
                        break;
                    case 'track':
                        gsap.to(icon, { scaleX: 1.2, scaleY: 0.6, duration: 0.5, ease: 'back.out(1.7)', onComplete: () => gsap.to(icon, { scaleX: 1, scaleY: 1, duration: 0.3 }) });
                        break;
                }
            });

            link.addEventListener('mouseleave', function() {
                if (window.innerWidth < 992) return;
                gsap.killTweensOf(icon);
                gsap.to(icon, { rotation: 0, rotationY: 0, scaleX: 1, scaleY: 1, duration: 0.3 });
            });
        });

        // Right icons animations (desktop) – unchanged
        const searchIcon = document.querySelector('.nav-icon .bi-search');
        if (searchIcon) {
            const searchWrap = searchIcon.closest('.nav-icon');
            if (searchWrap) {
                searchWrap.addEventListener('mouseenter', () => gsap.to(searchIcon, { scale: 1.3, duration: 0.4, ease: 'back.out(1.7)' }));
                searchWrap.addEventListener('mouseleave', () => gsap.to(searchIcon, { scale: 1, duration: 0.3 }));
            }
        }

        const wishlistWrap = document.querySelector('.nav-icon .bi-heart')?.closest('.nav-icon');
        if (wishlistWrap) {
            const heart = wishlistWrap.querySelector('.bi-heart');
            let heartbeatTimeline = null;
            wishlistWrap.addEventListener('mouseenter', function() {
                if (heartbeatTimeline) heartbeatTimeline.kill();
                heartbeatTimeline = gsap.timeline({ repeat: -1 });
                heartbeatTimeline
                    .to(heart, { scale: 1.3, duration: 0.1 })
                    .to(heart, { scale: 1, duration: 0.1 })
                    .to(heart, { scale: 1.2, duration: 0.1 })
                    .to(heart, { scale: 1, duration: 0.1 })
                    .to(heart, { scale: 1.15, duration: 0.1 })
                    .to(heart, { scale: 1, duration: 0.1 })
                    .to(heart, { scale: 1, duration: 0.3, delay: 0.5 });
            });
            wishlistWrap.addEventListener('mouseleave', function() {
                if (heartbeatTimeline) { heartbeatTimeline.kill(); heartbeatTimeline = null; }
                gsap.to(heart, { scale: 1, duration: 0.2 });
            });
        }

        const cartWrap = document.querySelector('.cart-icon');
        if (cartWrap) {
            const cartIcon = cartWrap.querySelector('.bi-bag');
            cartWrap.addEventListener('mouseenter', function() {
                gsap.to(cartIcon, { scaleX: 1.3, scaleY: 0.7, duration: 0.4, ease: 'back.out(1.7)', onComplete: () => gsap.to(cartIcon, { scaleX: 1, scaleY: 1, duration: 0.3 }) });
            });
            cartWrap.addEventListener('mouseleave', () => gsap.to(cartIcon, { scaleX: 1, scaleY: 1, duration: 0.3 }));
        }

        const profileWrap = document.querySelector('.nav-icon .bi-person')?.closest('.nav-icon');
        if (profileWrap) {
            const profileIcon = profileWrap.querySelector('.bi-person');
            profileWrap.addEventListener('mouseenter', function() {
                gsap.to(profileIcon, { y: -8, scale: 1.15, duration: 0.3, onComplete: () => gsap.to(profileIcon, { y: 0, scale: 1, duration: 0.3, ease: 'back.out(1.7)' }) });
            });
        }

        // Badge update from localStorage
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

        // ============================================================
        // LOGOUT CONFIRMATION DIALOG
        // ============================================================
        const logoutLink = document.getElementById('logoutLink');
        if (logoutLink) {
            logoutLink.addEventListener('click', function(e) {
                e.preventDefault();
                // Create overlay and dialog
                const overlay = document.createElement('div');
                overlay.className = 'logout-overlay';
                const dialog = document.createElement('div');
                dialog.className = 'logout-dialog';
                dialog.innerHTML = `
                    <h5>Are you sure you want to logout?</h5>
                    <button class="btn btn-emerald" id="confirmLogout">Yes, Logout</button>
                    <button class="btn btn-outline-emerald" id="cancelLogout">Cancel</button>
                `;
                overlay.appendChild(dialog);
                document.body.appendChild(overlay);
                setTimeout(() => overlay.classList.add('active'), 10);

                document.getElementById('confirmLogout').addEventListener('click', function() {
                    localStorage.removeItem('currentUser');
                    window.location.href = 'login-register.php';
                });
                document.getElementById('cancelLogout').addEventListener('click', function() {
                    overlay.classList.remove('active');
                    setTimeout(() => overlay.remove(), 300);
                });
                overlay.addEventListener('click', function(e) {
                    if (e.target === overlay) {
                        overlay.classList.remove('active');
                        setTimeout(() => overlay.remove(), 300);
                    }
                });
            });
        }

        console.log('✅ Navbar with lens hamburger, updated profile, and logout dialog loaded!');
    });
</script>