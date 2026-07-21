<!-- testimonials.php – Premium Animated Testimonial Slider (Scroll‑Triggered) – FIXED MOBILE OVERLAP -->
<?php
$reviews = [
    [
        'name'    => 'Priya Sharma',
        'city'    => 'Mumbai',
        'quote'   => 'I never thought eyewear shopping could feel this premium. The frame quality exceeded my expectations, and the fit was perfect from day one. I\'ve received countless compliments since switching to Optiq.',
        'img'     => 'https://i.pravatar.cc/150?img=1'
    ],
    [
        'name'    => 'Rahul Mehta',
        'city'    => 'Bangalore',
        'quote'   => 'As someone who spends long hours in front of a screen, these blue-light glasses have made a huge difference. Stylish, lightweight, and incredibly comfortable for daily wear.',
        'img'     => 'https://i.pravatar.cc/150?img=2'
    ],
    [
        'name'    => 'Ananya Patel',
        'city'    => 'Delhi',
        'quote'   => 'The attention to detail is impressive. From the packaging to the frame finish, everything feels luxurious. Optiq has become my go-to brand for eyewear.',
        'img'     => 'https://i.pravatar.cc/150?img=3'
    ],
    [
        'name'    => 'Sneha Kapoor',
        'city'    => 'Chennai',
        'quote'   => 'Finding the right frame online is usually difficult, but the experience was seamless. The design is elegant, comfortable, and looks even better in person.',
        'img'     => 'https://i.pravatar.cc/150?img=4'
    ],
    [
        'name'    => 'Vikram Khanna',
        'city'    => 'Hyderabad',
        'quote'   => 'The premium sunglasses collection is outstanding. Excellent UV protection, crystal-clear lenses, and a timeless design that works for every occasion.',
        'img'     => 'https://i.pravatar.cc/150?img=5'
    ],
    [
        'name'    => 'Arjun Nair',
        'city'    => 'Kochi',
        'quote'   => 'I\'ve owned frames from several brands, but Optiq stands out in both quality and comfort. The lightweight construction makes it easy to wear all day.',
        'img'     => 'https://i.pravatar.cc/150?img=6'
    ],
    [
        'name'    => 'Meera Iyer',
        'city'    => 'Coimbatore',
        'quote'   => 'The craftsmanship is exceptional. The frames feel sturdy yet elegant, and the customer service experience was equally impressive.',
        'img'     => 'https://i.pravatar.cc/150?img=7'
    ],
    [
        'name'    => 'Karthik Reddy',
        'city'    => 'Hyderabad',
        'quote'   => 'Premium quality at every level. The lenses are crystal clear, the frame feels luxurious, and the overall experience feels like a high-end fashion purchase.',
        'img'     => 'https://i.pravatar.cc/150?img=8'
    ],
    [
        'name'    => 'Nisha Verma',
        'city'    => 'Pune',
        'quote'   => 'I was looking for something modern yet timeless. Optiq delivered exactly that. The design is sophisticated, comfortable, and perfect for everyday wear.',
        'img'     => 'https://i.pravatar.cc/150?img=9'
    ],
    [
        'name'    => 'Aditi Rao',
        'city'    => 'Bangalore',
        'quote'   => 'The perfect blend of fashion and functionality. Every detail feels thoughtfully designed, and the quality is evident the moment you put them on.',
        'img'     => 'https://i.pravatar.cc/150?img=10'
    ]
];
?>

<section class="testimonial-section bg-cream py-4 py-md-5">
    <div class="container">
        <!-- Section Heading – responsive -->
        <div class="text-center mb-4 mb-md-5">
            <h2 class="display-5 display-md-4 fw-bold text-dark gold-underline" style="font-family: 'Poppins', sans-serif; font-size: clamp(1.8rem, 4vw, 2.5rem);">
                Loved By Eyewear Enthusiasts
            </h2>
            <p class="text-muted-custom fs-5 fs-md-4" style="font-size: clamp(0.9rem, 1.8vw, 1.25rem);">Real stories from customers who found their perfect pair.</p>
        </div>

        <!-- Custom Animated Slider – tighter height -->
        <div class="testimonial-slider-wrapper">
            <ul class="testimonial-slider" id="testimonialSlider" style="height: clamp(260px, 50vh, 320px);">
                <?php foreach ($reviews as $review): ?>
                    <li class="testimonial-item">
                        <div class="testimonial-card">
                            <p><?php echo htmlspecialchars($review['quote']); ?></p>
                            <p class="testimonial-name"><?php echo htmlspecialchars($review['name']); ?></p>
                            <p class="testimonial-city"><?php echo htmlspecialchars($review['city']); ?></p>
                        </div>
                        <img class="testimonial-image" src="<?php echo htmlspecialchars($review['img']); ?>" alt="<?php echo htmlspecialchars($review['name']); ?>" loading="lazy" />
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Navigation Dots -->
            <div class="testimonial-nav" id="testimonialNav">
                <?php foreach ($reviews as $index => $review): ?>
                    <button class="testimonial-dot" data-index="<?php echo $index; ?>" aria-label="Slide <?php echo $index+1; ?>"></button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<style>
/* ================================================================
   TESTIMONIAL SLIDER – PREMIUM ANIMATED (CREAM + EMERALD + GOLD)
   ================================================================ */
.testimonial-slider-wrapper {
    max-width: 700px;
    margin: 0 auto;
    overflow: hidden;
    position: relative;
}

.testimonial-slider {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    /* height now handled by inline clamp */
}

.testimonial-item {
    min-width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    position: relative;
    padding: 0 1.5rem;
}

/* ---- Glass Card (left side) – Watery Glass ---- */
.testimonial-card {
    width: 72%;
    padding: 1.5rem 2rem 1.5rem 1.8rem;
    background: rgba(255, 255, 255, 0.45);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border: 1px solid rgba(200, 169, 81, 0.08);
    border-radius: 1rem;
    color: var(--dark, #1A1A1A);
    font-weight: 300;
    font-size: clamp(0.8rem, 1.2vw, 0.9rem);
    line-height: 1.6;
    opacity: 0;
    transform: translateX(125px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.04);
    transition: box-shadow 0.3s;
}

.testimonial-card p {
    opacity: 0;
    transform: translateY(20px);
    margin: 0;
}

.testimonial-card p:first-child {
    font-weight: 500;
    font-size: clamp(0.85rem, 1.4vw, 1rem);
    color: var(--dark, #1A1A1A);
    line-height: 1.5;
}

.testimonial-name {
    font-weight: 600;
    font-size: clamp(0.75rem, 1.1vw, 0.9rem);
    color: var(--accent, #C8A951);
    margin-top: 1rem;
    letter-spacing: 0.5px;
}

.testimonial-city {
    font-size: clamp(0.6rem, 0.9vw, 0.75rem);
    color: var(--muted, #8A8A8A);
    font-weight: 300;
    margin-top: 0.1rem;
}

/* ---- Profile Image (Circle) – Gold Border ---- */
.testimonial-image {
    position: absolute;
    right: 0;
    z-index: 10;
    width: clamp(80px, 18vw, 150px);
    aspect-ratio: 1;
    border-radius: 50%;
    object-fit: cover;
    transform: translateX(-15px);
    box-shadow: 0 8px 30px rgba(200, 169, 81, 0.15);
    border: 3px solid var(--accent, #C8A951);
    background: var(--cream, #F7F5F0);
    transition: transform 0.8s ease;
}

/* ---- Animation States ---- */
.testimonial-item.animate .testimonial-card {
    opacity: 1;
    transform: translateX(0);
    transition: opacity 1s ease, transform 1s ease;
}

.testimonial-item.animate .testimonial-card p:first-child {
    opacity: 1;
    transform: translateY(0);
    transition: opacity 0.6s ease 0.2s, transform 0.6s ease 0.2s;
}

.testimonial-item.animate .testimonial-name {
    opacity: 1;
    transform: translateY(0);
    transition: opacity 0.6s ease 0.4s, transform 0.6s ease 0.4s;
}

.testimonial-item.animate .testimonial-city {
    opacity: 1;
    transform: translateY(0);
    transition: opacity 0.6s ease 0.6s, transform 0.6s ease 0.6s;
}

.testimonial-item.animate .testimonial-image {
    transform: translateX(0);
}

/* ---- Navigation Dots (Gold) ---- */
.testimonial-nav {
    display: flex;
    justify-content: center;
    gap: 0.6rem;
    margin-top: 1.5rem;
}

.testimonial-dot {
    width: 10px;
    height: 10px;
    border-radius: 10px;
    border: none;
    background: rgba(200, 169, 81, 0.2);
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 0;
}

.testimonial-dot.active {
    width: 28px;
    background: var(--accent, #C8A951);
    box-shadow: 0 0 10px rgba(200, 169, 81, 0.3);
}

/* ===== Gold Underline Animation (for heading) ===== */
.gold-underline {
    position: relative;
    display: inline-block;
}
.gold-underline::after {
    content: "";
    position: absolute;
    bottom: -8px;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 3px;
    background: var(--accent, #C8A951);
    border-radius: 3px;
    transition: width 0.4s ease;
}
.gold-underline.visible::after {
    width: 60%;
}

/* ================================================================
   RESPONSIVE – TIGHT SPACING & NO OVERLAP
   ================================================================ */

/* Tablet */
@media (max-width: 991.98px) {
    .testimonial-slider {
        height: clamp(240px, 40vh, 280px) !important;
    }
    .testimonial-card {
        width: 68%;
        padding: 1.2rem 1.5rem 1.2rem 1.2rem;
        font-size: 0.8rem;
    }
    .testimonial-card p:first-child {
        font-size: 0.85rem;
    }
    .testimonial-name {
        font-size: 0.8rem;
    }
    .testimonial-city {
        font-size: 0.65rem;
    }
    .testimonial-image {
        width: clamp(70px, 15vw, 110px);
    }
    .testimonial-nav {
        margin-top: 1rem;
    }
}

/* Mobile – FIXED OVERLAP */
@media (max-width: 575.98px) {
    .testimonial-slider {
        height: clamp(200px, 60vh, 260px) !important;
    }
    .testimonial-item {
        padding: 0 0.8rem;
        /* ensure items don't clip the image */
        overflow: visible;
    }
    .testimonial-card {
        /* wider card to keep text safe from image */
        width: 78%;
        padding: 0.8rem 1rem 0.8rem 0.8rem;
        font-size: 0.7rem;
        border-radius: 0.75rem;
        /* add right padding to avoid text touching image */
        padding-right: 1.2rem;
    }
    .testimonial-card p:first-child {
        font-size: 0.7rem;
        line-height: 1.4;
    }
    .testimonial-name {
        font-size: 0.7rem;
        margin-top: 0.5rem;
    }
    .testimonial-city {
        font-size: 0.55rem;
    }
    .testimonial-image {
        /* smaller image, better positioned */
        width: clamp(50px, 14vw, 65px);
        border-width: 2px;
        /* remove translateX to keep it flush right */
        transform: none;
        right: 0;
        /* add a small margin to avoid touching card */
        margin-right: 2px;
    }
    .testimonial-nav {
        gap: 0.4rem;
        margin-top: 0.8rem;
    }
    .testimonial-dot {
        width: 8px;
        height: 8px;
    }
    .testimonial-dot.active {
        width: 20px;
    }
    .testimonial-item.animate .testimonial-image {
        transform: none; /* keep it in place */
    }
    .gold-underline {
        font-size: 1.6rem !important;
    }
    .text-muted-custom {
        font-size: 0.85rem !important;
    }
    .testimonial-section .py-4 {
        padding-top: 2rem !important;
        padding-bottom: 2rem !important;
    }
}

/* Small Mobile */
@media (max-width: 380px) {
    .testimonial-slider {
        height: clamp(180px, 65vh, 230px) !important;
    }
    .testimonial-card {
        width: 76%;
        padding: 0.5rem 1rem 0.5rem 0.5rem;
        font-size: 0.6rem;
        padding-right: 1rem;
    }
    .testimonial-card p:first-child {
        font-size: 0.6rem;
    }
    .testimonial-name {
        font-size: 0.6rem;
    }
    .testimonial-city {
        font-size: 0.5rem;
    }
    .testimonial-image {
        width: clamp(40px, 12vw, 50px);
        border-width: 1.5px;
    }
    .testimonial-dot {
        width: 6px;
        height: 6px;
    }
    .testimonial-dot.active {
        width: 16px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('testimonialSlider');
    const items = document.querySelectorAll('.testimonial-item');
    const dots = document.querySelectorAll('.testimonial-dot');
    const section = document.querySelector('.testimonial-section');
    let current = 0;
    let interval;
    let started = false;

    // ---- CLONE FIRST SLIDE AND APPEND ----
    const firstClone = items[0].cloneNode(true);
    slider.appendChild(firstClone);
    const totalSlides = items.length + 1;
    const allItems = slider.querySelectorAll('.testimonial-item');
    const total = allItems.length;

    function reset() {
        dots.forEach(d => d.classList.remove('active'));
        allItems.forEach(i => i.classList.remove('animate'));
    }

    function animate(index) {
        const dotIndex = index < items.length ? index : 0;
        dots[dotIndex].classList.add('active');
        allItems[index].classList.add('animate');
    }

    function goTo(index) {
        if (index < 0 || index >= total) return;
        const width = slider.offsetWidth;
        slider.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        slider.style.transform = `translateX(-${index * width}px)`;
        reset();
        animate(index);
        current = index;

        if (index === total - 1) {
            setTimeout(() => {
                slider.style.transition = 'none';
                slider.style.transform = 'translateX(0px)';
                current = 0;
                reset();
                animate(0);
                void slider.offsetWidth;
                slider.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
            }, 500);
        }
    }

    dots.forEach(dot => {
        dot.addEventListener('click', function() {
            clearInterval(interval);
            const index = parseInt(this.dataset.index);
            goTo(index);
            startAuto();
        });
    });

    function startAuto() {
        clearInterval(interval);
        interval = setInterval(() => {
            let next = (current + 1) % total;
            goTo(next);
        }, 5000);
    }

    function stopAuto() {
        clearInterval(interval);
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !started) {
                goTo(0);
                startAuto();
                started = true;
            }
            if (!entry.isIntersecting && started) {
                stopAuto();
            } else if (entry.isIntersecting && started) {
                startAuto();
            }
        });
    }, { threshold: 0.3 });

    if (section) {
        observer.observe(section);
    }

    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            const width = slider.offsetWidth;
            slider.style.transition = 'none';
            slider.style.transform = `translateX(-${current * width}px)`;
            void slider.offsetWidth;
            slider.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        }, 150);
    });

    const heading = document.querySelector('.gold-underline');
    if (heading) {
        const headingObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    headingObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        headingObserver.observe(heading);
    }
});
</script>