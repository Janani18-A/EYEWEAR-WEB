<!-- offer-secondary.php – Left Timer + Right Image (Staggered Animation) – TIGHT SPACING -->
<section class="bg-cream py-4 py-md-5 position-relative overflow-hidden" style="min-height: auto; display: flex; align-items: center;">

    <!-- ===== GOLD GLOW BLOBS ===== -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="pointer-events: none; z-index: 0;">
        <div class="position-absolute rounded-circle" 
             style="width: 300px; height: 300px; top: -100px; right: -100px; 
                    background: radial-gradient(circle, rgba(200,169,81,0.06), transparent 70%);
                    filter: blur(100px);">
        </div>
        <div class="position-absolute rounded-circle" 
             style="width: 300px; height: 300px; bottom: -80px; left: -80px; 
                    background: radial-gradient(circle, rgba(200,169,81,0.04), transparent 70%);
                    filter: blur(80px);">
        </div>
    </div>

    <div class="container position-relative" style="z-index: 1;">
        <div class="row align-items-center g-3 g-lg-4">
            
            <!-- ===== RIGHT SIDE: IMAGE (Appears FIRST) ===== -->
            <div class="col-lg-6 order-lg-2">
                <div class="offer-image-wrapper rounded-4 overflow-hidden reveal-image" style="min-height: 280px;">
                    <img 
                        src="assets/images/offer-banner1.jpg" 
                        alt="Premium Offer" 
                        class="w-100 object-fit-cover"
                        style="display: block; min-height: 280px; height: 100%;"
                    >
                </div>
            </div>

            <!-- ===== LEFT SIDE: TEXT + TIMER (Appears SECOND) ===== -->
            <div class="col-lg-6 order-lg-1">
                <div class="glass-content-wrapper reveal-text">
                    
                    <!-- Heading – reduced margin -->
                    <h2 class="text-dark fw-bold display-5 display-md-4 mb-1" style="font-family: 'Poppins', sans-serif;">LIMITED TIME OFFER</h2>
                    <p class="text-muted-custom fs-5 fs-md-4 mb-4">Grab your favorite frames before they're gone!</p>

                    <!-- ===== WATERY GLASS TIMER ROW – TIGHT ===== -->
                    <div class="row g-2 g-sm-3 justify-content-start">
                        
                        <!-- Hours -->
                        <div class="col-4 reveal-item" style="transition-delay: 0.2s;">
                            <div class="watery-glass-box text-center p-2 p-sm-3 rounded-4" style="min-height: 100px;">
                                <div class="display-4 display-sm-3 fw-bold text-accent watery-number" id="hoursDisplay">08</div>
                                <p class="text-muted-custom mb-0 small fw-semibold watery-label" style="font-size: 0.6rem; letter-spacing: 1px;">HOURS</p>
                            </div>
                        </div>

                        <!-- Minutes -->
                        <div class="col-4 reveal-item" style="transition-delay: 0.4s;">
                            <div class="watery-glass-box text-center p-2 p-sm-3 rounded-4" style="min-height: 100px;">
                                <div class="display-4 display-sm-3 fw-bold text-accent watery-number" id="minutesDisplay">45</div>
                                <p class="text-muted-custom mb-0 small fw-semibold watery-label" style="font-size: 0.6rem; letter-spacing: 1px;">MINUTES</p>
                            </div>
                        </div>

                        <!-- Seconds -->
                        <div class="col-4 reveal-item" style="transition-delay: 0.6s;">
                            <div class="watery-glass-box text-center p-2 p-sm-3 rounded-4" style="min-height: 100px;">
                                <div class="display-4 display-sm-3 fw-bold text-accent watery-number" id="secondsDisplay">27</div>
                                <p class="text-muted-custom mb-0 small fw-semibold watery-label" style="font-size: 0.6rem; letter-spacing: 1px;">SECONDS</p>
                            </div>
                        </div>

                    </div>

                    <!-- ===== CTA BUTTON – TIGHT ===== -->
                    <div class="mt-3 mt-sm-4 reveal-item" style="transition-delay: 0.8s;">
                        <a href="category.php?cat=premium" class="btn btn-emerald btn-lg px-4 px-sm-5 py-2 py-sm-3">
                            <i class="bi bi-clock me-2"></i>Grab the Deal
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<style>
    /* ================================================================
       REVEAL ANIMATIONS – IMAGE FIRST, TEXT SECOND
       ================================================================ */
    
    .reveal-image {
        opacity: 0;
        transform: scale(0.92) translateY(20px);
        transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .reveal-image.visible {
        opacity: 1;
        transform: scale(1) translateY(0);
    }

    .reveal-text {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        transition-delay: 0.3s;
    }

    .reveal-text.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .reveal-item {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .reveal-text.visible .reveal-item {
        opacity: 1;
        transform: translateY(0);
    }

    /* ================================================================
       IMAGE WRAPPER – PREMIUM SMOOTH SHADOW
       ================================================================ */
    .offer-image-wrapper {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(200, 169, 81, 0.04);
        overflow: hidden;
        border-radius: 20px;
        box-shadow: 
            0 8px 30px rgba(0, 0, 0, 0.04),
            0 0 0 1px rgba(200, 169, 81, 0.02);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        will-change: transform, box-shadow;
        /* min-height now handled inline – reduced from 400px to 280px */
    }

    .offer-image-wrapper:hover {
        transform: translateY(-6px);
        box-shadow: 
            0 20px 60px rgba(0, 0, 0, 0.08),
            0 40px 100px rgba(0, 0, 0, 0.04),
            0 0 0 1px rgba(200, 169, 81, 0.06);
    }

    .offer-image-wrapper img {
        transition: transform 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        will-change: transform;
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .offer-image-wrapper:hover img {
        transform: scale(1.04);
    }

    /* ================================================================
       WATERY GLASS BOX – PREMIUM TIMER (TIGHT VERSION)
       ================================================================ */
    .watery-glass-box {
        position: relative;
        background: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(30px);
        -webkit-backdrop-filter: blur(30px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-bottom: 2px solid rgba(200, 169, 81, 0.15);
        border-right: 1px solid rgba(200, 169, 81, 0.05);
        box-shadow: 
            0 10px 50px rgba(0, 0, 0, 0.04),
            0 0 30px rgba(200, 169, 81, 0.02),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        overflow: hidden;
        cursor: default;
        border-radius: 16px;
        /* min-height now reduced from 140px to 100px */
    }

    .watery-glass-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 70%;
        height: 40%;
        background: radial-gradient(ellipse at top left, 
            rgba(255, 255, 255, 0.4) 0%, 
            rgba(255, 255, 255, 0.08) 40%,
            transparent 70%
        );
        border-radius: 16px 0 50% 0;
        pointer-events: none;
        z-index: 0;
        opacity: 0.8;
    }

    .watery-glass-box::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 40%;
        height: 20%;
        background: radial-gradient(ellipse at bottom right, 
            rgba(200, 169, 81, 0.06) 0%, 
            transparent 70%
        );
        border-radius: 0 0 0 50%;
        pointer-events: none;
        z-index: 0;
    }

    .watery-glass-box .watery-number,
    .watery-glass-box .watery-label {
        position: relative;
        z-index: 1;
    }

    .watery-glass-box .watery-number {
        color: var(--accent, #C8A951) !important;
        text-shadow: 0 0 30px rgba(200, 169, 81, 0.05);
    }

    .watery-glass-box:hover {
        transform: translateY(-6px);
        background: rgba(255, 255, 255, 0.5);
        border-color: rgba(200, 169, 81, 0.2);
        border-bottom-color: rgba(200, 169, 81, 0.25);
        box-shadow: 
            0 20px 60px rgba(0, 0, 0, 0.06),
            0 0 50px rgba(200, 169, 81, 0.05),
            inset 0 1px 0 rgba(255, 255, 255, 0.4);
    }

    /* ================================================================
       RESPONSIVE – TIGHT SPACING ON ALL DEVICES
       ================================================================ */
    
    /* Tablet */
    @media (max-width: 991.98px) {
        .offer-image-wrapper {
            min-height: 220px !important;
        }
        .offer-image-wrapper img {
            min-height: 220px !important;
        }
        .watery-glass-box {
            min-height: 85px !important;
            padding: 0.8rem 0.5rem !important;
        }
        .watery-glass-box .watery-number {
            font-size: 2.5rem !important;
        }
        .watery-glass-box .watery-label {
            font-size: 0.55rem !important;
        }
        .glass-content-wrapper h2 {
            font-size: 2.2rem !important;
        }
        .glass-content-wrapper .fs-5 {
            font-size: 1rem !important;
            margin-bottom: 1.5rem !important;
        }
        /* Tablet: image first, text after */
        .col-lg-6.order-lg-1,
        .col-lg-6.order-lg-2 {
            order: unset !important;
        }
        .reveal-image {
            transition-delay: 0s;
        }
        .reveal-text {
            transition-delay: 0.2s;
        }
    }

    /* Mobile */
    @media (max-width: 575.98px) {
        .offer-image-wrapper {
            min-height: 160px !important;
        }
        .offer-image-wrapper img {
            min-height: 160px !important;
        }
        .watery-glass-box {
            min-height: 70px !important;
            padding: 0.5rem 0.3rem !important;
            border-radius: 12px !important;
        }
        .watery-glass-box .watery-number {
            font-size: 1.8rem !important;
        }
        .watery-glass-box .watery-label {
            font-size: 0.45rem !important;
            letter-spacing: 0.5px !important;
        }
        .watery-glass-box::before {
            width: 50%;
            height: 30%;
            border-radius: 12px 0 30% 0;
        }
        .glass-content-wrapper h2 {
            font-size: 1.6rem !important;
        }
        .glass-content-wrapper .fs-5 {
            font-size: 0.85rem !important;
            margin-bottom: 1rem !important;
        }
        .reveal-text {
            transition-delay: 0.1s;
        }
        /* Reduce gap between timer items */
        .row.g-2 {
            --bs-gutter-y: 0.5rem !important;
            --bs-gutter-x: 0.5rem !important;
        }
        /* Reduce section padding */
        .py-4 {
            padding-top: 2rem !important;
            padding-bottom: 2rem !important;
        }
    }

    /* Small Mobile */
    @media (max-width: 380px) {
        .offer-image-wrapper {
            min-height: 130px !important;
        }
        .offer-image-wrapper img {
            min-height: 130px !important;
        }
        .watery-glass-box {
            min-height: 60px !important;
            padding: 0.3rem 0.2rem !important;
        }
        .watery-glass-box .watery-number {
            font-size: 1.4rem !important;
        }
        .watery-glass-box .watery-label {
            font-size: 0.4rem !important;
        }
        .glass-content-wrapper h2 {
            font-size: 1.3rem !important;
        }
        .glass-content-wrapper .fs-5 {
            font-size: 0.75rem !important;
        }
        .btn-emerald {
            font-size: 0.7rem !important;
            padding: 0.4rem 1rem !important;
        }
        .row.g-2 {
            --bs-gutter-y: 0.3rem !important;
            --bs-gutter-x: 0.3rem !important;
        }
        .py-4 {
            padding-top: 1.5rem !important;
            padding-bottom: 1.5rem !important;
        }
    }
</style>

<!-- ============================================================ -->
<!-- JAVASCRIPT – SCROLL REVEAL + COUNTDOWN TIMER (unchanged) -->
<!-- ============================================================ -->
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ================================================================
        // 1. SCROLL REVEAL – IMAGE FIRST, THEN TEXT
        // ================================================================
        const imageEl = document.querySelector('.reveal-image');
        const textEl = document.querySelector('.reveal-text');

        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target === imageEl) {
                        imageEl.classList.add('visible');
                    }
                    if (entry.target === textEl) {
                        setTimeout(() => {
                            textEl.classList.add('visible');
                        }, 300);
                    }
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -20px 0px' });

        if (imageEl) revealObserver.observe(imageEl);
        if (textEl) revealObserver.observe(textEl);

        // ================================================================
        // 2. COUNTDOWN TIMER
        // ================================================================
        let totalSeconds = (8 * 3600) + (45 * 60) + 27;

        const hoursDisplay = document.getElementById('hoursDisplay');
        const minutesDisplay = document.getElementById('minutesDisplay');
        const secondsDisplay = document.getElementById('secondsDisplay');

        function updateTimer() {
            if (totalSeconds <= 0) {
                hoursDisplay.textContent = '00';
                minutesDisplay.textContent = '00';
                secondsDisplay.textContent = '00';
                return;
            }

            const hours = Math.floor(totalSeconds / 3600);
            const minutes = Math.floor((totalSeconds % 3600) / 60);
            const seconds = totalSeconds % 60;

            hoursDisplay.textContent = String(hours).padStart(2, '0');
            minutesDisplay.textContent = String(minutes).padStart(2, '0');
            secondsDisplay.textContent = String(seconds).padStart(2, '0');

            totalSeconds--;
        }

        updateTimer();
        setInterval(updateTimer, 1000);

        console.log('✅ Offer Secondary – TIGHT SPACING VERSION!');
    });
</script>