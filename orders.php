<?php
// orders.php – Premium My Orders Page (No Buy Button)
include 'templates/header.php';
include 'templates/navbar.php';
?>

<!-- ============================================================ -->
<!-- MAIN CONTENT – Fixed Padding & Centered Layout               -->
<!-- ============================================================ -->
<section class="bg-cream orders-section" style="min-height: 70vh; padding-top: 90px; padding-bottom: 2rem;">
    <div class="container">

        <!-- ─── HEADER ─── -->
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h1 class="display-6 fw-bold text-primary" style="font-family: 'Poppins', sans-serif;">
                    My Orders
                </h1>
                <p class="text-muted-custom mb-0">
                    Total Orders: <span class="fw-bold text-primary" id="totalOrdersCount">0</span>
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <span class="text-muted-custom small"><i class="bi bi-clock me-1"></i> Last 30 days</span>
            </div>
        </div>

        <!-- ─── SEARCH + FILTERS (Centered) ─── -->
        <div class="row g-3 mb-4 justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="position-relative">
                    <i class="bi bi-search position-absolute" style="top:12px;left:14px;color:rgba(0,0,0,0.2);"></i>
                    <input type="text" class="form-control rounded-pill ps-5" id="searchOrders" placeholder="Search Order ID / Product..." style="border-color:rgba(0,0,0,0.04);background:rgba(255,255,255,0.4);backdrop-filter:blur(8px);">
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-wrap gap-2 justify-content-center" id="filterChips">
                    <button class="filter-chip active" data-filter="all">All</button>
                    <button class="filter-chip" data-filter="Processing">🔵 Processing</button>
                    <button class="filter-chip" data-filter="Shipped">🟠 Shipped</button>
                    <button class="filter-chip" data-filter="Delivered">🟢 Delivered</button>
                    <button class="filter-chip" data-filter="Cancelled">⚪ Cancelled</button>
                    <button class="filter-chip" data-filter="Returned">🔄 Returned</button>
                </div>
            </div>
        </div>

        <!-- ─── ORDERS GRID ─── -->
        <div id="ordersContainer"></div>

        <!-- ─── EMPTY STATE ─── -->
        <div id="emptyState" class="text-center py-5 d-none">
            <div class="glass-card p-5 d-inline-block">
                <div class="empty-case-wrapper mb-4">
                    <div class="empty-case">
                        <div class="case-top"></div>
                        <div class="case-bottom"></div>
                        <div class="case-inner">
                            <span class="case-icon">👓</span>
                            <div class="case-shine"></div>
                        </div>
                    </div>
                </div>
                <h3 class="text-primary" style="font-family:'Poppins',sans-serif;">No Orders Yet</h3>
                <p class="text-muted-custom">Your next favorite frame is waiting.</p>
                <a href="category.php" class="btn btn-emerald mt-3">Explore Collection →</a>
            </div>
        </div>

    </div>
</section>

<!-- ============================================================ -->
<!-- REVIEW MODAL                                                  -->
<!-- ============================================================ -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content glass-card" style="background:rgba(255,255,255,0.85);backdrop-filter:blur(24px);">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-primary">⭐ Rate Your Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3" id="reviewProductInfo">
                    <img src="" alt="" class="rounded-3 mb-2" style="width:60px;height:60px;object-fit:cover;">
                    <h6 class="fw-bold mb-0" id="reviewProductName">Product Name</h6>
                    <p class="text-muted-custom small" id="reviewOrderId">Order #OPT-XXXX</p>
                </div>
                <div class="text-center mb-3">
                    <div class="rating-stars" id="ratingStars">
                        <i class="bi bi-star fs-2" data-rating="1"></i>
                        <i class="bi bi-star fs-2" data-rating="2"></i>
                        <i class="bi bi-star fs-2" data-rating="3"></i>
                        <i class="bi bi-star fs-2" data-rating="4"></i>
                        <i class="bi bi-star fs-2" data-rating="5"></i>
                    </div>
                    <span class="text-muted-custom small" id="ratingText">Tap a star to rate</span>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted-custom">Your Review</label>
                    <textarea class="form-control" rows="3" id="reviewComment" placeholder="Share your experience with this product..." style="background:rgba(255,255,255,0.3);border-color:rgba(0,0,0,0.04);"></textarea>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button class="btn btn-outline-emerald" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-emerald" id="submitReviewBtn">Submit Review</button>
            </div>
        </div>
    </div>
</div>

<!-- ========================== search-overlay.php ================================== -->
<?php include 'search-overlay.php'; ?>

<?php include 'templates/footer.php'; ?>

<!-- ============================================================ -->
<!-- SCRIPTS                                                      -->
<!-- ============================================================ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ============================================================
        // 1. ORDERS DATA
        // ============================================================
        function getOrders() {
            try {
                const data = localStorage.getItem('optiq_orders');
                if (!data) return [];
                const parsed = JSON.parse(data);
                return Array.isArray(parsed) ? parsed : [];
            } catch (e) {
                console.warn('Error reading orders:', e);
                return [];
            }
        }

        function getStatusColor(status) {
            const map = {
                'Processing': '#4a9eff',
                'Shipped': '#f59e0b',
                'Delivered': '#22c55e',
                'Cancelled': '#9ca3af',
                'Returned': '#ef4444'
            };
            return map[status] || '#9ca3af';
        }

        function getStatusDot(status) {
            return `<span class="status-dot pulse-${status.toLowerCase()}" style="background:${getStatusColor(status)};display:inline-block;width:10px;height:10px;border-radius:50%;margin-right:6px;"></span>`;
        }

        function getDeliveryCountdown(deliveryDate) {
            if (!deliveryDate) return 'Arriving soon';
            const now = new Date();
            const target = new Date(deliveryDate);
            const diff = Math.ceil((target - now) / (1000 * 60 * 60 * 24));
            if (diff < 0) return 'Delivered ✓';
            if (diff === 0) return 'Arriving Today 🎉';
            if (diff === 1) return 'Arriving Tomorrow';
            if (diff <= 3) return `${diff} Days Left`;
            return target.toLocaleDateString('en-IN', { day: 'numeric', month: 'short' });
        }

        function getStatusBadge(status) {
            const map = {
                'Processing': `<span class="badge bg-primary bg-opacity-10 text-white px-3 py-2 rounded-pill">${getStatusDot(status)} Processing</span>`,
                'Shipped': `<span class="badge bg-warning bg-opacity-10 text-white px-3 py-2 rounded-pill">${getStatusDot(status)} Shipped</span>`,
                'Delivered': `<span class="badge bg-success bg-opacity-10 text-white px-3 py-2 rounded-pill">${getStatusDot(status)} Delivered</span>`,
                'Cancelled': `<span class="badge bg-danger text-white px-3 py-2 rounded-pill">${getStatusDot(status)} Cancelled</span>`,
                'Returned': `<span class="badge bg-danger bg-opacity-10 text-white px-3 py-2 rounded-pill">${getStatusDot(status)} Returned</span>`
            };
            return map[status] || map['Processing'];
        }

        // ============================================================
        // 2. RENDER ORDERS
        // ============================================================
        function renderOrders(filter = 'all', search = '') {
            const container = document.getElementById('ordersContainer');
            const emptyState = document.getElementById('emptyState');
            const totalCount = document.getElementById('totalOrdersCount');

            let orders = getOrders();

            orders = orders.filter(o => o.products && Array.isArray(o.products) && o.products.length > 0);

            totalCount.textContent = orders.length;

            if (filter !== 'all') {
                orders = orders.filter(o => o.status === filter);
            }

            if (search.trim()) {
                const q = search.trim().toLowerCase();
                orders = orders.filter(o =>
                    o.id.toLowerCase().includes(q) ||
                    o.products.some(p => p.name.toLowerCase().includes(q))
                );
            }

            if (orders.length === 0) {
                container.innerHTML = '';
                emptyState.classList.remove('d-none');
                return;
            }
            emptyState.classList.add('d-none');

            orders.sort((a, b) => new Date(b.date) - new Date(a.date));

            let html = `<div class="orders-grid">`;
            orders.forEach((order, index) => {
                const firstProduct = order.products[0];
                if (!firstProduct) return;

                const totalItems = order.products.reduce((s, p) => s + (p.qty || 1), 0);
                const deliveryDate = order.deliveryDate || new Date(new Date(order.date).getTime() + 7 * 24 * 60 * 60 * 1000);
                const isDelivered = order.status === 'Delivered';

                const imgStack = order.products.slice(0, 3).map(p =>
                    `<img src="${p.image || 'assets/images/placeholder.jpg'}" alt="${p.name || 'Product'}" class="stack-img">`
                ).join('');

                html += `
                    <div class="order-card glass-card p-4 rounded-4 mb-4" data-order-id="${order.id}" data-index="${index}">
                        <div class="order-card-inner">
                            <div class="d-flex flex-wrap align-items-start justify-content-between mb-3">
                                <div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="fw-bold text-primary">#${order.id || 'N/A'}</span>
                                        <button class="copy-btn btn btn-sm btn-outline-secondary rounded-pill" data-id="${order.id}" style="font-size:0.5rem;padding:0.05rem 0.5rem;">
                                            <i class="bi bi-clipboard" style="font-size:0.5rem;"></i>
                                        </button>
                                    </div>
                                    <div class="text-muted-custom small">
                                        <i class="bi bi-calendar3 me-1"></i> ${order.date ? new Date(order.date).toLocaleDateString('en-IN', { day:'numeric', month:'short', year:'numeric' }) : 'N/A'}
                                    </div>
                                </div>
                                <div>${getStatusBadge(order.status || 'Processing')}</div>
                            </div>

                            <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
                                <div class="product-stack d-flex">
                                    ${imgStack}
                                    ${order.products.length > 3 ? `<span class="stack-more">+${order.products.length - 3}</span>` : ''}
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold text-primary">${firstProduct.name || 'Product'}</div>
                                    <div class="text-muted-custom small">${firstProduct.material || 'Standard'} · ${firstProduct.lens_type || 'Standard'}</div>
                                    <div class="d-flex flex-wrap gap-3 mt-1">
                                        <span class="small text-muted-custom">Qty: ${totalItems}</span>
                                        <span class="small fw-bold text-primary">₹${(order.total || 0).toLocaleString('en-IN')}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pt-2 border-top border-light">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="small text-muted-custom">
                                        <i class="bi bi-truck me-1"></i>
                                        ${isDelivered ? 'Delivered on ' + new Date(deliveryDate).toLocaleDateString('en-IN', { day:'numeric', month:'short', year:'numeric' }) : getDeliveryCountdown(deliveryDate)}
                                    </span>
                                    ${order.status === 'Shipped' ? `
                                        <div class="delivery-vehicle">
                                            <span class="vehicle-icon">📦</span>
                                            <span class="vehicle-dots">······</span>
                                            <span class="vehicle-icon">🚚</span>
                                            <span class="vehicle-dots">······</span>
                                            <span class="vehicle-icon">🏠</span>
                                        </div>
                                    ` : ''}
                                    ${isDelivered ? `<span class="verified-seal"><i class="bi bi-shield-check"></i> Verified Delivery</span>` : ''}
                                </div>
                                <div class="d-flex flex-wrap gap-1 gap-sm-2">
                                    <a href="track-order.php?id=${order.id}" class="btn btn-sm btn-outline-emerald" style="font-size: clamp(0.55rem, 0.9vw, 0.7rem); padding: 0.15rem 0.5rem;">
                                        <i class="bi bi-truck me-1" style="font-size: clamp(0.45rem, 0.7vw, 0.6rem);"></i> Track
                                    </a>
                                    <!-- Buy button removed here -->
                                    <button class="btn btn-sm btn-outline-secondary invoice-btn" data-order-id="${order.id}" style="font-size: clamp(0.55rem, 0.9vw, 0.7rem); padding: 0.15rem 0.5rem;">
                                        <i class="bi bi-file-pdf me-1" style="font-size: clamp(0.45rem, 0.7vw, 0.6rem);"></i> PDF
                                    </button>
                                    <button class="btn btn-sm btn-outline-accent review-btn" data-order-id="${order.id}" data-product-id="${firstProduct.id}" data-product-name="${firstProduct.name}" data-product-img="${firstProduct.image || 'assets/images/placeholder.jpg'}" style="font-size: clamp(0.55rem, 0.9vw, 0.7rem); padding: 0.15rem 0.5rem;">
                                        <i class="bi bi-star me-1" style="font-size: clamp(0.45rem, 0.7vw, 0.6rem);"></i> Rate
                                    </button>
                                    ${order.status !== 'Cancelled' && order.status !== 'Delivered' ? `<button class="btn btn-sm btn-outline-danger cancel-btn" data-order-id="${order.id}" style="font-size: clamp(0.55rem, 0.9vw, 0.7rem); padding: 0.15rem 0.5rem;"><i class="bi bi-x-circle me-1" style="font-size: clamp(0.45rem, 0.7vw, 0.6rem);"></i> Cancel</button>` : ''}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            html += `</div>`;
            container.innerHTML = html;

            gsap.from('.order-card', {
                x: -50,
                opacity: 0,
                duration: 0.7,
                stagger: 0.08,
                ease: 'power3.out',
                clearProps: 'transform'
            });

            // No attachBuyAgain() – removed
            attachInvoice();
            attachReview();
            attachCancel();
            attachCopy();
        }

        // ============================================================
        // 3. EVENT HANDLERS
        // ============================================================
        function attachEvents() {
            document.querySelectorAll('.filter-chip').forEach(chip => {
                chip.addEventListener('click', function() {
                    document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
                    this.classList.add('active');
                    renderOrders(this.dataset.filter, document.getElementById('searchOrders').value);
                });
            });

            document.getElementById('searchOrders').addEventListener('input', function() {
                const activeFilter = document.querySelector('.filter-chip.active')?.dataset.filter || 'all';
                renderOrders(activeFilter, this.value);
            });
        }

        // attachBuyAgain() function removed entirely

        function attachInvoice() {
            document.querySelectorAll('.invoice-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const orderId = this.dataset.orderId;
                    const orders = getOrders();
                    const order = orders.find(o => o.id === orderId);
                    if (!order) return;

                    const icon = this.querySelector('i');
                    gsap.to(icon, { rotation: 360, duration: 0.6, ease: 'power2.out', onComplete: () => { icon.style.rotation = '0deg'; } });

                    const win = window.open('', '_blank');
                    if (win) {
                        win.document.write(`
                            <html><head><title>Invoice ${order.id}</title>
                            <style>body{font-family:'Inter',sans-serif;padding:2rem;background:#faf7f2;}
                            .invoice{max-width:600px;margin:0 auto;background:#fff;padding:2rem;border-radius:16px;box-shadow:0 8px 40px rgba(0,0,0,0.06);}
                            h1{color:#0F3D2E;font-size:1.5rem;border-bottom:1px solid #eee;padding-bottom:0.5rem;}
                            table{width:100%;border-collapse:collapse;margin:1rem 0;}
                            th,td{padding:0.5rem;text-align:left;border-bottom:1px solid #eee;}
                            .total{font-weight:700;font-size:1.2rem;color:#0F3D2E;}
                            .status{color:#22c55e;}</style>
                            </head><body>
                            <div class="invoice">
                                <h1>📄 Invoice #${order.id}</h1>
                                <p>Date: ${new Date(order.date).toLocaleDateString('en-IN', { day:'numeric', month:'short', year:'numeric' })}</p>
                                <p>Status: <span class="status">${order.status}</span></p>
                                <table>
                                    <tr><th>Product</th><th>Qty</th><th>Price</th></tr>
                                    ${order.products.map(p => `<tr><td>${p.name}</td><td>${p.qty}</td><td>₹${(p.price * p.qty).toLocaleString('en-IN')}</td></tr>`).join('')}
                                </table>
                                <div style="text-align:right;border-top:1px solid #eee;padding-top:1rem;">
                                    <div>Subtotal: ₹${order.subtotal.toLocaleString('en-IN')}</div>
                                    <div>GST: ₹${order.gst.toLocaleString('en-IN')}</div>
                                    <div>Discount: -₹${order.discount.toLocaleString('en-IN')}</div>
                                    <div class="total">Total: ₹${order.total.toLocaleString('en-IN')}</div>
                                </div>
                            </div>
                            <script>window.print(); setTimeout(() => window.close(), 1500);<\/script>
                            </body></html>
                        `);
                        win.document.close();
                    }
                });
            });
        }

        function attachReview() {
            const modal = new bootstrap.Modal(document.getElementById('reviewModal'));
            let selectedRating = 0;

            document.querySelectorAll('.review-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    document.getElementById('reviewProductName').textContent = this.dataset.productName;
                    document.getElementById('reviewProductInfo').querySelector('img').src = this.dataset.productImg;
                    document.getElementById('reviewOrderId').textContent = 'Order #' + this.dataset.orderId;
                    document.getElementById('reviewComment').value = '';
                    selectedRating = 0;
                    document.querySelectorAll('#ratingStars i').forEach(star => {
                        star.className = 'bi bi-star fs-2';
                        star.style.color = '';
                    });
                    document.getElementById('ratingText').textContent = 'Tap a star to rate';
                    modal.show();
                });
            });

            document.querySelectorAll('#ratingStars i').forEach(star => {
                star.addEventListener('click', function() {
                    selectedRating = parseInt(this.dataset.rating);
                    document.querySelectorAll('#ratingStars i').forEach((s, i) => {
                        if (i < selectedRating) {
                            s.className = 'bi bi-star-fill fs-2';
                            s.style.color = '#D4AF37';
                        } else {
                            s.className = 'bi bi-star fs-2';
                            s.style.color = '';
                        }
                    });
                    const texts = ['', 'Poor', 'Fair', 'Good', 'Very Good', 'Excellent'];
                    document.getElementById('ratingText').textContent = texts[selectedRating] || 'Tap a star to rate';
                });
            });

            document.getElementById('submitReviewBtn').addEventListener('click', function() {
                if (selectedRating === 0) {
                    alert('Please select a rating first!');
                    return;
                }
                const comment = document.getElementById('reviewComment').value.trim() || 'Great product!';
                const productName = document.getElementById('reviewProductName').textContent;

                const reviews = JSON.parse(localStorage.getItem('optiq_reviews')) || [];
                reviews.push({ product: productName, rating: selectedRating, comment: comment, date: new Date().toISOString() });
                localStorage.setItem('optiq_reviews', JSON.stringify(reviews));

                alert('⭐ Thank you for your review!');
                document.getElementById('reviewComment').value = '';
                selectedRating = 0;
                document.querySelectorAll('#ratingStars i').forEach(star => {
                    star.className = 'bi bi-star fs-2';
                    star.style.color = '';
                });
                document.getElementById('ratingText').textContent = 'Tap a star to rate';
                bootstrap.Modal.getInstance(document.getElementById('reviewModal')).hide();
            });
        }

        function attachCancel() {
            document.querySelectorAll('.cancel-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const orderId = this.dataset.orderId;
                    if (!confirm('Are you sure you want to cancel order #' + orderId + '?')) return;

                    let orders = getOrders();
                    const order = orders.find(o => o.id === orderId);
                    if (order) {
                        order.status = 'Cancelled';
                        localStorage.setItem('optiq_orders', JSON.stringify(orders));
                        renderOrders(
                            document.querySelector('.filter-chip.active')?.dataset.filter || 'all',
                            document.getElementById('searchOrders').value
                        );
                        showToast('Order #' + orderId + ' cancelled.');
                    }
                });
            });
        }

        function attachCopy() {
            document.querySelectorAll('.copy-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    navigator.clipboard.writeText(id).then(() => {
                        const original = this.innerHTML;
                        this.innerHTML = '<i class="bi bi-check-lg"></i> Copied!';
                        setTimeout(() => { this.innerHTML = original; }, 2000);
                    }).catch(() => {
                        const input = document.createElement('input');
                        input.value = id;
                        document.body.appendChild(input);
                        input.select();
                        document.execCommand('copy');
                        input.remove();
                        const original = this.innerHTML;
                        this.innerHTML = '<i class="bi bi-check-lg"></i> Copied!';
                        setTimeout(() => { this.innerHTML = original; }, 2000);
                    });
                });
            });
        }

        function showToast(message) {
            const existing = document.querySelector('.toast-notification');
            if (existing) existing.remove();
            const toast = document.createElement('div');
            toast.className = 'toast-notification';
            toast.innerHTML =
                `<i class="bi bi-check-circle-fill" style="color:#22c55e;font-size:1.1rem;"></i> <span>${message}</span>`;
            toast.style.cssText =
                `position:fixed;top:20px;right:20px;background:rgba(255,255,255,0.92);backdrop-filter:blur(20px);padding:0.8rem 1.5rem;border-radius:12px;box-shadow:0 12px 40px rgba(0,0,0,0.08);font-family:'Inter',sans-serif;font-size:0.85rem;font-weight:500;color:var(--charcoal);display:flex;align-items:center;gap:0.6rem;z-index:9999;transform:translateX(120%);transition:transform 0.5s cubic-bezier(0.23,1,0.32,1);`;
            document.body.appendChild(toast);
            gsap.to(toast, {
                x: 0,
                duration: 0.5,
                ease: 'power2.out',
                onComplete: () => {
                    setTimeout(() => {
                        gsap.to(toast, { x: '120%', duration: 0.4, ease: 'power2.in', onComplete: () => toast.remove() });
                    }, 2000);
                }
            });
        }

        // ============================================================
        // 4. NAVBAR BADGE
        // ============================================================
        const cartBadge = document.querySelector('.cart-badge');
        if (cartBadge) {
            const count = parseInt(localStorage.getItem('optiq_cartCount')) || 0;
            cartBadge.textContent = count;
        }
        const wishlistBadge = document.querySelector('.wishlist-badge');
        if (wishlistBadge) {
            const count = parseInt(localStorage.getItem('optiq_wishlistCount')) || 0;
            wishlistBadge.textContent = count;
            wishlistBadge.style.display = count > 0 ? 'flex' : 'none';
        }

        // ============================================================
        // 5. INIT
        // ============================================================
        renderOrders('all', '');
        attachEvents();

        console.log('📦 My Orders page ready (Buy button removed)');
    });
</script>

<!-- ============================================================ -->
<!-- STYLES                                                       -->
<!-- ============================================================ -->
<style>
    .orders-grid {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    .order-card {
        transition: transform 0.5s var(--ease-luxury, cubic-bezier(0.23, 1, 0.32, 1)),
            box-shadow 0.5s var(--ease-luxury, cubic-bezier(0.23, 1, 0.32, 1));
        cursor: default;
    }
    .order-card:hover {
        transform: translateY(-4px) scale(1.005);
        box-shadow: var(--shadow-lg, 0 16px 60px rgba(0, 0, 0, 0.08));
    }
    .order-card .product-stack {
        display: flex;
        align-items: center;
    }
    .order-card .stack-img {
        width: 48px;
        height: 48px;
        border-radius: 8px;
        object-fit: cover;
        border: 2px solid #fff;
        margin-right: -12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        transition: transform 0.3s ease;
    }
    .order-card .stack-img:hover {
        transform: scale(1.1);
        z-index: 5;
    }
    .order-card .stack-more {
        width: 48px;
        height: 48px;
        border-radius: 8px;
        background: rgba(0, 0, 0, 0.02);
        border: 2px dashed rgba(0, 0, 0, 0.04);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        font-weight: 600;
        color: rgba(0, 0, 0, 0.2);
    }
    .status-dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin-right: 6px;
    }
    .pulse-processing { animation: pulse-blue 1.8s ease-in-out infinite; }
    .pulse-shipped { animation: pulse-amber 1.8s ease-in-out infinite; }
    .pulse-delivered { animation: pulse-green 1.8s ease-in-out infinite; }
    @keyframes pulse-blue {
        0%, 100% { box-shadow: 0 0 0 0 rgba(74, 158, 255, 0.4); }
        50% { box-shadow: 0 0 0 6px rgba(74, 158, 255, 0); }
    }
    @keyframes pulse-amber {
        0%, 100% { box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.4); }
        50% { box-shadow: 0 0 0 6px rgba(245, 158, 11, 0); }
    }
    @keyframes pulse-green {
        0%, 100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4); }
        50% { box-shadow: 0 0 0 6px rgba(34, 197, 94, 0); }
    }
    .delivery-vehicle {
        display: flex;
        align-items: center;
        gap: 2px;
        font-size: 0.75rem;
        opacity: 0.6;
    }
    .delivery-vehicle .vehicle-icon { font-size: 0.85rem; }
    .delivery-vehicle .vehicle-dots { font-size: 0.5rem; letter-spacing: 2px; color: rgba(0,0,0,0.15); }
    .delivery-vehicle .vehicle-icon:nth-child(3) {
        animation: vanMove 2.5s ease-in-out infinite;
    }
    @keyframes vanMove {
        0%, 100% { transform: translateX(0); }
        50% { transform: translateX(4px); }
    }
    .verified-seal {
        font-size: 0.7rem;
        font-weight: 600;
        color: #22c55e;
        background: rgba(34, 197, 94, 0.08);
        padding: 0.2rem 0.6rem;
        border-radius: 100px;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
    }
    .verified-seal i { font-size: 0.8rem; }
    .filter-chip {
        padding: 0.4rem 1.2rem;
        border-radius: 100px;
        border: 1px solid rgba(0, 0, 0, 0.04);
        background: rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(8px);
        font-size: 0.8rem;
        font-weight: 500;
        color: rgba(0, 0, 0, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
    }
    .filter-chip:hover {
        border-color: rgba(200, 169, 81, 0.15);
        color: var(--charcoal);
    }
    .filter-chip.active {
        background: rgba(15, 61, 46, 0.06);
        border-color: var(--emerald);
        color: var(--emerald);
        font-weight: 600;
        box-shadow: 0 0 0 2px rgba(15, 61, 46, 0.04);
    }
    .empty-case-wrapper {
        position: relative;
        width: 120px;
        height: 80px;
        margin: 0 auto;
    }
    .empty-case {
        position: relative;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }
    .empty-case .case-top {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 50%;
        background: rgba(15, 61, 46, 0.06);
        border-radius: 12px 12px 0 0;
        border: 2px solid rgba(15, 61, 46, 0.04);
        transform-origin: bottom;
        transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .empty-case:hover .case-top { transform: rotateX(-50deg); }
    .empty-case .case-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 50%;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 0 0 12px 12px;
        border: 2px solid rgba(15, 61, 46, 0.04);
        border-top: none;
    }
    .empty-case .case-inner {
        position: absolute;
        top: 10%;
        left: 10%;
        right: 10%;
        bottom: 10%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }
    .empty-case .case-icon { font-size: 2rem; opacity: 0.3; }
    .empty-case .case-shine {
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent 40%, rgba(255,255,255,0.1) 50%, transparent 60%);
        transform: rotate(30deg);
        animation: shineEmpty 6s infinite;
    }
    @keyframes shineEmpty {
        0% { transform: translateX(-100%) translateY(-100%) rotate(30deg); }
        100% { transform: translateX(100%) translateY(100%) rotate(30deg); }
    }

    @media (max-width: 768px) {
        .order-card .stack-img { width: 36px; height: 36px; }
        .order-card .stack-more { width: 36px; height: 36px; font-size: 0.6rem; }
        .filter-chip { font-size: 0.7rem; padding: 0.2rem 0.8rem; }
        .delivery-vehicle { font-size: 0.6rem; }
    }
    @media (max-width: 576px) {
        .order-card { padding: 1rem !important; }
        .order-card .stack-img { width: 30px; height: 30px; }
        .order-card .stack-more { width: 30px; height: 30px; font-size: 0.5rem; }
        .verified-seal { font-size: 0.6rem; padding: 0.1rem 0.4rem; }
    }
</style>

</body>
</html>