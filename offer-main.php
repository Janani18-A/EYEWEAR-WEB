<!-- offer-main.php – Perfect Cover (Like Reference) UPDATED COLORS -->
<section class="bg-cream py-5">
    <div class="container">
        <div class="row g-4">

            <!-- ===== LEFT BANNER – TALL & PERFECT COVER ===== -->
            <div class="col-lg-7">
                <a href="category.php?cat=offers"
                   class="offer-banner-wrapper rounded-4 overflow-hidden position-relative d-block w-100 shadow-sm">

                    <div class="banner-overlay">
                        <h3 class="fw-bold mb-1">Choose your Sunnies</h3>
                        <p class="mb-2">for the season</p>
                        <span class="badge bg-accent text-primary py-1 py-sm-2 px-3 px-sm-4 rounded-pill">Limited Deal</span>
                    </div>

                </a>
            </div>

            <!-- ===== RIGHT BANNERS ===== -->
            <div class="col-lg-5">
                <div class="d-flex flex-column gap-3">

                    <a href="category.php?cat=sunglasses"
                       class="offer-img-link rounded-4 overflow-hidden d-block w-100"
                       style="background-image: url('assets/images/offer-banner2.jpg');">
                    </a>

                    <a href="category.php?cat=eyeglasses"
                       class="offer-img-link rounded-4 overflow-hidden d-block w-100"
                       style="background-image: url('assets/images/offer-banner3.jpg');">
                    </a>

                </div>
            </div>

        </div>
    </div>
</section>

<style>
    /* ============================================================
       LEFT BANNER – PERFECT COVER
       ============================================================ */
    .offer-banner-wrapper {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 62.5%;          /* 16:10 ratio */
        background-image: url('assets/images/offer-banner4.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        border: 1px solid rgba(0,0,0,0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-decoration: none;
        background-color: var(--cream, #F7F5F0);
    }

    .offer-banner-wrapper:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(15, 61, 46, 0.12);
    }

    /* ============================================================
       OVERLAY TEXT
       ============================================================ */
    .banner-overlay {
        position: absolute;
        bottom: 30px;
        left: 30px;
        z-index: 2;
        pointer-events: none;
    }

    .banner-overlay h3 {
        color: var(--dark, #1A1A1A);
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 5px;
        text-shadow: 0 3px 20px rgba(255,255,255,0.3);
    }

    .banner-overlay p {
        color: var(--muted, #8A8A8A);
        margin-bottom: 12px;
        font-size: 1.05rem;
        text-shadow: 0 2px 15px rgba(255,255,255,0.2);
    }

    .banner-overlay .badge {
        font-size: 0.8rem;
        padding: 6px 18px;
        font-weight: 600;
        background: var(--accent, #C8A951) !important;
        color: var(--primary, #0F3D2E) !important;
        border: 1px solid rgba(200, 169, 81, 0.2);
    }

    /* ============================================================
       RIGHT IMAGES – PERFECT COVER
       ============================================================ */
    .offer-img-link {
        display: block;
        width: 100%;
        height: 0;
        padding-bottom: 45%;            /* Matches left banner proportion */
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        border: 1px solid rgba(0,0,0,0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-decoration: none;
        background-color: var(--cream, #F7F5F0);
    }

    .offer-img-link:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(15, 61, 46, 0.10);
    }

    /* ============================================================
       RESPONSIVE – ASPECT RATIO & FONT SIZES
       ============================================================ */

    /* Tablet */
    @media (max-width: 991.98px) {
        .offer-banner-wrapper {
            padding-bottom: 50%;
        }
        .offer-img-link {
            padding-bottom: 35%;
        }
        .banner-overlay h3 {
            font-size: 1.6rem;
        }
        .banner-overlay p {
            font-size: 0.95rem;
        }
        .banner-overlay .badge {
            font-size: 0.7rem;
            padding: 5px 14px;
        }
    }

    /* Mobile */
    @media (max-width: 575.98px) {
        .offer-banner-wrapper {
            padding-bottom: 65%;
        }
        .offer-img-link {
            padding-bottom: 40%;
        }
        .banner-overlay {
            bottom: 20px;
            left: 20px;
        }
        .banner-overlay h3 {
            font-size: 1.2rem;
            margin-bottom: 2px;
        }
        .banner-overlay p {
            font-size: 0.8rem;
            margin-bottom: 8px;
        }
        .banner-overlay .badge {
            font-size: 0.65rem;
            padding: 4px 12px;
        }
    }
</style>