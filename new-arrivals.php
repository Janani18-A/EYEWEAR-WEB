<!-- new-arrivals.php -->
<section class="bg-light py-5">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-5 reveal">
            <div>
                <h2 class="display-5 display-md-4 display-lg-3 fw-bold text-primary mb-2" style="font-family: 'Poppins', sans-serif;">New Arrivals</h2>
                <p class="text-muted fs-5 fs-md-4 fs-lg-3">Fresh styles, just landed.</p>
            </div>
            <span class="badge bg-accent text-primary px-3 py-2 rounded-pill shimmer d-none d-md-block">JUST DROPPED</span>
        </div>
        
        <!-- Slider Container -->
        <div class="position-relative reveal">
            <!-- Left Arrow -->
            <button class="btn btn-light rounded-circle shadow-sm new-arrival-arrow position-absolute top-50 start-0 translate-middle z-12 d-none d-sm-flex" 
                    id="naPrevBtn" 
                    style="width: 44px; height: 44px;">
                <i class="bi bi-chevron-left text-primary fs-5"></i>
            </button>
            
            <!-- Cards Track -->
            <div class="overflow-hidden" style="margin: 0 10px 0 10px;">
                <div class="new-arrivals-track d-flex gap-3 gap-sm-2 gap-md-3" id="newArrivalsTrack">
                    <?php
                    $newArrivals = [
                        ['new-1.jpg', 'Crystal Clear', 'Transparent • Modern', '₹1,999'],
                        ['new-2.jpg', 'Heritage Square', 'Acetate • Retro Vibes', '₹2,499'],
                        ['new-3.jpg', 'AirLite Titanium', 'Titanium • Feather Light', '₹3,999'],
                        ['new-4.jpg', 'Signature Tortoise', 'Tortoiseshell • Timeless', '₹2,799'],
                        ['new-5.jpg', 'AirLite Rimless', 'Titanium • Barely There', '₹4,499'],
                        ['new-6.jpg', 'VisionGuard Blue', 'Blue-Light • Digital Life', '₹2,299'],
                        ['new-7.jpg', 'Heritage Round', 'Tortoiseshell • Vintage', '₹3,199'],
                        ['new-8.jpg', 'Amber Crystal', 'Crystal Acetate • Warm Glow', '₹2,599']
                    ];
                    
                    foreach ($newArrivals as $item):
                        $numericPrice = intval(preg_replace('/[^0-9]/', '', $item[3]));
                    ?>
                    <div class="new-arrival-card bg-white rounded-4 p-3 p-sm-2 p-md-3 border flex-shrink-0 position-relative overflow-hidden" style="width: 280px; min-width: 220px; max-width: 280px;">
                        <!-- Product Image -->
                        <div class="bg-light rounded-3 mb-3 text-center position-relative" style="aspect-ratio: 1 / 1; overflow: hidden; width: 100%;">
                            <img src="assets/images/<?php echo $item[0]; ?>" alt="<?php echo $item[1]; ?>" class="w-100 h-100" style="object-fit: cover; object-position: center;">
                            
                            <!-- View Button (top‑right) – ALWAYS VISIBLE on mobile, HOVER on desktop -->
                            <a href="new-arrivals-page.php" class="btn-glass-circle view-btn position-absolute"
                               title="View All New Arrivals"
                               style="top: 12px; right: 12px;">
                                <i class="bi bi-arrow-right"></i>
                            </a>

                            <!-- Floating Wishlist (left) – ALWAYS VISIBLE on mobile, HOVER on desktop -->
                            <button class="btn btn-glass-circle wishlist-btn position-absolute" 
                                    style="left: 12px; bottom: 8px;"
                                    data-id="<?= pathinfo($item[0], PATHINFO_FILENAME); ?>"
                                    data-name="<?= $item[1]; ?>"
                                    data-img="assets/images/<?= $item[0]; ?>"
                                    data-price="<?= $numericPrice; ?>"
                                    data-color="default"
                                    data-size="medium"
                                    title="Add to Wishlist">
                                <i class="bi bi-heart"></i>
                            </button>
                            
                            <!-- Floating Add‑to‑Bag (right) – ALWAYS VISIBLE on mobile, HOVER on desktop -->
                            <button class="btn btn-glass-circle add-to-bag-btn position-absolute" 
                                    style="right: 12px; bottom: 8px;"
                                    data-id="<?= pathinfo($item[0], PATHINFO_FILENAME); ?>"
                                    data-name="<?= $item[1]; ?>"
                                    data-img="assets/images/<?= $item[0]; ?>"
                                    data-price="<?= $numericPrice; ?>"
                                    data-color="default"
                                    data-size="medium"
                                    title="Add to Cart">
                                <i class="bi bi-bag"></i>
                            </button>
                        </div>
                        
                        <span class="badge bg-accent text-primary mb-2" style="font-size: clamp(0.5rem, 1vw, 0.75rem);">NEW ARRIVAL</span>
                        <h3 class="h6 fw-bold text-primary mt-1" style="font-size: clamp(0.7rem, 1.2vw, 1rem);"><?php echo $item[1]; ?></h3>
                        <p class="text-muted small" style="font-size: clamp(0.55rem, 1vw, 0.85rem);"><?php echo $item[2]; ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h6 fw-bold text-primary mb-0" style="font-size: clamp(0.75rem, 1.2vw, 1.1rem);"><?php echo $item[3]; ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Right Arrow -->
            <button class="btn btn-light rounded-circle shadow-sm new-arrival-arrow position-absolute top-50 end-0 translate-middle z-12 d-none d-sm-flex" 
                    id="naNextBtn" 
                    style="width: 44px; height: 44px;">
                <i class="bi bi-chevron-right text-primary fs-5"></i>
            </button>
            
            <!-- Dot Indicators -->
            <div class="d-flex justify-content-center gap-2 mt-4" id="newArrivalsDots">
                <!-- JS will populate dots -->
            </div>
        </div>
    </div>
</section>

<!-- ==================== INLINE STYLES ==================== -->
<style>
    /* ============================================================
       BASE GLASS CIRCLE BUTTON
       ============================================================ */
    .new-arrival-card .btn-glass-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px solid rgba(200, 169, 81, 0.6);
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        color: var(--primary, #0F3D2E);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        z-index: 5;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        text-decoration: none;
        cursor: pointer;
        border: none;
        padding: 0;
        line-height: 1;
    }

    /* ============================================================
       DESKTOP – BUTTONS HIDDEN BY DEFAULT, SHOW ON HOVER
       ============================================================ */
    @media (hover: hover) {
        /* All buttons hidden initially */
        .new-arrival-card .wishlist-btn,
        .new-arrival-card .add-to-bag-btn {
            opacity: 0;
            pointer-events: none;
            bottom: -50px !important;
        }

        .new-arrival-card .view-btn {
            opacity: 0;
            pointer-events: none;
            right: -50px !important;
        }

        /* Show on card hover – same positions */
        .new-arrival-card:hover .wishlist-btn,
        .new-arrival-card:hover .add-to-bag-btn {
            opacity: 1;
            pointer-events: all;
            bottom: 8px !important;
        }

        .new-arrival-card:hover .view-btn {
            opacity: 1;
            pointer-events: all;
            right: 12px !important;
        }
    }

    /* ============================================================
       MOBILE / TOUCH – BUTTONS ALWAYS VISIBLE IN SAME PLACE
       ============================================================ */
    @media (hover: none) and (pointer: coarse) {
        .new-arrival-card .btn-glass-circle {
            opacity: 1 !important;
            pointer-events: all !important;
        }

        .new-arrival-card .wishlist-btn,
        .new-arrival-card .add-to-bag-btn {
            bottom: 8px !important;
        }

        .new-arrival-card .view-btn {
            right: 12px !important;
        }
    }

    /* ============================================================
       BUTTON HOVER EFFECTS (both desktop & mobile tap)
       ============================================================ */
    .btn-glass-circle:hover {
        background: rgba(200, 169, 81, 0.2);
        border-color: var(--accent, #C8A951);
        transform: scale(1.15);
        color: var(--accent, #C8A951);
    }

    .btn-glass-circle:active {
        transform: scale(0.9);
    }

    /* ============================================================
       WISHLIST ACTIVE
       ============================================================ */
    .wishlist-btn.active i {
        font-weight: 900;
        color: var(--accent, #C8A951);
    }

    /* ============================================================
       ARROWS
       ============================================================ */
    .new-arrival-arrow {
        transition: all 0.3s ease;
        border: 2px solid var(--lightgray, #F0EDE8) !important;
        background: var(--white, #FFFFFF) !important;
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .new-arrival-arrow:hover {
        border-color: var(--accent, #C8A951) !important;
        background: var(--accent, #C8A951) !important;
    }
    .new-arrival-arrow:hover i {
        color: var(--white, #FFFFFF) !important;
    }

    /* ============================================================
       CARD SIZING – RESPONSIVE
       ============================================================ */
    .new-arrival-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        min-width: 200px;
        flex-shrink: 0;
    }

    .new-arrival-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.06);
    }

    /* ============================================================
       RESPONSIVE – CARD WIDTH & GAP
       ============================================================ */
    @media (max-width: 991.98px) {
        .new-arrival-card {
            min-width: 200px;
            max-width: 240px !important;
        }
        .new-arrival-card .btn-glass-circle {
            width: 34px;
            height: 34px;
            font-size: 0.85rem;
        }
        .new-arrival-arrow {
            width: 38px;
            height: 38px;
        }
        .new-arrival-arrow i {
            font-size: 1rem !important;
        }
    }

    @media (max-width: 767.98px) {
        .new-arrival-card {
            min-width: 170px;
            max-width: 200px !important;
            padding: 0.75rem !important;
            border-radius: 14px !important;
        }
        .new-arrival-card .btn-glass-circle {
            width: 28px;
            height: 28px;
            font-size: 0.7rem;
        }
        .new-arrival-card .wishlist-btn,
        .new-arrival-card .add-to-bag-btn {
            bottom: 6px !important;
        }
        .new-arrival-card .view-btn {
            right: 8px !important;
            top: 8px !important;
        }
        .new-arrival-arrow {
            width: 32px;
            height: 32px;
        }
        .new-arrival-arrow i {
            font-size: 0.85rem !important;
        }
        .d-sm-flex {
            display: none !important;
        }
    }

    @media (max-width: 575.98px) {
        .new-arrival-card {
            min-width: 150px;
            max-width: 170px !important;
            padding: 0.5rem !important;
            border-radius: 12px !important;
        }
        .new-arrival-card .btn-glass-circle {
            width: 24px;
            height: 24px;
            font-size: 0.6rem;
        }
        .new-arrival-card .wishlist-btn,
        .new-arrival-card .add-to-bag-btn {
            bottom: 4px !important;
        }
        .new-arrival-card .view-btn {
            right: 6px !important;
            top: 6px !important;
        }
        .new-arrival-card .badge {
            font-size: 0.45rem !important;
            padding: 2px 8px !important;
        }
        .overflow-hidden {
            margin: 0 5px !important;
        }
        .gap-3 {
            gap: 0.5rem !important;
        }
    }

    @media (max-width: 380px) {
        .new-arrival-card {
            min-width: 130px;
            max-width: 150px !important;
            padding: 0.35rem !important;
            border-radius: 10px !important;
        }
        .new-arrival-card .btn-glass-circle {
            width: 20px;
            height: 20px;
            font-size: 0.5rem;
        }
        .new-arrival-card .wishlist-btn,
        .new-arrival-card .add-to-bag-btn {
            bottom: 3px !important;
        }
        .new-arrival-card .view-btn {
            right: 4px !important;
            top: 4px !important;
        }
        .new-arrival-card .badge {
            font-size: 0.4rem !important;
            padding: 1px 6px !important;
        }
    }
</style>