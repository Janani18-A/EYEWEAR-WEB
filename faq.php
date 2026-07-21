<!-- faq.php – Liquid Wave FAQ (Option 1) + Working Toggle (Updated Colors) – TIGHT SPACING -->
<section class="py-4 py-md-5 bg-primary">
    <div class="container py-3 py-md-4">
        <div class="mx-auto" style="max-width: 768px;">
            
            <!-- Section Header – responsive text -->
            <div class="text-center mb-4 mb-md-5 reveal">
                <h2 class="fw-bold text-white mb-2" style="font-family: 'Poppins', sans-serif; font-size: clamp(1.8rem, 4vw, 2.5rem);">
                    Frequently Asked Questions
                </h2>
                <p class="text-white-50" style="font-size: clamp(0.9rem, 1.8vw, 1.25rem);">Everything you need to know about Optiq eyewear.</p>
            </div>

            <!-- ===== FAQ CONTAINER ===== -->
            <div class="faq-container" id="faqContainer">
                <?php
                $faqs = [
                    [
                        'question' => 'What\'s your return policy?',
                        'answer'   => 'We offer a 30-day hassle-free return policy. If you\'re not completely satisfied with your frames, simply return them in their original condition for a full refund or exchange. No questions asked.'
                    ],
                    [
                        'question' => 'How do I choose the right frame size?',
                        'answer'   => 'Use our Frame Finder quiz or check the size guide on each product page. We provide detailed measurements to help you find your perfect fit. You can also try our Virtual Try-On feature.'
                    ],
                    [
                        'question' => 'Do you offer warranty on frames?',
                        'answer'   => 'Yes! All Optiq frames come with a 1-year manufacturing warranty covering defects in materials and workmanship. We\'re always happy to help with repairs even beyond the warranty period.'
                    ],
                    [
                        'question' => 'How long does delivery take?',
                        'answer'   => 'Standard delivery takes 5-7 business days across India. Express delivery (2-3 days) is available for select pin codes. Track your order in real-time on our website.'
                    ]
                ];

                foreach ($faqs as $index => $faq):
                ?>
                <!-- ===== FAQ ITEM WITH LIQUID WAVE ===== -->
                <div class="faq-item" data-index="<?php echo $index; ?>">
                    
                    <!-- LIQUID WAVE FILL (on hover) -->
                    <div class="liquid-wrapper">
                        <svg viewBox="0 0 100 100" preserveAspectRatio="none">
                            <path class="liquid-path" d="M 0,100 L 100,100 L 100,25 C 80,10 60,40 40,25 C 20,10 10,30 0,25 Z" fill="url(#liquidGrad)" />
                        </svg>
                    </div>

                    <!-- HEADER -->
                    <button class="faq-header-btn" type="button" onclick="toggleFaq(this, <?php echo $index; ?>)">
                        <span class="faq-question-text"><?php echo $faq['question']; ?></span>
                        <span class="faq-icon-wrapper">
                            <i class="bi bi-plus-lg faq-icon"></i>
                        </span>
                    </button>

                    <!-- ANSWER BODY -->
                    <div class="faq-answer-wrapper" id="faqAnswer<?php echo $index; ?>">
                        <div class="faq-answer-inner">
                            <div class="faq-answer-body">
                                <p><?php echo $faq['answer']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- ===== SVG GRADIENTS (Liquid colors) ===== -->
<!-- ============================================ -->
<svg style="position: absolute; width: 0; height: 0; pointer-events: none;">
    <defs>
        <linearGradient id="liquidGrad" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="#C8A951" />
            <stop offset="50%" stop-color="#B8973F" />
            <stop offset="100%" stop-color="#A8853A" />
        </linearGradient>
    </defs>
</svg>

<!-- ============================================ -->
<!-- ===== STYLES ===== -->
<!-- ============================================ -->
<style>
    /* ----- Background ----- */
    .bg-primary {
        background-color: var(--primary, #0F3D2E) !important;
    }

    /* ============================================================
       FAQ ITEM – with Liquid Wave
       ============================================================ */
    .faq-item {
        position: relative;
        background: rgba(255, 255, 255, 0.04);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 16px !important;
        overflow: hidden;
        transition: transform 0.4s cubic-bezier(0.23, 1, 0.32, 1),
                    box-shadow 0.4s ease;
        will-change: transform;
        margin-bottom: clamp(0.8rem, 1.5vw, 1.2rem);
        cursor: pointer;
    }

    .faq-item:last-child {
        margin-bottom: 0;
    }

    .faq-item:hover {
        border-color: rgba(200, 169, 81, 0.2);
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
    }

    /* ============================================================
       LIQUID WAVE WRAPPER (on hover)
       ============================================================ */
    .liquid-wrapper {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        transform: translateY(100%);
        transition: transform 0.7s cubic-bezier(0.23, 1, 0.32, 1);
        pointer-events: none;
        z-index: 0;
        border-radius: inherit;
        overflow: hidden;
        will-change: transform;
    }

    .faq-item:hover .liquid-wrapper,
    .faq-item.active .liquid-wrapper {
        transform: translateY(0);
    }

    .liquid-wrapper svg {
        display: block;
        width: 100%;
        height: 100%;
        border-radius: inherit;
        opacity: 0.85;
    }

    .liquid-wrapper svg path {
        transition: d 0.7s ease;
        will-change: d;
    }

    /* Sloshing wave animation on hover */
    @keyframes slosh {
        0% {
            d: path("M 0,100 L 100,100 L 100,25 C 80,10 60,40 40,25 C 20,10 10,30 0,25 Z");
        }
        50% {
            d: path("M 0,100 L 100,100 L 100,32 C 85,42 65,18 45,32 C 25,46 15,25 0,32 Z");
        }
        100% {
            d: path("M 0,100 L 100,100 L 100,25 C 80,10 60,40 40,25 C 20,10 10,30 0,25 Z");
        }
    }

    .faq-item:hover .liquid-path,
    .faq-item.active .liquid-path {
        animation: slosh 1.4s ease-in-out infinite;
    }

    /* ============================================================
       HEADER BUTTON
       ============================================================ */
    .faq-header-btn {
        width: 100%;
        padding: clamp(0.8rem, 2vw, 1.2rem) clamp(0.8rem, 2.5vw, 1.5rem);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: transparent !important;
        border: none !important;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: clamp(0.85rem, 1.5vw, 1.05rem);
        color: rgba(255, 255, 255, 0.85) !important;
        transition: color 0.3s ease;
        text-align: left;
        cursor: pointer;
        outline: none;
        position: relative;
        z-index: 2;
        gap: clamp(0.5rem, 1.5vw, 1rem);
    }

    .faq-header-btn:hover {
        color: #ffffff !important;
    }

    .faq-header-btn:focus {
        outline: none !important;
    }

    .faq-question-text {
        flex: 1;
    }

    /* ============================================================
       ICON – Plus on right
       ============================================================ */
    .faq-icon-wrapper {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: clamp(24px, 4vw, 32px);
        height: clamp(24px, 4vw, 32px);
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.06);
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .faq-icon {
        font-size: clamp(0.8rem, 1.5vw, 1.2rem);
        color: rgba(255, 255, 255, 0.25);
        transition: transform 0.5s cubic-bezier(0.23, 1, 0.32, 1),
                    color 0.3s ease;
        display: inline-block;
        line-height: 1;
    }

    .faq-item.active .faq-icon-wrapper {
        background: rgba(200, 169, 81, 0.12);
        border-color: rgba(200, 169, 81, 0.2);
    }

    .faq-item.active .faq-icon {
        transform: rotate(45deg);
        color: var(--accent, #C8A951);
    }

    .faq-header-btn:hover .faq-icon {
        color: rgba(255, 255, 255, 0.5);
    }

    .faq-item.active .faq-header-btn:hover .faq-icon {
        color: var(--accent, #C8A951);
    }

    /* ============================================================
       ANSWER WRAPPER (Smooth expand)
       ============================================================ */
    .faq-answer-wrapper {
        display: grid;
        grid-template-rows: 0fr;
        transition: grid-template-rows 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        overflow: hidden;
        position: relative;
        z-index: 1;
    }

    .faq-item.active .faq-answer-wrapper {
        grid-template-rows: 1fr;
    }

    .faq-answer-inner {
        overflow: hidden;
        padding-top: 0;
        transition: padding-top 0.4s ease;
    }

    .faq-item.active .faq-answer-inner {
        padding-top: 0;
    }

    .faq-answer-body {
        padding: 0 clamp(0.8rem, 2vw, 1.5rem) clamp(0.8rem, 2vw, 1.5rem);
        color: rgba(255, 255, 255, 0.6);
        font-size: clamp(0.8rem, 1.2vw, 0.95rem);
        line-height: clamp(1.6, 2.2vw, 1.8);
        border-top: 1px solid rgba(200, 169, 81, 0.06);
        padding-top: clamp(0.6rem, 1.2vw, 1.2rem);
        position: relative;
        z-index: 1;
    }

    .faq-answer-body p {
        margin-bottom: 0;
    }

    /* ============================================================
       BLUR OTHERS (when active)
       ============================================================ */
    .faq-container.blur-others .faq-item:not(.active) {
        filter: blur(3px);
        opacity: 0.35;
        transform: scale(0.97);
        pointer-events: none;
        border-color: transparent;
        transition: filter 0.4s ease, opacity 0.4s ease, transform 0.4s ease;
    }

    .faq-container.blur-others .faq-item.active {
        transform: scale(1);
        opacity: 1;
        filter: blur(0);
        border-color: rgba(200, 169, 81, 0.15);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
    }

    /* ============================================================
       SCROLL REVEAL
       ============================================================ */
    .reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }

    /* ============================================================
       RESPONSIVE TWEAKS
       ============================================================ */

    /* Tablet */
    @media (max-width: 991.98px) {
        .faq-item {
            margin-bottom: 0.8rem;
        }
    }

    /* Mobile */
    @media (max-width: 575.98px) {
        .faq-item {
            border-radius: 12px !important;
            margin-bottom: 0.6rem;
        }
        .faq-container.blur-others .faq-item:not(.active) {
            filter: blur(2px);
            opacity: 0.3;
        }
        .faq-header-btn {
            padding: 0.5rem 0.6rem !important;
        }
        .faq-answer-body {
            padding: 0 0.6rem 0.6rem !important;
            padding-top: 0.5rem !important;
        }
        .faq-icon-wrapper {
            width: 20px !important;
            height: 20px !important;
        }
        .faq-icon {
            font-size: 0.75rem !important;
        }
        /* Section padding reduced */
        .py-4 {
            padding-top: 2rem !important;
            padding-bottom: 2rem !important;
        }
        .container.py-3 {
            padding-top: 0.75rem !important;
            padding-bottom: 0.75rem !important;
        }
    }

    /* Small Mobile */
    @media (max-width: 380px) {
        .faq-item {
            margin-bottom: 0.4rem;
            border-radius: 10px !important;
        }
        .faq-header-btn {
            padding: 0.4rem 0.5rem !important;
            font-size: 0.7rem !important;
            gap: 0.3rem !important;
        }
        .faq-answer-body {
            font-size: 0.65rem !important;
            padding: 0 0.5rem 0.5rem !important;
            padding-top: 0.4rem !important;
            line-height: 1.4 !important;
        }
        .faq-icon-wrapper {
            width: 16px !important;
            height: 16px !important;
        }
        .faq-icon {
            font-size: 0.6rem !important;
        }
        .py-4 {
            padding-top: 1.5rem !important;
            padding-bottom: 1.5rem !important;
        }
    }
</style>

<!-- ============================================ -->
<!-- ===== CUSTOM JS – TOGGLE + BLUR ===== -->
<!-- ============================================ -->
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const container = document.getElementById('faqContainer');
        const faqItems = container.querySelectorAll('.faq-item');
        let activeIndex = null;

        // ============================================================
        // 1. TOGGLE FUNCTION
        // ============================================================
        window.toggleFaq = function(btn, index) {
            const item = btn.closest('.faq-item');
            const isActive = item.classList.contains('active');

            // Close all
            faqItems.forEach(el => el.classList.remove('active'));
            container.classList.remove('blur-others');

            // If it wasn't active, open this one
            if (!isActive) {
                item.classList.add('active');
                container.classList.add('blur-others');
                activeIndex = index;
            } else {
                activeIndex = null;
            }
        };

        // ============================================================
        // 2. BLUR OTHERS – also handle clicks outside via wrapper
        // ============================================================
        // If you click on the item itself (not the button), toggle
        faqItems.forEach((item, index) => {
            item.addEventListener('click', function(e) {
                // Ignore if clicked on a button inside (to prevent double toggle)
                if (e.target.closest('.faq-header-btn')) return;
                const btn = this.querySelector('.faq-header-btn');
                if (btn) {
                    btn.click();
                }
            });
        });

        // ============================================================
        // 3. SCROLL REVEAL
        // ============================================================
        const reveals = document.querySelectorAll('.reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.15 });
        reveals.forEach(el => revealObserver.observe(el));

        // Check already visible
        reveals.forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight * 0.85) {
                el.classList.add('active');
            }
        });

        // ============================================================
        // 4. CLOSE ON ESCAPE KEY
        // ============================================================
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                faqItems.forEach(el => el.classList.remove('active'));
                container.classList.remove('blur-others');
                activeIndex = null;
            }
        });

        console.log('✅ Optiq FAQ – Liquid Wave + Working Toggle loaded!');
    });
</script>