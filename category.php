<?php
// category.php – Optiq Category Page (Combined with Search Filter System)
include 'templates/header.php';
include 'templates/navbar.php';
?>

<!-- ============================================================ -->
<!-- CATEGORY HEADER – Hero + Category Pills -->
<!-- ============================================================ -->
<section class="bg-white pt-5 pb-4" style="padding-top: 100px !important;">
    <div class="container">
        <!-- Search Bar -->
        <div class="search-bar-wrapper mx-auto position-relative" style="max-width: 650px;">
            <div class="glass-search-bar d-flex align-items-center p-2 rounded-pill bg-white bg-opacity-50 border border-gold border-opacity-25 backdrop-blur">
                <i class="bi bi-search text-navy-50 ms-3 fs-5"></i>
                <input type="text" id="categorySearchInput" class="form-control bg-transparent border-0 text-navy placeholder-navy-50 flex-grow-1 px-3 py-3" placeholder="Search frames, styles, or colours…" style="box-shadow: none;">
            </div>
        </div>

        <!-- Category Pills - Glassmorphism -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mt-4" id="categoryPills">
            <?php
            $categories = [
                'All',
                'Men',
                'Women',
                'Kids',
                'Sunglasses',
                'Computer Glasses',
                'Reading Glasses',
                'Premium',
                'Best Sellers',
                'New Arrivals',
                'Office',
                'Fashion',
                'Lightweight'
            ];
            foreach ($categories as $cat):
                $active = ($cat === 'All') ? 'active' : '';
            ?>
                <button class="btn category-pill glass <?= $active; ?>" data-category="<?= strtolower(str_replace(' ', '-', $cat)); ?>">
                    <?= $cat; ?>
                    <?php if ($active): ?>
                        <span class="pill-glow"></span>
                    <?php endif; ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- FILTER STRIP – Morphing Funnel Icon (Same as Search Page)    -->
<!-- ============================================================ -->
<section id="categoryFilterStrip" class="bg-cream py-3 border-top border-bottom sticky-top" style="top: 76px; z-index: 1020; backdrop-filter: blur(12px); background: rgba(247, 245, 240, 0.9);">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center gap-2 w-100">

            <!-- Morphing Funnel Icon -->
            <div class="filter-trigger-wrapper d-flex align-items-center gap-3" onclick="toggleDrawer()" style="cursor: pointer;">
                <div class="filter-icon" id="filterIcon">
                    <div class="line-group">
                        <span class="line l1"></span>
                        <span class="line l2"></span>
                        <span class="line l3"></span>
                    </div>
                    <div class="funnel-shape">
                        <svg viewBox="0 0 20 20" width="20" height="20">
                            <polygon points="0,5 14,5 20,10 14,15 0,15" class="funnel-body" />
                            <rect x="0" y="12" width="5" height="3" class="funnel-stem" />
                        </svg>
                    </div>
                </div>
                <span class="fw-bold text-primary d-none d-sm-inline" style="font-size: 0.95rem;">Filters</span>
            </div>

            <!-- Quick Chips -->
            <span class="text-muted small ms-2 d-none d-sm-inline">Quick:</span>
            <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 category-quick-chip" data-category="men" style="border-color: #dee2e6;">👔 Men</button>
            <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 category-quick-chip" data-category="women" style="border-color: #dee2e6;">👗 Women</button>
            <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 category-quick-chip" data-category="sunglasses" style="border-color: #dee2e6;">🕶 Sunglasses</button>

            <!-- Clear All -->
            <button class="btn btn-sm btn-link text-accent ms-auto" id="clearFiltersCategory" style="color: #C8A951 !important; font-weight: 600;">
                <i class="bi bi-x-circle"></i> Clear All
            </button>
        </div>

        <!-- Active Filter Tags -->
        <div class="d-flex flex-wrap gap-2 mt-2" id="activeFiltersCategory"></div>
    </div>
</section>

<!-- ============================================================ -->
<!-- PRODUCT GRID                                                  -->
<!-- ============================================================ -->
<section class="py-5">
    <div class="container">
        <div id="categoryProductGrid" class="row g-5">
            <?php
            $products = [
                // Men
                ['img' => 'men-1.jpg', 'name' => 'Rectangle Black Metal', 'price' => 2499, 'material' => 'Metal', 'shape' => 'rectangle', 'color' => 'black', 'size' => 'medium', 'gender' => 'men', 'type' => 'eyeglasses', 'category' => 'men', 'weight' => 'standard'],
                ['img' => 'men-2.jpg', 'name' => 'Round Silver Frame', 'price' => 2999, 'material' => 'Metal', 'shape' => 'round', 'color' => 'silver', 'size' => 'medium', 'gender' => 'men', 'type' => 'eyeglasses', 'category' => 'men', 'weight' => 'standard'],
                ['img' => 'men-3.jpg', 'name' => 'Aviator Gold Frame', 'price' => 3499, 'material' => 'Metal', 'shape' => 'aviator', 'color' => 'gold', 'size' => 'medium', 'gender' => 'men', 'type' => 'eyeglasses', 'category' => 'men', 'weight' => 'standard'],
                ['img' => 'men-4.jpg', 'name' => 'Wayfarer Black', 'price' => 1999, 'material' => 'Acetate', 'shape' => 'wayfarer', 'color' => 'black', 'size' => 'large', 'gender' => 'men', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'standard'],
                ['img' => 'men-5.jpg', 'name' => 'Rimless Office Frame', 'price' => 4999, 'material' => 'Titanium', 'shape' => 'rimless', 'color' => 'silver', 'size' => 'medium', 'gender' => 'men', 'type' => 'eyeglasses', 'category' => 'office', 'weight' => 'ultra-light'],
                ['img' => 'men-6.jpg', 'name' => 'Blue Light Glasses', 'price' => 2799, 'material' => 'TR90', 'shape' => 'rectangle', 'color' => 'black', 'size' => 'medium', 'gender' => 'men', 'type' => 'computer', 'category' => 'computer-glasses', 'weight' => 'ultra-light'],
                ['img' => 'men-7.jpg', 'name' => 'Transparent Frame', 'price' => 1999, 'material' => 'Acetate', 'shape' => 'square', 'color' => 'transparent', 'size' => 'medium', 'gender' => 'men', 'type' => 'eyeglasses', 'category' => 'fashion', 'weight' => 'standard'],
                ['img' => 'men-8.jpg', 'name' => 'Tortoise Shell Frame', 'price' => 3499, 'material' => 'Acetate', 'shape' => 'rectangle', 'color' => 'brown', 'size' => 'medium', 'gender' => 'men', 'type' => 'eyeglasses', 'category' => 'men', 'weight' => 'standard'],
                ['img' => 'men-9.jpg', 'name' => 'Sports Sunglasses', 'price' => 3999, 'material' => 'TR90', 'shape' => 'aviator', 'color' => 'black', 'size' => 'large', 'gender' => 'men', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'ultra-light'],
                ['img' => 'men-10.jpg', 'name' => 'Titanium Premium Frame', 'price' => 5999, 'material' => 'Titanium', 'shape' => 'rectangle', 'color' => 'gold', 'size' => 'medium', 'gender' => 'men', 'type' => 'eyeglasses', 'category' => 'premium', 'weight' => 'ultra-light'],
                // Women
                ['img' => 'women-1.jpg', 'name' => 'Cat Eye Black', 'price' => 3299, 'material' => 'Acetate', 'shape' => 'cateye', 'color' => 'black', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'women', 'weight' => 'standard'],
                ['img' => 'women-2.jpg', 'name' => 'Rose Gold Round', 'price' => 2999, 'material' => 'Metal', 'shape' => 'round', 'color' => 'gold', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'women', 'weight' => 'standard'],
                ['img' => 'women-3.jpg', 'name' => 'Transparent Fashion Frame', 'price' => 2499, 'material' => 'Acetate', 'shape' => 'square', 'color' => 'transparent', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'fashion', 'weight' => 'standard'],
                ['img' => 'women-4.jpg', 'name' => 'Geometric Frame', 'price' => 2799, 'material' => 'Acetate', 'shape' => 'geometric', 'color' => 'brown', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'women', 'weight' => 'standard'],
                ['img' => 'women-5.jpg', 'name' => 'Blue Light Glasses', 'price' => 2999, 'material' => 'TR90', 'shape' => 'rectangle', 'color' => 'black', 'size' => 'medium', 'gender' => 'women', 'type' => 'computer', 'category' => 'computer-glasses', 'weight' => 'ultra-light'],
                ['img' => 'women-6.jpg', 'name' => 'Office Frame', 'price' => 3499, 'material' => 'Metal', 'shape' => 'rectangle', 'color' => 'silver', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'office', 'weight' => 'standard'],
                ['img' => 'women-7.jpg', 'name' => 'Luxury Gold Frame', 'price' => 5499, 'material' => 'Metal', 'shape' => 'aviator', 'color' => 'gold', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'premium', 'weight' => 'ultra-light'],
                ['img' => 'women-8.jpg', 'name' => 'Oversized Sunglasses', 'price' => 3499, 'material' => 'Acetate', 'shape' => 'wayfarer', 'color' => 'black', 'size' => 'large', 'gender' => 'women', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'standard'],
                ['img' => 'women-9.jpg', 'name' => 'Tortoise Cat Eye', 'price' => 3199, 'material' => 'Acetate', 'shape' => 'cateye', 'color' => 'brown', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'women', 'weight' => 'standard'],
                ['img' => 'women-10.jpg', 'name' => 'Rimless Frame', 'price' => 4499, 'material' => 'Titanium', 'shape' => 'rimless', 'color' => 'silver', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'women', 'weight' => 'ultra-light'],
                // Kids
                ['img' => 'kids-1.jpg', 'name' => 'Flexible Kids Frame', 'price' => 1299, 'material' => 'TR90', 'shape' => 'round', 'color' => 'blue', 'size' => 'small', 'gender' => 'kids', 'type' => 'eyeglasses', 'category' => 'kids', 'weight' => 'ultra-light'],
                ['img' => 'kids-2.jpg', 'name' => 'Colorful Kids Glasses', 'price' => 1499, 'material' => 'TR90', 'shape' => 'rectangle', 'color' => 'multicolor', 'size' => 'small', 'gender' => 'kids', 'type' => 'eyeglasses', 'category' => 'kids', 'weight' => 'ultra-light'],
                ['img' => 'kids-3.jpg', 'name' => 'School Frames', 'price' => 999, 'material' => 'Plastic', 'shape' => 'rectangle', 'color' => 'black', 'size' => 'small', 'gender' => 'kids', 'type' => 'eyeglasses', 'category' => 'kids', 'weight' => 'standard'],
                ['img' => 'kids-4.jpg', 'name' => 'Flexi-Hinge Kids', 'price' => 1799, 'material' => 'TR90', 'shape' => 'round', 'color' => 'red', 'size' => 'small', 'gender' => 'kids', 'type' => 'eyeglasses', 'category' => 'kids', 'weight' => 'ultra-light'],
                ['img' => 'kids-5.jpg', 'name' => 'Unbreakable Kids Frame', 'price' => 2199, 'material' => 'TR90', 'shape' => 'square', 'color' => 'green', 'size' => 'small', 'gender' => 'kids', 'type' => 'eyeglasses', 'category' => 'kids', 'weight' => 'ultra-light'],
                // Sunglasses
                ['img' => 'sun-1.jpg', 'name' => 'Classic Aviator Sunglasses', 'price' => 2999, 'material' => 'Metal', 'shape' => 'aviator', 'color' => 'gold', 'size' => 'medium', 'gender' => 'unisex', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'standard'],
                ['img' => 'sun-2.jpg', 'name' => 'Polarized Wayfarer', 'price' => 3499, 'material' => 'Acetate', 'shape' => 'wayfarer', 'color' => 'black', 'size' => 'medium', 'gender' => 'unisex', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'standard'],
                ['img' => 'sun-3.jpg', 'name' => 'UV400 Sport Sunglasses', 'price' => 2499, 'material' => 'TR90', 'shape' => 'aviator', 'color' => 'black', 'size' => 'large', 'gender' => 'unisex', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'ultra-light'],
                ['img' => 'sun-4.jpg', 'name' => 'Retro Round Sunglasses', 'price' => 1999, 'material' => 'Metal', 'shape' => 'round', 'color' => 'silver', 'size' => 'medium', 'gender' => 'unisex', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'standard'],
                ['img' => 'sun-5.jpg', 'name' => 'Cat Eye Sunglasses', 'price' => 3299, 'material' => 'Acetate', 'shape' => 'cateye', 'color' => 'black', 'size' => 'medium', 'gender' => 'women', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'standard'],
                // Computer Glasses
                ['img' => 'computer-1.jpg', 'name' => 'Blue Cut Rectangle', 'price' => 2799, 'material' => 'TR90', 'shape' => 'rectangle', 'color' => 'black', 'size' => 'medium', 'gender' => 'unisex', 'type' => 'computer', 'category' => 'computer-glasses', 'weight' => 'ultra-light'],
                ['img' => 'computer-2.jpg', 'name' => 'Anti-Glare Round', 'price' => 2499, 'material' => 'Acetate', 'shape' => 'round', 'color' => 'brown', 'size' => 'medium', 'gender' => 'unisex', 'type' => 'computer', 'category' => 'computer-glasses', 'weight' => 'standard'],
                ['img' => 'computer-3.jpg', 'name' => 'Gaming Glasses', 'price' => 3299, 'material' => 'TR90', 'shape' => 'wayfarer', 'color' => 'black', 'size' => 'large', 'gender' => 'men', 'type' => 'computer', 'category' => 'computer-glasses', 'weight' => 'ultra-light'],
                ['img' => 'computer-4.jpg', 'name' => 'Ultra-Light Computer Glasses', 'price' => 3999, 'material' => 'Titanium', 'shape' => 'rectangle', 'color' => 'silver', 'size' => 'medium', 'gender' => 'unisex', 'type' => 'computer', 'category' => 'computer-glasses', 'weight' => 'ultra-light'],
                ['img' => 'computer-5.jpg', 'name' => 'Premium Blue Blockers', 'price' => 4999, 'material' => 'Metal', 'shape' => 'rectangle', 'color' => 'gold', 'size' => 'medium', 'gender' => 'unisex', 'type' => 'computer', 'category' => 'computer-glasses', 'weight' => 'standard'],
            ];

            foreach ($products as $prod):
            ?>
                <div class="col-lg-4 col-md-6 product-card grid-item"
                    data-gender="<?= $prod['gender']; ?>"
                    data-type="<?= $prod['type']; ?>"
                    data-shape="<?= $prod['shape']; ?>"
                    data-material="<?= strtolower($prod['material']); ?>"
                    data-color="<?= $prod['color']; ?>"
                    data-size="<?= $prod['size']; ?>"
                    data-weight="<?= $prod['weight']; ?>"
                    data-category="<?= $prod['category']; ?>"
                    style="display: block;">
                    <div class="card h-100 border-0 shadow-none">
                        <div class="position-relative">
                            <img src="assets/images/<?= $prod['img']; ?>" class="card-img-top" alt="<?= $prod['name']; ?>" style="height: 200px; width: 100%; object-fit: contain;background: #ffffff; padding: 4px;">
                            <!-- YOUR ORIGINAL "NEW" BADGE – KEPT EXACTLY AS YOU WANT -->
                            <span class="badge bg-gold text-navy position-absolute top-0 start-0 m-2">NEW</span>
                            <button class="btn p-0 position-absolute top-0 end-0 m-2 wishlist-product-btn"
                                data-id="<?= pathinfo($prod['img'], PATHINFO_FILENAME); ?>"
                                data-name="<?= $prod['name']; ?>"
                                data-img="assets/images/<?= $prod['img']; ?>"
                                data-price="<?= $prod['price']; ?>"
                                data-color="<?= $prod['color']; ?>"
                                data-size="<?= $prod['size']; ?>"
                                style="background: none; border: none; z-index: 5; filter: drop-shadow(0 2px 8px rgba(0,0,0,0.3));">
                                <i class="bi bi-heart fs-5 text-dark" style="font-size: 1.2rem;"></i>
                            </button>
                        </div>
                        <div class="card-body text-center d-flex flex-column">
                            <h5 class="product-name fw-bold text-navy"><?= $prod['name']; ?></h5>
                            <p class="product-material text-muted small"><?= $prod['material']; ?> · <?= ucfirst($prod['shape']); ?></p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-navy">₹<?= number_format($prod['price']); ?></span>
                                    <span class="text-gold">★★★★★</span>
                                </div>
                                <div class="row g-2 mt-2">
                                    <div class="col-6">
                                        <button class="btn btn-primary w-100 add-to-bag-btn"
                                            style="background: #0F3D2E !important; border: none !important; border-radius: 30px !important; padding: 8px 12px !important; font-size: 0.85rem !important;"
                                            data-id="<?= pathinfo($prod['img'], PATHINFO_FILENAME); ?>"
                                            data-name="<?= $prod['name']; ?>"
                                            data-img="assets/images/<?= $prod['img']; ?>"
                                            data-price="<?= $prod['price']; ?>"
                                            data-color="<?= $prod['color']; ?>"
                                            data-size="<?= $prod['size']; ?>">
                                            <i class="bi bi-bag me-1"></i> Add
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-outline-primary w-100 order-btn"
                                            style="border-color: #0F3D2E !important; color: #0F3D2E !important; border-radius: 30px !important; padding: 8px 12px !important; font-size: 0.85rem !important;"
                                            onclick="window.location.href='product.php?id=<?= pathinfo($prod['img'], PATHINFO_FILENAME); ?>'">
                                            <i class="bi bi-box me-1"></i> Order
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- RELATED PRODUCTS CAROUSEL – WITH SHUTTER ANIMATION (FIXED GAP) -->
<!-- ============================================================ -->
<section class="bg-light py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="text-navy fw-bold mb-0">
                <i class="bi bi-star text-gold me-2"></i>You May Also Like
            </h3>
            <a href="#" class="text-gold text-decoration-none small fw-bold">View All →</a>
        </div>
        <div class="related-wrapper position-relative">
            <button class="scroll-arrow related-prev" id="relatedPrev" aria-label="Previous">
                <i class="bi bi-chevron-left"></i>
            </button>
            <div class="scroll-container d-flex gap-3 pb-2" id="relatedScroll">
                <?php
                $related = [
                    ['img' => 'bs1.jpg', 'name' => 'Executive Square', 'price' => 2999],
                    ['img' => 'bs2.jpg', 'name' => 'Heritage Round', 'price' => 3499],
                    ['img' => 'bs3.jpg', 'name' => 'Crystal Clear', 'price' => 2499],
                    ['img' => 'new-1.jpg', 'name' => 'Crystal Clear New', 'price' => 1999],
                    ['img' => 'new-3.jpg', 'name' => 'AirLite Titanium', 'price' => 3999],
                    ['img' => 'sun-4.jpg', 'name' => 'Retro Round Sunglasses', 'price' => 1999],
                ];
                foreach ($related as $rel):
                ?>
                    <div class="related-card bg-white rounded-4 border flex-shrink-0 position-relative living-card">
                        <!-- Shutter Panels -->
                        <div class="shutter-panel shutter-top"></div>
                        <div class="shutter-panel shutter-bottom"></div>

                        <!-- Image -->
                        <div class="card-img-wrapper">
                            <img src="assets/images/<?= $rel['img']; ?>" class="card-img w-100" alt="<?= $rel['name']; ?>">
                        </div>

                        <!-- Wishlist Heart (Always visible) -->
                        <button class="btn p-0 position-absolute top-0 end-0 m-2 related-wishlist-btn"
                            data-id="<?= pathinfo($rel['img'], PATHINFO_FILENAME); ?>"
                            data-name="<?= $rel['name']; ?>"
                            data-img="assets/images/<?= $rel['img']; ?>"
                            data-price="<?= $rel['price']; ?>"
                            data-color="default"
                            data-size="medium"
                            style="background: none; border: none; z-index: 5; filter: drop-shadow(0 2px 8px rgba(0,0,0,0.2));">
                            <i class="bi bi-heart fs-4 text-dark" style="text-shadow: 0 0 10px rgba(0,0,0,0.3);"></i>
                        </button>

                        <!-- Card Details (Hidden initially, slides up on hover) -->
                        <div class="card-details">
                            <div class="card-details-inner">
                                <p class="fw-bold small text-navy mb-0"><?= $rel['name']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-gold fw-bold">₹<?= number_format($rel['price']); ?></span>
                                    <span class="text-gold small">★★★★★</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Actions (Hidden initially, slides up on hover with stagger) -->
                        <div class="card-actions">
                            <div class="card-actions-inner d-flex justify-content-center gap-3">
                                <button class="action-icon add-to-bag-btn"
                                    data-id="<?= pathinfo($rel['img'], PATHINFO_FILENAME); ?>"
                                    data-name="<?= $rel['name']; ?>"
                                    data-img="assets/images/<?= $rel['img']; ?>"
                                    data-price="<?= $rel['price']; ?>"
                                    data-color="default"
                                    data-size="medium"
                                    title="Add to Cart">
                                    <i class="bi bi-bag"></i>
                                </button>
                                <a href="product.php?id=<?= pathinfo($rel['img'], PATHINFO_FILENAME); ?>"
                                    class="action-icon" title="View Product">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="scroll-arrow related-next" id="relatedNext" aria-label="Next">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- LEFT DRAWER – Same as Search Page                            -->
<!-- ============================================================ -->
<div id="filterOverlay" class="drawer-overlay"></div>

<div id="filterDrawer" class="filter-drawer">
    <div class="drawer-header d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary mb-0" style="font-family: 'Poppins', sans-serif;">
            <i class="bi bi-sliders2 me-2 text-accent"></i> Refine Vibe
        </h4>
        <button id="closeDrawerBtn" class="btn-close-custom">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <div class="organic-stepper-container mb-4" id="organicStepper">
        <div class="stepper-track">
            <div class="step-item active" data-step="1">
                <div class="step-circle"><i class="bi bi-person"></i></div>
                <span class="step-label">Gender</span>
            </div>
            <div class="step-connector active">
                <svg width="100%" height="20" viewBox="0 0 100 20">
                    <path class="connector-path" d="M 0,10 C 25,10 75,10 100,10" />
                </svg>
            </div>
            <div class="step-item" data-step="2">
                <div class="step-circle"><i class="bi bi-eyeglasses"></i></div>
                <span class="step-label">Type</span>
            </div>
            <div class="step-connector">
                <svg width="100%" height="20" viewBox="0 0 100 20">
                    <path class="connector-path" d="M 0,10 C 25,10 75,10 100,10" />
                </svg>
            </div>
            <div class="step-item" data-step="3">
                <div class="step-circle"><i class="bi bi-bounding-box-circles"></i></div>
                <span class="step-label">Shape</span>
            </div>
            <div class="step-connector">
                <svg width="100%" height="20" viewBox="0 0 100 20">
                    <path class="connector-path" d="M 0,10 C 25,10 75,10 100,10" />
                </svg>
            </div>
            <div class="step-item" data-step="4">
                <div class="step-circle"><i class="bi bi-palette"></i></div>
                <span class="step-label">Details</span>
            </div>
        </div>
    </div>

    <div class="stepper-content">
        <div class="step-panel active" data-step="1">
            <p class="text-muted small mb-3">Choose your gender preference</p>
            <div class="d-flex flex-wrap gap-2" id="drawerGender">
                <button class="filter-option-btn active" data-filter="gender" data-value="men">👔 Men</button>
                <button class="filter-option-btn" data-filter="gender" data-value="women">👗 Women</button>
                <button class="filter-option-btn" data-filter="gender" data-value="kids">🧒 Kids</button>
                <button class="filter-option-btn" data-filter="gender" data-value="unisex">🌍 Unisex</button>
            </div>
        </div>
        <div class="step-panel" data-step="2" style="display:none;">
            <p class="text-muted small mb-3">What kind of glasses?</p>
            <div class="d-flex flex-wrap gap-2" id="drawerType">
                <button class="filter-option-btn active" data-filter="type" data-value="eyeglasses">👓 Eyeglasses</button>
                <button class="filter-option-btn" data-filter="type" data-value="sunglasses">🕶 Sunglasses</button>
                <button class="filter-option-btn" data-filter="type" data-value="computer">💻 Computer</button>
            </div>
        </div>
        <div class="step-panel" data-step="3" style="display:none;">
            <p class="text-muted small mb-3">Select frame shape</p>
            <div class="d-flex flex-wrap gap-2" id="drawerShape">
                <button class="filter-option-btn" data-filter="shape" data-value="rectangle">▭ Rect</button>
                <button class="filter-option-btn" data-filter="shape" data-value="round">◯ Round</button>
                <button class="filter-option-btn" data-filter="shape" data-value="aviator">🛩 Aviator</button>
                <button class="filter-option-btn" data-filter="shape" data-value="cateye">🐱 Cat Eye</button>
                <button class="filter-option-btn" data-filter="shape" data-value="wayfarer">⊞ Wayfarer</button>
            </div>
        </div>
        <div class="step-panel" data-step="4" style="display:none;">
            <p class="text-muted small mb-3">Material, Color, Size & Weight</p>
            <div class="mb-2">
                <span class="badge bg-light text-dark me-2">Material</span>
                <div class="d-flex flex-wrap gap-2" id="drawerMaterial">
                    <button class="filter-option-btn" data-filter="material" data-value="acetate">Acetate</button>
                    <button class="filter-option-btn" data-filter="material" data-value="metal">Metal</button>
                    <button class="filter-option-btn" data-filter="material" data-value="titanium">Titanium</button>
                    <button class="filter-option-btn" data-filter="material" data-value="tr90">TR90</button>
                </div>
            </div>
            <div class="mb-2">
                <span class="badge bg-light text-dark me-2">Color</span>
                <div class="d-flex flex-wrap gap-2" id="drawerColor">
                    <button class="filter-option-btn" data-filter="color" data-value="black">⚫ Black</button>
                    <button class="filter-option-btn" data-filter="color" data-value="gold">🟡 Gold</button>
                    <button class="filter-option-btn" data-filter="color" data-value="silver">⚪ Silver</button>
                    <button class="filter-option-btn" data-filter="color" data-value="brown">🟤 Brown</button>
                    <button class="filter-option-btn" data-filter="color" data-value="transparent">👻 Clear</button>
                </div>
            </div>
            <div>
                <span class="badge bg-light text-dark me-2">Size / Weight</span>
                <div class="d-flex flex-wrap gap-2" id="drawerSizeWeight">
                    <button class="filter-option-btn" data-filter="size" data-value="small">📏 Small</button>
                    <button class="filter-option-btn" data-filter="size" data-value="medium">📏 Medium</button>
                    <button class="filter-option-btn" data-filter="size" data-value="large">📏 Large</button>
                    <button class="filter-option-btn" data-filter="weight" data-value="ultra-light">🪶 Ultra-Light</button>
                    <button class="filter-option-btn" data-filter="weight" data-value="standard">⚖️ Standard</button>
                </div>
            </div>
            <div class="mt-3">
                <span class="badge bg-light text-dark me-2">Price Range</span>
                <input type="range" class="form-range organic-slider" id="drawerPriceSlider" min="0" max="5000" step="100" value="2500">
                <div class="d-flex justify-content-between text-muted small mt-1">
                    <span>₹0</span>
                    <span id="priceDisplay">₹2,500</span>
                    <span>₹5,000+</span>
                </div>
            </div>
        </div>
    </div>

    <button id="applyFiltersDrawer" class="btn btn-primary w-100 mt-4 rounded-pill py-3 fw-bold" style="background: #0F3D2E; border: none; box-shadow: 0 8px 25px rgba(15, 61, 46, 0.2);">
        Apply Filters ✨
    </button>
</div>

<!-- ============================================================ -->
<!-- STYLES – All Combined                                        -->
<!-- ============================================================ -->
<style>
    /* ============================================================
       CATEGORY PILLS – GLASSMORPHISM
       ============================================================ */
    .category-pill {
        position: relative;
        background: rgba(255, 255, 255, 0.7) !important;
        backdrop-filter: blur(16px) !important;
        -webkit-backdrop-filter: blur(16px) !important;
        border: 1.5px solid rgba(212, 175, 55, 0.25) !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        color: #0A192F !important;
        font-weight: 500;
        border-radius: 50px;
        padding: 10px 24px;
        cursor: pointer;
        font-size: 0.9rem;
        letter-spacing: 0.3px;
        text-transform: capitalize;
        overflow: hidden;
        user-select: none;
        opacity: 0;
        transform: translateY(-20px);
        transition: opacity 0.6s cubic-bezier(0.34, 1.56, 0.64, 1),
            transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .category-pill.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .category-pill::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.8), transparent);
        transition: left 0.6s ease;
        pointer-events: none;
    }

    .category-pill:hover::before {
        left: 100%;
    }

    .category-pill:hover {
        background: rgba(212, 175, 55, 0.15) !important;
        border-color: #D4AF37 !important;
        color: #0A192F !important;
        transform: translateY(-3px) scale(1.03);
        box-shadow: 0 12px 40px rgba(212, 175, 55, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
    }

    .category-pill.active {
        background: rgba(212, 175, 55, 0.2) !important;
        border-color: #D4AF37 !important;
        color: #0A192F !important;
        font-weight: 700;
        transform: translateY(-2px);
        box-shadow: 0 8px 40px rgba(212, 175, 55, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        text-shadow: 0 0 20px rgba(212, 175, 55, 0.2);
    }

    .category-pill.active .pill-glow {
        position: absolute;
        inset: -2px;
        border-radius: 50px;
        background: radial-gradient(circle at center, rgba(212, 175, 55, 0.25), transparent 70%);
        z-index: -1;
        animation: pulseGlow 2s ease-in-out infinite;
    }

    @keyframes pulseGlow {

        0%,
        100% {
            opacity: 0.6;
            transform: scale(1);
        }

        50% {
            opacity: 1;
            transform: scale(1.08);
        }
    }

    #categoryPills {
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    #categoryPills::-webkit-scrollbar {
        display: none;
    }

    /* ============================================================
       FUNNEL MORPHING ICON
       ============================================================ */
    .filter-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: rgba(15, 61, 46, 0.04);
        transition: background 0.2s;
        padding: 0 6px;
        cursor: pointer;
        position: relative;
    }

    .filter-icon:hover {
        background: rgba(15, 61, 46, 0.08);
    }

    .line-group {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 3px;
        width: 16px;
        transition: width 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .line-group .line {
        display: block;
        height: 2.5px;
        background: #0F3D2E;
        border-radius: 4px;
        transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        transform-origin: left center;
        width: 100%;
    }

    .line-group .l1 {
        width: 14px;
    }

    .line-group .l2 {
        width: 18px;
    }

    .line-group .l3 {
        width: 14px;
    }

    .funnel-shape {
        width: 20px;
        height: 20px;
        transform: scale(0);
        transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) 0.15s;
        opacity: 0;
        margin-left: -4px;
    }

    .funnel-shape svg {
        display: block;
        width: 100%;
        height: 100%;
    }

    .funnel-body {
        fill: none;
        stroke: #0F3D2E;
        stroke-width: 2;
        stroke-linejoin: round;
    }

    .funnel-stem {
        fill: #0F3D2E;
        rx: 1;
    }

    .filter-icon.active .line-group {
        width: 0;
        overflow: hidden;
        opacity: 0;
    }

    .filter-icon.active .funnel-shape {
        transform: scale(1);
        opacity: 1;
        animation: funnelBounce 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes funnelBounce {
        0% {
            transform: scale(0.2) rotate(-10deg);
            opacity: 0.5;
        }

        60% {
            transform: scale(1.15) rotate(3deg);
            opacity: 1;
        }

        100% {
            transform: scale(1) rotate(0deg);
            opacity: 1;
        }
    }

    /* ============================================================
       DRAWER + OVERLAY
       ============================================================ */
    .drawer-overlay {
        position: fixed;
        inset: 0;
        background: rgba(15, 61, 46, 0.35);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        z-index: 9998;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .drawer-overlay.open {
        opacity: 1;
        pointer-events: all;
    }

    .filter-drawer {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        width: 420px;
        max-width: 90vw;
        background: #F7F5F0;
        z-index: 9999;
        padding: 30px 24px;
        overflow-y: auto;
        box-shadow: 8px 0 40px rgba(0, 0, 0, 0.08);
        transform: translateX(-105%) scale(0.96);
        transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.5s ease;
        opacity: 0;
        border-right: 1px solid rgba(200, 169, 81, 0.15);
    }

    .filter-drawer.open {
        transform: translateX(0) scale(1);
        opacity: 1;
    }

    .filter-drawer::-webkit-scrollbar {
        width: 4px;
    }

    .filter-drawer::-webkit-scrollbar-thumb {
        background: #C8A951;
        border-radius: 10px;
    }

    .btn-close-custom {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px solid rgba(0, 0, 0, 0.04);
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: 0.2s;
        color: #0F3D2E;
        font-size: 1.2rem;
    }

    .btn-close-custom:hover {
        background: #0F3D2E;
        color: #fff;
        transform: rotate(90deg);
    }

    /* ============================================================
       ORGANIC STEPPER
       ============================================================ */
    .organic-stepper-container {
        background: rgba(255, 255, 255, 0.6);
        padding: 20px 12px;
        border-radius: 60px;
        backdrop-filter: blur(4px);
        border: 1px solid rgba(200, 169, 81, 0.1);
    }

    .stepper-track {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
    }

    .step-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
        z-index: 2;
        flex: 0 0 auto;
    }

    .step-circle {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: #ffffff;
        border: 2px solid #dce1e6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        color: #6b7a8a;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
    }

    .step-item.active .step-circle {
        background: #0F3D2E;
        border-color: #0F3D2E;
        color: #fff;
        transform: scale(1.15);
        box-shadow: 0 8px 25px rgba(15, 61, 46, 0.25);
    }

    .step-item.completed .step-circle {
        background: #C8A951;
        border-color: #C8A951;
        color: #0F3D2E;
    }

    .step-label {
        font-size: 0.65rem;
        font-weight: 600;
        color: #6b7a8a;
        margin-top: 6px;
        letter-spacing: 0.3px;
    }

    .step-item.active .step-label {
        color: #0F3D2E;
    }

    .step-connector {
        flex: 1;
        margin: 0 2px;
        height: 20px;
        position: relative;
        z-index: 1;
    }

    .step-connector svg {
        display: block;
        width: 100%;
        height: 100%;
        overflow: visible;
    }

    .connector-path {
        fill: none;
        stroke-width: 2.5;
        stroke: #dce1e6;
        stroke-linecap: round;
        transition: d 0.6s cubic-bezier(0.34, 1.56, 0.64, 1), stroke 0.4s ease;
    }

    .step-connector.active .connector-path {
        stroke: #C8A951;
        stroke-width: 3;
        filter: drop-shadow(0 0 6px rgba(200, 169, 81, 0.3));
        d: path("M 0,10 C 25,16 75,4 100,10");
    }

    .step-connector.completed .connector-path {
        stroke: #0F3D2E;
        stroke-width: 2;
        d: path("M 0,10 C 25,12 75,8 100,10");
    }

    /* ============================================================
       FILTER OPTION BUTTONS
       ============================================================ */
    .filter-option-btn {
        padding: 10px 24px;
        border-radius: 50px;
        border: 2px solid #eef2f6;
        background: #fff;
        font-weight: 500;
        color: #1e293b;
        transition: all 0.2s ease;
    }

    .filter-option-btn:hover {
        border-color: #C8A951;
        background: rgba(200, 169, 81, 0.04);
    }

    .filter-option-btn.active {
        background: #0F3D2E;
        border-color: #0F3D2E;
        color: #fff;
        box-shadow: 0 6px 20px rgba(15, 61, 46, 0.15);
    }

    .organic-slider {
        height: 6px;
        background: linear-gradient(90deg, #C8A951 0%, #0F3D2E 100%);
        border-radius: 10px;
    }

    .organic-slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: #0F3D2E;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(15, 61, 46, 0.3);
        border: 3px solid #fff;
    }


    /* ----- FIX BUTTON SIZES ----- */
    .product-card .btn {
        border-radius: 30px !important;
        padding: 6px 12px !important;
        font-size: 0.8rem !important;
        font-weight: 500 !important;
    }

    .product-card .btn i {
        font-size: 0.9rem !important;
        margin-right: 4px !important;
    }

    /* Make Add to Cart button full emerald */
    .product-card .add-to-bag-btn {
        background: #0F3D2E !important;
        color: #fff !important;
        border: none !important;
    }

    .product-card .add-to-bag-btn:hover {
        background: #1a4f3a !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(15, 61, 46, 0.25);
    }

    /* Order button outline */
    .product-card .order-btn {
        border: 2px solid #0F3D2E !important;
        color: #0F3D2E !important;
        background: transparent !important;
    }

    .product-card .order-btn:hover {
        background: #0f3d2e58 !important;
        color: #fff !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(15, 61, 46, 0.62);
    }

    /* ============================================================
       RELATED PRODUCTS – SHUTTER ANIMATION (FIXED: NO GAP)
       ============================================================ */
    .related-card {
        width: 220px !important;
        min-height: auto !important;   /* ← FIXED: Removes extra gap */
        padding: 0 !important;
        border-radius: 16px !important;
        overflow: hidden;
        background: #fff !important;
        border-color: rgba(0, 0, 0, 0.06) !important;
        transition: box-shadow 0.4s ease;
        display: flex;
        flex-direction: column;
    }

    .related-card:hover {
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
    }

    .card-img-wrapper {
        position: relative;
        width: 100%;
        height: auto !important;      /* ← FIXED: Removes fixed height */
        aspect-ratio: 1 / 1;          /* ← Makes image square */
        overflow: hidden;
        background: #f8f9fa;
    }

    .card-img-wrapper .card-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 12px;
        transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        will-change: transform;
    }

    /* Shutter Panels */
    .shutter-panel {
        position: absolute;
        left: 0;
        right: 0;
        height: 50%;
        background: #0F3D2E;
        z-index: 2;
        transform-origin: center;
        transform: scaleY(0);
        pointer-events: none;
        transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .shutter-top {
        top: 0;
        transform-origin: top center;
    }

    .shutter-bottom {
        bottom: 0;
        transform-origin: bottom center;
    }

    /* Card Details */
    .card-details {
        height: 0;
        overflow: hidden;
        padding: 0 14px;
        background: #fff;
        transition: height 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .card-details-inner {
        padding: 10px 0 6px 0;
    }

    .card-details-inner .fw-bold {
        font-size: 0.85rem !important;
    }

    .card-details-inner .text-gold {
        font-size: 0.85rem !important;
    }

    /* Card Actions */
    .card-actions {
        height: 0;
        overflow: hidden;
        background: #fff;
        transition: height 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .card-actions-inner {
        padding: 0 14px 12px 14px;
    }

    .action-icon {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 1px solid rgba(15, 61, 46, 0.1);
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0F3D2E;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        opacity: 0;
        transform: translateY(10px);
    }

    .action-icon:hover {
        background: #0F3D2E;
        color: #fff;
        border-color: #0F3D2E;
        transform: translateY(-2px) scale(1.1);
    }

    /* Mobile: Always show details + actions */
    @media (hover: none) and (pointer: coarse) {
        .shutter-panel {
            display: none !important;
        }

        .card-details {
            height: auto !important;
            padding: 8px 14px !important;
        }

        .card-actions {
            height: auto !important;
            padding: 0 14px 12px 14px !important;
        }

        .action-icon {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }

        .related-card {
            min-height: auto !important;
        }

        .card-img-wrapper {
            height: auto !important;
            aspect-ratio: 1 / 1 !important;
        }
    }

    /* ============================================================
       SCROLL CONTAINER & ARROWS
       ============================================================ */
    .scroll-container {
        overflow-x: auto;
        overflow-y: hidden;
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .scroll-container::-webkit-scrollbar {
        display: none;
    }

    .related-wrapper {
        position: relative;
        padding: 0 10px;
    }

    .scroll-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(0, 0, 0, 0.08);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0A192F;
        font-size: 1.4rem;
        cursor: pointer;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        opacity: 0.9;
        backdrop-filter: blur(8px);
    }

    .scroll-arrow:hover {
        background: #D4AF37;
        color: #0A192F;
        transform: translateY(-50%) scale(1.1);
        box-shadow: 0 8px 30px rgba(212, 175, 55, 0.3);
    }

    .related-prev {
        left: -10px;
    }

    .related-next {
        right: -10px;
    }

    /* ============================================================
       ACTIVE FILTER TAGS
       ============================================================ */
    #activeFiltersCategory .badge {
        background: #C8A951 !important;
        color: #0F3D2E !important;
        padding: 6px 16px !important;
        border-radius: 50px !important;
        font-weight: 600 !important;
        font-size: 0.75rem !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 6px !important;
        box-shadow: 0 4px 12px rgba(200, 169, 81, 0.2);
    }

    #activeFiltersCategory .badge .btn-close {
        filter: brightness(0) invert(0.15);
        font-size: 0.5rem !important;
        background-size: 0.5rem;
        opacity: 0.8;
        margin-left: 4px;
    }

    /* ----- SHUTTER FLASH ANIMATION ----- */
    @keyframes shutterFlash {
        0% {
            transform: scale(0.2);
            opacity: 1;
        }

        50% {
            transform: scale(1.5);
            opacity: 0.8;
        }

        100% {
            transform: scale(1);
            opacity: 0;
        }
    }

    /* ============================================================
       RESPONSIVE
       ============================================================ */
    @media (max-width: 768px) {
        .category-pill {
            padding: 6px 14px;
            font-size: 0.75rem;
            border-width: 1px;
        }

        .scroll-arrow {
            width: 32px;
            height: 32px;
            font-size: 1rem;
        }

        .related-prev {
            left: -5px;
        }

        .related-next {
            right: -5px;
        }

        .related-card {
            width: 170px !important;
            min-height: auto !important;
        }

        .card-img-wrapper {
            aspect-ratio: 1 / 1 !important;
        }

        .filter-drawer {
            padding: 20px 16px;
        }

        .filter-icon {
            width: 38px;
            height: 38px;
        }

        .line-group {
            width: 14px;
        }

        .line-group .l1 {
            width: 12px;
        }

        .line-group .l2 {
            width: 16px;
        }

        .line-group .l3 {
            width: 12px;
        }

        .funnel-shape {
            width: 18px;
            height: 18px;
        }
    }

    @media (max-width: 576px) {
        .category-pill {
            padding: 5px 10px;
            font-size: 0.65rem;
            border-radius: 30px;
        }

        .filter-drawer {
            width: 100vw;
            max-width: 100vw;
            border-radius: 0;
        }

        .step-circle {
            width: 36px;
            height: 36px;
            font-size: 0.8rem;
        }

        .filter-icon {
            width: 34px;
            height: 34px;
        }

        .line-group {
            width: 12px;
            gap: 2px;
        }

        .line-group .line {
            height: 2px;
        }

        .line-group .l1 {
            width: 10px;
        }

        .line-group .l2 {
            width: 14px;
        }

        .line-group .l3 {
            width: 10px;
        }

        .funnel-shape {
            width: 16px;
            height: 16px;
        }

        .product-card .card-img-top {
            height: 160px !important;
            padding: 8px !important;
        }

        .product-card .btn {
            font-size: 0.7rem !important;
            padding: 4px 8px !important;
        }

        .product-card .product-name {
            font-size: 0.8rem !important;
        }

        .related-card {
            width: 150px !important;
            min-height: auto !important;
        }

        .card-img-wrapper {
            aspect-ratio: 1 / 1 !important;
        }
    }
</style>

<!-- ============================================================ -->
<!-- SCRIPTS – GSAP + Category + Search Filter + Wishlist Count  -->
<!-- ============================================================ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ============================================================
        // 1. CATEGORY PILLS – Filter Products
        // ============================================================
        const pills = document.querySelectorAll('.category-pill');
        const productCards = document.querySelectorAll('.product-card');

        pills.forEach(pill => {
            pill.addEventListener('click', function() {
                pills.forEach(p => p.classList.remove('active'));
                this.classList.add('active');

                const cat = this.dataset.category;
                productCards.forEach(card => {
                    const cardCat = card.dataset.category;
                    card.style.display = (cat === 'all' || cardCat === cat) ? '' : 'none';
                });
            });
        });

        // Stagger animation for category pills
        pills.forEach((pill, index) => {
            setTimeout(() => {
                pill.classList.add('visible');
            }, 100 + index * 60);
        });

        // ============================================================
        // 2. QUICK CHIPS
        // ============================================================
        document.querySelectorAll('.category-quick-chip').forEach(chip => {
            chip.addEventListener('click', function() {
                const cat = this.dataset.category;
                pills.forEach(p => {
                    p.classList.toggle('active', p.dataset.category === cat);
                });
                productCards.forEach(card => {
                    const cardCat = card.dataset.category;
                    card.style.display = (cardCat === cat) ? '' : 'none';
                });
            });
        });

        // ============================================================
        // 3. SEARCH INPUT
        // ============================================================
        const searchInput = document.getElementById('categorySearchInput');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const query = this.value.toLowerCase().trim();
                productCards.forEach(card => {
                    const name = card.querySelector('.product-name')?.textContent.toLowerCase() || '';
                    card.style.display = name.includes(query) ? '' : 'none';
                });
            });
        }

        // ============================================================
        // 4. GLOBAL FILTER SYSTEM
        // ============================================================
        let activeFilters = {};

        function updateActiveTagsCategory() {
            const container = document.getElementById('activeFiltersCategory');
            container.innerHTML = '';
            for (const [type, value] of Object.entries(activeFilters)) {
                const tag = document.createElement('span');
                tag.className = 'badge bg-accent text-primary me-1 mb-1';
                tag.innerHTML = `${value} <button class="btn-close ms-1" style="font-size:0.5rem;" data-filter="${type}"></button>`;
                tag.querySelector('button').addEventListener('click', function() {
                    delete activeFilters[type];
                    updateActiveTagsCategory();
                    applyFiltersCategory();
                });
                container.appendChild(tag);
            }
        }

        function applyFiltersCategory() {
            productCards.forEach(card => {
                let show = true;
                for (const [type, value] of Object.entries(activeFilters)) {
                    const cardValue = card.dataset[type];
                    if (!cardValue || cardValue !== value) {
                        show = false;
                        break;
                    }
                }
                card.style.display = show ? '' : 'none';
            });
        }

        document.getElementById('clearFiltersCategory').addEventListener('click', function() {
            activeFilters = {};
            document.getElementById('activeFiltersCategory').innerHTML = '';
            productCards.forEach(c => c.style.display = '');
        });

        // ============================================================
        // 5. DRAWER + FUNNEL ICON TOGGLE
        // ============================================================
        const filterIcon = document.getElementById('filterIcon');
        const drawer = document.getElementById('filterDrawer');
        const overlay = document.getElementById('filterOverlay');
        const closeBtn = document.getElementById('closeDrawerBtn');

        window.toggleDrawer = function() {
            const isOpen = drawer.classList.contains('open');
            if (isOpen) {
                closeDrawer();
            } else {
                openDrawer();
            }
        };

        window.openDrawer = function() {
            drawer.classList.add('open');
            overlay.classList.add('open');
            filterIcon.classList.add('active');
            document.body.style.overflow = 'hidden';
        };

        window.closeDrawer = function() {
            drawer.classList.remove('open');
            overlay.classList.remove('open');
            filterIcon.classList.remove('active');
            document.body.style.overflow = '';
        };

        overlay.addEventListener('click', closeDrawer);
        closeBtn.addEventListener('click', closeDrawer);

        // ============================================================
        // 6. STEPPER LOGIC
        // ============================================================
        const stepItems = document.querySelectorAll('.step-item');
        const connectors = document.querySelectorAll('.step-connector');
        const panels = document.querySelectorAll('.step-panel');

        stepItems.forEach((item, index) => {
            item.addEventListener('click', function() {
                const step = parseInt(this.dataset.step);

                stepItems.forEach((el, i) => {
                    el.classList.remove('active', 'completed');
                    if (i + 1 < step) el.classList.add('completed');
                    if (i + 1 === step) el.classList.add('active');
                });

                connectors.forEach((conn, i) => {
                    conn.classList.remove('active', 'completed');
                    if (i + 1 < step) conn.classList.add('completed');
                    if (i + 1 === step) conn.classList.add('active');
                });

                panels.forEach(p => p.style.display = 'none');
                document.querySelector(`.step-panel[data-step="${step}"]`).style.display = 'block';
            });
        });

        // ============================================================
        // 7. HELPER: Get selected value from a group
        // ============================================================
        function getSelectedValue(containerId) {
            const active = document.querySelector(`#${containerId} .filter-option-btn.active`);
            return active ? active.dataset.value : null;
        }

        document.querySelectorAll('.step-panel .filter-option-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const parent = this.closest('.d-flex');
                if (parent) {
                    parent.querySelectorAll('.filter-option-btn').forEach(b => b.classList.remove('active'));
                }
                this.classList.add('active');
            });
        });

        // ============================================================
        // 8. PRICE SLIDER
        // ============================================================
        const priceSlider = document.getElementById('drawerPriceSlider');
        const priceDisplay = document.getElementById('priceDisplay');
        if (priceSlider) {
            priceSlider.addEventListener('input', function() {
                let val = parseInt(this.value);
                if (val >= 5000) priceDisplay.textContent = '₹5,000+';
                else priceDisplay.textContent = '₹' + val.toLocaleString();
            });
        }

        // ============================================================
        // 9. APPLY FILTERS FROM DRAWER
        // ============================================================
        document.getElementById('applyFiltersDrawer').addEventListener('click', function() {
            const gender = getSelectedValue('drawerGender');
            if (gender) activeFilters['gender'] = gender;

            const type = getSelectedValue('drawerType');
            if (type) activeFilters['type'] = type;

            const shape = getSelectedValue('drawerShape');
            if (shape) activeFilters['shape'] = shape;

            const material = getSelectedValue('drawerMaterial');
            if (material) activeFilters['material'] = material;

            const color = getSelectedValue('drawerColor');
            if (color) activeFilters['color'] = color;

            const sizeWeightBtns = document.querySelectorAll('#drawerSizeWeight .filter-option-btn.active');
            sizeWeightBtns.forEach(btn => {
                const filterType = btn.dataset.filter;
                const value = btn.dataset.value;
                if (filterType === 'size' || filterType === 'weight') {
                    activeFilters[filterType] = value;
                }
            });

            if (priceSlider) {
                const val = parseInt(priceSlider.value);
                let priceRange = '';
                if (val <= 999) priceRange = '0-999';
                else if (val <= 1999) priceRange = '1000-1999';
                else if (val <= 2999) priceRange = '2000-2999';
                else if (val <= 4999) priceRange = '3000-4999';
                else priceRange = '5000+';
                activeFilters['price'] = priceRange;
            }

            updateActiveTagsCategory();
            applyFiltersCategory();
            closeDrawer();
        });

        // ============================================================
        // 10. RELATED PRODUCTS CAROUSEL
        // ============================================================
        const container = document.getElementById('relatedScroll');
        const prevBtn = document.getElementById('relatedPrev');
        const nextBtn = document.getElementById('relatedNext');

        if (container && prevBtn && nextBtn) {
            const cardWidth = container.querySelector('.related-card')?.offsetWidth || 220;
            const gap = 12;
            const scrollAmount = cardWidth + gap;

            prevBtn.addEventListener('click', function() {
                container.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            });

            nextBtn.addEventListener('click', function() {
                container.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            });

            function checkArrows() {
                const isScrollable = container.scrollWidth > container.clientWidth;
                prevBtn.style.display = isScrollable ? 'flex' : 'none';
                nextBtn.style.display = isScrollable ? 'flex' : 'none';
            }
            checkArrows();
            window.addEventListener('resize', checkArrows);
        }

        // ============================================================
        // 11. SHUTTER ANIMATION FOR RELATED PRODUCTS (GSAP)
        // ============================================================
        const supportsHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

        document.querySelectorAll('.related-card.living-card').forEach(card => {
            const img = card.querySelector('.card-img');
            const top = card.querySelector('.shutter-top');
            const bottom = card.querySelector('.shutter-bottom');
            const details = card.querySelector('.card-details');
            const detailsInner = card.querySelector('.card-details-inner');
            const actions = card.querySelector('.card-actions');
            const actionsInner = card.querySelector('.card-actions-inner');
            const icons = card.querySelectorAll('.action-icon');

            if (!supportsHover) return;

            const detailsH = detailsInner ? detailsInner.getBoundingClientRect().height : 60;
            const actionsH = actionsInner ? actionsInner.getBoundingClientRect().height : 50;

            gsap.set(icons, {
                opacity: 0,
                y: 12
            });

            const tl = gsap.timeline({
                paused: true,
                defaults: {
                    ease: 'power2.inOut'
                }
            });

            tl.addLabel('shutterClose', 0)
                .to([top, bottom], {
                    scaleY: 1,
                    duration: 0.3,
                    ease: 'power2.inOut'
                }, 'shutterClose')
                .addLabel('focus', 'shutterClose+=0.22')
                .to(img, {
                    scale: 1.08,
                    duration: 0.4,
                    ease: 'power2.out'
                }, 'focus')
                .addLabel('shutterOpen', 'focus+=0.34')
                .to([top, bottom], {
                    scaleY: 0,
                    duration: 0.32,
                    ease: 'power2.inOut'
                }, 'shutterOpen')
                .addLabel('expand', 'shutterOpen+=0.18')
                .to(details, {
                    height: detailsH,
                    duration: 0.42,
                    ease: 'power3.out'
                }, 'expand')
                .to(actions, {
                    height: actionsH,
                    duration: 0.42,
                    ease: 'power3.out'
                }, 'expand')
                .addLabel('actionsIn', 'expand+=0.22')
                .to(icons, {
                    opacity: 1,
                    y: 0,
                    duration: 0.35,
                    stagger: 0.07,
                    ease: 'power2.out'
                }, 'actionsIn');

            card.addEventListener('mouseenter', () => {
                card.classList.add('is-hovering');
                tl.play();
            });

            card.addEventListener('mouseleave', () => {
                card.classList.remove('is-hovering');
                tl.reverse();
            });

            window.addEventListener('resize', () => {
                const dH = detailsInner ? detailsInner.getBoundingClientRect().height : 60;
                const aH = actionsInner ? actionsInner.getBoundingClientRect().height : 50;
                const detailsTween = tl.getTweensOf(details)[0];
                const actionsTween = tl.getTweensOf(actions)[0];
                if (detailsTween) detailsTween.vars.height = dH;
                if (actionsTween) actionsTween.vars.height = aH;
            });
        });

        // ============================================================
        // 12. WISHLIST COUNT FIX – Related Section
        // ============================================================
        // Get the global wishlist badge
        const wishlistBadge = document.querySelector('.wishlist-badge');
        let wishlistCount = parseInt(localStorage.getItem('optiq_wishlistCount')) || 0;

        // Function to update badge
        function updateWishlistBadgeCount(count) {
            if (wishlistBadge) {
                wishlistBadge.textContent = count;
                wishlistBadge.style.display = count > 0 ? 'flex' : 'none';
                localStorage.setItem('optiq_wishlistCount', count);
            }
        }

        // Click handler for related wishlist buttons
        document.querySelectorAll('.related-wishlist-btn, .related-wishlist-btn-global').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const icon = this.querySelector('i');
                if (!icon) return;

                // Shutter flash effect
                const card = this.closest('.related-card');
                if (card) {
                    const shutter = document.createElement('div');
                    shutter.style.cssText = `
                        position: absolute;
                        inset: 0;
                        background: radial-gradient(circle at center, rgba(212,175,55,0.35), transparent 70%);
                        border-radius: 16px;
                        z-index: 1;
                        pointer-events: none;
                        animation: shutterFlash 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
                    `;
                    card.style.position = 'relative';
                    card.appendChild(shutter);
                    setTimeout(() => shutter.remove(), 700);
                }

                // Instagram pop
                this.style.transition = 'transform 0.15s cubic-bezier(0.34, 1.56, 0.64, 1)';
                this.style.transform = 'scale(2)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 200);

                // Toggle heart and update count
                if (icon.classList.contains('bi-heart')) {
                    icon.classList.remove('bi-heart');
                    icon.classList.add('bi-heart-fill');
                    icon.style.color = '#D4AF37';
                    wishlistCount++;
                    updateWishlistBadgeCount(wishlistCount);
                } else {
                    icon.classList.remove('bi-heart-fill');
                    icon.classList.add('bi-heart');
                    icon.style.color = '#FFFFFF';
                    wishlistCount = Math.max(0, wishlistCount - 1);
                    updateWishlistBadgeCount(wishlistCount);
                }
            });
        });

        // ============================================================
        // 13. DOUBLE-CLICK IMAGE - SHUTTER EFFECT
        // ============================================================
        document.querySelectorAll('.related-card').forEach(card => {
            card.addEventListener('dblclick', function(e) {
                if (e.target.closest('button, a')) return;

                const shutter = document.createElement('div');
                shutter.style.cssText = `
                    position: absolute;
                    inset: 0;
                    background: radial-gradient(circle at center, rgba(212,175,55,0.4), transparent 70%);
                    border-radius: 16px;
                    z-index: 1;
                    pointer-events: none;
                    animation: shutterFlash 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
                `;
                this.style.position = 'relative';
                this.appendChild(shutter);
                setTimeout(() => shutter.remove(), 700);

                const heartBtn = this.querySelector('.related-wishlist-btn, .related-wishlist-btn-global');
                if (heartBtn) heartBtn.click();
            });
        });

        console.log('✅ Category Page Loaded – Shutter Animation + Wishlist Count Fixed!');
    });
</script>
<?php include 'search-overlay.php'; ?>

<?php include 'templates/footer.php'; ?>
</body>
</html>