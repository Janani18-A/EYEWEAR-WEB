<?php
// contact.php - Optiq Contact Page (BOOTSTRAP RESPONSIVE) – WITH TOAST FIX
include 'templates/header.php';
include 'templates/navbar.php';
?>

<!-- ============================================================ -->
<!-- CONTACT HERO — comes from TOP                                -->
<!-- ============================================================ -->
<section class="contact-hero satin-scroll from-top" id="heroSection" style="padding: clamp(90px, 12vh, 140px) 0 1.5rem; text-align: center; border-bottom: 1px solid rgba(0,0,0,0.04);">
    <div class="container">
        <h1 style="font-family: 'Poppins', sans-serif; font-size: clamp(1.8rem, 5vw, 2.8rem); font-weight: 700; color: var(--dark, #1A1A1A);">
            Get in <span style="color: var(--accent, #C8A951);">Touch</span>
        </h1>
        <p style="font-size: clamp(0.9rem, 1.5vw, 1.1rem); color: var(--muted, #8A8A8A); max-width: 560px; margin: 0 auto; padding: 0 1rem;">
            Need help finding your perfect frame? Our team is here to assist you with expert advice and personalized recommendations.
        </p>
    </div>
</section>

<!-- ============================================================ -->
<!-- CONTACT INFO + FORM — comes from BOTTOM with stagger         -->
<!-- ============================================================ -->
<section class="py-4 py-md-5 satin-scroll from-bottom stagger-children" id="contactSection">
    <div class="container">
        <div class="row g-3 g-md-4">

            <!-- ─── LEFT: Contact Info ─── -->
            <div class="col-lg-5">
                <div class="contact-card h-100" style="background: var(--white, #FFF); border-radius: 20px; padding: clamp(1.2rem, 3vw, 2rem); box-shadow: 0 8px 40px rgba(0,0,0,0.04); border: 1px solid rgba(0,0,0,0.04); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <h4 class="fw-bold mb-3" style="font-size: clamp(1.1rem, 1.8vw, 1.3rem);">Get In Touch</h4>
                    <p style="color: var(--muted, #8A8A8A); margin-bottom: 1.5rem; font-size: clamp(0.85rem, 1vw, 1rem);">We'd love to hear from you. Reach out through any of these channels.</p>

                    <!-- Contact Items -->
                    <div class="d-flex gap-3 mb-3">
                        <div style="width: clamp(40px, 6vw, 48px); height: clamp(40px, 6vw, 48px); border-radius: 50%; background: rgba(15,61,46,0.06); display: flex; align-items: center; justify-content: center; font-size: clamp(1rem, 1.5vw, 1.2rem); color: var(--primary, #0F3D2E); flex-shrink: 0;">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div>
                            <h5 style="font-weight: 700; font-size: clamp(0.85rem, 1vw, 1rem); margin-bottom: 0.2rem;">Store Address</h5>
                            <p style="color: var(--muted, #8A8A8A); font-size: clamp(0.8rem, 0.9vw, 0.9rem); margin: 0;">123 Vision Street, Thanjavur, Tamil Nadu - 613001</p>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-3">
                        <div style="width: clamp(40px, 6vw, 48px); height: clamp(40px, 6vw, 48px); border-radius: 50%; background: rgba(15,61,46,0.06); display: flex; align-items: center; justify-content: center; font-size: clamp(1rem, 1.5vw, 1.2rem); color: var(--primary, #0F3D2E); flex-shrink: 0;">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div>
                            <h5 style="font-weight: 700; font-size: clamp(0.85rem, 1vw, 1rem); margin-bottom: 0.2rem;">Phone</h5>
                            <p style="color: var(--muted, #8A8A8A); font-size: clamp(0.8rem, 0.9vw, 0.9rem); margin: 0;">+91 98765 43210</p>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-3">
                        <div style="width: clamp(40px, 6vw, 48px); height: clamp(40px, 6vw, 48px); border-radius: 50%; background: rgba(15,61,46,0.06); display: flex; align-items: center; justify-content: center; font-size: clamp(1rem, 1.5vw, 1.2rem); color: var(--primary, #0F3D2E); flex-shrink: 0;">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div>
                            <h5 style="font-weight: 700; font-size: clamp(0.85rem, 1vw, 1rem); margin-bottom: 0.2rem;">Email</h5>
                            <p style="color: var(--muted, #8A8A8A); font-size: clamp(0.8rem, 0.9vw, 0.9rem); margin: 0;">support@optiq.com</p>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-3">
                        <div style="width: clamp(40px, 6vw, 48px); height: clamp(40px, 6vw, 48px); border-radius: 50%; background: rgba(15,61,46,0.06); display: flex; align-items: center; justify-content: center; font-size: clamp(1rem, 1.5vw, 1.2rem); color: var(--primary, #0F3D2E); flex-shrink: 0;">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div>
                            <h5 style="font-weight: 700; font-size: clamp(0.85rem, 1vw, 1rem); margin-bottom: 0.2rem;">Store Hours</h5>
                            <p style="color: var(--muted, #8A8A8A); font-size: clamp(0.8rem, 0.9vw, 0.9rem); margin: 0;">Mon - Sat, 9:00 AM - 8:00 PM</p>
                        </div>
                    </div>

                    <!-- Social Icons -->
                    <div class="d-flex flex-wrap gap-2" style="margin-top: 0.5rem;">
                        <a href="#" style="width: clamp(34px, 5vw, 38px); height: clamp(34px, 5vw, 38px); border-radius: 50%; border: 1px solid rgba(0,0,0,0.06); display: flex; align-items: center; justify-content: center; color: var(--muted, #8A8A8A); text-decoration: none; transition: all 0.3s ease; font-size: clamp(0.9rem, 1.2vw, 1rem);">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" style="width: clamp(34px, 5vw, 38px); height: clamp(34px, 5vw, 38px); border-radius: 50%; border: 1px solid rgba(0,0,0,0.06); display: flex; align-items: center; justify-content: center; color: var(--muted, #8A8A8A); text-decoration: none; transition: all 0.3s ease; font-size: clamp(0.9rem, 1.2vw, 1rem);">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" style="width: clamp(34px, 5vw, 38px); height: clamp(34px, 5vw, 38px); border-radius: 50%; border: 1px solid rgba(0,0,0,0.06); display: flex; align-items: center; justify-content: center; color: var(--muted, #8A8A8A); text-decoration: none; transition: all 0.3s ease; font-size: clamp(0.9rem, 1.2vw, 1rem);">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="#" style="width: clamp(34px, 5vw, 38px); height: clamp(34px, 5vw, 38px); border-radius: 50%; border: 1px solid rgba(0,0,0,0.06); display: flex; align-items: center; justify-content: center; color: var(--muted, #8A8A8A); text-decoration: none; transition: all 0.3s ease; font-size: clamp(0.9rem, 1.2vw, 1rem);">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>

                    <!-- Stats Float -->
                    <div style="background: var(--white, #FFF); border-radius: 16px; padding: clamp(0.8rem, 1.5vw, 1.2rem) clamp(1rem, 2vw, 1.5rem); border: 1px solid rgba(0,0,0,0.04); box-shadow: 0 8px 30px rgba(0,0,0,0.04); margin-top: 1rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.5rem;">
                        <div style="text-align: center; flex: 1; min-width: 60px;">
                            <span style="font-size: clamp(1.2rem, 2vw, 1.6rem); color: var(--primary, #0F3D2E); display: block; margin-bottom: 0.2rem;"><i class="bi bi-lightning-charge-fill"></i></span>
                            <span style="font-size: clamp(1.1rem, 1.8vw, 1.4rem); font-weight: 700; display: block;">2h</span>
                            <span style="font-size: clamp(0.5rem, 0.7vw, 0.7rem); color: var(--muted, #8A8A8A); text-transform: uppercase; letter-spacing: 0.04em;">Avg Response</span>
                        </div>
                        <div style="text-align: center; flex: 1; min-width: 60px;">
                            <span style="font-size: clamp(1.2rem, 2vw, 1.6rem); color: var(--primary, #0F3D2E); display: block; margin-bottom: 0.2rem;"><i class="bi bi-star-fill"></i></span>
                            <span style="font-size: clamp(1.1rem, 1.8vw, 1.4rem); font-weight: 700; display: block;">4.9</span>
                            <span style="font-size: clamp(0.5rem, 0.7vw, 0.7rem); color: var(--muted, #8A8A8A); text-transform: uppercase; letter-spacing: 0.04em;">Satisfaction</span>
                        </div>
                        <div style="text-align: center; flex: 1; min-width: 60px;">
                            <span style="font-size: clamp(1.2rem, 2vw, 1.6rem); color: var(--primary, #0F3D2E); display: block; margin-bottom: 0.2rem;"><i class="bi bi-headset"></i></span>
                            <span style="font-size: clamp(1.1rem, 1.8vw, 1.4rem); font-weight: 700; display: block;">24/7</span>
                            <span style="font-size: clamp(0.5rem, 0.7vw, 0.7rem); color: var(--muted, #8A8A8A); text-transform: uppercase; letter-spacing: 0.04em;">Support</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ─── RIGHT: Contact Form ─── -->
            <div class="col-lg-7">
                <div class="contact-card" style="background: var(--white, #FFF); border-radius: 20px; padding: clamp(1.2rem, 3vw, 2rem); box-shadow: 0 8px 40px rgba(0,0,0,0.04); border: 1px solid rgba(0,0,0,0.04);">
                    <h4 class="fw-bold mb-3" style="font-size: clamp(1.1rem, 1.8vw, 1.3rem);">Send Us a Message</h4>
                    <p style="color: var(--muted, #8A8A8A); margin-bottom: 1.5rem; font-size: clamp(0.85rem, 1vw, 1rem);">We'll get back to you within 2 hours.</p>

                    <!-- ─── FORM ─── -->
                    <form id="contactForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label" style="font-size: clamp(0.6rem, 0.8vw, 0.75rem); font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em; color: var(--muted, #8A8A8A);">Full Name</label>
                                <input type="text" name="fullname" class="form-control" placeholder="John Doe" required style="border-radius: 12px; padding: clamp(0.5rem, 0.8vw, 0.7rem) clamp(0.8rem, 1.2vw, 1rem); border: 1px solid rgba(0,0,0,0.06); background: rgba(255,255,255,0.5); font-size: clamp(0.8rem, 0.9vw, 0.95rem);">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" style="font-size: clamp(0.6rem, 0.8vw, 0.75rem); font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em; color: var(--muted, #8A8A8A);">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="john@example.com" required style="border-radius: 12px; padding: clamp(0.5rem, 0.8vw, 0.7rem) clamp(0.8rem, 1.2vw, 1rem); border: 1px solid rgba(0,0,0,0.06); background: rgba(255,255,255,0.5); font-size: clamp(0.8rem, 0.9vw, 0.95rem);">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" style="font-size: clamp(0.6rem, 0.8vw, 0.75rem); font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em; color: var(--muted, #8A8A8A);">Phone Number</label>
                                <input type="tel" name="phone" class="form-control" placeholder="+91 98765 43210" style="border-radius: 12px; padding: clamp(0.5rem, 0.8vw, 0.7rem) clamp(0.8rem, 1.2vw, 1rem); border: 1px solid rgba(0,0,0,0.06); background: rgba(255,255,255,0.5); font-size: clamp(0.8rem, 0.9vw, 0.95rem);">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" style="font-size: clamp(0.6rem, 0.8vw, 0.75rem); font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em; color: var(--muted, #8A8A8A);">Subject</label>
                                <select name="subject" class="form-select" style="border-radius: 12px; padding: clamp(0.5rem, 0.8vw, 0.7rem) clamp(0.8rem, 1.2vw, 1rem); border: 1px solid rgba(0,0,0,0.06); background: rgba(255,255,255,0.5); font-size: clamp(0.8rem, 0.9vw, 0.95rem);">
                                    <option value="General Inquiry" selected>General Inquiry</option>
                                    <option value="Order Help">Order Help</option>
                                    <option value="Prescription Consultation">Prescription Consultation</option>
                                    <option value="Virtual Try-On">Virtual Try-On</option>
                                    <option value="Feedback">Feedback</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label" style="font-size: clamp(0.6rem, 0.8vw, 0.75rem); font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em; color: var(--muted, #8A8A8A);">Message</label>
                                <textarea name="message" class="form-control" rows="4" placeholder="Tell us how we can help..." required style="border-radius: 12px; padding: clamp(0.5rem, 0.8vw, 0.7rem) clamp(0.8rem, 1.2vw, 1rem); border: 1px solid rgba(0,0,0,0.06); background: rgba(255,255,255,0.5); font-size: clamp(0.8rem, 0.9vw, 0.95rem);"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn-gold" style="background: var(--accent, #C8A951); color: #fff; font-weight: 600; padding: clamp(0.5rem, 1vw, 0.7rem) clamp(1.2rem, 2.5vw, 2rem); border-radius: 40px; border: none; width: auto; min-width: 140px; white-space: nowrap; transition: all 0.3s ease; font-size: clamp(0.8rem, 1vw, 0.95rem);">
                                    Send Message <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- STORE LOCATION                                               -->
<!-- ============================================================ -->
<section class="py-3 py-md-4 satin-scroll from-bottom" id="storeSection">
    <div class="container">
        <h4 class="fw-bold text-center mb-4" style="font-size: clamp(1.2rem, 2vw, 1.5rem);">📍 Visit Our Store</h4>
        <div class="row g-3 g-md-4">
            <div class="col-12 col-lg-7">
                <div class="store-card" style="background: var(--white, #FFF); border-radius: 20px; padding: clamp(1rem, 1.5vw, 1.5rem); border: 1px solid rgba(0,0,0,0.04); transition: transform 0.3s ease;">
                    <div style="border-radius: 12px; overflow: hidden; height: clamp(160px, 30vh, 220px); background: #e9ecef;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125352.72651508715!2d79.0869076925861!3d10.78697631812893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3baabf48b4f87ed9%3A0x6bce9c3e86519a5f!2sThanjavur%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1712345678901!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="d-flex flex-wrap align-items-center justify-content-between mt-3 gap-2">
                        <div>
                            <h6 class="fw-bold mb-0" style="font-size: clamp(0.9rem, 1.1vw, 1rem);">Optiq Store</h6>
                            <p class="small mb-0" style="color: var(--muted, #8A8A8A); font-size: clamp(0.7rem, 0.8vw, 0.85rem);">123 Vision Street, Thanjavur</p>
                        </div>
                        <a href="#" class="btn btn-sm" style="background: var(--primary, #0F3D2E); color: #fff; border-radius: 40px; padding: clamp(0.2rem, 0.5vw, 0.3rem) clamp(0.8rem, 1.5vw, 1.2rem); font-size: clamp(0.7rem, 0.8vw, 0.85rem);">Get Directions</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="store-card h-100 d-flex flex-column justify-content-center" style="background: var(--white, #FFF); border-radius: 20px; padding: clamp(1rem, 1.5vw, 1.5rem); border: 1px solid rgba(0,0,0,0.04);">
                    <h6 class="fw-bold" style="font-size: clamp(0.95rem, 1.1vw, 1.05rem);">🕒 Store Hours</h6>
                    <div class="d-flex justify-content-between py-1 border-bottom" style="border-color: rgba(0,0,0,0.05) !important;">
                        <span style="color: var(--muted, #8A8A8A); font-size: clamp(0.75rem, 0.8vw, 0.85rem);">Monday - Friday</span>
                        <span style="font-size: clamp(0.75rem, 0.8vw, 0.85rem);">9:00 AM - 8:00 PM</span>
                    </div>
                    <div class="d-flex justify-content-between py-1 border-bottom" style="border-color: rgba(0,0,0,0.05) !important;">
                        <span style="color: var(--muted, #8A8A8A); font-size: clamp(0.75rem, 0.8vw, 0.85rem);">Saturday</span>
                        <span style="font-size: clamp(0.75rem, 0.8vw, 0.85rem);">10:00 AM - 6:00 PM</span>
                    </div>
                    <div class="d-flex justify-content-between py-1">
                        <span style="color: var(--muted, #8A8A8A); font-size: clamp(0.75rem, 0.8vw, 0.85rem);">Sunday</span>
                        <span style="font-size: clamp(0.75rem, 0.8vw, 0.85rem);">Closed</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'search-overlay.php'; ?>
<?php include 'templates/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="assets/js/script.js"></script>

<!-- ============================================================ -->
<!-- SCROLL REVEAL + CONTACT FORM TOAST HANDLER                   -->
<!-- ============================================================ -->
<script>
    // ─── SCROLL REVEAL ──────────────────────────────────────────
    (function() {
        'use strict';
        const scrollElements = document.querySelectorAll('.satin-scroll');
        const options = { root: null, rootMargin: '0px 0px -80px 0px', threshold: 0.1 };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => { if (entry.isIntersecting) entry.target.classList.add('visible'); });
        }, options);
        scrollElements.forEach(el => observer.observe(el));
        setTimeout(() => {
            scrollElements.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight * 0.9 && rect.bottom > 0) el.classList.add('visible');
            });
        }, 200);
    })();

    // ─── CONTACT FORM – TOAST HANDLER ────────────────────────────
    document.addEventListener('DOMContentLoaded', function() {

        // ── Ensure showToast exists (fallback if not in script.js) ──
        if (typeof showToast === 'undefined') {
            window.showToast = function(message, type) {
                // Create container if not exists
                let container = document.getElementById('toastContainer');
                if (!container) {
                    container = document.createElement('div');
                    container.id = 'toastContainer';
                    container.className = 'toast-container';
                    container.style.cssText = 'position:fixed;top:80px;right:20px;z-index:2000;display:flex;flex-direction:column;gap:0.5rem;max-width:380px;width:90%;';
                    document.body.appendChild(container);
                }

                const icons = {
                    success: 'bi-check-circle-fill',
                    error: 'bi-x-circle-fill',
                    info: 'bi-info-circle-fill'
                };

                const el = document.createElement('div');
                el.className = 'toast-message ' + (type || 'info');
                el.style.cssText = 'background:var(--dark,#1A1A1A);color:#fff;padding:0.8rem 1.2rem;border-radius:16px;font-weight:500;font-size:0.85rem;box-shadow:0 8px 30px rgba(0,0,0,0.15);opacity:0;transform:translateX(40px);transition:all 0.4s cubic-bezier(0.34,1.56,0.64,1);display:flex;align-items:center;gap:0.6rem;';
                el.innerHTML = '<span style="font-size:1.2rem;"><i class="bi ' + (icons[type] || icons.info) + '"></i></span> ' + message;
                container.appendChild(el);

                requestAnimationFrame(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'translateX(0)';
                });

                setTimeout(() => {
                    el.style.opacity = '0';
                    el.style.transform = 'translateX(40px)';
                    setTimeout(() => { if (el.parentNode) el.remove(); }, 400);
                }, 3000);
            };
        }

        // ── Form handler ──
        const form = document.getElementById('contactForm');
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const fullname = this.querySelector('input[name="fullname"]').value.trim();
                const email = this.querySelector('input[name="email"]').value.trim();
                const message = this.querySelector('textarea[name="message"]').value.trim();

                if (!fullname || !email || !message) {
                    showToast('Please fill in all required fields.', 'error');
                    return;
                }

                showToast('Thank you, ' + fullname + '! Your message has been sent. We\'ll get back to you within 2 hours.', 'success');
                this.reset();
            });
        }
    });
</script>

<style>
    .satin-scroll {
        transition: opacity 0.9s cubic-bezier(0.25,0.46,0.45,0.94), transform 0.9s cubic-bezier(0.25,0.46,0.45,0.94);
        opacity: 0;
    }
    .satin-scroll.from-top { transform: translateY(-60px); }
    .satin-scroll.from-top.visible { opacity: 1; transform: translateY(0); }
    .satin-scroll.from-bottom { transform: translateY(60px); }
    .satin-scroll.from-bottom.visible { opacity: 1; transform: translateY(0); }
    .stagger-children > * {
        transition: opacity 0.8s cubic-bezier(0.25,0.46,0.45,0.94), transform 0.8s cubic-bezier(0.25,0.46,0.45,0.94);
        opacity: 0; transform: translateY(50px);
    }
    .stagger-children.visible > *:nth-child(1) { transition-delay: 0.05s; }
    .stagger-children.visible > *:nth-child(2) { transition-delay: 0.15s; }
    .stagger-children.visible > *:nth-child(3) { transition-delay: 0.25s; }
    .stagger-children.visible > *:nth-child(4) { transition-delay: 0.35s; }
    .stagger-children.visible > *:nth-child(5) { transition-delay: 0.45s; }
    .stagger-children.visible > *:nth-child(6) { transition-delay: 0.55s; }
    .stagger-children.visible > *:nth-child(7) { transition-delay: 0.65s; }
    .stagger-children.visible > *:nth-child(8) { transition-delay: 0.75s; }
    .stagger-children.visible > *:nth-child(9) { transition-delay: 0.85s; }
    .stagger-children.visible > *:nth-child(10) { transition-delay: 0.95s; }
    .stagger-children.visible > * { opacity: 1; transform: translateY(0); }
</style>
</body>
</html>