<!-- search-overlay.php – Premium Search Modal (Transparent Background) -->
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
                    
                    <!-- Search Bar -->
                    <div class="search-overlay-bar glass-search-bar">
                        <input type="text" id="overlaySearchInput" class="form-control bg-transparent border-0 text-dark placeholder-white-50 fs-6 py-3 px-3" 
                               placeholder="Search frames, styles, or colours…" autofocus>
                        <button class="btn btn-emerald px-3 py-2 fs-6" id="overlaySearchBtn">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                    
                    <!-- Intent Chips -->
                    <div class="d-flex flex-wrap justify-content-center gap-2 mt-3">
                        <?php
                        $intents = [
                            ['icon'=>'💼','label'=>'Office'],
                            ['icon'=>'✨','label'=>'Fashion'],
                            ['icon'=>'🎮','label'=>'Gaming'],
                            ['icon'=>'📚','label'=>'Reading'],
                            ['icon'=>'🕶','label'=>'Travel'],
                            ['icon'=>'🏃','label'=>'Sports'],
                        ];
                        foreach($intents as $intent):
                        ?>
                        <a href="search.php?q=<?= urlencode($intent['label']); ?>" class="btn glass-pill text-dark" style="font-size: 1rem; padding: 0.4rem 1rem;"><?= $intent['icon']; ?> <?= $intent['label']; ?></a>
                        <?php endforeach; ?>
                    </div>
                    
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
<!-- ===== STYLES – Transparent Background + Blur ===== -->
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
        background: transparent !important; /* ← REMOVED dark background */
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

    /* ----- Container Allows Click Through, But Box Catches Clicks ----- */
    .search-overlay-content .container {
        max-width: 580px;
        margin: 0 auto;
        pointer-events: none;
    }

    .search-overlay-content .row {
        pointer-events: none;
    }

    /* ----- Glass Box Inner (The Modal) – Catches all clicks ----- */
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

    /* ----- Scrollbar (Premium Subtle) ----- */
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

    /* ===== CLOSE BUTTON INSIDE BOX (Top-Right Corner) ===== */
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
        0% {
            opacity: 0;
            transform: translateY(20px) scale(0.96);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* ----- Glass Search Bar ----- */
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
        color: rgba(0, 0, 0, 0.85) !important; /* Dark text with good contrast */
        font-weight: 500; /* Slightly bolder */
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

    /* ----- Search Button (Emerald) – inline on all screens ----- */
    .search-overlay .btn-emerald {
        flex-shrink: 0;
        background: linear-gradient(135deg, var(--primary, #0F3D2E), var(--primary-light, #1B5E4A));
        color: #1A1A1A; /* Black text */
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

    /* ----- Glass Pill (Intent Chips) ----- */
    .glass-pill {
        background: rgba(255, 255, 255, 0.04);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.06);
        color: rgba(0, 0, 0, 0.5);
        font-weight: 400;
        padding: 0.4rem 1rem;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        font-size: 0.8rem;
    }

    .glass-pill:hover {
        background: rgba(200, 169, 81, 0.08);
        border-color: rgba(200, 169, 81, 0.15);
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    /* ----- Browse All Link (Dark) ----- */
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

    /* ================================================================
       BACKGROUND BLUR EFFECT (Premium Smoothness)
       ================================================================ */

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
       RESPONSIVE – Button stays inline, fonts comfortable
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
        .glass-pill {
            font-size: 0.75rem;
            padding: 0.3rem 0.8rem;
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
            /* Keep flex-row, no wrap */
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
        .glass-pill {
            font-size: 0.65rem;
            padding: 0.25rem 0.7rem;
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
        /* Text colors on mobile */
        .glass-search-bar input {
            color: rgba(0, 0, 0, 0.9) !important;
            font-weight: 500;
        }
        .text-dark {
            color: rgba(0, 0, 0, 0.9) !important;
            font-weight: 600;
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
        .glass-pill {
            font-size: 0.55rem;
            padding: 0.2rem 0.5rem;
        }
    }
</style>

<!-- ============================================================ -->
<!-- ===== JAVASCRIPT – Overlay Logic ===== -->
<!-- ============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {

    const overlay = document.getElementById('searchOverlay');
    const backdrop = document.getElementById('searchOverlayBackdrop');
    const closeBtn = document.getElementById('closeSearchOverlay');
    const searchInput = document.getElementById('overlaySearchInput');
    const searchBtn = document.getElementById('overlaySearchBtn');

    // ===== SHOW OVERLAY =====
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
    };

    // ===== HIDE OVERLAY =====
    window.hideSearchOverlay = function() {
        overlay.classList.remove('show');
        document.body.classList.remove('search-overlay-active');
        document.body.style.overflow = '';
        setTimeout(() => {
            overlay.classList.add('d-none');
        }, 500);
    };

    // ===== EVENT LISTENERS =====

    // Close button
    if (closeBtn) {
        closeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            window.hideSearchOverlay();
        });
    }

    // Backdrop click (closes overlay)
    if (backdrop) {
        backdrop.addEventListener('click', function(e) {
            window.hideSearchOverlay();
        });
    }

    // Search button
    if (searchBtn) {
        searchBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const query = searchInput ? searchInput.value.trim() : '';
            if (query.length > 0) {
                window.location.href = 'search.php?q=' + encodeURIComponent(query);
            } else {
                window.hideSearchOverlay();
            }
        });
    }

    // Enter key
    if (searchInput) {
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
    }

    // ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (overlay && overlay.classList.contains('show')) {
                window.hideSearchOverlay();
            }
        }
    });

    console.log('✅ Search Overlay – Transparent Background + Blur Loaded!');
});
</script>