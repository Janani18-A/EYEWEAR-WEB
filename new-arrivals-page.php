<?php
// new-arrivals-page.php – New Arrivals Luxury Edition (Combined)
include 'templates/header.php';
include 'templates/navbar.php';
?>

<!-- ============================================================ -->
<!-- 1. HERO SECTION                                              -->
<!-- ============================================================ -->
<section class="position-relative overflow-hidden d-flex align-items-center new-arrivals-hero" style="min-height: 85vh; background: #0F3D2E;">
    <div class="hero-bg-image position-absolute top-0 start-0 w-100 h-100" style="background: url('assets/images/new-arrivals-hero.jpg') center/cover no-repeat; animation: kenBurns 20s ease infinite alternate;"></div>
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to right, rgba(15,61,46,0.9), rgba(15,61,46,0.4));"></div>
    <div class="container position-relative text-white py-5 py-lg-0">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <span class="badge bg-gold text-emerald px-3 py-2 rounded-pill mb-3 shimmer">NEW ARRIVALS 2026</span>
                <h1 class="display-2 fw-bold mb-3" style="font-family: 'Poppins', sans-serif;">Fresh Styles.<br><span class="text-gold">Bold Vision.</span></h1>
                <p class="lead mb-4 text-white-70">Discover the latest eyewear crafted for modern lifestyles.</p>
                <a href="#newArrivalsGrid" class="btn btn-emerald btn-lg px-5">Explore Collection</a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 2. STATS – Premium Frosted Glass                              -->
<!-- ============================================================ -->
<section class="bg-emerald py-5 position-relative overflow-hidden">

    <div class="position-absolute top-0 start-0 w-100 h-100" style="pointer-events: none; z-index: 0;">
        <div class="position-absolute rounded-circle" 
             style="width: 350px; height: 350px; top: -80px; left: -80px; 
                    background: radial-gradient(circle, rgba(212,175,55,0.15), transparent 70%);
                    filter: blur(80px);">
        </div>
        <div class="position-absolute rounded-circle" 
             style="width: 400px; height: 400px; bottom: -120px; right: -100px; 
                    background: radial-gradient(circle, rgba(212,175,55,0.12), transparent 70%);
                    filter: blur(100px);">
        </div>
        <div class="position-absolute rounded-circle" 
             style="width: 200px; height: 200px; top: 40%; left: 50%; 
                    background: radial-gradient(circle, rgba(212,175,55,0.06), transparent 70%);
                    filter: blur(60px); transform: translateX(-50%);">
        </div>
    </div>

    <div class="container position-relative" style="z-index: 1;">
        <div class="row g-4">
            <?php
            $stats = [
                ['150+', 'New Frames'],
                ['25+', 'New Shades'],
                ['10+', 'Premium Collections'],
                ['2026', 'Latest Season']
            ];
            foreach ($stats as $stat):
            ?>
            <div class="col-6 col-md-3">
                <div class="glass-stats-card text-center p-4 rounded-4 h-100">
                    <div class="display-4 fw-bold text-gold mb-2 stats-number"><?= $stat[0]; ?></div>
                    <p class="text-white-70 mb-0 fw-semibold stats-label"><?= $stat[1]; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 3. JUST DROPPED – Compact Cards                              -->
<!-- ============================================================ -->
<section class="bg-cream py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-gold text-emerald px-3 py-2 rounded-pill mb-2">JUST DROPPED</span>
            <h2 class="display-5 fw-bold text-navy mt-2" style="font-family: 'Poppins', sans-serif;">Newest Picks This Season</h2>
        </div>
        <div class="row g-3 justify-content-center"> <!-- reduced gap -->
            <?php
            $featured = [
                ['new-1.jpg', 'Crystal Clear', 1999, '₹1,999'],
                ['new-3.jpg', 'AirLite Titanium', 3999, '₹3,999'],
                ['new-5.jpg', 'AirLite Rimless', 4499, '₹4,499'],
                ['new-7.jpg', 'Heritage Round', 3199, '₹3,199']
            ];
            foreach ($featured as $prod):
            ?>
                <div class="col-6 col-lg-3">
                    <div class="product-card h-100 d-flex flex-column p-2 rounded-3 border bg-white"> <!-- reduced padding -->
                        <div class="position-relative bg-light rounded-3 mb-2 text-center overflow-hidden" style="height: 140px;"> <!-- reduced height -->
                            <img src="assets/images/<?= $prod[0]; ?>" alt="<?= $prod[1]; ?>" class="w-100 h-100" style="object-fit: cover; object-position: center;">
                            <span class="product-badge bg-gold text-emerald" style="white-space: nowrap; padding: 0.15rem 0.6rem; font-size: 0.55rem;">NEW</span>
                            <button class="btn-glass-circle wishlist-btn position-absolute" style="left: 8px; width: 32px; height: 32px; font-size: 0.8rem;"
                                data-id="<?= pathinfo($prod[0], PATHINFO_FILENAME); ?>"
                                data-name="<?= $prod[1]; ?>"
                                data-img="assets/images/<?= $prod[0]; ?>"
                                data-price="<?= $prod[2]; ?>"
                                data-color="default"
                                data-size="medium"
                                title="Add to Wishlist">
                                <i class="bi bi-heart"></i>
                            </button>
                            <button class="btn-glass-circle add-to-bag-btn position-absolute" style="right: 8px; width: 32px; height: 32px; font-size: 0.8rem;"
                                data-id="<?= pathinfo($prod[0], PATHINFO_FILENAME); ?>"
                                data-name="<?= $prod[1]; ?>"
                                data-img="assets/images/<?= $prod[0]; ?>"
                                data-price="<?= $prod[2]; ?>"
                                data-color="default"
                                data-size="medium"
                                title="Add to Cart">
                                <i class="bi bi-bag"></i>
                            </button>
                        </div>
                        <h3 class="h6 fw-bold text-navy mb-0 small"><?= $prod[1]; ?></h3> <!-- small class added -->
                        <div class="d-flex justify-content-between align-items-center mt-1"> <!-- reduced margin -->
                            <span class="fw-bold text-navy small"><?= $prod[3]; ?></span>
                            <span class="text-gold small">★★★★★</span>
                        </div>
                        <a href="product.php?id=<?= pathinfo($prod[0], PATHINFO_FILENAME); ?>" class="btn glass-order-btn w-100 mt-1 text-decoration-none py-1 small"> <!-- reduced padding -->
                            <i class="bi bi-box me-1"></i> Order Now
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 4. SHOP BY COLLECTION                                        -->
<!-- ============================================================ -->
<section class="bg-white py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-navy" style="font-family: 'Poppins', sans-serif;">Shop By Collection</h2>
        </div>
        <div class="row g-4">
            <?php
            $collections = [
                ['Men', 'collection-men.jpg', 'category.php?cat=men'],
                ['Women', 'collection-women.jpg', 'category.php?cat=women'],
                ['Kids', 'collection-kids.jpg', 'category.php?cat=kids'],
                ['Premium', 'collection-premium.jpg', 'category.php?cat=premium']
            ];
            foreach ($collections as $col):
            ?>
            <div class="col-6 col-lg-3">
                <a href="<?= $col[2]; ?>" class="text-decoration-none">
                    <div class="card border-0 rounded-4 overflow-hidden shadow-sm h-100 collection-card">
                        <img src="assets/images/<?= $col[1]; ?>" class="card-img-top" alt="<?= $col[0]; ?>" style="height: 280px; object-fit: cover; transition: transform 0.5s;">
                        <div class="card-img-overlay d-flex align-items-end p-3" style="background: linear-gradient(to top, rgba(15,61,46,0.8), transparent);">
                            <h3 class="text-white fw-bold mb-0 collection-title"><?= $col[0]; ?></h3>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 5. SEASON EDIT                                               -->
<!-- ============================================================ -->
<section class="bg-cream py-5 season-edit-section">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="assets/images/season-edit-model.jpg" alt="Season Edit" class="w-100 rounded-4 shadow-lg season-edit-img" style="max-height: 700px; object-fit: cover; object-position: center 15%;">
            </div>
            <div class="col-lg-6">
                <span class="text-gold text-uppercase fw-bold small">The New Season Edit</span>
                <h2 class="display-4 fw-bold text-navy mt-2" style="font-family: 'Poppins', sans-serif;">Designed for modern lifestyles.</h2>
                <p class="lead text-muted mt-3">Premium materials. Lightweight comfort. Timeless aesthetics.</p>
                <ul class="list-unstyled mt-4">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-gold me-2"></i> Ultra‑lightweight frames</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-gold me-2"></i> Hand‑polished finishes</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-gold me-2"></i> Blue‑light protection</li>
                </ul>
                <a href="category.php?cat=premium" class="btn btn-emerald btn-lg mt-3">Explore Collection</a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 6. NEW ARRIVALS GRID – Compact Cards                        -->
<!-- ============================================================ -->
<section id="newArrivalsGrid" class="bg-white py-5">
    <div class="container">
        <div class="text-center mb-4"> <!-- reduced margin -->
            <h2 class="display-5 fw-bold text-navy" style="font-family: 'Poppins', sans-serif;">Explore New Arrivals</h2>
        </div>
        <div class="row g-3"> <!-- reduced gap -->
            <?php
            $products = [
                ['new-1.jpg', 'Crystal Clear', 'Transparent • Modern', 1999, '₹1,999'],
                ['new-2.jpg', 'Heritage Square', 'Acetate • Retro Vibes', 2499, '₹2,499'],
                ['new-3.jpg', 'AirLite Titanium', 'Titanium • Feather Light', 3999, '₹3,999'],
                ['new-4.jpg', 'Signature Tortoise', 'Tortoiseshell • Timeless', 2799, '₹2,799'],
                ['new-5.jpg', 'AirLite Rimless', 'Titanium • Barely There', 4499, '₹4,499'],
                ['new-6.jpg', 'VisionGuard Blue', 'Blue‑Light • Digital Life', 2299, '₹2,299'],
                ['new-7.jpg', 'Heritage Round', 'Tortoiseshell • Vintage', 3199, '₹3,199'],
                ['new-8.jpg', 'Amber Crystal', 'Crystal Acetate • Warm Glow', 2599, '₹2,599'],
            ];
            foreach ($products as $prod):
            ?>
            <div class="col-6 col-md-4 grid-item">
                <div class="product-card h-100 d-flex flex-column p-2 rounded-3 border bg-white"> <!-- reduced padding -->
                    <div class="position-relative bg-light rounded-3 mb-2 text-center overflow-hidden" style="height: 160px;"> <!-- reduced height -->
                        <img src="assets/images/<?= $prod[0]; ?>" alt="<?= $prod[1]; ?>" class="w-100 h-100" style="object-fit: cover; object-position: center;">
                        <span class="product-badge bg-gold text-emerald" style="white-space: nowrap; padding: 0.15rem 0.6rem; font-size: 0.55rem;">NEW</span>
                        <button class="btn-glass-circle wishlist-btn position-absolute" style="left: 8px; width: 32px; height: 32px; font-size: 0.8rem;"
                            data-id="<?= pathinfo($prod[0], PATHINFO_FILENAME); ?>"
                            data-name="<?= $prod[1]; ?>"
                            data-img="assets/images/<?= $prod[0]; ?>"
                            data-price="<?= $prod[3]; ?>"
                            data-color="default"
                            data-size="medium"
                            title="Add to Wishlist">
                            <i class="bi bi-heart"></i>
                        </button>
                        <button class="btn-glass-circle add-to-bag-btn position-absolute" style="right: 8px; width: 32px; height: 32px; font-size: 0.8rem;"
                            data-id="<?= pathinfo($prod[0], PATHINFO_FILENAME); ?>"
                            data-name="<?= $prod[1]; ?>"
                            data-img="assets/images/<?= $prod[0]; ?>"
                            data-price="<?= $prod[3]; ?>"
                            data-color="default"
                            data-size="medium"
                            title="Add to Cart">
                            <i class="bi bi-bag"></i>
                        </button>
                    </div>
                    <h3 class="h6 fw-bold text-navy mb-0 small"><?= $prod[1]; ?></h3>
                    <p class="text-muted small mb-1"><?= $prod[2]; ?></p> <!-- reduced margin -->
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="fw-bold text-navy small"><?= $prod[4]; ?></span>
                        <span class="text-gold small">★★★★★</span>
                    </div>
                    <a href="product.php?id=<?= pathinfo($prod[0], PATHINFO_FILENAME); ?>" class="btn glass-order-btn w-100 mt-1 text-decoration-none py-1 small">
                        <i class="bi bi-box me-1"></i> Order Now
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 7. EDITORIAL BANNER                                          -->
<!-- ============================================================ -->
<section class="position-relative overflow-hidden d-flex align-items-center editorial-banner" style="min-height: 80vh; background: url('assets/images/editorial-banner.jpg') center/cover no-repeat;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(15,61,46,0.7);"></div>
    <div class="container position-relative text-center text-white py-5">
        <h2 class="display-4 fw-bold mb-3 editorial-heading" style="font-family: 'Poppins', sans-serif;">SEE THE FUTURE<br><span class="text-gold">IN STYLE</span></h2>
        <p class="lead mb-4 text-white-70 editorial-subtext">Premium frames for every moment.</p>
        <a href="category.php" class="btn btn-emerald btn-lg px-5">Shop Now</a>
    </div>
</section>

<!-- ============================================================ -->
<!-- 8. NEWSLETTER                                                -->
<!-- ============================================================ -->
<?php include 'newsletter.php'; ?>


<!-- ========================== search-overlay.php   ================================== -->
<?php include 'search-overlay.php'; ?>

<!-- ============================================================ -->
<!-- FOOTER                                                       -->
<!-- ============================================================ -->
<?php include 'templates/footer.php'; ?>

<!-- ============================================================ -->
<!-- SCRIPTS                                                      -->
<!-- ============================================================ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>

<!-- ============================================================ -->
<!-- STYLES – Combined & Color-Replaced                           -->
<!-- ============================================================ -->
<style>
    /* ============================================================
       COLOR PALETTE (Replaced)
       ============================================================ */
    :root {
        --emerald: #0F3D2E;
        --emerald-light: #1B5E4A;
        --gold: #D4AF37;
        --gold-glow: rgba(212, 175, 55, 0.15);
        --cream: #FAF7F2;
        --white: #ffffff;
        --navy: #0A192F;
        --charcoal: #1a1a1e;
    }

    .bg-emerald { background: #0F3D2E !important; }
    .bg-cream { background: #FAF7F2 !important; }
    .bg-white { background: #ffffff !important; }
    .bg-gold { background: #D4AF37 !important; }
    .text-gold { color: #D4AF37 !important; }
    .text-emerald { color: #0F3D2E !important; }
    .text-navy { color: #0A192F !important; }
    .text-charcoal { color: #1a1a1e !important; }

    .btn-emerald {
        background: #0F3D2E !important;
        border-color: #0F3D2E !important;
        color: #fff !important;
        border-radius: 50px !important;
        padding: 12px 32px !important;
        font-weight: 600 !important;
        transition: all 0.3s ease !important;
    }
    .btn-emerald:hover {
        background: #1B5E4A !important;
        border-color: #1B5E4A !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(15, 61, 46, 0.25);
        color: #fff !important;
    }

    .badge.bg-gold {
        background: #D4AF37 !important;
        color: #0F3D2E !important;
    }

    /* ============================================================
       HERO – Ken Burns
       ============================================================ */
    @keyframes kenBurns {
        0% { transform: scale(1); }
        100% { transform: scale(1.08); }
    }

    @media (max-width: 991.98px) {
        .new-arrivals-hero { min-height: 70vh !important; }
    }
    @media (max-width: 767.98px) {
        .new-arrivals-hero { min-height: 60vh !important; }
        .new-arrivals-hero h1 { font-size: 2.5rem; }
    }
    @media (max-width: 575.98px) {
        .new-arrivals-hero { min-height: 55vh !important; }
        .new-arrivals-hero h1 { font-size: 2rem; }
    }

    /* ============================================================
       STATS – Frosted Glass
       ============================================================ */
    .glass-stats-card {
        background: rgba(255, 255, 255, 0.04);
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        border: 1px solid rgba(212, 175, 55, 0.2);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.35), 0 0 20px rgba(212, 175, 55, 0.05), inset 0 1px 0 rgba(255, 255, 255, 0.05);
        border-radius: 24px;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        min-height: 180px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .glass-stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.06), transparent);
        transition: left 0.8s ease;
        pointer-events: none;
    }

    .glass-stats-card:hover::before {
        left: 100%;
    }

    .glass-stats-card:hover {
        transform: translateY(-8px);
        background: rgba(255, 255, 255, 0.07);
        border-color: rgba(212, 175, 55, 0.45);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5), 0 0 30px rgba(212, 175, 55, 0.12), inset 0 1px 0 rgba(255, 255, 255, 0.08), 0 0 0 1px rgba(212, 175, 55, 0.15) inset;
    }

    .glass-stats-card::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 24px;
        background: radial-gradient(circle at center, rgba(212, 175, 55, 0.06), transparent 60%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
        z-index: -1;
    }

    .glass-stats-card:hover::after {
        opacity: 1;
    }

    .stats-number {
        font-weight: 700;
        text-shadow: 0 0 40px rgba(212, 175, 55, 0.1);
        letter-spacing: -0.5px;
        position: relative;
        z-index: 2;
    }

    .stats-label {
        font-weight: 400;
        font-size: 0.95rem;
        letter-spacing: 0.5px;
        position: relative;
        z-index: 2;
        color: rgba(255, 255, 255, 0.7) !important;
    }

    @media (max-width: 991.98px) {
        .glass-stats-card { min-height: 150px; padding: 1.5rem 1rem !important; border-radius: 20px !important; }
        .stats-number { font-size: 2.5rem !important; }
    }
    @media (max-width: 767.98px) {
        .glass-stats-card { min-height: 130px; border-radius: 16px !important; }
        .stats-number { font-size: 2.2rem !important; }
        .stats-label { font-size: 0.85rem !important; }
    }
    @media (max-width: 575.98px) {
        .glass-stats-card { min-height: 110px; padding: 1rem 0.8rem !important; border-radius: 14px !important; }
        .stats-number { font-size: 1.8rem !important; }
        .stats-label { font-size: 0.75rem !important; }
    }

    /* ============================================================
       PRODUCT CARDS – Floating Buttons
       ============================================================ */
    .product-card .btn-glass-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px solid rgba(212, 175, 55, 0.6);
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        color: #0A192F;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        bottom: -50px;
        opacity: 0;
        transition: bottom 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), opacity 0.3s ease;
        pointer-events: none;
        z-index: 5;
    }

    .product-card:hover .btn-glass-circle {
        bottom: 8px;
        opacity: 1;
        pointer-events: all;
    }

    .btn-glass-circle:hover {
        background: rgba(212, 175, 55, 0.2);
        border-color: #D4AF37;
        transform: scale(1.15);
        color: #D4AF37;
    }

    .wishlist-btn.active i {
        font-weight: 900;
        color: #D4AF37;
    }

    @media (hover: none) and (pointer: coarse) {
        .product-card .btn-glass-circle {
            bottom: 8px;
            opacity: 1;
            pointer-events: all;
        }
    }

    /* Glass Order Button */
    .glass-order-btn {
        background: rgba(212, 175, 55, 0.15);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid #D4AF37;
        color: #D4AF37;
        font-weight: 700;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .glass-order-btn:hover {
        background: #D4AF37;
        color: #0F3D2E;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
    }

    /* Product Badge */
    .product-badge {
        width:45px;
    position: absolute;
    top: 8px;
    left: 8px;          /* or right: 8px; if you want it on the right */
    padding: 0.1rem 0.3rem;   /* smaller padding */
    border-radius: 50px;
    font-size: 0.5rem;        /* smaller font */
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    background: #D4AF37;
    color: #0F3D2E;
    z-index: 2;
    white-space: nowrap;      /* ← IMPORTANT: prevents wrapping */
    line-height: 1.2;
}

    /* Responsive adjustments for cards */
    @media (max-width: 991.98px) {
        .product-card .btn-glass-circle { width: 36px; height: 36px; font-size: 0.9rem; }
    }
    @media (max-width: 767.98px) {
        .product-card .btn-glass-circle { width: 34px; height: 34px; }
        .glass-order-btn { font-size: 0.9rem; padding: 8px 12px; }
    }
    @media (max-width: 575.98px) {
        .product-card .btn-glass-circle { width: 32px; height: 32px; }
        .glass-order-btn { font-size: 0.85rem; padding: 6px 10px; }
    }

    /* ============================================================
       COLLECTIONS
       ============================================================ */
    .collection-card:hover img { transform: scale(1.05); }
    .collection-card {
        transition: border-color 0.3s, box-shadow 0.3s;
        border: 2px solid transparent;
    }
    .collection-card:hover {
        border-color: #D4AF37;
        box-shadow: 0 15px 35px rgba(212, 175, 55, 0.3);
    }

    @media (max-width: 991.98px) {
        .collection-card img { height: 220px !important; }
    }
    @media (max-width: 767.98px) {
        .collection-card img { height: 200px !important; }
        .collection-title { font-size: 1.2rem; }
    }
    @media (max-width: 575.98px) {
        .collection-card img { height: 180px !important; }
    }

    /* ============================================================
       SEASON EDIT
       ============================================================ */
    @media (max-width: 991.98px) {
        .season-edit-img { max-height: 450px !important; }
    }
    @media (max-width: 767.98px) {
        .season-edit-img { max-height: 350px !important; }
    }
    @media (max-width: 575.98px) {
        .season-edit-img { max-height: 280px !important; }
        .season-edit-section h2 { font-size: 1.8rem; }
    }

    /* ============================================================
       EDITORIAL BANNER
       ============================================================ */
    @media (max-width: 991.98px) {
        .editorial-banner { min-height: 50vh !important; }
        .editorial-heading { font-size: 2.5rem; }
    }
    @media (max-width: 767.98px) {
        .editorial-banner { min-height: 45vh !important; }
        .editorial-heading { font-size: 2rem; }
    }
    @media (max-width: 575.98px) {
        .editorial-banner { min-height: 40vh !important; }
        .editorial-heading { font-size: 1.8rem; }
        .editorial-subtext { font-size: 1rem; }
    }

    /* ============================================================
       SHIMMER ANIMATION
       ============================================================ */
    .shimmer {
        animation: shimmerPulse 3s ease-in-out infinite;
    }

    @keyframes shimmerPulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.8; transform: scale(0.98); }
    }

    /* ============================================================
       RESPONSIVE GRID ITEMS
       ============================================================ */
    .grid-item {
        transition: all 0.3s ease;
    }
    .grid-item:hover {
        transform: translateY(-4px);
    }

    /* ============================================================
       UTILITY – White text on emerald
       ============================================================ */
    .text-white-70 {
        color: rgba(255, 255, 255, 0.7) !important;
    }
    .text-white-50 {
        color: rgba(255, 255, 255, 0.5) !important;
    }
</style>

</body>
</html>