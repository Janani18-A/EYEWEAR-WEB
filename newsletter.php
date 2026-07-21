<!-- newsletter.php – Premium Newsletter with Cream + Gold Lighting – TIGHT SPACING -->
<section class="newsletter-section py-4 py-md-5 position-relative overflow-hidden">

    <!-- ===== BACKGROUND LAYER ===== -->
    <div class="newsletter-bg-layer"></div>
    <div class="newsletter-glow-overlay"></div>

    <div class="container py-3 py-md-4 text-center position-relative" style="z-index: 2;">
        <div class="mx-auto reveal" style="max-width: 500px;">
            
            <!-- Icon – responsive -->
            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3 mb-md-4 p-2 p-md-3" 
                 style="background: rgba(255,255,255,0.6); width: clamp(60px, 12vw, 80px); height: clamp(60px, 12vw, 80px); border: 1px solid rgba(200,169,81,0.2); backdrop-filter: blur(8px);">
                <i class="bi bi-envelope-paper text-accent" style="font-size: clamp(1.8rem, 4vw, 2.5rem);"></i>
            </div>
            
            <h2 class="fw-bold text-dark mb-2" style="font-family: 'Poppins', sans-serif; font-size: clamp(1.6rem, 4vw, 2.5rem);">
                Stay In Style
            </h2>
            <p class="text-muted-custom mb-3 mb-md-4" style="font-size: clamp(0.85rem, 1.6vw, 1.1rem);">
                Get updates on new arrivals, exclusive offers, and eyewear trends.
            </p>
            
            <!-- Form – responsive layout -->
            <form class="d-flex flex-column flex-sm-row gap-2 newsletter-form" id="newsletterForm">
                <input type="email" class="form-control newsletter-input py-2 py-md-3 px-3 px-md-4" placeholder="Enter your email" required style="font-size: clamp(0.85rem, 1.2vw, 1rem);">
                <button type="submit" class="btn btn-emerald px-3 px-md-4 py-2 py-md-3 rounded-3" style="font-size: clamp(0.75rem, 1.2vw, 0.9rem); white-space: nowrap;">
                    <i class="bi bi-send me-1 me-md-2"></i>Subscribe
                </button>
            </form>
            <p class="text-muted-custom small mt-3" style="font-size: clamp(0.65rem, 1vw, 0.8rem);">
                <i class="bi bi-shield-check me-1"></i> No spam. Unsubscribe anytime.
            </p>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- ===== STYLES – UPDATED TO CREAM ===== -->
<!-- ============================================================ -->
<style>
    /* ================================================================
       NEWSLETTER SECTION – CREAM + GOLD LIGHTING BACKGROUND
       ================================================================ */
    .newsletter-section {
        min-height: auto;
        display: flex;
        align-items: center;
        background: var(--cream, #F7F5F0);
        /* padding now handled by Bootstrap py-4 py-md-5 */
    }

    /* ----- Background Layer with Cream + Gold Lighting ----- */
    .newsletter-bg-layer {
        position: absolute;
        inset: 0;
        z-index: 0;
        background-image: url('assets/images/newsletter-bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-color: var(--cream, #F7F5F0);
        background-blend-mode: overlay;
        opacity: 0.5;
        pointer-events: none;
    }

    .newsletter-glow-overlay {
        position: absolute;
        inset: 0;
        z-index: 1;
        background: radial-gradient(ellipse at 50% 50%, rgba(200, 169, 81, 0.03), transparent 70%);
        pointer-events: none;
    }

    /* ================================================================
       NEWSLETTER FORM – LIGHT GLASS
       ================================================================ */
    .newsletter-form {
        position: relative;
        z-index: 2;
    }

    .newsletter-input {
        background: rgba(255, 255, 255, 0.6) !important;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(0, 0, 0, 0.06) !important;
        border-radius: 12px !important;
        color: var(--dark, #1A1A1A) !important;
        /* font-size now handled inline with clamp */
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
        flex: 1;
        /* padding now handled by Bootstrap py-2 py-md-3 px-3 px-md-4 */
    }

    .newsletter-input::placeholder {
        color: var(--muted, #8A8A8A) !important;
        font-weight: 300;
    }

    .newsletter-input:focus {
        outline: none !important;
        border-color: rgba(200, 169, 81, 0.3) !important;
        box-shadow: 0 0 0 4px rgba(200, 169, 81, 0.05), 0 8px 30px rgba(0, 0, 0, 0.04) !important;
        background: rgba(255, 255, 255, 0.8) !important;
    }

    /* ================================================================
       BUTTON – EMERALD
       ================================================================ */
    .newsletter-section .btn-emerald {
        background: linear-gradient(135deg, var(--primary, #0F3D2E), var(--primary-light, #1B5E4A));
        color: var(--white, #FFFFFF);
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        border: none;
        border-radius: 12px;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 20px rgba(15, 61, 46, 0.15);
        transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        position: relative;
        overflow: hidden;
        /* padding and font-size now handled inline with Bootstrap + clamp */
    }

    .newsletter-section .btn-emerald::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 12px;
        background: linear-gradient(135deg, rgba(255,255,255,0.08), transparent);
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .newsletter-section .btn-emerald:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 8px 30px rgba(15, 61, 46, 0.25);
        background: linear-gradient(135deg, var(--primary-dark, #0A2A1F), var(--primary, #0F3D2E));
        color: var(--white, #FFFFFF);
    }

    .newsletter-section .btn-emerald:hover::before {
        opacity: 1;
    }

    .newsletter-section .btn-emerald:active {
        transform: scale(0.96);
    }

    /* ================================================================
       RESPONSIVE – TIGHT SPACING
       ================================================================ */

    /* Mobile */
    @media (max-width: 575.98px) {
        .newsletter-form {
            flex-direction: column;
        }
        .newsletter-input {
            border-radius: 12px !important;
            text-align: center;
        }
        .newsletter-section .btn-emerald {
            width: 100%;
            justify-content: center;
        }
        .newsletter-section .btn-emerald {
            white-space: normal !important;
        }
        .newsletter-section {
            min-height: auto;
        }
    }

    /* Small Mobile */
    @media (max-width: 380px) {
        .newsletter-section .btn-emerald {
            font-size: 0.65rem !important;
            padding: 0.4rem 0.8rem !important;
        }
        .newsletter-input {
            font-size: 0.75rem !important;
            padding: 0.4rem 0.8rem !important;
        }
        .newsletter-section .py-4 {
            padding-top: 1.5rem !important;
            padding-bottom: 1.5rem !important;
        }
        .container.py-3 {
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;
        }
    }
</style>

<!-- ============================================================ -->
<!-- ===== JAVASCRIPT – Form Submission ===== -->
<!-- ============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('newsletterForm');
    const input = form.querySelector('.newsletter-input');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = input.value.trim();
        if (email) {
            const btn = this.querySelector('.btn-emerald');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="bi bi-check-circle me-2"></i> Subscribed!';
            btn.classList.add('btn-success');
            
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.classList.remove('btn-success');
                input.value = '';
                input.blur();
            }, 3000);
            
            console.log('✅ Newsletter subscribed:', email);
        }
    });
});
</script>