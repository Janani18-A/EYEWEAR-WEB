<!-- bestsellers.php – GLASSY WATERY GRID CARDS (Responsive) -->
<section class="bg-primary py-5">
    <div class="container py-4">
        <!-- Section Header – Responsive text -->
        <div class="text-center mb-5 reveal">
            <h2 class="display-5 display-md-4 display-lg-3 fw-bold text-white mb-3" style="font-family: 'Poppins', sans-serif;">
                Customer Favorites
            </h2>
            <p class="fs-5 fs-md-4 fs-lg-3 text-white-50">Discover the frames our customers love the most.</p>
        </div>

        <!-- Product Grid – responsive gutters -->
        <div class="row g-2 g-sm-3 g-md-4">
            <?php
            $products = [
                ['bs1.jpg', 'Executive Square', 'Metal • Professional Edge', '₹2,999', 'BESTSELLER'],
                ['bs2.jpg', 'Heritage Round', 'Tortoiseshell • Vintage Charm', '₹3,499', 'TRENDING'],
                ['bs3.jpg', 'Crystal Clear', 'Transparent Acetate • Minimalist', '₹2,499', 'HOT'],
                ['bs4.jpg', 'AirLite Rimless', 'Titanium • Ultra-Lightweight', '₹4,999', 'PREMIUM'],
                ['bs5.jpg', 'VisionGuard Pro', 'Blue-Light Filter • Anti-Glare', '₹2,799', 'ESSENTIAL'],
                ['bs6.jpg', 'Bella Cat Eye', 'Acetate • Hand-Polished', '₹3,299', ''],
                ['bs7.jpg', 'Urban Wayfarer', 'Polarized • UV400 Protected', '₹3,999', 'NEW'],
                ['bs8.jpg', 'Aviator Elite', 'Gold-Tone Metal • Timeless Icon', '₹5,499', 'LUXURY']
            ];

            foreach ($products as $product):
                $productId = pathinfo($product[0], PATHINFO_FILENAME);
                $numericPrice = intval(preg_replace('/[^0-9]/', '', $product[3]));
            ?>
                <div class="col-6 col-lg-3 grid-item">
                    <div class="product-card glassy-card h-100 d-flex flex-column rounded-3 position-relative overflow-hidden p-3 p-sm-2 p-md-3 p-lg-3">
                        <!-- Image Container – Responsive aspect ratio -->
                        <div class="position-relative bg-light rounded-3 mb-3 text-center" style="background: rgba(255,255,255,0.04) !important; aspect-ratio: 1 / 1; overflow: hidden; width: 100%;">
                            <img src="assets/images/<?php echo $product[0]; ?>"
                                alt="<?php echo $product[1]; ?>"
                                class="w-100 h-100" style="object-fit:cover; object-position: center;">
                            <?php if ($product[4]): ?>
                                <span class="product-badge bg-accent text-primary">
                                    <?php echo $product[4]; ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <!-- Product Details – Responsive text -->
                        <h3 class="h6 h-sm-6 h-md-5 fw-bold text-white mb-1 product-name"><?php echo $product[1]; ?></h3>
                        <p class="small text-white-50 mb-2 product-meta" style="font-size: clamp(0.65rem, 1.2vw, 0.85rem);"><?php echo $product[2]; ?></p>

                        <!-- Price + Rating -->
                        <div class="d-flex justify-content-between align-items-center mb-3 mt-auto">
                            <span class="h5 h-sm-5 h-md-5 fw-bold text-white mb-0 product-price"><?php echo $product[3]; ?></span>
                            <span class="small text-accent product-stars" style="font-size: clamp(0.5rem, 1vw, 0.8rem);">★★★★★</span>
                        </div>

                        <!-- Add to Cart – Responsive padding and font -->
                        <button class="add-to-cart w-100 rounded-pill py-2 py-sm-1 py-md-2 px-3 px-sm-2 px-md-3"
                            style="font-size: clamp(0.6rem, 1.2vw, 0.9rem);"
                            data-id="<?= $productId ?>"
                            data-name="<?= $product[1] ?>"
                            data-img="assets/images/<?= $product[0] ?>"
                            data-price="<?= $numericPrice ?>"
                            data-color="default"
                            data-size="medium">
                            Add to Cart
                        </button>

                        <!-- Order Button – Responsive size -->
                        <a href="product.php?id=<?php echo $productId; ?>" class="order-btn btn-glass-circle position-absolute"
                           style="width: clamp(28px, 4vw, 40px); height: clamp(28px, 4vw, 40px); font-size: clamp(0.6rem, 1vw, 1rem);">
                            <i class="bi bi-box"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- View All Button – Responsive padding -->
        <div class="text-center mt-5 reveal">
            <button class="btn-emerald btn-lg px-4 px-sm-5 py-2 py-sm-3 rounded-3" style="font-size: clamp(0.8rem, 1.5vw, 1.1rem);">
                View All Bestsellers
            </button>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- UPDATED CSS – GLASSY CARDS + RESPONSIVE TWEAKS              -->
<!-- ============================================================ -->
<style>
    /* ============================================================
       GLASSY CARD – Base
       ============================================================ */
    .glassy-card {
        background: rgba(255, 255, 255, 0.08) !important;
        backdrop-filter: blur(16px) !important;
        -webkit-backdrop-filter: blur(16px) !important;
        border: 1px solid rgba(255, 255, 255, 0.06) !important;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15) !important;
        transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1) !important;
        /* padding now handled by Bootstrap p-3 p-sm-2 p-md-3 p-lg-3 on the card */
    }

    .glassy-card:hover {
        transform: translateY(-10px);
        border-color: rgba(200, 169, 81, 0.08) !important;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25), 0 0 40px rgba(200, 169, 81, 0.03) !important;
        background: rgba(255, 255, 255, 0.12) !important;
    }

    /* ============================================================
       PRODUCT BADGE
       ============================================================ */
    .product-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: clamp(0.4rem, 1vw, 0.6rem);
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        padding: clamp(2px, 0.5vw, 6px) clamp(6px, 1.5vw, 14px);
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(200, 169, 81, 0.3);
        font-family: 'Poppins', sans-serif;
    }

    /* ============================================================
       ADD TO CART – Base
       ============================================================ */
    .add-to-cart {
        background: var(--primary, #0F3D2E);
        color: var(--white, #FFFFFF);
        font-weight: 600;
        border: none;
        border-radius: 50px;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        box-shadow: 0 4px 20px rgba(15, 61, 46, 0.08);
        backdrop-filter: blur(4px);
        position: relative;
        overflow: hidden;
        /* padding and font-size now handled by inline styles + Bootstrap classes */
    }

    .add-to-cart::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 50px;
        background: linear-gradient(135deg, rgba(255,255,255,0.05), transparent);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .add-to-cart:hover {
        background: var(--primary, #0F3D2E);
        color: var(--white, #FFFFFF);
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 12px 40px rgba(15, 61, 46, 0.2), 0 0 30px rgba(15, 61, 46, 0.04);
        backdrop-filter: blur(8px);
    }

    .add-to-cart:hover::before {
        opacity: 1;
    }

    /* ============================================================
       ORDER BUTTON – Responsive with clamp
       ============================================================ */
    .order-btn {
        border-radius: 50%;
        border: 1px solid rgba(15, 61, 46, 0.3);
        background: rgba(255, 255, 255, 0.10);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        color: var(--white, #FFFFFF);
        display: flex;
        align-items: center;
        justify-content: center;
        bottom: -50px;
        right: 16px;
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        z-index: 5;
        text-decoration: none;
        /* size now handled by inline clamp styles */
    }

    .product-card:hover .order-btn {
        bottom: 12px;
        opacity: 1;
    }

    .order-btn:hover {
        background: rgba(15, 61, 46, 0.15);
        border-color: var(--primary, #0F3D2E);
        transform: scale(1.1);
        color: var(--white, #FFFFFF);
        box-shadow: 0 0 30px rgba(15, 61, 46, 0.08);
    }

    /* ============================================================
       RESPONSIVE TWEAKS – PERFECT SCALING
       ============================================================ */
    
    /* ─── Tablet (≤991px) ─── */
    @media (max-width: 991.98px) {
        .glassy-card {
            padding: 0.85rem !important;
        }
        .product-name {
            font-size: 0.85rem !important;
        }
        .product-meta {
            font-size: 0.65rem !important;
        }
        .product-price {
            font-size: 0.95rem !important;
        }
        .product-stars {
            font-size: 0.55rem !important;
        }
    }

    /* ─── Mobile (≤575px) ─── */
    @media (max-width: 575.98px) {
        .glassy-card {
            padding: 0.5rem !important;
            border-radius: 14px !important;
        }

        /* Ensure images maintain aspect ratio */
        .glassy-card .position-relative.bg-light {
            aspect-ratio: 1 / 1 !important;
            height: auto !important;
            min-height: 0 !important;
            max-height: none !important;
            margin-bottom: 0.5rem !important;
        }

        /* Smaller text */
        .product-name {
            font-size: 0.7rem !important;
            margin-bottom: 0.1rem !important;
        }
        .product-meta {
            font-size: 0.55rem !important;
            margin-bottom: 0.2rem !important;
        }
        .product-price {
            font-size: 0.8rem !important;
        }
        .product-stars {
            font-size: 0.45rem !important;
        }

        .product-badge {
            font-size: 0.35rem !important;
            padding: 1px 6px !important;
            top: 5px !important;
            right: 5px !important;
        }

        /* Reduce gap between cards */
        .row.g-2 {
            --bs-gutter-y: 0.5rem !important;
            --bs-gutter-x: 0.5rem !important;
        }
    }

    /* ─── Very small phones (≤380px) ─── */
    @media (max-width: 380px) {
        .glassy-card {
            padding: 0.35rem !important;
            border-radius: 10px !important;
        }
        .product-name {
            font-size: 0.6rem !important;
        }
        .product-meta {
            font-size: 0.5rem !important;
        }
        .product-price {
            font-size: 0.7rem !important;
        }
        .product-stars {
            font-size: 0.4rem !important;
        }
        .product-badge {
            font-size: 0.3rem !important;
            padding: 1px 4px !important;
        }
        .row.g-2 {
            --bs-gutter-y: 0.3rem !important;
            --bs-gutter-x: 0.3rem !important;
        }
    }
</style>