<!-- navbar.php – Centered Glass Pill + Hamburger X ON TOP of Overlay (ANIMATION FIXED) -->
<nav class="navbar navbar-expand-lg fixed-top cream-navbar">
    <div class="container-fluid px-3 px-lg-4 d-flex align-items-center position-relative">

        <!-- ===== LEFT: Logo only ===== -->
        <div class="d-flex align-items-center" style="flex: 0 0 auto; z-index: 2;">
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
        </div>

        <!-- ===== CENTER: Glass Pill (Desktop) ===== -->
        <div class="nav-pill-wrapper d-none d-lg-block" style="position: absolute; left: 50%; transform: translateX(-50%); z-index: 1; padding: 0.2rem 1rem; margin-top: 4px;">
            <ul class="navbar-nav nav-pill flex-row align-items-center gap-1 p-1" style="margin: 0; padding: 0.4rem 1rem;">
                <!-- HOME -->
                <li class="nav-item">
                    <a class="nav-link active d-flex flex-column align-items-center gap-1 py-1 px-3" href="index.php" data-tab="home">
                        <svg class="tab-icon home-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="home-body" d="M4 10L12 3L20 10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            <rect class="home-wall" x="5" y="10" width="14" height="11" rx="1" stroke="currentColor" stroke-width="1.8"/>
                            <g class="door-group">
                                <rect class="door-frame" x="9" y="13" width="6" height="8" rx="0.5" stroke="currentColor" stroke-width="1.8" fill="none"/>
                                <rect class="door-panel" x="10" y="14" width="4" height="6" fill="currentColor" fill-opacity="0.15" stroke="none" rx="0.5"/>
                                <circle class="door-knob" cx="13.5" cy="17" r="0.8" fill="currentColor" stroke="none"/>
                            </g>
                        </svg>
                        <span class="nav-label">Home</span>
                    </a>
                </li>
                <!-- NEW -->
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column align-items-center gap-1 py-1 px-3" href="new-arrivals-page.php" data-tab="shop">
                        <div class="icon-with-tag" style="position:relative; display:inline-flex;">
                            <svg class="tab-icon bag-icon-new" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="bag-handle-new" d="M8 5V4a4 4 0 0 1 8 0v1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                <rect class="bag-body-new" x="3" y="5" width="18" height="16" rx="2.5" stroke="currentColor" stroke-width="1.8"/>
                                <path class="bag-flap-new" d="M3 5h18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                <rect class="new-tag-bg" x="8" y="9" width="8" height="4" rx="1" fill="#C8A951" stroke="none"/>
                                <text class="new-tag-text" x="12" y="12" font-size="4" font-weight="700" fill="#FFFFFF" text-anchor="middle" font-family="Arial, sans-serif">NEW</text>
                            </svg>
                        </div>
                        <span class="nav-label">New Arrivals</span>
                    </a>
                </li>
                <!-- CATEGORIES -->
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column align-items-center gap-1 py-1 px-3" href="category.php" data-tab="categories">
                        <span class="category-icon-wrap">
                            <i class="bi bi-grid fs-6 category-icon"></i>
                        </span>
                        <span class="nav-label">Categories</span>
                    </a>
                </li>
                <!-- TRACK -->
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column align-items-center gap-1 py-1 px-3" href="track-order.php" data-tab="track">
                        <svg class="tab-icon box-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect class="box-body" x="3" y="6" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/>
                            <path class="box-top-flap" d="M3 6L7 2H17L21 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            <path class="box-handle" d="M10 10h4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                        <span class="nav-label">Track</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ===== RIGHT: Icons + Mobile Search + Hamburger ===== -->
        <div class="d-flex align-items-center gap-2 ms-auto" style="flex: 0 0 auto; z-index: 2;">
            <!-- Search – desktop -->
            <a href="#" class="nav-icon d-none d-lg-inline-flex" id="openSearchOverlay">
                <svg class="tab-icon search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle class="search-ring" cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.8"/>
                    <path class="search-handle" d="M16 16L21 21" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    <circle class="search-lens" cx="11" cy="11" r="3" fill="currentColor" fill-opacity="0.12" stroke="none"/>
                </svg>
            </a>

            <!-- Wishlist – desktop -->
            <a href="wishlist.php" class="nav-icon position-relative d-none d-lg-inline-flex">
                <svg class="tab-icon heart-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="heart-path" d="M12 21.35L10.55 20.03C5.4 15.36 2 12.27 2 8.5C2 5.41 4.42 3 7.5 3C9.24 3 10.91 3.81 12 5.08C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.41 22 8.5C22 12.27 18.6 15.36 13.45 20.03L12 21.35Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="wishlist-badge cart-badge" style="display: none;">0</span>
            </a>

            <!-- Cart – desktop -->
            <a href="cart.php" class="nav-icon position-relative cart-icon d-none d-lg-inline-flex">
                <svg class="tab-icon basket-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="basket-handle" d="M8 6L4 12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    <path class="basket-handle2" d="M16 6L20 12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    <rect class="basket-body" x="3" y="12" width="18" height="10" rx="2" stroke="currentColor" stroke-width="1.8"/>
                    <circle class="basket-wheel" cx="7" cy="22" r="2" stroke="currentColor" stroke-width="1.8"/>
                    <circle class="basket-wheel" cx="17" cy="22" r="2" stroke="currentColor" stroke-width="1.8"/>
                </svg>
                <span class="cart-badge">0</span>
            </a>

            <!-- Profile – desktop -->
            <div class="dropdown-custom d-none d-lg-inline-block" id="profileDropdownCustom">
                <a href="#" class="nav-icon position-relative" id="profileToggle">
                    <svg class="tab-icon profile-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle class="profile-head" cx="12" cy="8" r="5" stroke="currentColor" stroke-width="1.8"/>
                        <path class="profile-body" d="M4 22c0-4 4-6 8-6s8 2 8 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                </a>
                <ul class="dropdown-menu-custom glass-dropdown" id="profileMenu">
                    <li><a class="dropdown-item" href="login-register.php"><i class="bi bi-person-circle me-2"></i>Account</a></li>
                    <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person me-2"></i>Profile</a></li>
                    <li><a class="dropdown-item" href="orders.php"><i class="bi bi-box-seam me-2"></i>My Orders</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#" id="logoutLink"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                </ul>
            </div>

            <!-- ===== MOBILE SEARCH ===== -->
            <a href="#" class="nav-icon d-lg-none" id="openSearchOverlayMobile">
                <svg class="tab-icon search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle class="search-ring" cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.8"/>
                    <path class="search-handle" d="M16 16L21 21" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    <circle class="search-lens" cx="11" cy="11" r="3" fill="currentColor" fill-opacity="0.12" stroke="none"/>
                </svg>
            </a>

            <!-- ===== HAMBURGER ===== -->
            <button class="navbar-toggler border-0 hamburger-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation">
                <span class="hamburger-frame">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </span>
            </button>
        </div>
    </div>

    <!-- ===== MOBILE OVERLAY ===== -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mobile-overlay-menu d-lg-none w-100 h-100 d-flex flex-column align-items-center justify-content-center">
            <ul class="navbar-nav flex-column align-items-center gap-4">
                <li class="nav-item">
                    <a class="nav-link active d-flex flex-column align-items-center gap-2" href="index.php" data-tab="home">
                        <svg class="tab-icon home-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="home-body" d="M4 10L12 3L20 10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            <rect class="home-wall" x="5" y="10" width="14" height="11" rx="1" stroke="currentColor" stroke-width="1.8"/>
                            <g class="door-group">
                                <rect class="door-frame" x="9" y="13" width="6" height="8" rx="0.5" stroke="currentColor" stroke-width="1.8" fill="none"/>
                                <rect class="door-panel" x="10" y="14" width="4" height="6" fill="currentColor" fill-opacity="0.15" stroke="none" rx="0.5"/>
                                <circle class="door-knob" cx="13.5" cy="17" r="0.8" fill="currentColor" stroke="none"/>
                            </g>
                        </svg>
                        <span class="nav-label fs-5">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column align-items-center gap-2" href="new-arrivals-page.php" data-tab="shop">
                        <div class="icon-with-tag" style="position:relative; display:inline-flex;">
                            <svg class="tab-icon bag-icon-new" width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="bag-handle-new" d="M8 5V4a4 4 0 0 1 8 0v1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                <rect class="bag-body-new" x="3" y="5" width="18" height="16" rx="2.5" stroke="currentColor" stroke-width="1.8"/>
                                <path class="bag-flap-new" d="M3 5h18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                <rect class="new-tag-bg" x="8" y="9" width="8" height="4" rx="1" fill="#C8A951" stroke="none"/>
                                <text class="new-tag-text" x="12" y="12" font-size="4" font-weight="700" fill="#FFFFFF" text-anchor="middle" font-family="Arial, sans-serif">NEW</text>
                            </svg>
                        </div>
                        <span class="nav-label fs-5">New Arrivals</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column align-items-center gap-2" href="category.php" data-tab="categories">
                        <span class="category-icon-wrap">
                            <i class="bi bi-grid fs-3 category-icon"></i>
                        </span>
                        <span class="nav-label fs-5">Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column align-items-center gap-2" href="track-order.php" data-tab="track">
                        <svg class="tab-icon box-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect class="box-body" x="3" y="6" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/>
                            <path class="box-top-flap" d="M3 6L7 2H17L21 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            <path class="box-handle" d="M10 10h4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                        <span class="nav-label fs-5">Track</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column align-items-center gap-2" href="wishlist.php" data-tab="wishlist">
                        <svg class="tab-icon heart-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="heart-path" d="M12 21.35L10.55 20.03C5.4 15.36 2 12.27 2 8.5C2 5.41 4.42 3 7.5 3C9.24 3 10.91 3.81 12 5.08C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.41 22 8.5C22 12.27 18.6 15.36 13.45 20.03L12 21.35Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="nav-label fs-5">Wishlist</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column align-items-center gap-2" href="cart.php" data-tab="cart">
                        <svg class="tab-icon basket-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="basket-handle" d="M8 6L4 12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            <path class="basket-handle2" d="M16 6L20 12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            <rect class="basket-body" x="3" y="12" width="18" height="10" rx="2" stroke="currentColor" stroke-width="1.8"/>
                            <circle class="basket-wheel" cx="7" cy="22" r="2" stroke="currentColor" stroke-width="1.8"/>
                            <circle class="basket-wheel" cx="17" cy="22" r="2" stroke="currentColor" stroke-width="1.8"/>
                        </svg>
                        <span class="nav-label fs-5">Cart</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column align-items-center gap-2" href="profile.php" data-tab="profile">
                        <svg class="tab-icon profile-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle class="profile-head" cx="12" cy="8" r="5" stroke="currentColor" stroke-width="1.8"/>
                            <path class="profile-body" d="M4 22c0-4 4-6 8-6s8 2 8 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                        <span class="nav-label fs-5">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ============================================================ -->
<!-- STYLES                                                       -->
<!-- ============================================================ -->
<style>
    /* ─── Base Navbar ─── */
    .cream-navbar {
        background: #F7F5F0 !important;
        backdrop-filter: none !important;
        -webkit-backdrop-filter: none !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.02);
        padding-top: 16px;
        padding-bottom: 16px;
        transition: all 0.3s ease;
        z-index: 1030 !important;
    }
    .cream-navbar.scrolled {
        background: #f0eee8 !important;
        box-shadow: 0 2px 24px rgba(0, 0, 0, 0.04);
    }
    .cream-navbar .navbar-brand {
        color: #0F3D2E !important;
        font-weight: 700;
        letter-spacing: -0.5px;
        font-size: 1.3rem;
    }

    /* ─── Glass Pill ─── */
    .nav-pill {
        background: rgba(15, 61, 46, 0.08);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(15, 61, 46, 0.12);
        border-radius: 60px;
        box-shadow: 0 4px 24px rgba(15, 61, 46, 0.06), inset 0 1px 0 rgba(255, 255, 255, 0.3);
        position: relative;
        overflow: hidden;
        transition: all 0.4s ease;
        margin-top: 4px;
        padding: 0.4rem 1rem;
    }
    .nav-pill::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(ellipse at 30% 50%, rgba(255,255,255,0.15) 0%, transparent 60%);
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
        background: linear-gradient(135deg, rgba(255,255,255,0.05) 0%, transparent 50%, rgba(255,255,255,0.02) 100%);
        pointer-events: none;
    }
    .nav-pill:hover {
        box-shadow: 0 8px 32px rgba(15, 61, 46, 0.08), inset 0 1px 0 rgba(255, 255, 255, 0.4);
        border-color: rgba(15, 61, 46, 0.18);
    }

    /* ─── Nav links ─── */
    .cream-navbar .nav-link {
        color: rgba(15, 61, 46, 0.6) !important;
        font-size: 0.95rem;
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
        padding: 0.2rem 0.7rem;
        will-change: transform;
        z-index: 1;
        min-width: 42px;
    }
    .cream-navbar .nav-link .nav-label {
        font-size: 0.4rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: rgba(15, 61, 46, 0.3);
        transition: color 0.3s ease;
        font-weight: 600;
        white-space: nowrap;
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

    /* ─── Category hole fill ─── */
    .category-icon-wrap {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        border: 1.8px solid currentColor;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s ease, border-color 0.3s ease, color 0.3s ease;
        color: currentColor;
    }
    .category-icon-wrap:hover {
        background: #0F3D2E;
        border-color: #0F3D2E;
        color: #ffffff !important;
    }
    .category-icon-wrap:hover .category-icon {
        color: #ffffff !important;
    }
    .category-icon-wrap .category-icon {
        transition: color 0.3s ease;
        line-height: 1;
        font-size: 0.9rem;
    }

    /* ─── Right icons ─── */
    .cream-navbar .nav-icon {
        color: rgba(15, 61, 46, 0.7) !important;
        font-size: 1.1rem;
        padding: 0.2rem 0.25rem;
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
    .cream-navbar .cart-badge {
        background: #0F3D2E;
        color: #F7F5F0;
        font-size: 0.5rem;
        font-weight: 700;
        padding: 0.05rem 0.3rem;
        border-radius: 50%;
        min-width: 16px;
        height: 16px;
        text-align: center;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: -4px;
        right: -6px;
        box-shadow: 0 2px 8px rgba(15, 61, 46, 0.15);
    }

    /* ─── Dropdown ─── */
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

    /* ─── Hamburger → Cross with .open class ─── */
    .hamburger-frame {
        position: relative;
        width: 22px;
        height: 16px;
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
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        transform-origin: center;
    }
    /* ─── Cross shape when open ─── */
    .navbar-toggler.open .hamburger-frame .line1 {
        transform: translateY(7px) rotate(45deg);
        width: 100%;
    }
    .navbar-toggler.open .hamburger-frame .line2 {
        opacity: 0;
        transform: scaleX(0);
    }
    .navbar-toggler.open .hamburger-frame .line3 {
        transform: translateY(-7px) rotate(-45deg);
        width: 100%;
    }
    /* Fallback for Bootstrap's aria-expanded */
    .navbar-toggler[aria-expanded="true"] .hamburger-frame .line1 {
        transform: translateY(7px) rotate(45deg);
        width: 100%;
    }
    .navbar-toggler[aria-expanded="true"] .hamburger-frame .line2 {
        opacity: 0;
        transform: scaleX(0);
    }
    .navbar-toggler[aria-expanded="true"] .hamburger-frame .line3 {
        transform: translateY(-7px) rotate(-45deg);
        width: 100%;
    }

    /* ─── Floating hamburger when menu open ─── */
    .hamburger-toggle.floating {
        position: fixed !important;
        top: 18px !important;
        right: 18px !important;
        z-index: 99999 !important;
        background: rgba(247, 245, 240, 0.9) !important;
        backdrop-filter: blur(12px) !important;
        -webkit-backdrop-filter: blur(12px) !important;
        border-radius: 50% !important;
        width: 44px !important;
        height: 44px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        padding: 0 !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06) !important;
        border: 1px solid rgba(0, 0, 0, 0.04) !important;
        pointer-events: auto !important;
    }

    /* ─── Mobile Overlay ─── */
    @media (max-width: 991.98px) {
        .navbar-collapse {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(247, 245, 240, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 80px 2rem 2rem;
            overflow-y: auto;
            display: flex !important;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transform: translateX(100%);
            transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.3s;
            opacity: 0;
            z-index: 1040 !important;
            border: none;
            box-shadow: none;
        }
        .navbar-collapse.show { 
            transform: translateX(0); 
            opacity: 1; 
        }
        .navbar-collapse .mobile-overlay-menu { 
            display: flex !important; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center; 
            width: 100%; 
            height: 100%; 
        }
        
        /* ─── Mobile nav links – DARK TEXT ─── */
        .mobile-overlay-menu .nav-link .nav-label {
            color: rgba(15, 61, 46, 0.9) !important;
            font-weight: 700 !important;
            font-size: 1.2rem !important;
            text-transform: none !important;
            letter-spacing: 0.5px !important;
        }
        .mobile-overlay-menu .nav-link.active .nav-label {
            color: #0F3D2E !important;
            font-weight: 800 !important;
        }
        .mobile-overlay-menu .nav-link svg {
            color: rgba(15, 61, 46, 0.7) !important;
        }
        .mobile-overlay-menu .nav-link.active svg {
            color: #0F3D2E !important;
        }

        /* ─── Hide desktop elements on mobile ─── */
        .cream-navbar .d-lg-none#openSearchOverlayMobile { 
            display: inline-flex !important; 
        }
        .nav-pill-wrapper { 
            display: none !important; 
        }
        .cream-navbar .d-none.d-lg-inline-flex {
            display: none !important;
        }
    }
</style>

<!-- ============================================================ -->
<!-- SCRIPTS – Hamburger Floating + Animation Sync                -->
<!-- ============================================================ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ─── SEARCH OVERLAY ─────────────────────────────────────
        const searchOverlayTriggers = document.querySelectorAll('#openSearchOverlay, #openSearchOverlayMobile');
        searchOverlayTriggers.forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                if (typeof showSearchOverlay === 'function') {
                    showSearchOverlay();
                } else {
                    const overlay = document.getElementById('searchOverlay');
                    if (overlay) {
                        overlay.style.display = 'flex';
                        document.body.style.overflow = 'hidden';
                    }
                }
            });
        });

        // ─── PROFILE DROPDOWN ───────────────────────────────────
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

        // ─── NAVBAR SCROLL ──────────────────────────────────────
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

        // ─── ACTIVE TAB ─────────────────────────────────────────
        const navLinks = document.querySelectorAll('.nav-link');
        function setActiveTab(tab) {
            navLinks.forEach(link => {
                if (link.dataset.tab === tab) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
            localStorage.setItem('activeTab', tab);
        }

        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const tab = this.dataset.tab;
                if (tab) {
                    setActiveTab(tab);
                }
                const collapse = document.getElementById('navbarNav');
                if (collapse && collapse.classList.contains('show')) {
                    const bsCollapse = bootstrap.Collapse.getInstance(collapse);
                    if (bsCollapse) bsCollapse.hide();
                }
            });
        });

        const activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            setActiveTab(activeTab);
        } else {
            const firstLink = document.querySelector('.nav-link[data-tab="home"]');
            if (firstLink) setActiveTab('home');
        }

        const currentPage = window.location.pathname.split('/').pop() || 'index.php';
        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (href === currentPage) {
                const tab = link.dataset.tab;
                if (tab) setActiveTab(tab);
            }
        });

        // ─── BADGE UPDATES ──────────────────────────────────────
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

        // ─── HAMBURGER FLOATING BUTTON + ANIMATION SYNC ──────
        const hamburger = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.getElementById('navbarNav');

        if (hamburger && navbarCollapse) {
            // When menu opens → move hamburger to body + add .open class
            navbarCollapse.addEventListener('show.bs.collapse', function() {
                // Move to body
                document.body.appendChild(hamburger);
                hamburger.classList.add('floating');
                hamburger.classList.add('open');
                hamburger.setAttribute('aria-expanded', 'true');
            });

            // When menu closes → move hamburger back + remove .open class
            navbarCollapse.addEventListener('hide.bs.collapse', function() {
                const rightIcons = document.querySelector('.d-flex.align-items-center.gap-2.ms-auto');
                if (rightIcons) {
                    rightIcons.appendChild(hamburger);
                }
                hamburger.classList.remove('floating');
                hamburger.classList.remove('open');
                hamburger.setAttribute('aria-expanded', 'false');
            });

            // Click handler to toggle the collapse manually if needed
            hamburger.addEventListener('click', function(e) {
                // Let Bootstrap handle the toggle via data-bs-toggle
                // But we need to update aria-expanded manually to ensure CSS sync
                const isOpen = navbarCollapse.classList.contains('show');
                if (isOpen) {
                    const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (bsCollapse) bsCollapse.hide();
                } else {
                    const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (bsCollapse) bsCollapse.show();
                }
            });
        }

        // ─── LOGOUT ─────────────────────────────────────────────
        const logoutLink = document.getElementById('logoutLink');
        if (logoutLink) {
            logoutLink.addEventListener('click', function(e) {
                e.preventDefault();
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

        console.log('✅ Navbar loaded!');
    });
</script>