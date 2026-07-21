<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>Optiq · Bento Hero</title>
    <!-- Bootstrap Icons (optional but used for arrow) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Poppins font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: #f7f5f0;
            font-family: 'Poppins', sans-serif;
        }
        /* ===== Wrapper ===== */
        .hero-carousel-wrapper {
            background: #F7F5F0;
            padding: 1rem 0;
        }
        /* ===== Bento container ===== */
        .hero-bento {
            width: 100%;
            max-width: 1400px;
            margin: 2.5rem auto;
            position: relative;
            aspect-ratio: 21 / 9;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 24px 48px rgba(0, 0, 0, 0.12);
            background: #1B5E4A;
        }
        /* ===== Cards ===== */
        .bento-card {
            position: absolute;
            border-radius: 18px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            opacity: 0;
            will-change: transform, top, left, width, height;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 18px 22px;
            color: #fff;
            cursor: default;
            transition: box-shadow 0.3s;
            pointer-events: none;
        }
        .bento-card:hover {
            box-shadow: 0 20px 50px rgba(200, 169, 81, 0.3);
        }
        .bento-card img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
            opacity: 0.8;
            transition: opacity 0.6s;
        }
        .bento-card:hover img {
            opacity: 0.95;
        }
        .bento-content {
            position: relative;
            z-index: 1;
            background: linear-gradient(0deg, rgba(11, 26, 47, 0.85) 0%, transparent 80%);
            padding: 40px 22px 22px 22px;
            margin: -18px -22px -18px -22px;
            border-radius: 0 0 18px 18px;
            pointer-events: none;
        }
        .bento-title {
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 4px;
            letter-spacing: -0.02em;
            opacity: 0;
            transform: translateY(12px);
            font-family: 'Poppins', sans-serif;
            line-height: 1.2;
        }
        .bento-title .text-accent {
            color: #C8A951;
        }
        .bento-desc {
            font-size: 0.9rem;
            opacity: 0.7;
            margin-bottom: 12px;
            opacity: 0;
            transform: translateY(12px);
        }
        .bento-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            border: 1px solid rgba(180, 179, 175, 0.6);
            color: #ffffff;
            padding: 8px 24px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            opacity: 0;
            transform: translateY(12px);
            transition: background 0.3s, border-color 0.3s, transform 0.3s;
            width: fit-content;
            pointer-events: all;
            text-decoration: none;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        }
        .bento-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: #a09f9d;
            transform: translateY(-2px);
            color: #ffffff;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }
        /* ================================================================
           RESPONSIVE – FONT SIZES, MARGINS, GAPS (fine-tuned for mobile)
           ================================================================ */
        @media (max-width: 991.98px) {
            .hero-bento {
                aspect-ratio: 16 / 9;
                margin: 2rem auto;
            }
            .bento-title {
                font-size: 1.2rem;
            }
            .bento-desc {
                font-size: 0.75rem;
                margin-bottom: 8px;
            }
            .bento-btn {
                font-size: 0.7rem;
                padding: 5px 16px;
            }
            .bento-content {
                padding: 28px 16px 16px 16px;
            }
        }
        @media (max-width: 767.98px) {
            .hero-bento {
                aspect-ratio: 4 / 3;
                margin: 1.5rem auto;
                border-radius: 18px;
            }
            .bento-title {
                font-size: 1.0rem;
            }
            .bento-desc {
                font-size: 0.65rem;
                margin-bottom: 6px;
            }
            .bento-btn {
                font-size: 0.6rem;
                padding: 4px 14px;
                gap: 4px;
            }
            .bento-content {
                padding: 20px 14px 14px 14px;
            }
            .bento-card {
                padding: 14px 16px;
                border-radius: 14px;
            }
        }
        @media (max-width: 575.98px) {
            .hero-bento {
                aspect-ratio: 4 / 3;
                margin: 0.6rem auto;   /* reduced to collapse extra space */
                border-radius: 14px;
            }
            .bento-title {
                font-size: 0.85rem;
                line-height: 1.1;
            }
            .bento-desc {
                font-size: 0.55rem;
                margin-bottom: 4px;
            }
            .bento-btn {
                font-size: 0.5rem;
                padding: 3px 10px;
                gap: 3px;
            }
            .bento-content {
                padding: 14px 10px 10px 10px;
            }
            .bento-card {
                padding: 10px 12px;
                border-radius: 12px;
            }
        }
        /* extra tiny safety */
        @media (max-width: 400px) {
            .hero-bento {
                margin: 0.4rem auto;
                border-radius: 12px;
            }
            .bento-title {
                font-size: 0.75rem;
            }
            .bento-desc {
                font-size: 0.5rem;
            }
            .bento-btn {
                font-size: 0.45rem;
                padding: 2px 8px;
            }
            .bento-content {
                padding: 10px 8px 8px 8px;
            }
            .bento-card {
                padding: 6px 8px;
                border-radius: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="hero-carousel-wrapper py-3 py-md-4 py-lg-5">
        <div class="container-fluid px-3 px-md-4">
            <div id="heroBento" class="hero-bento">
                <div class="bento-grid" id="gridContainer"></div>
            </div>
        </div>
    </div>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('gridContainer');
            if (!container) return;

            // --- All slide data (10 items) — exactly as in PHP, but inline for demo ---
            const allSlides = [
                { img: 'banner1.png', headline: 'See the Future<br><span class="text-accent">In Style</span>', subtext: 'Luxury eyewear designed for the modern eye.', cta: 'Shop Collection', link: 'category.php' },
                { img: 'banner2.png', headline: 'The Season Edit', subtext: 'Curated for the modern eye.', cta: 'Explore Now', link: 'new-arrivals-page.php' },
                { img: 'banner3.png', headline: 'Designed for<br><span class="text-accent">Everyday Comfort</span>', subtext: 'Ultra‑lightweight frames that move with you.', cta: 'Shop Eyeglasses', link: 'category.php?cat=eyeglasses' },
                { img: 'banner4.png', headline: 'Shades of<br><span class="text-accent">Elegance</span>', subtext: 'Premium sunglasses for every occasion.', cta: 'Shop Sunglasses', link: 'category.php?cat=sunglasses' },
                { img: 'banner5.png', headline: 'A Frame for<br><span class="text-accent">Every Face</span>', subtext: 'Discover your perfect shape.', cta: 'Find Your Fit', link: 'quick-actions.php' },
                { img: 'banner6.png', headline: 'Exclusive Drop', subtext: 'Limited editions available now.', cta: 'Shop Limited', link: 'category.php?cat=premium' },
                { img: 'banner7.png', headline: 'New Arrivals', subtext: 'Fresh styles, just landed.', cta: 'Discover New', link: 'new-arrivals-page.php' },
                { img: 'banner8.png', headline: 'Timeless Classics', subtext: 'Iconic frames that never go out of style.', cta: 'Shop Classics', link: 'category.php?cat=men' },
                { img: 'banner9.png', headline: 'Bold & Beautiful', subtext: 'Make a statement with standout frames.', cta: 'Shop Bold', link: 'category.php?cat=fashion' },
                { img: 'banner10.png', headline: 'The Optiq Promise', subtext: 'Premium quality. Timeless design.', cta: 'Our Story', link: 'our-promise.php' }
            ];

            // --- Build 4 static card elements ---
            const totalSlides = allSlides.length;
            let currentIndex = 0;

            for (let i = 0; i < 4; i++) {
                const card = document.createElement('div');
                card.className = 'bento-card';
                card.dataset.index = i;

                const img = document.createElement('img');
                img.loading = 'lazy';
                // placeholder color – will be replaced
                img.src = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="400" height="300" viewBox="0 0 400 300"%3E%3Crect width="400" height="300" fill="%231b5e4a"/%3E%3Ctext x="50" y="150" font-family="sans-serif" font-size="20" fill="%23fff" opacity="0.6"%3Eoptiq%3C/text%3E%3C/svg%3E';
                card.appendChild(img);

                const content = document.createElement('div');
                content.className = 'bento-content';
                const title = document.createElement('h3');
                title.className = 'bento-title';
                const desc = document.createElement('p');
                desc.className = 'bento-desc';
                const btn = document.createElement('a');
                btn.className = 'bento-btn';

                content.appendChild(title);
                content.appendChild(desc);
                content.appendChild(btn);
                card.appendChild(content);
                container.appendChild(card);
            }

            const cards = container.querySelectorAll('.bento-card');

            function getNextGroup(startIdx) {
                let group = [];
                for (let i = 0; i < 4; i++) {
                    group.push(allSlides[(startIdx + i) % totalSlides]);
                }
                return group;
            }

            function updateCards(group) {
                cards.forEach((card, i) => {
                    const slide = group[i];
                    const img = card.querySelector('img');
                    const title = card.querySelector('.bento-title');
                    const desc = card.querySelector('.bento-desc');
                    const btn = card.querySelector('.bento-btn');

                    // In a real env, use real images. For demo we keep placeholder but set alt
                    img.src = `assets/images/${slide.img}`;
                    // fallback if images missing
                    img.onerror = function() {
                        this.src = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="400" height="300" viewBox="0 0 400 300"%3E%3Crect width="400" height="300" fill="%231b5e4a"/%3E%3Ctext x="50" y="150" font-family="sans-serif" font-size="20" fill="%23fff" opacity="0.5"%3Eoptiq%3C/text%3E%3C/svg%3E';
                    };
                    img.alt = slide.headline.replace(/<[^>]*>/g, '');
                    title.innerHTML = slide.headline;
                    desc.textContent = slide.subtext;
                    btn.href = slide.link;
                    btn.innerHTML = `${slide.cta} <i class="bi bi-arrow-right"></i>`;
                });
            }

            function getContainerSize() {
                let cw = container.clientWidth || container.offsetWidth;
                let ch = container.clientHeight || container.offsetHeight;
                if (cw === 0 || ch === 0) {
                    const parentWidth = container.parentElement?.clientWidth || window.innerWidth;
                    const maxW = Math.min(parentWidth, 1400);
                    cw = maxW;
                    ch = cw * (9 / 21);
                }
                return { cw, ch };
            }

            let tl = gsap.timeline({ paused: true });
            let fadeTimeout = null;

            function fadeOutCards(onComplete) {
                const tlFade = gsap.timeline({ onComplete: onComplete });
                cards.forEach((card, i) => {
                    const title = card.querySelector('.bento-title');
                    const desc = card.querySelector('.bento-desc');
                    const btn = card.querySelector('.bento-btn');
                    tlFade.to(card, {
                        opacity: 0,
                        scale: 0.9,
                        duration: 0.5,
                        ease: 'power2.in',
                        delay: i * 0.08
                    }, 0);
                    tlFade.to([title, desc, btn], {
                        opacity: 0,
                        y: 10,
                        duration: 0.4,
                        ease: 'power2.in'
                    }, i * 0.08);
                });
            }

            function buildTimeline() {
                if (tl) tl.kill();
                if (fadeTimeout) {
                    clearTimeout(fadeTimeout);
                    fadeTimeout = null;
                }

                tl = gsap.timeline({
                    paused: true,
                    onComplete: () => {
                        fadeTimeout = setTimeout(() => {
                            fadeOutCards(() => {
                                currentIndex = (currentIndex + 4) % totalSlides;
                                const nextGroup = getNextGroup(currentIndex);
                                updateCards(nextGroup);
                                buildTimeline();
                                tl.play();
                            });
                        }, 2500);
                    }
                });

                const { cw, ch } = getContainerSize();

                // ===== RESPONSIVE GAP – fills the container =====
                let gap = 14;
                if (window.innerWidth <= 575.98) {
                    gap = 2;      // tightest for mobile
                } else if (window.innerWidth <= 767.98) {
                    gap = 4;
                } else if (window.innerWidth <= 991.98) {
                    gap = 8;
                } else {
                    gap = 14;
                }

                const cols = 2, rows = 2;
                const cardW = (cw - gap * (cols + 1)) / cols;
                const cardH = (ch - gap * (rows + 1)) / rows;

                const finalPos = [
                    { top: gap, left: gap },
                    { top: gap, left: gap + cardW + gap },
                    { top: gap + cardH + gap, left: gap },
                    { top: gap + cardH + gap, left: gap + cardW + gap }
                ];

                // ===== FIXED CORNER POSITIONS – dynamic offsets =====
                const initSize = Math.min(cw, ch) * 0.10;
                const offsetX = cw * 0.05;
                const offsetY = ch * 0.05;

                const initPos = [
                    { top: offsetY, left: offsetX },
                    { top: offsetY, left: cw - initSize - offsetX },
                    { top: ch - initSize - offsetY, left: offsetX },
                    { top: ch - initSize - offsetY, left: cw - initSize - offsetX }
                ];

                const midW = cw * 0.26;
                const midH = ch * 0.26;
                const midPos = [
                    { top: ch * 0.12, left: cw * 0.12 },
                    { top: ch * 0.12, left: cw * 0.58 },
                    { top: ch * 0.58, left: cw * 0.12 },
                    { top: ch * 0.58, left: cw * 0.58 }
                ];

                cards.forEach((card, i) => {
                    gsap.set(card, {
                        top: initPos[i].top,
                        left: initPos[i].left,
                        width: initSize,
                        height: initSize,
                        opacity: 0,
                        scale: 0.8
                    });
                    const title = card.querySelector('.bento-title');
                    const desc = card.querySelector('.bento-desc');
                    const btn = card.querySelector('.bento-btn');
                    gsap.set([title, desc, btn], { opacity: 0, y: 12 });
                });

                // --- Animation steps ---
                cards.forEach((card, i) => {
                    tl.to(card, {
                        opacity: 1,
                        scale: 1,
                        duration: 0.6,
                        ease: 'power2.out',
                        delay: i * 0.10
                    }, 0);
                });

                cards.forEach((card, i) => {
                    tl.to(card, {
                        top: midPos[i].top,
                        left: midPos[i].left,
                        width: midW,
                        height: midH,
                        duration: 1.1,
                        ease: 'power3.inOut',
                        delay: i * 0.07
                    }, 0.7);
                });

                cards.forEach((card, i) => {
                    tl.to(card, {
                        top: finalPos[i].top,
                        left: finalPos[i].left,
                        width: cardW,
                        height: cardH,
                        duration: 1.3,
                        ease: 'power4.inOut',
                        delay: i * 0.05
                    }, 2.0);
                });

                cards.forEach((card, i) => {
                    const title = card.querySelector('.bento-title');
                    const desc = card.querySelector('.bento-desc');
                    const btn = card.querySelector('.bento-btn');
                    const start = 3.5 + i * 0.12;
                    tl.to(title, { opacity: 1, y: 0, duration: 0.6, ease: 'power2.out' }, start);
                    tl.to(desc, { opacity: 1, y: 0, duration: 0.6, ease: 'power2.out' }, start + 0.10);
                    tl.to(btn, { opacity: 1, y: 0, duration: 0.6, ease: 'power2.out' }, start + 0.20);
                });
            }

            function init() {
                const { cw, ch } = getContainerSize();
                if (cw === 0 || ch === 0) {
                    requestAnimationFrame(init);
                    return;
                }
                const firstGroup = getNextGroup(0);
                updateCards(firstGroup);
                buildTimeline();
                tl.play();
                currentIndex = 4;
            }

            requestAnimationFrame(init);

            let resizeTimer;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => {
                    if (fadeTimeout) {
                        clearTimeout(fadeTimeout);
                        fadeTimeout = null;
                    }
                    buildTimeline();
                    tl.play();
                }, 400);
            });
        });
    </script>
</body>
</html>