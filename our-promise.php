<!-- our-promise.php – Premium Smooth Shadow on Promise Cards (Responsive) -->
<section class="bg-primary py-5">
    <div class="container py-4">
        <div class="text-center mb-5 reveal">
            <h2 class="display-5 display-md-4 fw-bold text-white mb-3" style="font-family: 'Poppins', sans-serif;">
                Our Promise
            </h2>
            <p class="lead fs-4 fs-md-3 text-white-50">What makes Optiq your perfect eyewear partner.</p>
        </div>
        
        <div class="row g-3 g-md-4">
            <div class="col-md-6 reveal">
                <div class="promise-card h-100 p-4 p-md-5">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-4 promise-icon-bg" 
                         style="width: clamp(50px, 8vw, 60px); height: clamp(50px, 8vw, 60px); background: rgba(200, 169, 81, 0.15);">
                        <i class="bi bi-emoji-smile text-accent promise-icon" style="font-size: clamp(1.5rem, 3vw, 2rem);"></i>
                    </div>
                    <h3 class="h4 fw-bold text-white promise-heading mb-3">Crafted for You</h3>
                    <p class="text-white-70 promise-text mb-4" style="font-size: clamp(0.85rem, 1.2vw, 1rem);">Frames designed around your face, your comfort, and your unique style. Every pair is tailored to fit like it was made just for you.</p>
                    <a href="#" class="text-accent fw-bold text-decoration-none promise-link">Find Your Fit <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-md-6 reveal">
                <div class="promise-card h-100 p-4 p-md-5">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-4 promise-icon-bg" 
                         style="width: clamp(50px, 8vw, 60px); height: clamp(50px, 8vw, 60px); background: rgba(200, 169, 81, 0.15);">
                        <i class="bi bi-shield-check text-accent promise-icon" style="font-size: clamp(1.5rem, 3vw, 2rem);"></i>
                    </div>
                    <h3 class="h4 fw-bold text-white promise-heading mb-3">Built to Last</h3>
                    <p class="text-white-70 promise-text mb-4" style="font-size: clamp(0.85rem, 1.2vw, 1rem);">Premium materials that feel light, stay strong, and move with you. From work to weekend, your frames keep up effortlessly.</p>
                    <a href="#" class="text-accent fw-bold text-decoration-none promise-link">Explore More <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* ================================================================
       PROMISE CARDS – PREMIUM SMOOTH SHADOW
       ================================================================ */

    .promise-card {
        background: rgba(255, 255, 255, 0.06);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 1.5rem;
        /* padding now handled by Bootstrap p-4 p-md-5 on the card */
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        cursor: pointer;
        box-shadow: 
            0 8px 30px rgba(0, 0, 0, 0.04),
            0 0 0 1px rgba(200, 169, 81, 0.02);
        will-change: transform, box-shadow;
    }

    .promise-card:hover {
        transform: translateY(-10px);
        background: rgba(255, 255, 255, 0.10);
        border-color: rgba(200, 169, 81, 0.12);
        box-shadow: 
            0 20px 60px rgba(0, 0, 0, 0.08),
            0 40px 100px rgba(0, 0, 0, 0.04),
            0 0 0 1px rgba(200, 169, 81, 0.06);
    }

    .promise-card .promise-icon-bg {
        background: rgba(200, 169, 81, 0.12) !important;
        transition: background 0.3s ease;
    }

    .promise-card:hover .promise-icon-bg {
        background: rgba(200, 169, 81, 0.25) !important;
    }

    .promise-card .promise-icon {
        color: var(--accent, #C8A951) !important;
        transition: transform 0.3s ease;
    }

    .promise-card:hover .promise-icon {
        transform: scale(1.1);
    }

    .promise-card .promise-heading {
        color: #ffffff !important;
        transition: color 0.3s ease;
    }

    .promise-card:hover .promise-heading {
        color: var(--accent, #C8A951) !important;
    }

    .promise-card .promise-text {
        color: rgba(255, 255, 255, 0.7) !important;
        transition: color 0.3s ease;
    }

    .promise-card:hover .promise-text {
        color: rgba(255, 255, 255, 0.9) !important;
    }

    .promise-card .promise-link {
        color: var(--accent, #C8A951) !important;
        transition: color 0.3s ease, transform 0.3s ease;
        display: inline-block;
    }

    .promise-card:hover .promise-link {
        color: #ffffff !important;
        transform: translateX(4px);
    }

    /* ================================================================
       RESPONSIVE TWEAKS
       ================================================================ */
    
    /* Tablet */
    @media (max-width: 991.98px) {
        .promise-card {
            padding: 2rem !important;
            border-radius: 1.25rem !important;
        }
        .promise-card .promise-heading {
            font-size: 1.25rem !important;
        }
        .promise-card .promise-text {
            font-size: 0.9rem !important;
        }
    }

    /* Mobile */
    @media (max-width: 575.98px) {
        .promise-card {
            padding: 1.5rem !important;
            border-radius: 1rem !important;
        }
        .promise-card .promise-heading {
            font-size: 1.1rem !important;
            margin-bottom: 0.5rem !important;
        }
        .promise-card .promise-text {
            font-size: 0.8rem !important;
            margin-bottom: 1rem !important;
        }
        .promise-card .promise-link {
            font-size: 0.85rem !important;
        }
        .promise-card .promise-icon-bg {
            width: 50px !important;
            height: 50px !important;
            margin-bottom: 1rem !important;
        }
        .promise-card .promise-icon {
            font-size: 1.5rem !important;
        }
    }

    /* Small Mobile */
    @media (max-width: 380px) {
        .promise-card {
            padding: 1.2rem !important;
        }
        .promise-card .promise-heading {
            font-size: 1rem !important;
        }
        .promise-card .promise-text {
            font-size: 0.75rem !important;
        }
        .promise-card .promise-link {
            font-size: 0.8rem !important;
        }
        .promise-card .promise-icon-bg {
            width: 42px !important;
            height: 42px !important;
        }
        .promise-card .promise-icon {
            font-size: 1.2rem !important;
        }
    }
</style>