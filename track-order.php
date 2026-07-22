<?php
// track-order.php – Dual Mode: Single Order OR List + Expandable (BOOTSTRAP RESPONSIVE) – FIXED
include 'templates/header.php';
include 'templates/navbar.php';
?>

<!-- ============================================================ -->
<!-- SVG Definitions (Truck, House, Road, etc.)                  -->
<!-- ============================================================ -->
<svg style="position:absolute;width:0;height:0;pointer-events:none;">
    <defs>
        <pattern id="roadPattern" width="20" height="4" patternUnits="userSpaceOnUse">
            <rect width="12" height="4" fill="rgba(200,169,81,0.3)" />
        </pattern>
        <filter id="glowFilter">
            <feGaussianBlur stdDeviation="4" result="blur" />
            <feMerge>
                <feMergeNode in="blur" />
                <feMergeNode in="SourceGraphic" />
            </feMerge>
        </filter>
    </defs>
</svg>

<!-- ============================================================ -->
<!-- MAIN CONTENT                                                  -->
<!-- ============================================================ -->
<section class="bg-cream py-4 py-md-5 track-section" style="min-height:100vh;padding-top:clamp(80px,12vh,100px) !important;">
    <div class="container">

        <!-- ─── BACK BUTTON ─── (FIXED: reduced margin & padding) -->
        <div class="mb-4 mb-sm-3 mb-md-2">
            <a href="orders.php" class="btn btn-outline-emerald btn-sm rounded-pill px-3 px-sm-4" style="font-size:clamp(0.6rem,0.5vw,0.8rem);padding:0.2rem 0.3rem;">
                <i class="bi bi-arrow-left me-2"></i> Back to Orders
            </a>
        </div>

        <!-- ========================================================== -->
        <!-- MODE 1: SINGLE ORDER (when ?id is present)                -->
        <!-- ========================================================== -->
        <div id="singleOrderMode" class="d-none">
            <!-- Product Summary -->
            <div class="glass-card p-3 p-md-4 p-lg-5 rounded-4 mb-4">
                <div class="row g-3 g-md-4 align-items-center">
                    <div class="col-2 col-sm-3 col-md-2 col-lg-auto">
                        <div class="product-thumb rounded-3 overflow-hidden" style="width:clamp(60px,10vw,80px);height:clamp(60px,10vw,80px);background:rgba(255,255,255,0.3);">
                            <img src="" alt="" id="trackProductImg" class="w-100 h-100 object-fit-contain p-2">
                        </div>
                    </div>
                    <div class="col">
                        <h4 class="fw-bold text-primary mb-1" id="trackProductName" style="font-size:clamp(1rem,1.8vw,1.3rem);">Product Name</h4>
                        <p class="text-muted-custom small mb-0" id="trackProductMeta" style="font-size:clamp(0.65rem,0.9vw,0.8rem);">Material · Lens Type</p>
                        <p class="text-muted-custom small mb-0" style="font-size:clamp(0.6rem,0.8vw,0.75rem);">Order #<span id="trackOrderId">OPT-XXXX</span></p>
                    </div>
                    <div class="col-auto text-end">
                        <span class="badge px-2 px-sm-3 py-1 py-sm-2 rounded-pill" id="trackStatusBadge" style="font-size:clamp(0.6rem,0.9vw,0.75rem);">Processing</span>
                    </div>
                </div>
            </div>

            <!-- ─── DELIVERY HERO ─── -->
            <div class="glass-card p-3 p-md-4 p-lg-5 rounded-4 mb-4">
                <div class="delivery-hero" id="deliveryHero">
                    <div class="delivery-path">
                        <div class="delivery-node start-node">
                            <span class="node-icon">📦</span>
                            <span class="node-label">Warehouse</span>
                        </div>
                        <div class="delivery-road" id="deliveryRoad">
                            <svg class="road-svg" viewBox="0 0 100 20" preserveAspectRatio="none">
                                <line x1="0" y1="10" x2="100" y2="10" stroke="url(#roadPattern)" stroke-width="2" />
                            </svg>
                            <div class="truck-container" id="truckContainer">
                                <svg viewBox="0 0 120 60" width="clamp(50px,10vw,80px)" height="clamp(25px,5vw,40px)" style="display:block;">
                                    <circle cx="10" cy="30" r="4" fill="rgba(200,200,200,0.4)" class="exhaust-smoke" />
                                    <circle cx="6" cy="26" r="3" fill="rgba(200,200,200,0.3)" class="exhaust-smoke" />
                                    <circle cx="14" cy="34" r="2" fill="rgba(200,200,200,0.2)" class="exhaust-smoke" />
                                    <rect x="20" y="10" width="70" height="30" rx="4" fill="#0F3D2E" />
                                    <rect x="30" y="4" width="40" height="10" rx="2" fill="#0F3D2E" />
                                    <rect x="32" y="6" width="12" height="6" rx="1" fill="rgba(255,255,255,0.2)" />
                                    <rect x="46" y="6" width="12" height="6" rx="1" fill="rgba(255,255,255,0.2)" />
                                    <rect x="90" y="18" width="6" height="4" rx="1" fill="#D4AF37" />
                                    <circle cx="35" cy="40" r="8" fill="#1a1a1e" id="truck-wheel-back" />
                                    <circle cx="35" cy="40" r="5" fill="#333" />
                                    <circle cx="75" cy="40" r="8" fill="#1a1a1e" id="truck-wheel-front" />
                                    <circle cx="75" cy="40" r="5" fill="#333" />
                                </svg>
                            </div>
                        </div>
                        <div class="delivery-node end-node" id="houseNode">
                            <span class="node-icon">🏠</span>
                            <span class="node-label">Delivered</span>
                            <div class="house-glow"></div>
                        </div>
                    </div>
                    <div class="delivery-status mt-3 text-center">
                        <h5 class="fw-bold text-primary" id="trackStatusText" style="font-size:clamp(1rem,1.6vw,1.2rem);">Out for Delivery</h5>
                        <p class="text-muted-custom small" id="trackStatusMeta" style="font-size:clamp(0.7rem,0.9vw,0.8rem);">Expected Today, 7 PM</p>
                    </div>
                </div>
            </div>

            <!-- ─── PROGRESS TIMELINE ─── -->
            <div class="glass-card p-3 p-md-4 p-lg-5 rounded-4 mb-4">
                <h6 class="fw-bold text-primary mb-3" style="font-size:clamp(0.85rem,1.2vw,1rem);">Delivery Progress</h6>
                <div class="timeline-progress" id="timelineProgress">
                    <div class="timeline-step"><span class="step-circle">✔</span><span class="step-label">Packed</span></div>
                    <div class="timeline-step"><span class="step-circle">✔</span><span class="step-label">Shipped</span></div>
                    <div class="timeline-step"><span class="step-circle">🚚</span><span class="step-label">In Transit</span></div>
                    <div class="timeline-step active"><span class="step-circle">●</span><span class="step-label">Out for Delivery</span></div>
                    <div class="timeline-step pending"><span class="step-circle">○</span><span class="step-label">Delivered</span></div>
                </div>
                <div class="timeline-particle-container">
                    <div class="timeline-particle" id="timelineParticle"></div>
                </div>
            </div>

            <!-- ─── DELIVERY ADDRESS ─── -->
            <div class="glass-card p-3 p-md-4 p-lg-5 rounded-4 mb-4">
                <h6 class="fw-bold text-primary mb-3" style="font-size:clamp(0.85rem,1.2vw,1rem);"><i class="bi bi-geo-alt me-2 text-accent"></i>Delivery Address</h6>
                <div class="address-pulse" id="addressPulse">
                    <p class="fw-bold mb-0" id="trackAddressName" style="font-size:clamp(0.9rem,1.2vw,1rem);">Janani A</p>
                    <p class="text-muted-custom mb-0" id="trackAddressFull" style="font-size:clamp(0.75rem,1vw,0.85rem);">Thanjavur, Tamil Nadu - 613001</p>
                </div>
            </div>

            <!-- ─── DELIVERY PARTNER ─── -->
            <div class="glass-card p-3 p-md-4 p-lg-5 rounded-4 mb-4">
                <h6 class="fw-bold text-primary mb-3" style="font-size:clamp(0.85rem,1.2vw,1rem);"><i class="bi bi-truck me-2 text-accent"></i>Delivery Partner</h6>
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                    <div>
                        <p class="fw-bold mb-0" id="trackCarrier" style="font-size:clamp(0.9rem,1.2vw,1rem);">BlueDart</p>
                        <p class="text-muted-custom small" id="trackTrackingId" style="font-size:clamp(0.65rem,0.9vw,0.75rem);">Tracking ID: BD28394838</p>
                    </div>
                    <a href="#" class="btn btn-outline-emerald btn-sm rounded-pill" style="font-size:clamp(0.6rem,0.9vw,0.75rem);padding:0.2rem 0.8rem;">Track on Carrier</a>
                </div>
            </div>

            <!-- ─── SHIPMENT UPDATES ─── -->
            <div class="glass-card p-3 p-md-4 p-lg-5 rounded-4 mb-4">
                <div class="d-flex align-items-center justify-content-between cursor-pointer" id="shipmentToggle">
                    <h6 class="fw-bold text-primary mb-0" style="font-size:clamp(0.85rem,1.2vw,1rem);"><i class="bi bi-clock-history me-2 text-accent"></i>Shipment Updates</h6>
                    <span class="expand-arrow" id="expandArrow"><i class="bi bi-chevron-down"></i></span>
                </div>
                <div class="shipment-updates" id="shipmentUpdates" style="display:none;">
                    <div class="update-item">
                        <span class="update-time">Today 09:45 AM</span>
                        <span class="update-event">Out for Delivery</span>
                    </div>
                    <div class="update-item">
                        <span class="update-time">Yesterday 06:20 PM</span>
                        <span class="update-event">Reached Local Hub</span>
                    </div>
                    <div class="update-item">
                        <span class="update-time">Yesterday 11:10 AM</span>
                        <span class="update-event">Shipped from Chennai</span>
                    </div>
                    <div class="update-item">
                        <span class="update-time">20 Jul 2026</span>
                        <span class="update-event">Order Packed</span>
                    </div>
                </div>
            </div>

            <!-- ─── SUPPORT ─── -->
            <div class="glass-card p-3 p-md-4 p-lg-5 rounded-4 mb-4">
                <div class="d-flex flex-wrap align-items-center gap-3">
                    <div class="support-icon" id="supportIcon">
                        <i class="bi bi-headset text-accent" style="font-size:clamp(1.5rem,2.5vw,2rem);"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-primary mb-0" style="font-size:clamp(0.9rem,1.2vw,1rem);">Need Help?</h6>
                        <p class="text-muted-custom small mb-0" style="font-size:clamp(0.7rem,0.9vw,0.8rem);">Contact our support team</p>
                    </div>
                    <a href="#" class="btn btn-emerald rounded-pill ms-auto" style="font-size:clamp(0.75rem,1vw,0.85rem);padding:0.3rem 1.2rem;">Contact Support</a>
                </div>
            </div>

            <!-- ─── FLOATING PARCEL ─── -->
            <div class="floating-parcel" id="floatingParcel">
                <span>📦</span>
            </div>
        </div>

        <!-- ========================================================== -->
        <!-- MODE 2: LIST ALL ORDERS (when no ?id)                     -->
        <!-- ========================================================== -->
        <div id="listMode">
            <!-- ─── SEARCH BAR (FIXED: col-md-5) ─── -->
            <div class="row g-2 g-sm-3 mb-4" id="trackSearchSection">
                <div class="col-md-5 col-12">
                    <div class="position-relative">
                        <i class="bi bi-search position-absolute" style="top:12px;left:14px;color:rgba(0,0,0,0.2);"></i>
                        <input type="text" class="form-control rounded-pill ps-5" id="trackSearchInput" placeholder="🔍 Search by Order ID or Product Name..." style="border-color:rgba(0,0,0,0.04);background:rgba(255,255,255,0.4);backdrop-filter:blur(8px);font-size:clamp(0.8rem,1vw,0.9rem);padding:0.4rem 0.8rem;">
                    </div>
                </div>
                <!-- ─── FILTER CHIPS (FIXED: col-md-7 + alignment) ─── -->
                <div class="col-md-7 col-12">
                    <div class="d-flex flex-wrap align-items-center justify-content-start gap-1 gap-sm-2" id="trackFilterChips">
                        <button class="filter-chip active" data-filter="all" style="font-size:clamp(0.6rem,0.9vw,0.75rem);padding:0.25rem 0.8rem;">All</button>
                        <button class="filter-chip" data-filter="Processing" style="font-size:clamp(0.6rem,0.9vw,0.75rem);padding:0.25rem 0.8rem;">🔵 Processing</button>
                        <button class="filter-chip" data-filter="Shipped" style="font-size:clamp(0.6rem,0.9vw,0.75rem);padding:0.25rem 0.8rem;">🟠 Shipped</button>
                        <button class="filter-chip" data-filter="Delivered" style="font-size:clamp(0.6rem,0.9vw,0.75rem);padding:0.25rem 0.8rem;">🟢 Delivered</button>
                        <button class="filter-chip" data-filter="Cancelled" style="font-size:clamp(0.6rem,0.9vw,0.75rem);padding:0.25rem 0.8rem;">⚪ Cancelled</button>
                    </div>
                </div>
            </div>

            <!-- ─── TOTAL COUNT ─── -->
            <p class="text-muted-custom mb-3" style="font-size:clamp(0.85rem,1vw,0.95rem);">All orders: <span class="fw-bold text-primary" id="trackTotalCount">0</span></p>

            <!-- ─── ORDERS LIST ─── -->
            <div id="trackOrdersContainer"></div>

            <!-- ─── EMPTY STATE ─── -->
            <div id="trackEmptyState" class="text-center py-5 d-none">
                <div class="glass-card p-4 p-md-5 d-inline-block">
                    <i class="bi bi-box-seam fs-1 text-muted mb-3"></i>
                    <h3 class="text-primary" style="font-size:clamp(1.2rem,2.5vw,1.8rem);">No Orders to Track</h3>
                    <p class="text-muted-custom" style="font-size:clamp(0.85rem,1.2vw,1rem);">Place an order first to see tracking details.</p>
                    <a href="category.php" class="btn btn-emerald mt-3" style="font-size:clamp(0.8rem,1.2vw,1rem);padding:0.4rem 1.5rem;">Start Shopping</a>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ========================== search-overlay.php ================================== -->
<?php include 'search-overlay.php'; ?>

<?php include 'templates/footer.php'; ?>

<!-- ============================================================ -->
<!-- SCRIPTS (unchanged – only styling/classes updated)          -->
<!-- ============================================================ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // ============================================================
    // 1. HELPERS
    // ============================================================
    function getOrders() {
        try {
            const data = localStorage.getItem('optiq_orders');
            if (!data) return [];
            const parsed = JSON.parse(data);
            return Array.isArray(parsed) ? parsed : [];
        } catch (e) { return []; }
    }

    function getOrderById(id) {
        const orders = getOrders();
        return orders.find(o => o.id === id);
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

    function generateShipmentUpdates(order) {
        const updates = [];
        const orderDate = new Date(order.date);
        const status = order.status;

        updates.push({
            date: new Date(orderDate),
            event: 'Order Packed'
        });

        if (status !== 'Processing' && status !== 'Cancelled') {
            const shippedDate = new Date(orderDate);
            shippedDate.setDate(shippedDate.getDate() + 1);
            updates.push({
                date: shippedDate,
                event: 'Shipped from warehouse'
            });
        }

        if (status === 'Shipped' || status === 'Delivered') {
            const transitDate = new Date(orderDate);
            transitDate.setDate(transitDate.getDate() + 3);
            updates.push({
                date: transitDate,
                event: 'In Transit'
            });
        }

        if (status === 'Delivered') {
            const outForDelivery = new Date(orderDate);
            outForDelivery.setDate(outForDelivery.getDate() + 5);
            updates.push({
                date: outForDelivery,
                event: 'Out for Delivery'
            });
            const deliveredDate = new Date(orderDate);
            deliveredDate.setDate(deliveredDate.getDate() + 7);
            updates.push({
                date: deliveredDate,
                event: 'Delivered'
            });
        }

        updates.sort((a, b) => b.date - a.date);
        return updates;
    }

    // ============================================================
    // 2. MODE 1: SINGLE ORDER DETAILS (full page)
    // ============================================================
    function renderSingleOrder(order) {
        if (!order) {
            document.getElementById('singleOrderMode').classList.add('d-none');
            document.getElementById('listMode').classList.add('d-none');
            document.querySelector('.container').innerHTML += `
                <div class="glass-card p-5 text-center">
                    <i class="bi bi-exclamation-triangle fs-1 text-warning"></i>
                    <h3 class="text-primary">Order not found</h3>
                    <p class="text-muted-custom">The order ID you're looking for doesn't exist.</p>
                    <a href="orders.php" class="btn btn-emerald">Back to Orders</a>
                </div>
            `;
            return;
        }

        document.getElementById('listMode').classList.add('d-none');
        document.getElementById('singleOrderMode').classList.remove('d-none');

        const firstProduct = order.products[0];

        // Fill product summary
        document.getElementById('trackProductImg').src = firstProduct.image || 'assets/images/placeholder.jpg';
        document.getElementById('trackProductName').textContent = firstProduct.name || 'Product';
        document.getElementById('trackProductMeta').textContent = (firstProduct.material || 'Standard') + ' · ' + (firstProduct.lens_type || 'Standard');
        document.getElementById('trackOrderId').textContent = order.id;

        // Status badge
        const statusMap = {
            'Processing': 'bg-primary bg-opacity-10 text-white',
            'Shipped': 'bg-warning bg-opacity-10 text-white',
            'Delivered': 'bg-success bg-opacity-10 text-white',
            'Cancelled': 'bg-danger bg-opacity-10 text-white',
            'Returned': 'bg-danger bg-opacity-10 text-white'
        };
        const badge = document.getElementById('trackStatusBadge');
        badge.textContent = order.status || 'Processing';
        badge.className = 'badge px-2 px-sm-3 py-1 py-sm-2 rounded-pill ' + (statusMap[order.status] || statusMap['Processing']);

        // Delivery status
        document.getElementById('trackStatusText').textContent = order.status === 'Delivered' ? 'Delivered 🎉' : (order.status || 'In Transit');
        document.getElementById('trackStatusMeta').textContent = order.deliveryDate ? 'Expected by ' + new Date(order.deliveryDate).toLocaleDateString('en-IN', { day:'numeric', month:'short', year:'numeric' }) : '';

        // Address
        document.getElementById('trackAddressName').textContent = order.address?.name || 'Janani A';
        document.getElementById('trackAddressFull').textContent = order.address?.address || 'Thanjavur, Tamil Nadu - 613001';

        // Partner
        document.getElementById('trackCarrier').textContent = 'BlueDart';
        document.getElementById('trackTrackingId').textContent = 'Tracking ID: BD' + Math.random().toString(36).substring(2, 10).toUpperCase();

        // Shipment updates
        const updates = generateShipmentUpdates(order);
        const updatesHtml = updates.map(u => `
            <div class="update-item">
                <span class="update-time">${u.date.toLocaleDateString('en-IN', { day:'numeric', month:'short', year:'numeric' })} ${u.date.toLocaleTimeString('en-IN', { hour:'2-digit', minute:'2-digit' })}</span>
                <span class="update-event">${u.event}</span>
            </div>
        `).join('');
        document.getElementById('shipmentUpdates').innerHTML = updatesHtml;

        // ── Start single order animations ──
        initSingleOrderAnimations(order);
    }

    function initSingleOrderAnimations(order) {
        // Truck
        const truckContainer = document.getElementById('truckContainer');
        const road = document.getElementById('deliveryRoad');
        const houseNode = document.getElementById('houseNode');

        if (truckContainer) {
            gsap.set(truckContainer, { x: -40, opacity: 1 });
            const tl = gsap.timeline({
                repeat: -1,
                repeatDelay: 2,
                defaults: { ease: 'linear' }
            });
            const roadWidth = road ? road.offsetWidth : window.innerWidth * 0.6;
            const endX = roadWidth - 40;
            tl.to(truckContainer, {
                x: endX,
                duration: 5,
                ease: 'linear',
                onUpdate: function() {
                    document.querySelectorAll('#truck-wheel-back, #truck-wheel-front').forEach(w => {
                        w.style.transform = `rotate(${this.progress() * 720}deg)`;
                    });
                }
            });
            tl.to(houseNode, {
                opacity: 1,
                scale: 1.1,
                duration: 0.3,
                ease: 'power2.out',
                onStart: () => {
                    houseNode.querySelector('.house-glow').style.opacity = '1';
                }
            }, '-=0.5');
        }

        // Timeline particle
        const particle = document.getElementById('timelineParticle');
        if (particle) {
            const steps = document.querySelectorAll('#timelineProgress .timeline-step');
            gsap.to(particle, {
                x: '100%',
                duration: 4,
                repeat: -1,
                ease: 'linear',
                onUpdate: function() {
                    const progress = this.progress();
                    const idx = Math.floor(progress * steps.length);
                    steps.forEach((step, i) => {
                        if (i <= idx) {
                            step.classList.add('done');
                            step.querySelector('.step-circle').style.background = '#D4AF37';
                        } else {
                            step.classList.remove('done');
                        }
                    });
                }
            });
        }

        // Address pulse
        const addressEl = document.getElementById('addressPulse');
        if (addressEl) {
            gsap.to(addressEl, {
                scale: 1.05,
                duration: 0.3,
                repeat: -1,
                yoyo: true,
                repeatDelay: 5,
                ease: 'sine.inOut'
            });
        }

        // Support vibration
        const supportIcon = document.getElementById('supportIcon');
        if (supportIcon) {
            gsap.to(supportIcon, {
                rotation: 3,
                duration: 0.1,
                repeat: -1,
                yoyo: true,
                repeatDelay: 9,
                ease: 'sine.inOut'
            });
        }

        // Floating parcel
        const parcel = document.getElementById('floatingParcel');
        if (parcel) {
            gsap.to(parcel, {
                y: -12,
                duration: 2.5,
                repeat: -1,
                yoyo: true,
                ease: 'sine.inOut'
            });
        }

        // Shipment expand
        const toggle = document.getElementById('shipmentToggle');
        const updates = document.getElementById('shipmentUpdates');
        const arrow = document.getElementById('expandArrow');
        if (toggle && updates) {
            toggle.addEventListener('click', function() {
                if (updates.style.display === 'none') {
                    updates.style.display = 'block';
                    const items = updates.querySelectorAll('.update-item');
                    gsap.from(items, {
                        opacity: 0,
                        y: 20,
                        duration: 0.5,
                        stagger: 0.08,
                        ease: 'power2.out',
                        clearProps: 'transform'
                    });
                    arrow.innerHTML = '<i class="bi bi-chevron-up"></i>';
                } else {
                    gsap.to(updates, {
                        opacity: 0,
                        duration: 0.3,
                        ease: 'power2.in',
                        onComplete: () => {
                            updates.style.display = 'none';
                            updates.style.opacity = '1';
                        }
                    });
                    arrow.innerHTML = '<i class="bi bi-chevron-down"></i>';
                }
            });
        }

        // Road dashes
        const roadSvg = document.querySelector('.road-svg line');
        if (roadSvg) {
            roadSvg.style.strokeDasharray = '10 10';
            roadSvg.style.animation = 'roadMove 1s linear infinite';
        }
    }

    // ============================================================
    // 3. MODE 2: LIST ALL ORDERS (search, filter, expandable)
    // ============================================================
    function renderOrders(filter = 'all', search = '') {
        const container = document.getElementById('trackOrdersContainer');
        const emptyState = document.getElementById('trackEmptyState');
        const totalCount = document.getElementById('trackTotalCount');

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

            const updates = generateShipmentUpdates(order);
            const updatesHtml = updates.map(u => `
                <div class="update-item">
                    <span class="update-time">${u.date.toLocaleDateString('en-IN', { day:'numeric', month:'short', year:'numeric' })} ${u.date.toLocaleTimeString('en-IN', { hour:'2-digit', minute:'2-digit' })}</span>
                    <span class="update-event">${u.event}</span>
                </div>
            `).join('');

            html += `
                <div class="order-card glass-card p-3 p-md-4 rounded-4 mb-4" data-order-id="${order.id}">
                    <div class="order-card-inner">
                        <!-- ===== FIXED HEADER: flex-nowrap, text-truncate ===== -->
                        <div class="d-flex align-items-center justify-content-between mb-3" style="flex-wrap: nowrap; gap: 0.5rem;">
                            <div class="d-flex align-items-center gap-1" style="flex: 1; min-width: 0; overflow: hidden;">
                                <span class="fw-bold text-primary text-truncate" style="font-size:clamp(0.75rem,1.2vw,0.95rem); white-space: nowrap;">#${order.id || 'N/A'}</span>
                                <span class="text-muted-custom small" style="font-size:clamp(0.5rem,0.8vw,0.65rem); white-space: nowrap;">${order.date ? new Date(order.date).toLocaleDateString('en-IN', { day:'numeric', month:'short', year:'numeric' }) : 'N/A'}</span>
                            </div>
                            <div style="flex-shrink: 0; white-space: nowrap;">${getStatusBadge(order.status || 'Processing')}</div>
                        </div>

                        <div class="d-flex flex-wrap align-items-center gap-3 mb-2">
                            <div class="product-stack d-flex">${imgStack}${order.products.length > 3 ? `<span class="stack-more">+${order.products.length - 3}</span>` : ''}</div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold text-primary" style="font-size:clamp(0.85rem,1.2vw,1rem);">${firstProduct.name || 'Product'}</div>
                                <div class="text-muted-custom small" style="font-size:clamp(0.6rem,0.8vw,0.7rem);">${firstProduct.material || 'Standard'} · ${firstProduct.lens_type || 'Standard'}</div>
                                <div class="d-flex flex-wrap gap-3 mt-1">
                                    <span class="small text-muted-custom" style="font-size:clamp(0.55rem,0.7vw,0.65rem);">Qty: ${totalItems}</span>
                                    <span class="small fw-bold text-primary" style="font-size:clamp(0.7rem,0.9vw,0.8rem);">₹${(order.total || 0).toLocaleString('en-IN')}</span>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-outline-emerald track-expand-btn" data-order-id="${order.id}" style="font-size:clamp(0.6rem,0.9vw,0.75rem);padding:0.15rem 0.6rem;">
                                <i class="bi bi-truck me-1"></i> Track
                            </button>
                        </div>

                        <div class="tracking-details mt-3" data-order-id="${order.id}" style="display:none;">
                            <div class="tracking-inner">
                                <div class="delivery-hero glass-card p-2 p-sm-3 rounded-3 mb-3" style="background:rgba(255,255,255,0.3);">
                                    <div class="delivery-path">
                                        <div class="delivery-node start-node"><span class="node-icon">📦</span><span class="node-label">Warehouse</span></div>
                                        <div class="delivery-road" data-order-id="${order.id}">
                                            <svg class="road-svg" viewBox="0 0 100 20" preserveAspectRatio="none">
                                                <line x1="0" y1="10" x2="100" y2="10" stroke="url(#roadPattern)" stroke-width="2" />
                                            </svg>
                                            <div class="truck-container" data-order-id="${order.id}" style="display:none;">
                                                <svg viewBox="0 0 120 60" width="clamp(40px,8vw,60px)" height="clamp(20px,4vw,30px)" style="display:block;">
                                                    <circle cx="10" cy="30" r="4" fill="rgba(200,200,200,0.4)" class="exhaust-smoke" />
                                                    <circle cx="6" cy="26" r="3" fill="rgba(200,200,200,0.3)" class="exhaust-smoke" />
                                                    <circle cx="14" cy="34" r="2" fill="rgba(200,200,200,0.2)" class="exhaust-smoke" />
                                                    <rect x="20" y="10" width="70" height="30" rx="4" fill="#0F3D2E" />
                                                    <rect x="30" y="4" width="40" height="10" rx="2" fill="#0F3D2E" />
                                                    <rect x="32" y="6" width="12" height="6" rx="1" fill="rgba(255,255,255,0.2)" />
                                                    <rect x="46" y="6" width="12" height="6" rx="1" fill="rgba(255,255,255,0.2)" />
                                                    <rect x="90" y="18" width="6" height="4" rx="1" fill="#D4AF37" />
                                                    <circle cx="35" cy="40" r="8" fill="#1a1a1e" class="truck-wheel" />
                                                    <circle cx="35" cy="40" r="5" fill="#333" />
                                                    <circle cx="75" cy="40" r="8" fill="#1a1a1e" class="truck-wheel" />
                                                    <circle cx="75" cy="40" r="5" fill="#333" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="delivery-node end-node"><span class="node-icon">🏠</span><span class="node-label">Delivered</span><div class="house-glow"></div></div>
                                    </div>
                                    <div class="delivery-status mt-2 text-center">
                                        <h6 class="fw-bold text-primary" data-status-text style="font-size:clamp(0.8rem,1.2vw,0.95rem);">${order.status === 'Delivered' ? 'Delivered 🎉' : (order.status || 'In Transit')}</h6>
                                        <p class="text-muted-custom small" style="font-size:clamp(0.6rem,0.8vw,0.7rem);">${order.deliveryDate ? 'Expected by ' + new Date(order.deliveryDate).toLocaleDateString('en-IN', { day:'numeric', month:'short', year:'numeric' }) : ''}</p>
                                    </div>
                                </div>

                                <div class="timeline-progress mb-3">
                                    <div class="timeline-step"><span class="step-circle">✔</span><span class="step-label">Packed</span></div>
                                    <div class="timeline-step"><span class="step-circle">✔</span><span class="step-label">Shipped</span></div>
                                    <div class="timeline-step"><span class="step-circle">🚚</span><span class="step-label">In Transit</span></div>
                                    <div class="timeline-step active"><span class="step-circle">●</span><span class="step-label">Out for Delivery</span></div>
                                    <div class="timeline-step pending"><span class="step-circle">○</span><span class="step-label">Delivered</span></div>
                                </div>
                                <div class="timeline-particle-container"><div class="timeline-particle" data-order-id="${order.id}"></div></div>

                                <div class="row g-2 g-sm-3 mt-2">
                                    <div class="col-md-6">
                                        <div class="glass-card p-2 p-sm-3 rounded-3" style="background:rgba(255,255,255,0.3);">
                                            <h6 class="fw-bold text-primary mb-1" style="font-size:clamp(0.75rem,1vw,0.85rem);"><i class="bi bi-geo-alt me-1 text-accent"></i>Address</h6>
                                            <p class="mb-0 fw-bold" data-address-name style="font-size:clamp(0.8rem,1vw,0.9rem);">${order.address?.name || 'Janani A'}</p>
                                            <p class="text-muted-custom small" data-address-full style="font-size:clamp(0.6rem,0.8vw,0.7rem);">${order.address?.address || 'Thanjavur, Tamil Nadu - 613001'}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="glass-card p-2 p-sm-3 rounded-3" style="background:rgba(255,255,255,0.3);">
                                            <h6 class="fw-bold text-primary mb-1" style="font-size:clamp(0.75rem,1vw,0.85rem);"><i class="bi bi-truck me-1 text-accent"></i>Partner</h6>
                                            <p class="mb-0 fw-bold" style="font-size:clamp(0.8rem,1vw,0.9rem);">BlueDart</p>
                                            <p class="text-muted-custom small" style="font-size:clamp(0.6rem,0.8vw,0.7rem);">Tracking ID: BD${Math.random().toString(36).substring(2, 10).toUpperCase()}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <div class="d-flex align-items-center justify-content-between cursor-pointer shipment-toggle" style="cursor:pointer;">
                                        <h6 class="fw-bold text-primary mb-0" style="font-size:clamp(0.75rem,1vw,0.85rem);"><i class="bi bi-clock-history me-1 text-accent"></i>Shipment Updates</h6>
                                        <span class="expand-arrow"><i class="bi bi-chevron-down"></i></span>
                                    </div>
                                    <div class="shipment-updates" style="display:none; margin-top:8px;">${updatesHtml}</div>
                                </div>

                                <div class="d-flex flex-wrap align-items-center gap-3 mt-3 pt-2 border-top border-light">
                                    <i class="bi bi-headset text-accent" style="font-size:clamp(1.2rem,2vw,1.6rem);"></i>
                                    <div>
                                        <h6 class="fw-bold text-primary mb-0" style="font-size:clamp(0.8rem,1vw,0.9rem);">Need Help?</h6>
                                        <p class="text-muted-custom small mb-0" style="font-size:clamp(0.6rem,0.8vw,0.7rem);">Contact support</p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-emerald rounded-pill ms-auto" style="font-size:clamp(0.6rem,0.9vw,0.75rem);padding:0.15rem 0.6rem;">Support</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
        html += `</div>`;
        container.innerHTML = html;

        gsap.from('.order-card', {
            x: -30,
            opacity: 0,
            duration: 0.5,
            stagger: 0.06,
            ease: 'power3.out',
            clearProps: 'transform'
        });

        attachListEvents();
        attachFilterSearchEvents();
    }

    function attachFilterSearchEvents() {
        document.querySelectorAll('#trackFilterChips .filter-chip').forEach(chip => {
            chip.addEventListener('click', function() {
                document.querySelectorAll('#trackFilterChips .filter-chip').forEach(c => c.classList.remove('active'));
                this.classList.add('active');
                renderOrders(this.dataset.filter, document.getElementById('trackSearchInput').value);
            });
        });

        document.getElementById('trackSearchInput').addEventListener('input', function() {
            const activeFilter = document.querySelector('#trackFilterChips .filter-chip.active')?.dataset.filter || 'all';
            renderOrders(activeFilter, this.value);
        });
    }

    function attachListEvents() {
        document.querySelectorAll('.track-expand-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const orderId = this.dataset.orderId;
                const card = this.closest('.order-card');
                const details = card.querySelector('.tracking-details');
                const isOpen = details.style.display === 'block';

                document.querySelectorAll('.tracking-details').forEach(d => {
                    if (d.dataset.orderId !== orderId) {
                        d.style.display = 'none';
                        d.closest('.order-card').querySelector('.track-expand-btn').innerHTML = '<i class="bi bi-truck me-1"></i> Track';
                    }
                });

                if (isOpen) {
                    details.style.display = 'none';
                    this.innerHTML = '<i class="bi bi-truck me-1"></i> Track';
                } else {
                    details.style.display = 'block';
                    this.innerHTML = '<i class="bi bi-chevron-up me-1"></i> Hide Tracking';
                    card.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    startListTrackingAnimation(orderId, details);
                }
            });
        });

        document.querySelectorAll('.shipment-toggle').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const parent = this.closest('.tracking-inner');
                const updates = parent.querySelector('.shipment-updates');
                const arrow = this.querySelector('.expand-arrow i');
                if (updates.style.display === 'none') {
                    updates.style.display = 'block';
                    const items = updates.querySelectorAll('.update-item');
                    gsap.from(items, {
                        opacity: 0,
                        y: 15,
                        duration: 0.4,
                        stagger: 0.06,
                        ease: 'power2.out'
                    });
                    arrow.className = 'bi bi-chevron-up';
                } else {
                    updates.style.display = 'none';
                    arrow.className = 'bi bi-chevron-down';
                }
            });
        });
    }

    function startListTrackingAnimation(orderId, container) {
        const truckContainer = container.querySelector('.truck-container');
        const road = container.querySelector('.delivery-road');
        const houseNode = container.querySelector('.end-node');
        const particle = container.querySelector('.timeline-particle');

        if (truckContainer) {
            truckContainer.style.display = 'block';
            gsap.set(truckContainer, { x: -40, opacity: 1 });
            const tl = gsap.timeline({
                repeat: -1,
                repeatDelay: 2,
                defaults: { ease: 'linear' }
            });
            const roadWidth = road ? road.offsetWidth : 300;
            const endX = roadWidth - 40;
            tl.to(truckContainer, {
                x: endX,
                duration: 5,
                ease: 'linear',
                onUpdate: function() {
                    truckContainer.querySelectorAll('.truck-wheel').forEach(w => {
                        w.style.transform = `rotate(${this.progress() * 720}deg)`;
                    });
                }
            });
            tl.to(houseNode, {
                opacity: 1,
                scale: 1.1,
                duration: 0.3,
                ease: 'power2.out',
                onStart: () => {
                    const glow = houseNode.querySelector('.house-glow');
                    if (glow) glow.style.opacity = '1';
                }
            }, '-=0.5');
        }

        if (particle) {
            const steps = container.querySelectorAll('.timeline-step');
            gsap.to(particle, {
                x: '100%',
                duration: 4,
                repeat: -1,
                ease: 'linear',
                onUpdate: function() {
                    const progress = this.progress();
                    const idx = Math.floor(progress * steps.length);
                    steps.forEach((step, i) => {
                        if (i <= idx) {
                            step.classList.add('done');
                            step.querySelector('.step-circle').style.background = '#D4AF37';
                        } else {
                            step.classList.remove('done');
                        }
                    });
                }
            });
        }

        const addressEl = container.querySelector('[data-address-full]');
        if (addressEl) {
            gsap.to(addressEl.closest('.glass-card'), {
                scale: 1.02,
                duration: 0.3,
                repeat: -1,
                yoyo: true,
                repeatDelay: 5,
                ease: 'sine.inOut'
            });
        }
    }

    // ============================================================
    // 4. DETECT MODE & INIT
    // ============================================================
    const urlParams = new URLSearchParams(window.location.search);
    const orderId = urlParams.get('id');

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

    // ── Mode selection ──
    if (orderId) {
        const order = getOrderById(orderId);
        renderSingleOrder(order);
    } else {
        // List mode (search + filter)
        document.getElementById('singleOrderMode').classList.add('d-none');
        document.getElementById('listMode').classList.remove('d-none');
        renderOrders('all', '');
    }

    // ── Inject road animation CSS ──
    const style = document.createElement('style');
    style.textContent = `
        @keyframes roadMove {
            0% { stroke-dashoffset: 0; }
            100% { stroke-dashoffset: -20; }
        }
        .timeline-particle {
            position: absolute;
            top: 0;
            left: 0;
            width: 12px;
            height: 12px;
            background: #D4AF37;
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(212,175,55,0.5);
            z-index: 2;
        }
        .house-glow {
            position: absolute;
            inset: -10px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(212,175,55,0.3), transparent);
            opacity: 0;
            transition: opacity 0.6s ease;
            pointer-events: none;
        }
        .delivery-hero { position: relative; overflow: hidden; }
        .delivery-path {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.5rem 0;
        }
        .delivery-road {
            flex: 1;
            position: relative;
            height: 40px;
            margin: 0 8px;
        }
        .road-svg {
            width: 100%;
            height: 20px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
        .truck-container {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 0;
            will-change: transform;
        }
        .truck-container svg { display: block; }
        .delivery-node {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 1.2rem;
            position: relative;
        }
        .node-label {
            font-size: clamp(0.4rem,0.7vw,0.55rem);
            color: rgba(0,0,0,0.3);
            margin-top: 4px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .timeline-progress {
            display: flex;
            justify-content: space-between;
            position: relative;
            padding: 0.5rem 0;
            flex-wrap: wrap;
        }
        .timeline-progress::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 10%;
            right: 10%;
            height: 2px;
            background: rgba(0,0,0,0.06);
            transform: translateY(-50%);
            z-index: 0;
        }
        .timeline-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: clamp(0.45rem,0.7vw,0.6rem);
            font-weight: 500;
            color: rgba(0,0,0,0.15);
            z-index: 1;
            position: relative;
        }
        .timeline-step .step-circle {
            width: clamp(20px,3.5vw,24px);
            height: clamp(20px,3.5vw,24px);
            border-radius: 50%;
            background: rgba(0,0,0,0.04);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: clamp(0.4rem,0.6vw,0.6rem);
            transition: all 0.4s ease;
        }
        .timeline-step.done .step-circle {
            background: #D4AF37;
            color: #fff;
            box-shadow: 0 0 16px rgba(212,175,55,0.2);
        }
        .timeline-step.active .step-circle {
            background: #0F3D2E;
            color: #fff;
            animation: pulseCircle 1.8s ease-in-out infinite;
        }
        .timeline-step.pending .step-circle {
            background: transparent;
            border: 2px solid rgba(0,0,0,0.06);
        }
        @keyframes pulseCircle {
            0%, 100% { box-shadow: 0 0 0 0 rgba(15,61,46,0.4); }
            50% { box-shadow: 0 0 0 8px rgba(15,61,46,0); }
        }
        .timeline-particle-container {
            position: relative;
            height: 4px;
            background: transparent;
            margin: -4px 0 0 0;
        }
        .update-item {
            display: flex;
            justify-content: space-between;
            padding: 0.4rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.04);
            font-size: clamp(0.65rem,0.9vw,0.8rem);
            opacity: 0;
            flex-wrap: wrap;
            gap: 0.3rem;
        }
        .update-item:last-child { border-bottom: none; }
        .update-time { font-weight: 600; color: var(--charcoal); }
        .update-event { color: rgba(0,0,0,0.3); }
        .expand-arrow {
            transition: transform 0.3s ease;
            cursor: pointer;
            font-size: 1rem;
            color: rgba(0,0,0,0.2);
        }
        .expand-arrow:hover { color: var(--accent); }
        .floating-parcel {
            position: fixed;
            bottom: 30px;
            right: 30px;
            font-size: clamp(1.8rem,4vw,2.5rem);
            z-index: 999;
            pointer-events: none;
            opacity: 0.3;
            will-change: transform;
        }
        .address-pulse { transition: transform 0.3s ease; }
        .support-icon { transition: transform 0.2s ease; }
        .glass-card {
            background: rgba(255,255,255,0.55) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
            border: 1px solid rgba(200,169,81,0.06) !important;
            box-shadow: var(--shadow-md) !important;
        }
        .orders-grid {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        .order-card {
            transition: transform 0.5s var(--ease-luxury, cubic-bezier(0.23,1,0.32,1)),
                box-shadow 0.5s var(--ease-luxury, cubic-bezier(0.23,1,0.32,1));
            cursor: default;
        }
        .order-card:hover {
            transform: translateY(-4px) scale(1.005);
            box-shadow: var(--shadow-lg, 0 16px 60px rgba(0,0,0,0.08));
        }
        .order-card .product-stack { display: flex; align-items: center; }
        .order-card .stack-img {
            width: clamp(30px,5vw,44px);
            height: clamp(30px,5vw,44px);
            border-radius: 8px;
            object-fit: cover;
            border: 2px solid #fff;
            margin-right: -12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            transition: transform 0.3s ease;
        }
        .order-card .stack-img:hover { transform: scale(1.1); z-index: 5; }
        .order-card .stack-more {
            width: clamp(30px,5vw,44px);
            height: clamp(30px,5vw,44px);
            border-radius: 8px;
            background: rgba(0,0,0,0.02);
            border: 2px dashed rgba(0,0,0,0.04);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: clamp(0.4rem,0.7vw,0.65rem);
            font-weight: 600;
            color: rgba(0,0,0,0.2);
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
            0%,100% { box-shadow: 0 0 0 0 rgba(74,158,255,0.4); }
            50% { box-shadow: 0 0 0 6px rgba(74,158,255,0); }
        }
        @keyframes pulse-amber {
            0%,100% { box-shadow: 0 0 0 0 rgba(245,158,11,0.4); }
            50% { box-shadow: 0 0 0 6px rgba(245,158,11,0); }
        }
        @keyframes pulse-green {
            0%,100% { box-shadow: 0 0 0 0 rgba(34,197,94,0.4); }
            50% { box-shadow: 0 0 0 6px rgba(34,197,94,0); }
        }
        .filter-chip {
            padding: clamp(0.15rem,0.5vw,0.35rem) clamp(0.5rem,1.2vw,1.2rem);
            border-radius: 100px;
            border: 1px solid rgba(0,0,0,0.04);
            background: rgba(255,255,255,0.3);
            backdrop-filter: blur(8px);
            font-size: clamp(0.55rem,0.8vw,0.75rem);
            font-weight: 500;
            color: rgba(0,0,0,0.3);
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: inherit;
        }
        .filter-chip:hover { border-color: rgba(200,169,81,0.15); color: var(--charcoal); }
        .filter-chip.active {
            background: rgba(15,61,46,0.06);
            border-color: var(--emerald);
            color: var(--emerald);
            font-weight: 600;
            box-shadow: 0 0 0 2px rgba(15,61,46,0.04);
        }
        @media (max-width: 768px) {
            .delivery-path { flex-wrap: wrap; gap: 0.5rem; }
            .delivery-road { height: 30px; }
            .truck-container svg { width: 50px; height: 25px; }
            .truck-container { width: 50px; }
            .timeline-progress { flex-wrap: wrap; gap: 0.5rem; justify-content: center; }
            .timeline-progress::before { display: none; }
        }
        @media (max-width: 576px) {
            .order-card { padding: 1rem !important; }
            .timeline-step .step-circle { width: 20px; height: 20px; font-size: 0.5rem; }
            .track-expand-btn { font-size: 0.65rem; padding: 0.1rem 0.4rem; }
            .filter-chip { padding: 0.15rem 0.5rem; font-size: 0.55rem; }
            .floating-parcel { font-size: 1.5rem; bottom: 15px; right: 15px; }
        }
    `;
    document.head.appendChild(style);

    console.log('🚚 Track Order page ready – dual mode');
});
</script>
</body>
</html>