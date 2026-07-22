<?php
// search.php – Optiq Smart Search Page (Only Funnel Icon – Rotates on Hover/Click)
include 'templates/header.php';
include 'templates/navbar.php';
?>

<!-- ============================================================ -->
<!-- 1. SEARCH HERO – Emerald Background + Particles + Intent Chips -->
<!-- ============================================================ -->
<section class="search-hero bg-primary position-relative overflow-hidden" style="padding-top: clamp(80px, 12vh, 130px) !important; margin-top: 0;">
    <div class="particles-container" id="particles"></div>
    <div class="container position-relative text-center">
        <h1 class="fw-bold text-white mb-3" style="font-family: 'Poppins', sans-serif; font-size: clamp(1.4rem, 3.8vw, 2.4rem);">
            What are you looking for today?
        </h1>

        <!-- TIGHTER SEARCH BAR – Mic inside input on the right -->
        <div class="search-bar-wrapper mx-auto position-relative" style="max-width: 480px;">
            <div class="glass-search-bar d-flex align-items-center p-1 rounded-pill bg-white bg-opacity-10 border border-white border-opacity-25 backdrop-blur" style="gap: 2px; margin-bottom:16px !important;">

                <!-- Left: Search Icon -->
                <span class="d-flex align-items-center justify-content-center ps-2" style="flex: 0 0 auto; color: rgba(255,255,255,0.5); font-size: 0.9rem;">
                    <i class="bi bi-search"></i>
                </span>

                <!-- Center: Input -->
                <input type="text" id="mainSearchInput" class="form-control bg-transparent border-0 text-white placeholder-white-50 flex-grow-1" placeholder="Search frames, styles, or colours…"
                       style="box-shadow: none; font-size: clamp(0.75rem, 1.2vw, 0.9rem); padding: clamp(6px, 0.8vw, 10px) 0; min-height: 38px;">

                <!-- Right: Mic INSIDE the input area -->
                <span class="mic-icon text-accent pulse-mic d-flex align-items-center justify-content-center px-1" id="micIcon" style="cursor: pointer; font-size: clamp(1rem, 1.5vw, 1.2rem); flex: 0 0 auto; color: #C8A951;">
                    <i class="bi bi-mic"></i>
                </span>

              
            </div>
            <div class="search-glow position-absolute top-50 start-50 translate-middle d-none" id="searchGlow"></div>
        </div>

       
    </div>
</section>

<!-- ============================================================ -->
<!-- 2. FACE SHAPE ASSISTANT (KEPT) -->
<!-- ============================================================ -->
<section class="bg-cream py-3 py-md-4 border-top border-bottom border-lightgray">
    <div class="container text-center">
        <h3 class="text-primary fw-bold mb-2" style="font-family: 'Poppins', sans-serif; font-size: clamp(1rem, 2vw, 1.3rem);">What's your face shape?</h3>
        <div class="d-flex flex-wrap justify-content-center gap-2 gap-sm-4" id="faceShapePicker">
            <?php
            $faces = [
                ['id' => 'oval', 'label' => 'Oval'],
                ['id' => 'round', 'label' => 'Round'],
                ['id' => 'square', 'label' => 'Square'],
                ['id' => 'heart', 'label' => 'Heart'],
                ['id' => 'diamond', 'label' => 'Diamond'],
            ];
            foreach ($faces as $face):
            ?>
            <div class="face-shape-circle d-flex flex-column align-items-center" data-face="<?= $face['id']; ?>">
                <div class="rounded-circle bg-white border border-2 border-lightgray p-1 p-sm-2 mb-1 face-icon-wrapper" style="width: clamp(40px, 10vw, 60px); height: clamp(40px, 10vw, 60px); display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                    <i class="bi bi-person text-primary" style="font-size: clamp(1rem, 2.5vw, 1.6rem);"></i>
                </div>
                <span class="small text-primary fw-semibold" style="font-size: clamp(0.5rem, 0.8vw, 0.7rem);"><?= $face['label']; ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 3. FILTER STRIP – ONLY FUNNEL ICON (ROTATES ON HOVER/CLICK) -->
<!-- ============================================================ -->
<section id="searchResults" class="bg-cream py-2 border-top border-bottom sticky-top search-filter-bar" style="top: 76px; z-index: 1020; backdrop-filter: blur(12px); background: rgba(247, 245, 240, 0.9);">
    <div class="container px-2 px-sm-3">
        <div class="d-flex flex-wrap align-items-center gap-1 gap-sm-2 w-100">
            
            <!-- 🔥 ONLY FUNNEL SVG – NO HAMBURGER LINES -->
            <div class="filter-trigger-wrapper d-flex align-items-center gap-1 gap-sm-3" onclick="toggleDrawer()" style="cursor: pointer;">
                <div class="filter-icon" id="filterIcon" style="width: clamp(34px, 5vw, 42px); height: clamp(34px, 5vw, 42px); border-radius: 50%; background: rgba(15, 61, 46, 0.04); display: flex; align-items: center; justify-content: center; transition: background 0.2s, transform 0.3s ease; position: relative;">
                    <div class="funnel-shape" style="width: clamp(18px, 3.5vw, 26px); height: clamp(18px, 3.5vw, 26px); display: flex; align-items: center; justify-content: center; color: #0F3D2E; transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                            <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                        </svg>
                    </div>
                </div>
                <span class="fw-bold text-primary d-none d-sm-inline" style="font-size: clamp(0.7rem, 1vw, 0.85rem);">Filters</span>
            </div>

            <!-- Quick Chips -->
            <span class="text-muted small ms-1 d-none d-sm-inline" style="font-size: clamp(0.5rem, 0.7vw, 0.65rem);">Quick:</span>
            <button class="btn btn-sm btn-outline-secondary rounded-pill px-2 px-sm-3 intent-chip" data-occasion="office" style="border-color: #dee2e6; font-size: clamp(0.5rem, 0.7vw, 0.65rem); padding: clamp(0.1rem, 0.3vw, 0.2rem) clamp(0.4rem, 0.8vw, 0.6rem);">💼 Office</button>
            <button class="btn btn-sm btn-outline-secondary rounded-pill px-2 px-sm-3 intent-chip" data-occasion="fashion" style="border-color: #dee2e6; font-size: clamp(0.5rem, 0.7vw, 0.65rem); padding: clamp(0.1rem, 0.3vw, 0.2rem) clamp(0.4rem, 0.8vw, 0.6rem);">✨ Fashion</button>
            <button class="btn btn-sm btn-outline-secondary rounded-pill px-2 px-sm-3 intent-chip" data-occasion="gaming" style="border-color: #dee2e6; font-size: clamp(0.5rem, 0.7vw, 0.65rem); padding: clamp(0.1rem, 0.3vw, 0.2rem) clamp(0.4rem, 0.8vw, 0.6rem);">🎮 Gaming</button>

            <!-- Clear All -->
            <button class="btn btn-sm btn-link text-accent ms-auto" id="clearFilters" style="color: #C8A951 !important; font-weight: 600; font-size: clamp(0.55rem, 0.8vw, 0.75rem);">
                <i class="bi bi-x-circle"></i> Clear All
            </button>
        </div>

        <!-- Active Filter Tags -->
        <div class="d-flex flex-wrap gap-1 gap-sm-2 mt-1" id="activeFilters"></div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 4. PRODUCT MASONRY GRID – TIGHTER GRID SIZE -->
<!-- ============================================================ -->
<section class="py-4 py-md-5 bg-cream">
    <div class="container">
        <div id="emptyState" class="text-center py-5 d-none">
            <i class="bi bi-box-seam fs-1 text-muted mb-3"></i>
            <h3 class="fw-bold text-primary">We couldn't find any frames matching your vibe.</h3>
            <p class="text-muted-custom">Try a different mood or browse our categories.</p>
            <div class="d-flex flex-wrap justify-content-center gap-2 gap-sm-3 mt-4">
                <a href="category.php?cat=men" class="btn btn-outline-primary">Men</a>
                <a href="category.php?cat=women" class="btn btn-outline-primary">Women</a>
                <a href="category.php?cat=kids" class="btn btn-outline-primary">Kids</a>
                <a href="category.php?cat=sunglasses" class="btn btn-outline-primary">Sunglasses</a>
            </div>
        </div>

        <div class="masonry-grid" id="productMasonry">
            <?php
            $products = [
                // Men
                ['img' => 'men-1.jpg', 'name' => 'Rectangle Black Metal', 'price' => 2499, 'material' => 'Metal', 'shape' => 'rectangle', 'color' => 'black', 'size' => 'medium', 'gender' => 'men', 'type' => 'eyeglasses', 'category' => 'men', 'weight' => 'standard', 'occasion' => 'office'],
                ['img' => 'men-2.jpg', 'name' => 'Round Silver Frame', 'price' => 2999, 'material' => 'Metal', 'shape' => 'round', 'color' => 'silver', 'size' => 'medium', 'gender' => 'men', 'type' => 'eyeglasses', 'category' => 'men', 'weight' => 'standard', 'occasion' => 'casual'],
                ['img' => 'men-3.jpg', 'name' => 'Aviator Gold Frame', 'price' => 3499, 'material' => 'Metal', 'shape' => 'aviator', 'color' => 'gold', 'size' => 'medium', 'gender' => 'men', 'type' => 'eyeglasses', 'category' => 'men', 'weight' => 'standard', 'occasion' => 'party'],
                ['img' => 'men-4.jpg', 'name' => 'Wayfarer Black', 'price' => 1999, 'material' => 'Acetate', 'shape' => 'wayfarer', 'color' => 'black', 'size' => 'large', 'gender' => 'men', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'standard', 'occasion' => 'travel'],
                ['img' => 'men-5.jpg', 'name' => 'Rimless Office Frame', 'price' => 4999, 'material' => 'Titanium', 'shape' => 'rimless', 'color' => 'silver', 'size' => 'medium', 'gender' => 'men', 'type' => 'eyeglasses', 'category' => 'office', 'weight' => 'ultra-light', 'occasion' => 'office'],
                ['img' => 'men-6.jpg', 'name' => 'Blue Light Glasses', 'price' => 2799, 'material' => 'TR90', 'shape' => 'rectangle', 'color' => 'black', 'size' => 'medium', 'gender' => 'men', 'type' => 'computer', 'category' => 'computer-glasses', 'weight' => 'ultra-light', 'occasion' => 'gaming'],
                ['img' => 'men-7.jpg', 'name' => 'Transparent Frame', 'price' => 1999, 'material' => 'Acetate', 'shape' => 'square', 'color' => 'transparent', 'size' => 'medium', 'gender' => 'men', 'type' => 'eyeglasses', 'category' => 'fashion', 'weight' => 'standard', 'occasion' => 'casual'],
                ['img' => 'men-8.jpg', 'name' => 'Tortoise Shell Frame', 'price' => 3499, 'material' => 'Acetate', 'shape' => 'rectangle', 'color' => 'brown', 'size' => 'medium', 'gender' => 'men', 'type' => 'eyeglasses', 'category' => 'men', 'weight' => 'standard', 'occasion' => 'casual'],
                ['img' => 'men-9.jpg', 'name' => 'Sports Sunglasses', 'price' => 3999, 'material' => 'TR90', 'shape' => 'aviator', 'color' => 'black', 'size' => 'large', 'gender' => 'men', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'ultra-light', 'occasion' => 'sports'],
                ['img' => 'men-10.jpg', 'name' => 'Titanium Premium Frame', 'price' => 5999, 'material' => 'Titanium', 'shape' => 'rectangle', 'color' => 'gold', 'size' => 'medium', 'gender' => 'men', 'type' => 'eyeglasses', 'category' => 'premium', 'weight' => 'ultra-light', 'occasion' => 'office'],
                // Women
                ['img' => 'women-1.jpg', 'name' => 'Cat Eye Black', 'price' => 3299, 'material' => 'Acetate', 'shape' => 'cateye', 'color' => 'black', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'women', 'weight' => 'standard', 'occasion' => 'party'],
                ['img' => 'women-2.jpg', 'name' => 'Rose Gold Round', 'price' => 2999, 'material' => 'Metal', 'shape' => 'round', 'color' => 'gold', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'women', 'weight' => 'standard', 'occasion' => 'casual'],
                ['img' => 'women-3.jpg', 'name' => 'Transparent Fashion Frame', 'price' => 2499, 'material' => 'Acetate', 'shape' => 'square', 'color' => 'transparent', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'fashion', 'weight' => 'standard', 'occasion' => 'casual'],
                ['img' => 'women-4.jpg', 'name' => 'Geometric Frame', 'price' => 2799, 'material' => 'Acetate', 'shape' => 'geometric', 'color' => 'brown', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'women', 'weight' => 'standard', 'occasion' => 'office'],
                ['img' => 'women-5.jpg', 'name' => 'Blue Light Glasses', 'price' => 2999, 'material' => 'TR90', 'shape' => 'rectangle', 'color' => 'black', 'size' => 'medium', 'gender' => 'women', 'type' => 'computer', 'category' => 'computer-glasses', 'weight' => 'ultra-light', 'occasion' => 'gaming'],
                ['img' => 'women-6.jpg', 'name' => 'Office Frame', 'price' => 3499, 'material' => 'Metal', 'shape' => 'rectangle', 'color' => 'silver', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'office', 'weight' => 'standard', 'occasion' => 'office'],
                ['img' => 'women-7.jpg', 'name' => 'Luxury Gold Frame', 'price' => 5499, 'material' => 'Metal', 'shape' => 'aviator', 'color' => 'gold', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'premium', 'weight' => 'ultra-light', 'occasion' => 'party'],
                ['img' => 'women-8.jpg', 'name' => 'Oversized Sunglasses', 'price' => 3499, 'material' => 'Acetate', 'shape' => 'wayfarer', 'color' => 'black', 'size' => 'large', 'gender' => 'women', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'standard', 'occasion' => 'travel'],
                ['img' => 'women-9.jpg', 'name' => 'Tortoise Cat Eye', 'price' => 3199, 'material' => 'Acetate', 'shape' => 'cateye', 'color' => 'brown', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'women', 'weight' => 'standard', 'occasion' => 'casual'],
                ['img' => 'women-10.jpg', 'name' => 'Rimless Frame', 'price' => 4499, 'material' => 'Titanium', 'shape' => 'rimless', 'color' => 'silver', 'size' => 'medium', 'gender' => 'women', 'type' => 'eyeglasses', 'category' => 'women', 'weight' => 'ultra-light', 'occasion' => 'office'],
                // Kids
                ['img' => 'kids-1.jpg', 'name' => 'Flexible Kids Frame', 'price' => 1299, 'material' => 'TR90', 'shape' => 'round', 'color' => 'blue', 'size' => 'small', 'gender' => 'kids', 'type' => 'eyeglasses', 'category' => 'kids', 'weight' => 'ultra-light', 'occasion' => 'casual'],
                ['img' => 'kids-2.jpg', 'name' => 'Colorful Kids Glasses', 'price' => 1499, 'material' => 'TR90', 'shape' => 'rectangle', 'color' => 'multicolor', 'size' => 'small', 'gender' => 'kids', 'type' => 'eyeglasses', 'category' => 'kids', 'weight' => 'ultra-light', 'occasion' => 'casual'],
                ['img' => 'kids-3.jpg', 'name' => 'School Frames', 'price' => 999, 'material' => 'Plastic', 'shape' => 'rectangle', 'color' => 'black', 'size' => 'small', 'gender' => 'kids', 'type' => 'eyeglasses', 'category' => 'kids', 'weight' => 'standard', 'occasion' => 'office'],
                ['img' => 'kids-4.jpg', 'name' => 'Flexi-Hinge Kids', 'price' => 1799, 'material' => 'TR90', 'shape' => 'round', 'color' => 'red', 'size' => 'small', 'gender' => 'kids', 'type' => 'eyeglasses', 'category' => 'kids', 'weight' => 'ultra-light', 'occasion' => 'casual'],
                ['img' => 'kids-5.jpg', 'name' => 'Unbreakable Kids Frame', 'price' => 2199, 'material' => 'TR90', 'shape' => 'square', 'color' => 'green', 'size' => 'small', 'gender' => 'kids', 'type' => 'eyeglasses', 'category' => 'kids', 'weight' => 'ultra-light', 'occasion' => 'casual'],
                // Sunglasses
                ['img' => 'sun-1.jpg', 'name' => 'Classic Aviator Sunglasses', 'price' => 2999, 'material' => 'Metal', 'shape' => 'aviator', 'color' => 'gold', 'size' => 'medium', 'gender' => 'unisex', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'standard', 'occasion' => 'travel'],
                ['img' => 'sun-2.jpg', 'name' => 'Polarized Wayfarer', 'price' => 3499, 'material' => 'Acetate', 'shape' => 'wayfarer', 'color' => 'black', 'size' => 'medium', 'gender' => 'unisex', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'standard', 'occasion' => 'travel'],
                ['img' => 'sun-3.jpg', 'name' => 'UV400 Sport Sunglasses', 'price' => 2499, 'material' => 'TR90', 'shape' => 'aviator', 'color' => 'black', 'size' => 'large', 'gender' => 'unisex', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'ultra-light', 'occasion' => 'sports'],
                ['img' => 'sun-4.jpg', 'name' => 'Retro Round Sunglasses', 'price' => 1999, 'material' => 'Metal', 'shape' => 'round', 'color' => 'silver', 'size' => 'medium', 'gender' => 'unisex', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'standard', 'occasion' => 'party'],
                ['img' => 'sun-5.jpg', 'name' => 'Cat Eye Sunglasses', 'price' => 3299, 'material' => 'Acetate', 'shape' => 'cateye', 'color' => 'black', 'size' => 'medium', 'gender' => 'women', 'type' => 'sunglasses', 'category' => 'sunglasses', 'weight' => 'standard', 'occasion' => 'party'],
                // Computer Glasses
                ['img' => 'computer-1.jpg', 'name' => 'Blue Cut Rectangle', 'price' => 2799, 'material' => 'TR90', 'shape' => 'rectangle', 'color' => 'black', 'size' => 'medium', 'gender' => 'unisex', 'type' => 'computer', 'category' => 'computer-glasses', 'weight' => 'ultra-light', 'occasion' => 'gaming'],
                ['img' => 'computer-2.jpg', 'name' => 'Anti-Glare Round', 'price' => 2499, 'material' => 'Acetate', 'shape' => 'round', 'color' => 'brown', 'size' => 'medium', 'gender' => 'unisex', 'type' => 'computer', 'category' => 'computer-glasses', 'weight' => 'standard', 'occasion' => 'office'],
                ['img' => 'computer-3.jpg', 'name' => 'Gaming Glasses', 'price' => 3299, 'material' => 'TR90', 'shape' => 'wayfarer', 'color' => 'black', 'size' => 'large', 'gender' => 'men', 'type' => 'computer', 'category' => 'computer-glasses', 'weight' => 'ultra-light', 'occasion' => 'gaming'],
                ['img' => 'computer-4.jpg', 'name' => 'Ultra-Light Computer Glasses', 'price' => 3999, 'material' => 'Titanium', 'shape' => 'rectangle', 'color' => 'silver', 'size' => 'medium', 'gender' => 'unisex', 'type' => 'computer', 'category' => 'computer-glasses', 'weight' => 'ultra-light', 'occasion' => 'office'],
                ['img' => 'computer-5.jpg', 'name' => 'Premium Blue Blockers', 'price' => 4999, 'material' => 'Metal', 'shape' => 'rectangle', 'color' => 'gold', 'size' => 'medium', 'gender' => 'unisex', 'type' => 'computer', 'category' => 'computer-glasses', 'weight' => 'standard', 'occasion' => 'office'],
            ];

            foreach ($products as $prod):
            ?>
                <div class="product-card masonry-item"
                    data-gender="<?= $prod['gender']; ?>"
                    data-type="<?= $prod['type']; ?>"
                    data-shape="<?= $prod['shape']; ?>"
                    data-material="<?= strtolower($prod['material']); ?>"
                    data-color="<?= $prod['color']; ?>"
                    data-size="<?= $prod['size']; ?>"
                    data-weight="<?= $prod['weight']; ?>"
                    data-category="<?= $prod['category']; ?>"
                    data-occasion="<?= $prod['occasion']; ?>">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="position-relative overflow-hidden product-image-container">
                            <img src="assets/images/<?= $prod['img']; ?>" class="card-img-top" alt="<?= $prod['name']; ?>" style="height: clamp(150px, 22vw, 200px); object-fit: cover; transition: transform 0.3s;">
                            <span class="badge bg-accent text-primary position-absolute top-0 end-0 m-2" style="font-size: clamp(0.45rem, 0.7vw, 0.6rem); padding: clamp(2px, 0.3vw, 4px) clamp(6px, 1.2vw, 12px);">NEW</span>
                            <button class="btn-glass-circle wishlist-btn position-absolute" style="left: 8px; width: clamp(28px, 4vw, 36px); height: clamp(28px, 4vw, 36px); border-radius: 50%; border: 1px solid rgba(255, 255, 255, 0.4); background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); color: #0F3D2E; display: flex; align-items: center; justify-content: center; font-size: clamp(0.6rem, 0.8vw, 0.8rem); bottom: -50px; opacity: 0; transition: bottom 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.35s ease; pointer-events: none; z-index: 5; text-decoration: none; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);"
                                data-id="<?= pathinfo($prod['img'], PATHINFO_FILENAME); ?>"
                                data-name="<?= $prod['name']; ?>"
                                data-img="assets/images/<?= $prod['img']; ?>"
                                data-price="<?= $prod['price']; ?>"
                                data-color="<?= $prod['color']; ?>"
                                data-size="<?= $prod['size']; ?>"
                                title="Add to Wishlist">
                                <i class="bi bi-heart"></i>
                            </button>
                            <button class="btn-glass-circle add-to-bag-btn position-absolute"
                                style="left: 50%; transform: translateX(-50%); width: clamp(28px, 4vw, 36px); height: clamp(28px, 4vw, 36px); border-radius: 50%; border: 1px solid rgba(255, 255, 255, 0.4); background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); color: #0F3D2E; display: flex; align-items: center; justify-content: center; font-size: clamp(0.6rem, 0.8vw, 0.8rem); bottom: -50px; opacity: 0; transition: bottom 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.35s ease; pointer-events: none; z-index: 5; text-decoration: none; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);"
                                data-id="<?= pathinfo($prod['img'], PATHINFO_FILENAME); ?>"
                                data-name="<?= $prod['name']; ?>"
                                data-img="assets/images/<?= $prod['img']; ?>"
                                data-price="<?= $prod['price']; ?>"
                                data-color="<?= $prod['color']; ?>"
                                data-size="<?= $prod['size']; ?>"
                                title="Add to Cart">
                                <i class="bi bi-bag"></i>
                            </button>
                            <a href="product.php?id=<?= pathinfo($prod['img'], PATHINFO_FILENAME); ?>"
                                class="btn-glass-circle order-btn position-absolute" style="right: 8px; width: clamp(28px, 4vw, 36px); height: clamp(28px, 4vw, 36px); border-radius: 50%; border: 1px solid rgba(255, 255, 255, 0.4); background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); color: #0F3D2E; display: flex; align-items: center; justify-content: center; font-size: clamp(0.6rem, 0.8vw, 0.8rem); bottom: -50px; opacity: 0; transition: bottom 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.35s ease; pointer-events: none; z-index: 5; text-decoration: none; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);" title="View Product">
                                <i class="bi bi-box"></i>
                            </a>
                        </div>
                        <div class="card-body text-center" style="padding: clamp(0.4rem, 1vw, 0.8rem);">
                            <h5 class="fw-bold text-primary product-name" style="font-size: clamp(0.65rem, 1vw, 0.8rem);"><?= $prod['name']; ?></h5>
                            <p class="text-muted small mb-1" style="font-size: clamp(0.5rem, 0.7vw, 0.6rem);"><?= $prod['material']; ?> · <?= ucfirst($prod['shape']); ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary" style="font-size: clamp(0.7rem, 1vw, 0.9rem);">₹<?= number_format($prod['price']); ?></span>
                                <span class="text-accent" style="font-size: clamp(0.4rem, 0.6vw, 0.6rem);">★★★★★</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-3" id="loadMoreContainer">
            <button class="btn btn-outline-accent btn-lg" id="loadMoreBtn" style="border-radius: 50px; padding: clamp(6px, 1vw, 10px) clamp(20px, 4vw, 40px); font-size: clamp(0.65rem, 1vw, 0.9rem);">Show More</button>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 5. LEFT DRAWER – Premium Sidebar with Organic Stepper        -->
<!-- ============================================================ -->
<div id="filterOverlay" class="drawer-overlay"></div>

<div id="filterDrawer" class="filter-drawer p-3 p-md-4 p-lg-5">
    <div class="drawer-header d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold text-primary mb-0" style="font-family: 'Poppins', sans-serif; font-size: clamp(0.9rem, 1.8vw, 1.2rem);">
            <i class="bi bi-sliders2 me-2 text-accent"></i> Refine Vibe
        </h4>
        <button id="closeDrawerBtn" class="btn-close-custom" style="width: clamp(28px, 4vw, 36px); height: clamp(28px, 4vw, 36px); border-radius: 50%; border: 1px solid rgba(0,0,0,0.04); background: #ffffff; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: 0.2s; color: #0F3D2E; font-size: clamp(0.8rem, 1.2vw, 1rem);">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <!-- Organic Stepper with SVG Morphing -->
    <div class="organic-stepper-container mb-3" id="organicStepper" style="background: rgba(255, 255, 255, 0.6); padding: clamp(8px, 1.5vw, 16px) clamp(6px, 1vw, 10px); border-radius: 60px; backdrop-filter: blur(4px); border: 1px solid rgba(200, 169, 81, 0.1);">
        <div class="stepper-track" style="display: flex; align-items: center; justify-content: space-between; position: relative;">
            <!-- Step 1: Gender -->
            <div class="step-item active" data-step="1" style="display: flex; flex-direction: column; align-items: center; cursor: pointer; z-index: 2; flex: 0 0 auto;">
                <div class="step-circle" style="width: clamp(28px, 5vw, 38px); height: clamp(28px, 5vw, 38px); border-radius: 50%; background: #ffffff; border: 2px solid #dce1e6; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: clamp(0.6rem, 1vw, 0.9rem); color: #6b7a8a; transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1); position: relative;"><i class="bi bi-person"></i></div>
                <span class="step-label" style="font-size: clamp(0.4rem, 0.6vw, 0.55rem); font-weight: 600; color: #6b7a8a; margin-top: 3px; letter-spacing: 0.3px;">Gender</span>
            </div>
            <div class="step-connector active" style="flex: 1; margin: 0 2px; height: 20px; position: relative; z-index: 1;">
                <svg width="100%" height="20" viewBox="0 0 100 20" style="display: block; width: 100%; height: 100%; overflow: visible;">
                    <path class="connector-path" d="M 0,10 C 25,10 75,10 100,10" style="fill: none; stroke-width: 2.5; stroke: #dce1e6; stroke-linecap: round; transition: d 0.6s cubic-bezier(0.34, 1.56, 0.64, 1), stroke 0.4s ease;" />
                </svg>
            </div>
            <!-- Step 2: Type -->
            <div class="step-item" data-step="2" style="display: flex; flex-direction: column; align-items: center; cursor: pointer; z-index: 2; flex: 0 0 auto;">
                <div class="step-circle" style="width: clamp(28px, 5vw, 38px); height: clamp(28px, 5vw, 38px); border-radius: 50%; background: #ffffff; border: 2px solid #dce1e6; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: clamp(0.6rem, 1vw, 0.9rem); color: #6b7a8a; transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1); position: relative;"><i class="bi bi-eyeglasses"></i></div>
                <span class="step-label" style="font-size: clamp(0.4rem, 0.6vw, 0.55rem); font-weight: 600; color: #6b7a8a; margin-top: 3px; letter-spacing: 0.3px;">Type</span>
            </div>
            <div class="step-connector" style="flex: 1; margin: 0 2px; height: 20px; position: relative; z-index: 1;">
                <svg width="100%" height="20" viewBox="0 0 100 20" style="display: block; width: 100%; height: 100%; overflow: visible;">
                    <path class="connector-path" d="M 0,10 C 25,10 75,10 100,10" style="fill: none; stroke-width: 2.5; stroke: #dce1e6; stroke-linecap: round; transition: d 0.6s cubic-bezier(0.34, 1.56, 0.64, 1), stroke 0.4s ease;" />
                </svg>
            </div>
            <!-- Step 3: Shape -->
            <div class="step-item" data-step="3" style="display: flex; flex-direction: column; align-items: center; cursor: pointer; z-index: 2; flex: 0 0 auto;">
                <div class="step-circle" style="width: clamp(28px, 5vw, 38px); height: clamp(28px, 5vw, 38px); border-radius: 50%; background: #ffffff; border: 2px solid #dce1e6; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: clamp(0.6rem, 1vw, 0.9rem); color: #6b7a8a; transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1); position: relative;"><i class="bi bi-bounding-box-circles"></i></div>
                <span class="step-label" style="font-size: clamp(0.4rem, 0.6vw, 0.55rem); font-weight: 600; color: #6b7a8a; margin-top: 3px; letter-spacing: 0.3px;">Shape</span>
            </div>
            <div class="step-connector" style="flex: 1; margin: 0 2px; height: 20px; position: relative; z-index: 1;">
                <svg width="100%" height="20" viewBox="0 0 100 20" style="display: block; width: 100%; height: 100%; overflow: visible;">
                    <path class="connector-path" d="M 0,10 C 25,10 75,10 100,10" style="fill: none; stroke-width: 2.5; stroke: #dce1e6; stroke-linecap: round; transition: d 0.6s cubic-bezier(0.34, 1.56, 0.64, 1), stroke 0.4s ease;" />
                </svg>
            </div>
            <!-- Step 4: Details -->
            <div class="step-item" data-step="4" style="display: flex; flex-direction: column; align-items: center; cursor: pointer; z-index: 2; flex: 0 0 auto;">
                <div class="step-circle" style="width: clamp(28px, 5vw, 38px); height: clamp(28px, 5vw, 38px); border-radius: 50%; background: #ffffff; border: 2px solid #dce1e6; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: clamp(0.6rem, 1vw, 0.9rem); color: #6b7a8a; transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1); position: relative;"><i class="bi bi-palette"></i></div>
                <span class="step-label" style="font-size: clamp(0.4rem, 0.6vw, 0.55rem); font-weight: 600; color: #6b7a8a; margin-top: 3px; letter-spacing: 0.3px;">Details</span>
            </div>
        </div>
    </div>

    <!-- Stepper Content Panels -->
    <div class="stepper-content">
        <!-- Panel 1: Gender -->
        <div class="step-panel active" data-step="1">
            <p class="text-muted small mb-2" style="font-size: clamp(0.6rem, 0.8vw, 0.75rem);">Choose your gender preference</p>
            <div class="d-flex flex-wrap gap-1 gap-sm-2" id="drawerGender">
                <button class="filter-option-btn active" data-filter="gender" data-value="men" style="padding: clamp(4px, 0.8vw, 8px) clamp(10px, 2vw, 18px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.55rem, 0.8vw, 0.75rem);">👔 Men</button>
                <button class="filter-option-btn" data-filter="gender" data-value="women" style="padding: clamp(4px, 0.8vw, 8px) clamp(10px, 2vw, 18px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.55rem, 0.8vw, 0.75rem);">👗 Women</button>
                <button class="filter-option-btn" data-filter="gender" data-value="kids" style="padding: clamp(4px, 0.8vw, 8px) clamp(10px, 2vw, 18px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.55rem, 0.8vw, 0.75rem);">🧒 Kids</button>
                <button class="filter-option-btn" data-filter="gender" data-value="unisex" style="padding: clamp(4px, 0.8vw, 8px) clamp(10px, 2vw, 18px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.55rem, 0.8vw, 0.75rem);">🌍 Unisex</button>
            </div>
        </div>
        <!-- Panel 2: Type -->
        <div class="step-panel" data-step="2" style="display:none;">
            <p class="text-muted small mb-2" style="font-size: clamp(0.6rem, 0.8vw, 0.75rem);">What kind of glasses?</p>
            <div class="d-flex flex-wrap gap-1 gap-sm-2" id="drawerType">
                <button class="filter-option-btn active" data-filter="type" data-value="eyeglasses" style="padding: clamp(4px, 0.8vw, 8px) clamp(10px, 2vw, 18px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.55rem, 0.8vw, 0.75rem);">👓 Eyeglasses</button>
                <button class="filter-option-btn" data-filter="type" data-value="sunglasses" style="padding: clamp(4px, 0.8vw, 8px) clamp(10px, 2vw, 18px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.55rem, 0.8vw, 0.75rem);">🕶 Sunglasses</button>
                <button class="filter-option-btn" data-filter="type" data-value="computer" style="padding: clamp(4px, 0.8vw, 8px) clamp(10px, 2vw, 18px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.55rem, 0.8vw, 0.75rem);">💻 Computer</button>
            </div>
        </div>
        <!-- Panel 3: Shape -->
        <div class="step-panel" data-step="3" style="display:none;">
            <p class="text-muted small mb-2" style="font-size: clamp(0.6rem, 0.8vw, 0.75rem);">Select frame shape</p>
            <div class="d-flex flex-wrap gap-1 gap-sm-2" id="drawerShape">
                <button class="filter-option-btn" data-filter="shape" data-value="rectangle" style="padding: clamp(4px, 0.8vw, 8px) clamp(10px, 2vw, 18px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.55rem, 0.8vw, 0.75rem);">▭ Rect</button>
                <button class="filter-option-btn" data-filter="shape" data-value="round" style="padding: clamp(4px, 0.8vw, 8px) clamp(10px, 2vw, 18px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.55rem, 0.8vw, 0.75rem);">◯ Round</button>
                <button class="filter-option-btn" data-filter="shape" data-value="aviator" style="padding: clamp(4px, 0.8vw, 8px) clamp(10px, 2vw, 18px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.55rem, 0.8vw, 0.75rem);">🛩 Aviator</button>
                <button class="filter-option-btn" data-filter="shape" data-value="cateye" style="padding: clamp(4px, 0.8vw, 8px) clamp(10px, 2vw, 18px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.55rem, 0.8vw, 0.75rem);">🐱 Cat Eye</button>
                <button class="filter-option-btn" data-filter="shape" data-value="wayfarer" style="padding: clamp(4px, 0.8vw, 8px) clamp(10px, 2vw, 18px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.55rem, 0.8vw, 0.75rem);">⊞ Wayfarer</button>
            </div>
        </div>
        <!-- Panel 4: Material + Color + Size + Weight -->
        <div class="step-panel" data-step="4" style="display:none;">
            <p class="text-muted small mb-2" style="font-size: clamp(0.6rem, 0.8vw, 0.75rem);">Material, Color, Size & Weight</p>
            <div class="mb-2">
                <span class="badge bg-light text-dark me-2" style="font-size: clamp(0.45rem, 0.6vw, 0.55rem);">Material</span>
                <div class="d-flex flex-wrap gap-1 gap-sm-2" id="drawerMaterial">
                    <button class="filter-option-btn" data-filter="material" data-value="acetate" style="padding: clamp(3px, 0.6vw, 6px) clamp(8px, 1.5vw, 14px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.45rem, 0.7vw, 0.65rem);">Acetate</button>
                    <button class="filter-option-btn" data-filter="material" data-value="metal" style="padding: clamp(3px, 0.6vw, 6px) clamp(8px, 1.5vw, 14px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.45rem, 0.7vw, 0.65rem);">Metal</button>
                    <button class="filter-option-btn" data-filter="material" data-value="titanium" style="padding: clamp(3px, 0.6vw, 6px) clamp(8px, 1.5vw, 14px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.45rem, 0.7vw, 0.65rem);">Titanium</button>
                    <button class="filter-option-btn" data-filter="material" data-value="tr90" style="padding: clamp(3px, 0.6vw, 6px) clamp(8px, 1.5vw, 14px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.45rem, 0.7vw, 0.65rem);">TR90</button>
                </div>
            </div>
            <div class="mb-2">
                <span class="badge bg-light text-dark me-2" style="font-size: clamp(0.45rem, 0.6vw, 0.55rem);">Color</span>
                <div class="d-flex flex-wrap gap-1 gap-sm-2" id="drawerColor">
                    <button class="filter-option-btn" data-filter="color" data-value="black" style="padding: clamp(3px, 0.6vw, 6px) clamp(8px, 1.5vw, 14px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.45rem, 0.7vw, 0.65rem);">⚫ Black</button>
                    <button class="filter-option-btn" data-filter="color" data-value="gold" style="padding: clamp(3px, 0.6vw, 6px) clamp(8px, 1.5vw, 14px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.45rem, 0.7vw, 0.65rem);">🟡 Gold</button>
                    <button class="filter-option-btn" data-filter="color" data-value="silver" style="padding: clamp(3px, 0.6vw, 6px) clamp(8px, 1.5vw, 14px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.45rem, 0.7vw, 0.65rem);">⚪ Silver</button>
                    <button class="filter-option-btn" data-filter="color" data-value="brown" style="padding: clamp(3px, 0.6vw, 6px) clamp(8px, 1.5vw, 14px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.45rem, 0.7vw, 0.65rem);">🟤 Brown</button>
                    <button class="filter-option-btn" data-filter="color" data-value="transparent" style="padding: clamp(3px, 0.6vw, 6px) clamp(8px, 1.5vw, 14px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.45rem, 0.7vw, 0.65rem);">👻 Clear</button>
                </div>
            </div>
            <div>
                <span class="badge bg-light text-dark me-2" style="font-size: clamp(0.45rem, 0.6vw, 0.55rem);">Size / Weight</span>
                <div class="d-flex flex-wrap gap-1 gap-sm-2" id="drawerSizeWeight">
                    <button class="filter-option-btn" data-filter="size" data-value="small" style="padding: clamp(3px, 0.6vw, 6px) clamp(8px, 1.5vw, 14px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.45rem, 0.7vw, 0.65rem);">📏 Small</button>
                    <button class="filter-option-btn" data-filter="size" data-value="medium" style="padding: clamp(3px, 0.6vw, 6px) clamp(8px, 1.5vw, 14px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.45rem, 0.7vw, 0.65rem);">📏 Medium</button>
                    <button class="filter-option-btn" data-filter="size" data-value="large" style="padding: clamp(3px, 0.6vw, 6px) clamp(8px, 1.5vw, 14px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.45rem, 0.7vw, 0.65rem);">📏 Large</button>
                    <button class="filter-option-btn" data-filter="weight" data-value="ultra-light" style="padding: clamp(3px, 0.6vw, 6px) clamp(8px, 1.5vw, 14px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.45rem, 0.7vw, 0.65rem);">🪶 Ultra-Light</button>
                    <button class="filter-option-btn" data-filter="weight" data-value="standard" style="padding: clamp(3px, 0.6vw, 6px) clamp(8px, 1.5vw, 14px); border-radius: 50px; border: 2px solid #eef2f6; background: #fff; font-weight: 500; color: #1e293b; transition: all 0.2s ease; font-size: clamp(0.45rem, 0.7vw, 0.65rem);">⚖️ Standard</button>
                </div>
            </div>
            <div class="mt-2">
                <span class="badge bg-light text-dark me-2" style="font-size: clamp(0.45rem, 0.6vw, 0.55rem);">Price Range</span>
                <input type="range" class="form-range organic-slider" id="drawerPriceSlider" min="0" max="5000" step="100" value="2500" style="height: 5px; background: linear-gradient(90deg, #C8A951 0%, #0F3D2E 100%); border-radius: 10px;">
                <div class="d-flex justify-content-between text-muted small mt-1" style="font-size: clamp(0.45rem, 0.6vw, 0.55rem);">
                    <span>₹0</span>
                    <span id="priceDisplay" style="font-size: clamp(0.5rem, 0.7vw, 0.6rem);">₹2,500</span>
                    <span>₹5,000+</span>
                </div>
            </div>
        </div>
    </div>

    <button id="applyFiltersDrawer" class="btn btn-primary w-100 mt-3 rounded-pill py-2 fw-bold" style="background: #0F3D2E; border: none; box-shadow: 0 8px 25px rgba(15, 61, 46, 0.2); font-size: clamp(0.7rem, 1vw, 0.9rem);">
        Apply Filters ✨
    </button>
</div>

<!-- ============================================================ -->
<!-- STYLES – Complete with Only Funnel Rotation                  -->
<!-- ============================================================ -->
<style>
    /* ---------- 1. HERO SECTION ---------- */
    .search-hero {
        margin-top: 0;
    }
    .particles-container {
      
        pointer-events: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    .glass-search-bar {
        
        background: rgba(255, 255, 255, 0.08) !important;
        backdrop-filter: blur(12px) !important;
        -webkit-backdrop-filter: blur(12px) !important;
    }
    .glass-search-bar input::placeholder {
        color: rgba(255, 255, 255, 0.6) !important;
    }
    .glass-search-bar input:focus {
        outline: none !important;
        box-shadow: none !important;
    }

    /* ---------- 2. INTENT CHIPS ---------- */
    .glass-pill {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 50px;
        transition: all 0.25s ease;
        color: rgba(255, 255, 255, 0.85);
        font-weight: 500;
    }
    .glass-pill.active {
        background: #C8A951 !important;
        border-color: #C8A951 !important;
        color: #0F3D2E !important;
        font-weight: 600;
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(200, 169, 81, 0.25);
    }
    .glass-pill:hover {
        background: rgba(200, 169, 81, 0.2);
        border-color: #C8A951;
        color: #ffffff;
        transform: translateY(-2px);
    }

    /* ---------- 3. FACE SHAPE ---------- */
    .face-shape-circle {
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .face-icon-wrapper {
        transition: all 0.3s ease;
    }
    .face-shape-circle:hover .face-icon-wrapper {
        border-color: #C8A951;
        box-shadow: 0 8px 20px rgba(200, 169, 81, 0.15);
    }
    .face-shape-circle.active .face-icon-wrapper {
        border-color: #C8A951 !important;
        background: #C8A951 !important;
        box-shadow: 0 0 30px rgba(200, 169, 81, 0.3);
    }
    .face-shape-circle.active .face-icon-wrapper i {
        color: #0F3D2E !important;
    }
    .face-shape-circle.active span {
        color: #C8A951 !important;
        font-weight: 700;
    }

    /* ---------- 4. FILTER STRIP ---------- */
    .search-filter-bar {
        background: rgba(255, 255, 255, 0.78) !important;
        backdrop-filter: blur(18px) !important;
        -webkit-backdrop-filter: blur(18px) !important;
        border-bottom: 2px solid rgba(200, 169, 81, 0.12) !important;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.04) !important;
        z-index: 1020;
    }

    #clearFilters {
        color: #C8A951 !important;
        font-weight: 600 !important;
        transition: 0.2s;
    }
    #clearFilters:hover {
        color: #0F3D2E !important;
        background: rgba(15, 61, 46, 0.04) !important;
    }

    #activeFilters .badge {
        background: #C8A951 !important;
        color: #0F3D2E !important;
        padding: clamp(2px, 0.4vw, 4px) clamp(8px, 1.2vw, 12px) !important;
        border-radius: 50px !important;
        font-weight: 600 !important;
        font-size: clamp(0.5rem, 0.7vw, 0.65rem) !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 3px !important;
        box-shadow: 0 4px 12px rgba(200, 169, 81, 0.2);
    }
    #activeFilters .badge .btn-close {
        filter: brightness(0) invert(0.15);
        font-size: 0.35rem !important;
        background-size: 0.35rem;
        opacity: 0.8;
        margin-left: 4px;
    }

    /* ---------- 5. PRODUCT GRID – TIGHTER ---------- */
    .masonry-grid {
        columns: 3 220px;
        column-gap: 1rem;
    }
    .masonry-item {
        break-inside: avoid;
        margin-bottom: 1rem;
        transition: opacity 0.5s ease, transform 0.5s ease;
    }
    .masonry-item .card {
        border-radius: 16px !important;
        overflow: hidden;
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.02) !important;
    }
    .masonry-item .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 40px rgba(15, 61, 46, 0.07) !important;
    }
    .masonry-item .card-img-top {
        transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .masonry-item:hover .card-img-top {
        transform: scale(1.04);
    }
    .badge.bg-accent {
        background: #C8A951 !important;
        color: #0F3D2E !important;
        font-weight: 700;
        border-radius: 30px;
        letter-spacing: 0.5px;
    }

    .product-image-container:hover .btn-glass-circle {
        bottom: 6px !important;
        opacity: 1 !important;
        pointer-events: all !important;
    }
    .btn-glass-circle:hover {
        background: #0F3D2E !important;
        border-color: #0F3D2E !important;
        transform: scale(1.15) !important;
        color: #ffffff !important;
    }
    .wishlist-btn.active i {
        font-weight: 900;
        color: #C8A951 !important;
    }

    @media (hover: none) and (pointer: coarse) {
        .product-image-container .btn-glass-circle {
            bottom: 6px !important;
            opacity: 1 !important;
            pointer-events: all !important;
        }
    }

    #loadMoreBtn {
        border-radius: 50px !important;
        background: transparent !important;
        border: 2px solid #C8A951 !important;
        color: #0F3D2E !important;
        font-weight: 600 !important;
        transition: 0.25s ease;
    }
    #loadMoreBtn:hover {
        background: #0F3D2E !important;
        color: #fff !important;
        border-color: #0F3D2E !important;
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(15, 61, 46, 0.15);
    }

    /* ---------- 6. DRAWER + BLUR BACKDROP ---------- */
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
        width: 380px;
        max-width: 90vw;
        background: #F7F5F0;
        z-index: 9999;
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

    .btn-close-custom:hover {
        background: #0F3D2E !important;
        color: #fff !important;
        transform: rotate(90deg);
    }

    /* ---------- 7. ORGANIC STEPPER ---------- */
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

    /* ---------- 8. FILTER OPTION BUTTONS ---------- */
    .filter-option-btn {
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
        height: 5px;
        background: linear-gradient(90deg, #C8A951 0%, #0F3D2E 100%);
        border-radius: 10px;
    }
    .organic-slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: clamp(14px, 2.5vw, 18px);
        height: clamp(14px, 2.5vw, 18px);
        border-radius: 50%;
        background: #0F3D2E;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(15, 61, 46, 0.3);
        border: 3px solid #fff;
    }
    .organic-slider::-moz-range-thumb {
        width: clamp(14px, 2.5vw, 18px);
        height: clamp(14px, 2.5vw, 18px);
        border-radius: 50%;
        background: #0F3D2E;
        cursor: pointer;
        border: 3px solid #fff;
    }

    /* ================================================================
       🔥 ONLY FUNNEL ICON – ROTATE ON HOVER & ACTIVE
       ================================================================ */
    /* Hover: rotate 15deg */
    .filter-icon:hover .funnel-shape {
        transform: rotate(15deg);
    }
    
    /* Active (drawer open): rotate 45deg for morph effect */
    .filter-icon.active .funnel-shape {
        transform: rotate(45deg);
    }

    /* Hover effect on icon */
    .filter-icon:hover {
        background: rgba(15, 61, 46, 0.08) !important;
        transform: scale(1.05);
    }

    /* ================================================================
       RESPONSIVE – ALL DEVICES
       ================================================================ */

    /* Tablet */
    @media (max-width: 992px) {
        .masonry-grid {
            columns: 2 180px;
            column-gap: 0.8rem;
        }
        .masonry-item {
            margin-bottom: 0.8rem;
        }
        .filter-drawer {
            width: 340px;
        }
    }

    /* Mobile */
    @media (max-width: 768px) {
        .masonry-grid {
            columns: 2 140px;
            column-gap: 0.6rem;
        }
        .masonry-item {
            margin-bottom: 0.6rem;
        }
        .search-hero h1 {
            font-size: 1.6rem !important;
        }
        .glass-search-bar {
            border-radius: 40px !important;
        }
        .glass-search-bar input {
            text-align: center;
        }
        .face-icon-wrapper {
            width: clamp(35px, 8vw, 45px) !important;
            height: clamp(35px, 8vw, 45px) !important;
        }
        .filter-drawer {
            width: 100vw;
            max-width: 100vw;
            border-radius: 0;
            padding: 14px !important;
        }
        .filter-icon {
            width: clamp(28px, 5vw, 34px) !important;
            height: clamp(28px, 5vw, 34px) !important;
        }
        .funnel-shape {
            width: clamp(14px, 2.5vw, 18px) !important;
            height: clamp(14px, 2.5vw, 18px) !important;
        }
        .step-circle {
            width: clamp(24px, 5vw, 30px) !important;
            height: clamp(24px, 5vw, 30px) !important;
            font-size: clamp(0.5rem, 0.8vw, 0.65rem) !important;
        }
        .step-label {
            font-size: clamp(0.35rem, 0.6vw, 0.45rem) !important;
        }
        .filter-option-btn {
            padding: clamp(3px, 0.8vw, 6px) clamp(6px, 1.5vw, 12px) !important;
            font-size: clamp(0.45rem, 0.8vw, 0.6rem) !important;
        }
        .organic-stepper-container {
            padding: clamp(6px, 1vw, 10px) clamp(4px, 0.8vw, 8px) !important;
        }
        /* Mobile rotation adjustments */
        .filter-icon:hover .funnel-shape {
            transform: rotate(12deg);
        }
        .filter-icon.active .funnel-shape {
            transform: rotate(30deg);
        }
    }

    /* Small Mobile */
    @media (max-width: 480px) {
        .masonry-grid {
            columns: 1 160px;
            column-gap: 0;
        }
        .masonry-item {
            margin-bottom: 0.6rem;
            max-width: 240px;
            margin-left: auto;
            margin-right: auto;
        }
        .search-hero h1 {
            font-size: 1.2rem !important;
        }
        .glass-pill {
            font-size: clamp(0.45rem, 1vw, 0.55rem) !important;
            padding: clamp(0.1rem, 0.4vw, 0.2rem) clamp(0.3rem, 0.8vw, 0.5rem) !important;
        }
        .intent-chips {
            gap: 0.2rem !important;
        }
        .filter-drawer {
            padding: 10px !important;
        }
        .btn-close-custom {
            width: 24px !important;
            height: 24px !important;
            font-size: 0.7rem !important;
        }
        .drawer-header h4 {
            font-size: 0.8rem !important;
        }
        #applyFiltersDrawer {
            font-size: 0.6rem !important;
            padding: 0.3rem 0.6rem !important;
        }
        .step-circle {
            width: 20px !important;
            height: 20px !important;
            font-size: 0.4rem !important;
        }
        .step-label {
            font-size: 0.3rem !important;
        }
        .filter-option-btn {
            padding: clamp(2px, 0.6vw, 4px) clamp(4px, 1vw, 8px) !important;
            font-size: clamp(0.4rem, 0.7vw, 0.5rem) !important;
        }
        .filter-icon:hover .funnel-shape {
            transform: rotate(10deg);
        }
        .filter-icon.active .funnel-shape {
            transform: rotate(25deg);
        }
    }
</style>

<!-- ============================================================ -->
<!-- SCRIPTS – Complete with Drawer, Stepper & Icon Toggle       -->
<!-- ============================================================ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // ===== 1. SEARCH INPUT =====
    const searchInput = document.getElementById('mainSearchInput');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            document.querySelectorAll('.masonry-item').forEach(item => {
                const name = item.querySelector('.product-name')?.textContent.toLowerCase() || '';
                item.style.display = name.includes(query) ? '' : 'none';
            });
        });
    }

    // ===== 2. INTENT CHIPS =====
    document.querySelectorAll('.intent-chip').forEach(chip => {
        chip.addEventListener('click', function() {
            this.classList.toggle('active');
            const occasion = this.dataset.occasion;
            document.querySelectorAll('.masonry-item').forEach(card => {
                if (this.classList.contains('active')) {
                    card.style.display = (card.dataset.occasion === occasion) ? '' : 'none';
                } else {
                    card.style.display = '';
                }
            });
        });
    });

    // ===== 3. FACE SHAPE =====
    document.querySelectorAll('.face-shape-circle').forEach(el => {
        el.addEventListener('click', function() {
            document.querySelectorAll('.face-shape-circle').forEach(f => f.classList.remove('active'));
            this.classList.add('active');
            const face = this.dataset.face;
            const shapeMap = {
                oval: ['rectangle','square','round','aviator','wayfarer'],
                round: ['rectangle','square','geometric'],
                square: ['round','oval','aviator'],
                heart: ['cateye','rimless','round'],
                diamond: ['oval','aviator','cateye']
            };
            const allowedShapes = shapeMap[face] || [];
            document.querySelectorAll('.masonry-item').forEach(card => {
                card.style.display = allowedShapes.includes(card.dataset.shape) ? '' : 'none';
            });
        });
    });

    // ===== 4. GLOBAL FILTER SYSTEM =====
    let activeFilters = {};

    function updateActiveTags() {
        const container = document.getElementById('activeFilters');
        container.innerHTML = '';
        for (const [type, value] of Object.entries(activeFilters)) {
            const tag = document.createElement('span');
            tag.className = 'badge bg-accent text-primary me-1 mb-1';
            tag.innerHTML = `${value} <button class="btn-close ms-1" style="font-size:0.5rem;" data-filter="${type}"></button>`;
            tag.querySelector('button').addEventListener('click', function() {
                delete activeFilters[type];
                updateActiveTags();
                applyFilters();
            });
            container.appendChild(tag);
        }
    }

    function applyFilters() {
        document.querySelectorAll('.masonry-item').forEach(card => {
            let show = true;
            for (const [type, value] of Object.entries(activeFilters)) {
                if (card.dataset[type] !== value) { show = false; break; }
            }
            card.style.display = show ? '' : 'none';
        });
        const visible = document.querySelectorAll('.masonry-item[style*="display: block"], .masonry-item:not([style*="display: none"])');
        const emptyState = document.getElementById('emptyState');
        if (visible.length === 0) emptyState.classList.remove('d-none');
        else emptyState.classList.add('d-none');
    }

    document.getElementById('clearFilters').addEventListener('click', function() {
        activeFilters = {};
        document.getElementById('activeFilters').innerHTML = '';
        document.querySelectorAll('.masonry-item').forEach(c => c.style.display = '');
        document.getElementById('emptyState').classList.add('d-none');
    });

    // ===== 5. LOAD MORE =====
    const items = document.querySelectorAll('.masonry-item');
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    let visibleCount = 8;
    items.forEach((item, index) => {
        if (index >= visibleCount) item.style.display = 'none';
    });
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', () => {
            visibleCount += 8;
            items.forEach((item, index) => {
                if (index < visibleCount) item.style.display = '';
                else item.style.display = 'none';
            });
            if (visibleCount >= items.length) {
                loadMoreBtn.textContent = "You've seen it all! 👓";
                loadMoreBtn.disabled = true;
            }
        });
    }

    // ================================================================
    // 🚀 6. DRAWER + FUNNEL ICON ROTATION + ORGANIC STEPPER
    // ================================================================
    const filterIcon = document.getElementById('filterIcon');
    const drawer = document.getElementById('filterDrawer');
    const overlay = document.getElementById('filterOverlay');
    const closeBtn = document.getElementById('closeDrawerBtn');

    // Toggle function with animated icon
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

    // ----- Stepper Logic (SVG Morphing) -----
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

    // ----- Helper: Get selected value from a group -----
    function getSelectedValue(containerId) {
        const active = document.querySelector(`#${containerId} .filter-option-btn.active`);
        return active ? active.dataset.value : null;
    }

    // Auto single-select in each group
    document.querySelectorAll('.step-panel .filter-option-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const parent = this.closest('.d-flex');
            if (parent) {
                parent.querySelectorAll('.filter-option-btn').forEach(b => b.classList.remove('active'));
            }
            this.classList.add('active');
        });
    });

    // ----- Price Slider -----
    const priceSlider = document.getElementById('drawerPriceSlider');
    const priceDisplay = document.getElementById('priceDisplay');
    if (priceSlider) {
        priceSlider.addEventListener('input', function() {
            let val = parseInt(this.value);
            if (val >= 5000) priceDisplay.textContent = '₹5,000+';
            else priceDisplay.textContent = '₹' + val.toLocaleString();
        });
    }

    // ----- Apply Filters from Drawer (Collect All) -----
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

        updateActiveTags();
        applyFilters();
        closeDrawer();
    });

    console.log('✅ Optiq Search Page – Only Funnel Icon (Rotates on Hover/Click) Active!');
});
</script>

</body>
</html>