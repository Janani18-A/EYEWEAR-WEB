<?php
// order.php – Premium 4-Card Checkout with Glassmorphism Success (FULL SCOOTER OUTSIDE BOX)
include 'templates/header.php';
include 'templates/navbar.php';

// ─── PRODUCT DATA ──────────────────────────────────────
$product_id = isset($_GET['id']) ? $_GET['id'] : null;

// ─── INCLUDE PRODUCT DEFINITIONS ──────────────────────
if (file_exists('product.php')) {
    ob_start();
    include 'product.php';
    ob_end_clean();
}

// If a single product ID is given, ensure it exists
$singleProduct = null;
if ($product_id && isset($products[$product_id])) {
    $singleProduct = $products[$product_id];
    $singleProduct['id'] = $product_id;
}

// ─── ORDER DATA (defaults for single product mode) ───
$user_state = 'Tamil Nadu';
$business_state = 'Tamil Nadu';
$is_intra_state = ($user_state === $business_state);

if ($is_intra_state) {
    $cgst_rate = 9;
    $sgst_rate = 9;
    $gst_rate = 18;
} else {
    $igst_rate = 18;
    $gst_rate = 18;
}

// Default address, delivery, coupon (shared for both modes)
$default_address = [
    'name'    => 'Janani A',
    'phone'   => '9876543210',
    'address' => 'Thanjavur, Tamil Nadu',
    'pincode' => '613001',
    'city'    => 'Thanjavur',
    'state'   => 'Tamil Nadu',
    'landmark'=> 'Near Bus Stand',
    'country' => 'India',
];

$default_delivery = [
    'from' => date('M d', strtotime('+5 days')),
    'to'   => date('M d', strtotime('+7 days')),
];

$default_coupon = [
    'code'     => 'SAVE20',
    'discount' => 200,
];

// ─── PASS DATA TO JS ──────────────────────────────────
$is_single_mode = ($singleProduct !== null);
$single_product_json = $is_single_mode ? json_encode($singleProduct) : 'null';
?>

<!-- ============================================================ -->
<!-- STYLES – Premium 4-Card Checkout (WITH BOOTSTRAP CLASSES)   -->
<!-- ============================================================ -->
<style>
    /* ─── RESET & BASE ─────────────────────────────────────── */
    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --gold: #D4AF37;
        --gold-glow: rgba(212, 175, 55, 0.15);
        --cream: #FAF7F2;
        --emerald: #0F3D2E;
        --emerald-light: #1B5E4A;
        --charcoal: #1a1a1e;
        --white: #ffffff;
        --dusty-white: #F5F0EA;
        --glass-border: rgba(0, 0, 0, 0.04);
        --shadow-sm: 0 4px 20px rgba(0, 0, 0, 0.04);
        --shadow-md: 0 8px 40px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 16px 60px rgba(0, 0, 0, 0.08);
        --radius: 24px;
        --radius-sm: 12px;
        --transition: 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    body.checkout-page {
        background: var(--cream);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        color: var(--charcoal);
        padding-top: 90px;
        min-height: 100vh;
        overflow-x: hidden;
    }

    .checkout-bg {
        position: fixed;
        inset: 0;
        z-index: 0;
        pointer-events: none;
        background:
            radial-gradient(ellipse at 20% 20%, rgba(212, 175, 55, 0.04), transparent 50%),
            radial-gradient(ellipse at 80% 80%, rgba(15, 61, 46, 0.04), transparent 50%),
            var(--cream);
    }

    .checkout-wrapper {
        max-width: 1360px;
        margin: 0 auto;
        display: flex;
        gap: 2.5rem;
        padding: 0 1.5rem 4rem;
        position: relative;
        z-index: 1;
        min-height: calc(100vh - 200px);
    }

    .checkout-left {
        flex: 1.4;
        min-width: 0;
    }

    .checkout-right {
        flex: 1;
        max-width: 400px;
        position: sticky;
        top: 100px;
        align-self: flex-start;
        transition: all 0.4s ease;
    }

    .checkout-right.highlight {
        animation: panelHighlight 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 2;
    }

    @keyframes panelHighlight {
        0%,
        100% {
            box-shadow: var(--shadow-md);
            transform: scale(1);
        }
        50% {
            box-shadow: 0 0 0 4px var(--gold), var(--shadow-xl);
            transform: scale(1.02);
        }
    }

    /* ─── HEADER ──────────────────────────────────────────── */
    .checkout-header {
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
    }

    .checkout-header .brand .logo {
        font-size: 1.2rem;
        font-weight: 800;
        color: var(--emerald);
    }

    .checkout-header .brand .logo .gold {
        color: var(--gold);
    }

    .checkout-header h1 {
        font-size: 1.6rem;
        font-weight: 600;
        letter-spacing: -0.02em;
        color: var(--charcoal);
        margin-top: 0.2rem;
    }

    /* ─── PROGRESS TIMELINE – 4 STEPS ───────────────────── */
    .progress-timeline {
        display: flex;
        align-items: flex-start;
        gap: 0;
        margin-top: 0.8rem;
        padding: 0.4rem 0;
        position: relative;
        flex-wrap: wrap;
    }

    .progress-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.2rem;
        font-size: 0.7rem;
        font-weight: 600;
        color: rgba(0, 0, 0, 0.25);
        transition: color 0.4s ease;
        cursor: pointer;
        position: relative;
        flex: 0 0 auto;
        padding: 0 0.2rem;
    }

    .progress-step .step-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.08);
        transition: all 0.5s ease;
        flex-shrink: 0;
        position: relative;
        z-index: 2;
    }

    .progress-step.active .step-dot {
        background: var(--gold);
        box-shadow: 0 0 20px var(--gold-glow);
    }

    .progress-step.completed .step-dot {
        background: var(--emerald);
    }

    .progress-step .step-label {
        font-size: clamp(0.4rem, 0.8vw, 0.55rem);
        text-transform: uppercase;
        letter-spacing: 0.04em;
        white-space: nowrap;
        font-weight: 600;
        color: rgba(0, 0, 0, 0.25);
        text-align: center;
    }

    .progress-step.active .step-label {
        color: var(--charcoal);
        font-weight: 700;
    }

    .progress-step.completed .step-label {
        color: var(--emerald);
    }

    .progress-line {
        flex: 1;
        height: 2px;
        background: rgba(0, 0, 0, 0.06);
        margin: 0 0px;
        position: relative;
        border-radius: 2px;
        overflow: hidden;
        align-self: center;
        min-width: 8px;
        margin-bottom: 14px;
    }

    .progress-line .line-fill {
        height: 100%;
        width: 0%;
        background: var(--gold);
        border-radius: 2px;
        transition: width 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .progress-particle {
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--gold);
        box-shadow: 0 0 20px rgba(212, 175, 55, 0.4);
        transition: left 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        pointer-events: none;
        z-index: 2;
        opacity: 0;
    }

    /* ─── CARD STACK ────────────────────────────────────── */
    .card-stack {
        position: relative;
        min-height: 480px;
        display: flex;
        flex-direction: column;
        gap: 0;
    }

    .checkout-card {
        background: var(--dusty-white);
        border: 1px solid var(--glass-border);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
        will-change: transform, opacity, height, margin;
        color: var(--charcoal);
        width: 100%;
        cursor: pointer;
    }

    .checkout-card .card-inner {
        padding: 1.5rem 1.8rem;
        transition: padding 0.4s ease;
        position: relative;
        z-index: 1;
        pointer-events: none;
    }

    .checkout-card .card-header {
        pointer-events: all;
    }

    /* ─── CARD STATES ────────────────────────────────────── */
    .checkout-card.active {
        transform: scale(1);
        opacity: 1;
        z-index: 10;
        box-shadow: var(--shadow-lg), 0 0 40px var(--gold-glow);
        border-color: rgba(212, 175, 55, 0.15);
        margin-bottom: 0;
        background: var(--white);
        cursor: default;
    }

    .checkout-card.active .card-header .step-icon {
        background: var(--gold);
        color: #fff;
        box-shadow: 0 4px 16px rgba(212, 175, 55, 0.25);
    }

    .checkout-card.completed {
        transform: scale(0.97);
        opacity: 0.85;
        z-index: 5;
        box-shadow: var(--shadow-sm);
        border-color: rgba(15, 61, 46, 0.08);
        margin-bottom: 4px;
        min-height: 72px;
        background: var(--dusty-white);
    }

    .checkout-card.completed .card-inner {
        padding: 0.8rem 1.5rem;
    }

    .checkout-card.completed .card-content {
        max-height: 0 !important;
        opacity: 0 !important;
        padding-top: 0 !important;
        margin: 0 !important;
        overflow: hidden !important;
    }

    .checkout-card.pending {
        transform: scale(0.94);
        opacity: 0.5;
        z-index: 1;
        box-shadow: none;
        border-color: rgba(0, 0, 0, 0.02);
        margin-bottom: 4px;
        min-height: 72px;
        background: var(--dusty-white);
        filter: blur(0.3px);
    }

    .checkout-card.pending .card-inner {
        padding: 0.8rem 1.5rem;
    }

    .checkout-card.pending .card-content {
        max-height: 0 !important;
        opacity: 0 !important;
        padding-top: 0 !important;
        margin: 0 !important;
        overflow: hidden !important;
    }

    /* ─── CARD HEADER ────────────────────────────────────── */
    .card-header {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        cursor: pointer;
        user-select: none;
        position: relative;
    }

    .checkout-card.active .card-header {
        cursor: default;
    }

    .card-header .step-icon {
        width: clamp(28px, 4vw, 34px);
        height: clamp(28px, 4vw, 34px);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: clamp(0.6rem, 1vw, 0.8rem);
        font-weight: 600;
        background: rgba(0, 0, 0, 0.04);
        color: rgba(0, 0, 0, 0.3);
        flex-shrink: 0;
        transition: all 0.4s ease;
    }

    .card-header .step-icon .checkmark {
        display: none;
        font-size: 0.7rem;
    }

    .checkout-card.completed .card-header .step-icon .num {
        display: none;
    }
    .checkout-card.completed .card-header .step-icon .checkmark {
        display: inline;
    }
    .checkout-card.completed .card-header .step-icon {
        background: #4ade80;
        color: #fff;
        box-shadow: 0 4px 16px rgba(74, 222, 128, 0.2);
    }

    .card-header .step-title {
        font-size: clamp(0.8rem, 1.2vw, 0.95rem);
        font-weight: 700;
        color: var(--charcoal);
        flex: 1;
        letter-spacing: -0.01em;
    }

    .card-header .step-status {
        font-size: clamp(0.5rem, 0.8vw, 0.6rem);
        font-weight: 600;
        color: rgba(0, 0, 0, 0.25);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        transition: color 0.4s ease;
    }

    .checkout-card.active .card-header .step-status {
        color: var(--gold);
    }
    .checkout-card.completed .card-header .step-status {
        color: #4ade80;
    }

    .card-header .card-actions {
        display: flex;
        gap: 0.3rem;
        align-items: center;
    }

    .card-header .card-actions .action-btn {
        font-size: clamp(0.5rem, 0.7vw, 0.6rem);
        font-weight: 600;
        color: var(--gold);
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.15rem 0.6rem;
        border-radius: 100px;
        transition: all 0.3s ease;
        font-family: inherit;
        opacity: 0;
        pointer-events: none;
        white-space: nowrap;
    }

    .checkout-card.completed .card-header .card-actions .action-btn {
        opacity: 1;
        pointer-events: auto;
    }

    .checkout-card.completed .card-header .card-actions .action-btn:hover {
        background: var(--gold-glow);
    }

    .checkout-card.completed .card-header .card-actions .action-btn.danger {
        color: #ef4444;
    }

    .checkout-card.completed .card-header .card-actions .action-btn.danger:hover {
        background: rgba(239, 68, 68, 0.08);
    }

    /* ─── CARD CONTENT ────────────────────────────────────── */
    .card-content {
        overflow: hidden;
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        max-height: 0;
        opacity: 0;
        padding-top: 0;
        margin-top: 0;
        pointer-events: none;
    }

    .checkout-card.active .card-content {
        max-height: 2000px;
        opacity: 1;
        padding-top: 1.2rem;
        margin-top: 0.2rem;
        pointer-events: all;
    }

    .checkout-card.active .card-content-inner {
        animation: slideUp 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes slideUp {
        0% {
            transform: translateY(20px);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* ─── FLOATING SHADOW ────────────────────────────────── */
    .checkout-card.active {
        animation: floatShadow 3s ease-in-out infinite;
    }

    @keyframes floatShadow {
        0%,
        100% {
            box-shadow: var(--shadow-lg), 0 0 40px var(--gold-glow);
        }
        50% {
            box-shadow: var(--shadow-xl), 0 0 60px var(--gold-glow);
        }
    }

    /* ─── CARD 1 – REVIEW ORDER (DYNAMIC) ───────────────── */
    .product-review-row {
        display: flex;
        gap: 1.2rem;
        align-items: flex-start;
        flex-wrap: wrap;
        padding: 0.6rem 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
        margin-bottom: 0.6rem;
    }
    .product-review-row:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }

    .product-review-row .product-image {
        width: clamp(50px, 8vw, 70px);
        height: clamp(50px, 8vw, 70px);
        border-radius: var(--radius-sm);
        background: rgba(0, 0, 0, 0.02);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .product-review-row .product-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 4px;
    }

    .product-review-row .product-info {
        flex: 1;
        min-width: 120px;
    }

    .product-review-row .product-info .name {
        font-size: clamp(0.8rem, 1.2vw, 0.95rem);
        font-weight: 700;
        color: var(--charcoal);
    }

    .product-review-row .product-info .meta {
        font-size: clamp(0.6rem, 0.9vw, 0.78rem);
        color: rgba(0, 0, 0, 0.4);
        margin-top: 0.1rem;
        line-height: 1.4;
        font-weight: 500;
    }

    .product-review-row .product-info .specs {
        display: flex;
        gap: 0.6rem;
        margin-top: 0.2rem;
        font-size: clamp(0.5rem, 0.7vw, 0.7rem);
        color: rgba(0, 0, 0, 0.3);
        font-weight: 500;
        flex-wrap: wrap;
    }

    .product-review-row .product-info .specs span {
        background: rgba(0, 0, 0, 0.02);
        padding: 0.05rem 0.5rem;
        border-radius: 100px;
    }

    .product-review-row .product-right {
        text-align: right;
        min-width: 70px;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 0.2rem;
    }

    .product-review-row .product-right .price {
        font-size: clamp(0.8rem, 1.2vw, 1rem);
        font-weight: 700;
        color: var(--emerald);
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    .product-review-row .product-right .price .delete-btn {
        font-size: 0.6rem;
        color: #ef4444;
        background: none;
        border: none;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.3s ease;
        padding: 0.1rem 0.3rem;
        border-radius: 100px;
    }

    .product-review-row .product-right .price .delete-btn:hover {
        background: rgba(239, 68, 68, 0.08);
    }

    .product-review-row .product-right .qty {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        justify-content: flex-end;
    }

    .product-review-row .product-right .qty button {
        width: clamp(20px, 3vw, 24px);
        height: clamp(20px, 3vw, 24px);
        border-radius: 50%;
        border: 1px solid rgba(0, 0, 0, 0.06);
        background: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        font-size: 0.7rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: inherit;
        color: var(--charcoal);
    }

    .product-review-row .product-right .qty button:hover {
        background: var(--gold-glow);
        border-color: var(--gold);
    }

    .product-review-row .product-right .qty .value {
        font-weight: 600;
        min-width: 20px;
        text-align: center;
        font-size: clamp(0.7rem, 1vw, 0.85rem);
    }

    .prescription-section {
        margin-top: 0.8rem;
        padding: 0.6rem 1rem;
        background: rgba(0, 0, 0, 0.02);
        border-radius: var(--radius-sm);
        border: 1px solid rgba(0, 0, 0, 0.04);
        display: flex;
        align-items: center;
        gap: 0.8rem;
        flex-wrap: wrap;
    }

    .prescription-section .label {
        font-size: clamp(0.6rem, 0.8vw, 0.7rem);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: rgba(0, 0, 0, 0.3);
    }

    .prescription-section .status {
        font-size: clamp(0.7rem, 0.9vw, 0.8rem);
        font-weight: 600;
        color: #22c55e;
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    .prescription-section .actions {
        display: flex;
        gap: 0.5rem;
        margin-left: auto;
    }

    .prescription-section .actions button {
        font-size: clamp(0.6rem, 0.8vw, 0.7rem);
        font-weight: 500;
        padding: 0.2rem 0.8rem;
        border-radius: 100px;
        border: 1px solid rgba(0, 0, 0, 0.06);
        background: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
        color: var(--charcoal);
    }

    .prescription-section .actions button:hover {
        border-color: var(--gold);
        background: var(--gold-glow);
    }

    .prescription-section .actions button.primary {
        background: var(--emerald);
        color: #fff;
        border: none;
    }

    .prescription-section .actions button.primary:hover {
        background: var(--emerald-light);
    }

    .edit-product-btn {
        font-size: clamp(0.6rem, 0.8vw, 0.7rem);
        font-weight: 600;
        color: var(--gold);
        background: none;
        border: none;
        cursor: pointer;
        font-family: inherit;
        margin-top: 0.3rem;
        padding: 0.1rem 0.5rem;
        border-radius: 100px;
        transition: all 0.3s ease;
    }

    .edit-product-btn:hover {
        background: var(--gold-glow);
    }

    /* ─── BUTTONS ────────────────────────────────────────── */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        border-radius: 100px;
        font-family: inherit;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        white-space: nowrap;
        width: auto;
        min-width: fit-content;
    }

    .btn-primary {
        background: var(--emerald);
        color: #fff;
        box-shadow: 0 4px 16px rgba(15, 61, 46, 0.15);
    }

    .btn-primary:hover {
        background: var(--emerald-light);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(15, 61, 46, 0.2);
    }

    .btn-primary:active {
        transform: scale(0.96);
    }

    .btn-block {
        width: 100%;
        justify-content: center;
    }

    .btn-group {
        display: flex;
        gap: 0.8rem;
        margin-top: 1rem;
        flex-wrap: wrap;
        align-items: center;

    }
    .btn-group .btn {
    flex: 0 0 auto;
    width: auto;
}

    /* ─── CARD 2 – DELIVERY ────────────────────────────── */
    .delivery-summary {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 0.8rem 1rem;
        background: rgba(255, 255, 255, 0.3);
        border-radius: var(--radius-sm);
        border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .delivery-summary .icon {
        font-size: 1.2rem;
        color: var(--gold);
        margin-top: 0.1rem;
    }

    .delivery-summary .info .name {
        font-weight: 700;
        font-size: clamp(0.85rem, 1.2vw, 0.95rem);
        color: var(--charcoal);
    }

    .delivery-summary .info .address {
        font-size: clamp(0.75rem, 1vw, 0.85rem);
        color: rgba(0, 0, 0, 0.4);
        margin-top: 0.1rem;
    }

    .delivery-summary .info .delivery-date {
        font-size: clamp(0.7rem, 0.9vw, 0.8rem);
        color: var(--emerald);
        font-weight: 600;
        margin-top: 0.2rem;
    }

    .delivery-summary .change-btn {
        margin-left: auto;
        font-size: clamp(0.6rem, 0.8vw, 0.7rem);
        font-weight: 600;
        color: var(--gold);
        background: none;
        border: none;
        cursor: pointer;
        font-family: inherit;
        padding: 0.2rem 0.6rem;
        border-radius: 100px;
        transition: all 0.3s ease;
    }

    .delivery-summary .change-btn:hover {
        background: var(--gold-glow);
    }

    /* ─── ADDRESS MODAL ──────────────────────────────────── */
    .address-modal-overlay {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        animation: fadeInModal 0.3s ease;
    }

    .address-modal-overlay.show {
        display: flex;
    }

    @keyframes fadeInModal {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .address-modal {
        background: var(--white);
        border-radius: var(--radius);
        padding: 2rem 2rem 1.5rem;
        max-width: 520px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: var(--shadow-xl);
        animation: slideUpModal 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes slideUpModal {
        0% {
            transform: translateY(30px) scale(0.95);
            opacity: 0;
        }
        100% {
            transform: translateY(0) scale(1);
            opacity: 1;
        }
    }

    .address-modal h2 {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 0.2rem;
        color: var(--charcoal);
    }

    .address-modal .sub {
        font-size: 0.8rem;
        color: rgba(0, 0, 0, 0.3);
        margin-bottom: 1rem;
    }

    .address-modal .address-form-grid label {
        font-size: clamp(0.55rem, 0.8vw, 0.65rem);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: rgba(0, 0, 0, 0.3);
        display: block;
        margin-bottom: 0.2rem;
    }

    .address-modal .address-form-grid input,
    .address-modal .address-form-grid select {
        width: 100%;
        padding: 0.5rem 0.8rem;
        border: 1px solid rgba(0, 0, 0, 0.06);
        border-radius: var(--radius-sm);
        font-family: inherit;
        font-size: clamp(0.75rem, 1vw, 0.85rem);
        background: rgba(255, 255, 255, 0.5);
        transition: all 0.3s ease;
        color: var(--charcoal);
    }

    .address-modal .address-form-grid input:focus,
    .address-modal .address-form-grid select:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 3px var(--gold-glow);
    }

    .address-modal .modal-actions {
        display: flex;
        gap: 0.8rem;
        margin-top: 1.2rem;
    }

    .address-modal .modal-actions .btn-primary {
        background: var(--emerald);
        color: #fff;
        border: none;
        padding: 0.6rem 1.5rem;
        border-radius: 100px;
        font-weight: 600;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.3s ease;
    }

    .address-modal .modal-actions .btn-primary:hover {
        background: var(--emerald-light);
    }

    .address-modal .modal-actions .btn-secondary {
        background: transparent;
        color: var(--charcoal);
        border: 1px solid rgba(0, 0, 0, 0.06);
        padding: 0.6rem 1.5rem;
        border-radius: 100px;
        font-weight: 500;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.3s ease;
    }

    .address-modal .modal-actions .btn-secondary:hover {
        background: rgba(0, 0, 0, 0.02);
    }

    /* ─── CARD 3 – OFFERS ───────────────────────────────── */
    .offers-collapsed {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 0.2rem 0;
    }

    .offers-collapsed .icon {
        font-size: 1.2rem;
        color: var(--gold);
    }

    .offers-collapsed .text {
        font-weight: 500;
        color: rgba(0, 0, 0, 0.3);
        font-size: clamp(0.8rem, 1vw, 0.9rem);
    }

    .offers-collapsed .applied {
        font-size: clamp(0.65rem, 0.8vw, 0.75rem);
        font-weight: 600;
        color: #22c55e;
        background: rgba(74, 222, 128, 0.08);
        padding: 0.1rem 0.6rem;
        border-radius: 100px;
    }

    .offers-expanded {
        display: none;
        padding-top: 0.5rem;
    }

    .checkout-card.active .offers-expanded {
        display: block;
    }

    .offers-expanded .coupon-input {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 0.8rem;
    }

    .offers-expanded .coupon-input input {
        flex: 1;
        padding: 0.5rem 0.8rem;
        border: 1px solid rgba(0, 0, 0, 0.06);
        border-radius: 100px;
        font-family: inherit;
        font-size: clamp(0.7rem, 0.9vw, 0.8rem);
        background: rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: var(--charcoal);
        min-width: 0;
        width: 100%;
    }

    .offers-expanded .coupon-input input:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 3px var(--gold-glow);
    }

    .offers-expanded .coupon-input .btn-apply {
        padding: 0.4rem 1rem;
        border-radius: 100px;
        border: none;
        background: var(--emerald);
        color: #fff;
        font-weight: 600;
        font-size: clamp(0.6rem, 0.8vw, 0.7rem);
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
        width: auto;
        white-space: nowrap;
    }

    .offers-expanded .coupon-input .btn-apply:hover {
        background: var(--emerald-light);
    }

    .offers-expanded .coupon-list {
        display: flex;
        flex-wrap: wrap;
        gap: 0.4rem;
    }

    .offers-expanded .coupon-chip {
        padding: 0.2rem 0.8rem;
        border-radius: 100px;
        border: 1px solid rgba(0, 0, 0, 0.04);
        font-size: clamp(0.55rem, 0.8vw, 0.65rem);
        font-weight: 500;
        letter-spacing: 0.04em;
        background: rgba(255, 255, 255, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
        color: rgba(0, 0, 0, 0.4);
        font-family: inherit;
    }

    .offers-expanded .coupon-chip:hover {
        border-color: var(--gold);
        color: var(--charcoal);
    }

    .offers-expanded .coupon-chip.applied {
        border-color: #4ade80;
        background: rgba(74, 222, 128, 0.08);
        color: #22c55e;
        font-weight: 600;
    }

    .offers-expanded .coupon-success {
        display: none;
        align-items: center;
        gap: 0.4rem;
        font-size: clamp(0.65rem, 0.8vw, 0.75rem);
        color: #22c55e;
        margin-top: 0.5rem;
        font-weight: 600;
        animation: couponPop 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .offers-expanded .coupon-success.show {
        display: flex;
    }

    @keyframes couponPop {
        0% {
            transform: scale(0.8);
            opacity: 0;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* ─── CARD 4 – PAYMENT ──────────────────────────────── */
    .payment-select {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .payment-option {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.8rem 1.2rem;
        border: 1px solid rgba(0, 0, 0, 0.04);
        border-radius: var(--radius-sm);
        background: rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
        cursor: pointer;
        font-family: inherit;
        width: 100%;
        text-align: left;
        flex-wrap: wrap;
    }

    .payment-option:hover {
        border-color: rgba(212, 175, 55, 0.2);
    }

    .payment-option.selected {
        border-color: var(--gold);
        background: var(--gold-glow);
        box-shadow: 0 0 0 3px var(--gold-glow);
    }

    .payment-option .radio {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        border: 2px solid rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    .payment-option.selected .radio {
        border-color: var(--gold);
    }

    .payment-option.selected .radio::after {
        content: '';
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--gold);
        animation: radioPop 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes radioPop {
        0% {
            transform: scale(0);
        }
        100% {
            transform: scale(1);
        }
    }

    .payment-option .info {
        flex: 1;
        min-width: 80px;
    }

    .payment-option .info .name {
        font-weight: 600;
        color: var(--charcoal);
        font-size: clamp(0.8rem, 1vw, 0.9rem);
    }

    .payment-option .info .desc {
        font-size: clamp(0.6rem, 0.8vw, 0.7rem);
        color: rgba(0, 0, 0, 0.3);
    }

    /* ─── PAYMENT SUB-FORMS ────────────────────────────── */
    .payment-sub-form {
        display: none;
        padding: 0.8rem 1rem;
        background: rgba(255, 255, 255, 0.3);
        border-radius: var(--radius-sm);
        border: 1px solid rgba(0, 0, 0, 0.04);
        margin-top: 0.5rem;
        width: 100%;
    }

    .payment-option.selected .payment-sub-form {
        display: block;
    }

    .payment-sub-form .form-group {
        margin-bottom: 0.8rem;
    }

    .payment-sub-form .form-group label {
        font-size: clamp(0.55rem, 0.8vw, 0.65rem);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: rgba(0, 0, 0, 0.3);
        display: block;
        margin-bottom: 0.2rem;
    }

    .payment-sub-form .form-group input,
    .payment-sub-form .form-group select {
        width: 100%;
        padding: 0.5rem 0.8rem;
        border: 1px solid rgba(0, 0, 0, 0.06);
        border-radius: var(--radius-sm);
        font-family: inherit;
        font-size: clamp(0.75rem, 1vw, 0.85rem);
        background: rgba(255, 255, 255, 0.5);
        transition: all 0.3s ease;
        color: var(--charcoal);
    }

    .payment-sub-form .form-group input:focus,
    .payment-sub-form .form-group select:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 3px var(--gold-glow);
    }

    .payment-sub-form .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.8rem;
    }

    .payment-sub-form .sub-options {
        display: flex;
        flex-wrap: wrap;
        gap: 0.4rem;
    }

    .payment-sub-form .sub-options button {
        padding: 0.2rem 0.8rem;
        border-radius: 100px;
        border: 1px solid rgba(0, 0, 0, 0.06);
        background: rgba(255, 255, 255, 0.3);
        font-size: clamp(0.55rem, 0.8vw, 0.65rem);
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
        color: var(--charcoal);
    }

    .payment-sub-form .sub-options button:hover {
        border-color: var(--gold);
        background: var(--gold-glow);
    }

    .payment-sub-form .sub-options button.active {
        border-color: var(--emerald);
        background: rgba(15, 61, 46, 0.04);
        font-weight: 600;
    }

    /* ─── QR CODE ────────────────────────────────────────── */
    .qr-code-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 0.8rem;
        background: rgba(255, 255, 255, 0.3);
        border-radius: var(--radius-sm);
        border: 1px solid rgba(0, 0, 0, 0.04);
        margin-top: 0.5rem;
    }

    .qr-code-container .qr-placeholder {
        width: clamp(60px, 15vw, 120px);
        height: clamp(60px, 15vw, 120px);
        background: rgba(255, 255, 255, 0.8);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: clamp(1.5rem, 4vw, 3rem);
        color: var(--emerald);
        border: 2px dashed rgba(15, 61, 46, 0.1);
        position: relative;
        overflow: hidden;
    }

    .qr-code-container .qr-placeholder::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            linear-gradient(to right, rgba(15, 61, 46, 0.05) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(15, 61, 46, 0.05) 1px, transparent 1px);
        background-size: 8px 8px;
    }

    .qr-code-container .qr-placeholder i {
        position: relative;
        z-index: 1;
        color: var(--emerald);
    }

    .qr-code-container .qr-placeholder .qr-corner {
        position: absolute;
        width: clamp(10px, 2vw, 16px);
        height: clamp(10px, 2vw, 16px);
        border: clamp(2px, 0.3vw, 3px) solid var(--emerald);
    }

    .qr-code-container .qr-placeholder .qr-corner.tl {
        top: 6px;
        left: 6px;
        border-right: none;
        border-bottom: none;
        border-radius: 4px 0 0 0;
    }
    .qr-code-container .qr-placeholder .qr-corner.tr {
        top: 6px;
        right: 6px;
        border-left: none;
        border-bottom: none;
        border-radius: 0 4px 0 0;
    }
    .qr-code-container .qr-placeholder .qr-corner.bl {
        bottom: 6px;
        left: 6px;
        border-right: none;
        border-top: none;
        border-radius: 0 0 0 4px;
    }
    .qr-code-container .qr-placeholder .qr-corner.br {
        bottom: 6px;
        right: 6px;
        border-left: none;
        border-top: none;
        border-radius: 0 0 4px 0;
    }

    .qr-code-container .qr-label {
        font-size: clamp(0.5rem, 0.8vw, 0.7rem);
        color: rgba(0, 0, 0, 0.3);
        margin-top: 0.5rem;
        font-weight: 500;
    }

    /* ─── ORDER SUMMARY PANEL ───────────────────────────── */
    .order-summary-panel {
        background: var(--white);
        border: 1px solid var(--glass-border);
        border-radius: var(--radius);
        padding: 1.8rem;
        box-shadow: var(--shadow-md);
        transition: all 0.4s ease;
    }

    .order-summary-panel .summary-title {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: rgba(0, 0, 0, 0.2);
        margin-bottom: 1.2rem;
    }

    .order-summary-panel .product-preview {
        display: flex;
        gap: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
        margin-bottom: 1rem;
    }

    .order-summary-panel .product-preview .thumb {
        width: clamp(48px, 6vw, 56px);
        height: clamp(48px, 6vw, 56px);
        border-radius: var(--radius-sm);
        background: rgba(0, 0, 0, 0.02);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .order-summary-panel .product-preview .thumb img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 4px;
    }

    .order-summary-panel .product-preview .info .name {
        font-weight: 700;
        font-size: clamp(0.8rem, 1.1vw, 0.9rem);
        color: var(--charcoal);
    }

    .order-summary-panel .product-preview .info .meta {
        font-size: clamp(0.6rem, 0.8vw, 0.7rem);
        color: rgba(0, 0, 0, 0.3);
        margin-top: 0.1rem;
        line-height: 1.4;
        font-weight: 500;
    }

    .order-summary-panel .divider {
        height: 1px;
        background: rgba(0, 0, 0, 0.04);
        margin: 0.8rem 0;
    }

    .order-summary-panel .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 0.2rem 0;
        font-size: clamp(0.75rem, 1vw, 0.85rem);
        color: rgba(0, 0, 0, 0.4);
        font-weight: 500;
    }

    .order-summary-panel .summary-row .label {
        color: rgba(0, 0, 0, 0.3);
    }

    .order-summary-panel .summary-row .value {
        font-weight: 600;
        color: var(--charcoal);
    }

    .order-summary-panel .summary-row.total {
        padding-top: 0.8rem;
        border-top: 1px solid rgba(0, 0, 0, 0.04);
        margin-top: 0.3rem;
        font-size: clamp(0.95rem, 1.4vw, 1.1rem);
    }

    .order-summary-panel .summary-row.total .label {
        font-weight: 700;
        color: var(--charcoal);
        font-size: clamp(0.85rem, 1.2vw, 0.95rem);
    }

    .order-summary-panel .summary-row.total .value {
        font-weight: 700;
        color: var(--emerald);
        font-size: clamp(1.1rem, 1.8vw, 1.3rem);
    }

    .order-summary-panel .summary-row.delivery-date {
        font-size: clamp(0.65rem, 0.9vw, 0.75rem);
        color: var(--emerald);
        font-weight: 600;
        padding: 0.1rem 0;
    }

    .order-summary-panel .summary-row.delivery-date .value {
        color: var(--emerald);
    }

    .order-summary-panel .summary-row.discount .value {
        color: #22c55e;
    }

    .order-summary-panel .summary-row.gst-breakdown {
        font-size: clamp(0.6rem, 0.8vw, 0.7rem);
        color: rgba(0, 0, 0, 0.3);
        padding: 0.05rem 0;
    }

    .order-summary-panel .summary-row.gst-breakdown .value {
        color: rgba(0, 0, 0, 0.3);
        font-weight: 400;
    }

    .order-summary-panel .btn-block {
        margin-top: 1rem;
        width: 100%;
    }

    /* ─── VISION JOURNEY ────────────────────────────────── */
    .vision-journey-container {
        background: var(--white);
        border: 1px solid var(--glass-border);
        border-radius: var(--radius-sm);
        padding: 0.8rem 1.2rem;
        margin-bottom: 1rem;
        box-shadow: var(--shadow-sm);
        position: relative;
        overflow: hidden;
    }

    .vision-journey-container .journey-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 100%;
        margin: 0 auto;
        position: relative;
        z-index: 1;
        min-height: 44px;
    }

    .vision-journey-container .journey-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.1rem;
        font-size: clamp(0.3rem, 0.6vw, 0.45rem);
        font-weight: 600;
        color: rgba(0, 0, 0, 0.15);
        text-transform: uppercase;
        letter-spacing: 0.04em;
        transition: color 0.6s ease;
        position: relative;
        flex: 1;
        text-align: center;
    }

    .vision-journey-container .journey-step .icon-wrap {
        width: clamp(20px, 4vw, 32px);
        height: clamp(20px, 4vw, 32px);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        transition: all 0.6s ease;
        position: relative;
        color: var(--charcoal);
    }

    .vision-journey-container .journey-step .icon-wrap .icon-svg {
        width: clamp(14px, 3vw, 22px);
        height: clamp(14px, 3vw, 22px);
        stroke: rgba(26, 26, 30, 0.15);
        stroke-width: 2;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
        transition: all 0.6s ease;
    }

    .vision-journey-container .journey-step.active .icon-wrap .icon-svg {
        stroke: var(--emerald);
    }

    .vision-journey-container .journey-step.active .icon-wrap {
        transform: scale(1.05);
    }

    .vision-journey-container .journey-step .step-label {
        font-size: clamp(0.3rem, 0.5vw, 0.4rem);
        font-weight: 600;
        color: rgba(0, 0, 0, 0.15);
        text-transform: uppercase;
        letter-spacing: 0.04em;
        transition: color 0.6s ease;
    }

    .vision-journey-container .journey-step.active .step-label {
        color: var(--emerald);
    }

    .vision-journey-container .journey-connector {
        flex: 1;
        height: 2px;
        background: rgba(0, 0, 0, 0.04);
        position: relative;
        margin: 0 2px;
        border-radius: 2px;
        overflow: visible;
        min-width: 16px;
    }

    .vision-journey-container .journey-connector .connector-dash {
        height: 100%;
        background: transparent;
        border-top: 1px dashed rgba(0, 0, 0, 0.08);
        width: 100%;
    }

    .vision-journey-container .journey-connector .connector-particle {
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: var(--emerald);
        box-shadow: 0 0 16px rgba(15, 61, 46, 0.2);
        transition: left 1.2s cubic-bezier(0.22, 1, 0.36, 1);
        left: 0%;
        opacity: 0;
        pointer-events: none;
        z-index: 2;
    }

    .vision-journey-container .journey-connector .connector-particle.active {
        opacity: 1;
    }

    .vision-journey-container .journey-label {
        text-align: center;
        font-size: clamp(0.45rem, 0.8vw, 0.55rem);
        font-weight: 500;
        color: rgba(0, 0, 0, 0.2);
        margin-top: 0.3rem;
        letter-spacing: 0.04em;
        transition: color 0.6s ease;
        width: 100%;
    }

    .vision-journey-container .journey-label.active {
        color: var(--charcoal);
        font-weight: 600;
    }

    /* ─── ORDER SUCCESS OVERLAY (Scooter runs full width, message box bottom) ─── */
    .order-success-overlay {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: none;
        align-items: flex-start;
        justify-content: center;
        background: rgba(250, 247, 242, 0.80);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        animation: fadeInOverlay 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        flex-direction: column;
        padding: 2rem 1.5rem;
    }

    .order-success-overlay.show {
        display: flex;
    }

    @keyframes fadeInOverlay {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

    /* Full-width scooter strip (outside the box) */
    .success-scooter-strip {
        position: relative;
        width: 100%;
        height: 200px;
        overflow: hidden;
        flex-shrink: 0;
        margin-bottom: 1rem;
    }
    .success-scooter-strip .scooter-track {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    .success-scooter-strip .scooter-container {
        position: absolute;
        top: 50px;
        left: 0;
        will-change: transform;
        opacity: 0;
    }
    .success-scooter-strip .scooter-container svg {
        display: block;
        width: 100%;
        max-width: 220px;
        height: auto;
    }

    /* Success message box – centered at bottom */
    .order-success-dialog {
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(40px);
        -webkit-backdrop-filter: blur(40px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 32px;
        padding: 2rem 2rem;
        max-width: 440px;
        width: 90%;
        text-align: center;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.06), inset 0 1px 0 rgba(255, 255, 255, 0.15);
        animation: successPop 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
        margin: 0 auto;
    }

    .order-success-dialog::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 32px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.06) 0%, transparent 50%, rgba(255, 255, 255, 0.02) 100%);
        pointer-events: none;
    }

    .order-success-dialog::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 32px;
        background: radial-gradient(circle at 30% 30%, rgba(212, 175, 55, 0.04) 0%, transparent 60%);
        pointer-events: none;
        animation: waterRipple 4s ease-in-out infinite;
    }

    @keyframes waterRipple {
        0%, 100% { opacity: 0.4; transform: scale(1) translate(0, 0); }
        50% { opacity: 0.8; transform: scale(1.02) translate(5px, -5px); }
    }

    @keyframes successPop {
        0% { transform: scale(0.8); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }

    .order-success-dialog h2 {
        font-size: clamp(1.1rem, 2.5vw, 1.6rem);
        font-weight: 700;
        color: var(--charcoal);
        margin-bottom: 0.2rem;
        position: relative;
        z-index: 1;
    }

    .order-success-dialog p {
        font-size: clamp(0.75rem, 1.2vw, 0.9rem);
        color: rgba(0, 0, 0, 0.4);
        margin-bottom: 0.6rem;
        font-weight: 500;
        position: relative;
        z-index: 1;
    }

    .order-success-dialog .order-id-display {
        font-size: clamp(0.65rem, 1vw, 0.8rem);
        color: rgba(0, 0, 0, 0.3);
        font-weight: 500;
        background: rgba(255, 255, 255, 0.12);
        padding: 0.2rem 1rem;
        border-radius: 100px;
        display: inline-block;
        position: relative;
        z-index: 1;
    }

    .order-success-dialog .order-id-display strong {
        color: var(--charcoal);
        font-weight: 600;
    }

    /* ─── RESPONSIVE ──────────────────────────────────────── */
    @media (max-width: 1024px) {
        .checkout-wrapper {
            flex-direction: column;
            padding: 0 1.5rem 2rem;
        }
        .checkout-right {
            max-width: 100%;
            position: static;
            width: 100%;
            margin-top: 2rem;
        }
        .order-summary-panel {
            position: static;
        }
    }

    @media (max-width: 768px) {
        body.checkout-page {
            padding-top: 80px;
        }
        .checkout-card .card-inner {
            padding: 1rem 1.2rem;
        }
        .checkout-header h1 {
            font-size: 1.2rem;
        }
        .order-summary-panel {
            padding: 1.2rem;
        }
        .address-modal {
            padding: 1.2rem;
            max-width: 95%;
        }
        .address-modal .address-form-grid {
            grid-template-columns: 1fr;
        }
        .address-modal .address-form-grid .full-width {
            grid-column: 1;
        }
        .payment-sub-form .form-row {
            grid-template-columns: 1fr;
        }
        .btn {
            font-size: clamp(0.6rem, 1.2vw, 0.7rem);
            padding: 0.3rem 0.8rem;
        }
        .success-scooter-strip {
            height: 160px;
        }
        .success-scooter-strip .scooter-container {
            top: 35px;
        }
        .success-scooter-strip .scooter-container svg {
            max-width: 180px;
        }
        .order-success-dialog {
            padding: 1.5rem;
            max-width: 360px;
        }
    }

    @media (max-width: 576px) {
        .checkout-header .brand .logo {
            font-size: 1rem;
        }
        .checkout-header h1 {
            font-size: 1rem;
        }
        .delivery-summary {
            flex-direction: column;
        }
        .delivery-summary .change-btn {
            margin-left: 0;
        }
        .prescription-section {
            flex-direction: column;
            align-items: flex-start;
        }
        .prescription-section .actions {
            margin-left: 0;
            width: 100%;
            flex-wrap: wrap;
        }
        .payment-option {
            padding: 0.6rem 0.8rem;
            flex-wrap: wrap;
        }
        .offers-expanded .coupon-input {
            flex-direction: column;
        }
        .address-modal {
            padding: 1rem;
        }
        .address-modal .modal-actions {
            flex-direction: column;
        }
        .address-modal .modal-actions .btn {
            width: 100%;
            justify-content: center;
        }
        .vision-journey-container {
            padding: 0.6rem 0.8rem;
        }
        .vision-journey-container .journey-inner {
            min-height: 36px;
        }
        .btn-group {
            flex-direction: column;
        }
        .btn-group .btn {
            width: 100%;
            justify-content: center;
        }
        .progress-step .step-label {
            font-size: clamp(0.35rem, 1.2vw, 0.45rem);
        }
        .progress-step .step-dot {
            width: 8px;
            height: 8px;
        }
        .card-header .step-title {
            font-size: clamp(0.7rem, 1.2vw, 0.8rem);
        }
        .card-header .step-icon {
            width: 28px;
            height: 28px;
            font-size: 0.65rem;
        }
        .card-header .card-actions .action-btn {
            font-size: 0.5rem;
            padding: 0.1rem 0.4rem;
        }
        .checkout-card .card-inner {
            padding: 0.8rem 1rem;
        }
        .checkout-card.completed .card-inner {
            padding: 0.6rem 1rem;
        }
        .checkout-card.pending .card-inner {
            padding: 0.6rem 1rem;
        }
        .product-review-row {
            flex-direction: row;
            gap: 0.6rem;
        }
        .product-review-row .product-image {
            width: 50px;
            height: 50px;
        }
        .product-review-row .product-info .name {
            font-size: 0.75rem;
        }
        .product-review-row .product-info .meta {
            font-size: 0.6rem;
        }
        .product-review-row .product-info .specs span {
            font-size: 0.5rem;
        }
        .product-review-row .product-right .price {
            font-size: 0.75rem;
        }
        .product-review-row .product-right .qty button {
            width: 20px;
            height: 20px;
            font-size: 0.6rem;
        }
        .product-review-row .product-right .qty .value {
            font-size: 0.7rem;
            min-width: 16px;
        }
        .order-success-dialog {
            padding: 1.2rem 1rem;
            max-width: 300px;
            border-radius: 24px;
        }
        .order-success-dialog h2 {
            font-size: 1.1rem;
        }
        .order-success-dialog p {
            font-size: 0.75rem;
        }
        .order-success-dialog .order-id-display {
            font-size: 0.65rem;
        }
        .qr-code-container .qr-placeholder {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }
        .qr-code-container .qr-placeholder .qr-corner {
            width: 10px;
            height: 10px;
            border-width: 2px;
        }
        .qr-code-container .qr-label {
            font-size: 0.55rem;
        }
        .success-scooter-strip {
            height: 130px;
        }
        .success-scooter-strip .scooter-container {
            top: 25px;
        }
        .success-scooter-strip .scooter-container svg {
            max-width: 150px;
        }
    }
</style>

<!-- ============================================================ -->
<!-- CHECKOUT PAGE CONTENT                                        -->
<!-- ============================================================ -->
<div class="checkout-bg"></div>

<body class="checkout-page">

    <div class="checkout-wrapper">

        <!-- ─── LEFT PANEL ──────────────────────────────────── -->
        <div class="checkout-left">

            <!-- Header -->
            <div class="checkout-header">
                
                <h1>Complete your order</h1>

                <!-- Timeline – 4 Steps -->
                <div class="progress-timeline" id="progressTimeline">
                    <div class="progress-step active" data-step="0">
                        <span class="step-dot"></span>
                        <span class="step-label">Review</span>
                    </div>
                    <div class="progress-line">
                        <div class="line-fill" id="lineFill"></div>
                        <div class="progress-particle" id="progressParticle"></div>
                    </div>
                    <div class="progress-step" data-step="1">
                        <span class="step-dot"></span>
                        <span class="step-label">Delivery</span>
                    </div>
                    <div class="progress-line">
                        <div class="line-fill" id="lineFill2"></div>
                        <div class="progress-particle" id="progressParticle2"></div>
                    </div>
                    <div class="progress-step" data-step="2">
                        <span class="step-dot"></span>
                        <span class="step-label">Offers</span>
                    </div>
                    <div class="progress-line">
                        <div class="line-fill" id="lineFill3"></div>
                        <div class="progress-particle" id="progressParticle3"></div>
                    </div>
                    <div class="progress-step" data-step="3">
                        <span class="step-dot"></span>
                        <span class="step-label">Payment</span>
                    </div>
                </div>
            </div>

            <!-- ─── VISION JOURNEY (Mobile) ─────────────────── -->
            <div class="vision-journey-container mobile-vision" id="visionJourneyMobile" style="margin-bottom:1.5rem;">
                <div class="journey-inner">
                    <div class="journey-step active" data-jstep="0">
                        <div class="icon-wrap">
                            <svg class="icon-svg" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.5"/>
                                <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" fill="none"/>
                            </svg>
                        </div>
                        <span class="step-label">Focus</span>
                    </div>
                    <div class="journey-connector">
                        <div class="connector-dash"></div>
                        <div class="connector-particle" id="journeyParticleM1"></div>
                    </div>
                    <div class="journey-step" data-jstep="1">
                        <div class="icon-wrap">
                            <svg class="icon-svg" viewBox="0 0 24 24">
                                <circle cx="6" cy="10" r="2.5" stroke="currentColor" stroke-width="1.5"/>
                                <circle cx="18" cy="10" r="2.5" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M3 10h3m12 0h3M9 10h6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M6 10v2a4 4 0 0012 0v-2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <span class="step-label">Glasses</span>
                    </div>
                    <div class="journey-connector">
                        <div class="connector-dash"></div>
                        <div class="connector-particle" id="journeyParticleM2"></div>
                    </div>
                    <div class="journey-step" data-jstep="2">
                        <div class="icon-wrap">
                            <svg class="icon-svg" viewBox="0 0 24 24">
                                <rect x="3" y="7" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M3 7l4-3h10l4 3" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                                <path d="M8 11h8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <span class="step-label">Package</span>
                    </div>
                    <div class="journey-connector">
                        <div class="connector-dash"></div>
                        <div class="connector-particle" id="journeyParticleM3"></div>
                    </div>
                    <div class="journey-step" data-jstep="3">
                        <div class="icon-wrap">
                            <svg class="icon-svg" viewBox="0 0 24 24">
                                <path d="M3 10l9-7 9 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 21V10h12v11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="step-label">Home</span>
                    </div>
                </div>
                <div class="journey-label" id="journeyLabelMobile">Preparing your premium eyewear</div>
            </div>

            <!-- Card Stack – 4 Cards -->
            <div class="card-stack" id="cardStack">

                <!-- ─── CARD 1: REVIEW ORDER (DYNAMIC) ──────── -->
                <div class="checkout-card active" data-step="0" id="card0">
                    <div class="card-inner">
                        <div class="card-header">
                            <span class="step-icon">
                                <span class="num">1</span>
                                <span class="checkmark"><i class="fas fa-check"></i></span>
                            </span>
                            <span class="step-title">Review Order</span>
                            <span class="step-status" id="status0">In Progress</span>
                            <div class="card-actions">
                                <button class="action-btn" data-step="0">Edit</button>
                                <button class="action-btn danger" onclick="alert('Product removed from cart')">Delete</button>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-content-inner">

                                <!-- Dynamic container for one or multiple products -->
                                <div id="reviewProductsContainer">
                                    <!-- Rendered by JavaScript -->
                                </div>

                                <div class="prescription-section">
                                    <span class="label">📄 Prescription</span>
                                    <span class="status"><i class="fas fa-check-circle"></i> Uploaded</span>
                                    <div class="actions">
                                        <button>View File</button>
                                        <button>Change</button>
                                    </div>
                                </div>

                                <button class="edit-product-btn" onclick="alert('Edit product functionality')">Edit Product</button>

                                <div class="btn-group">
                                    <button class="btn btn-primary btn-next" data-next="1" style="width:auto !important; flex: 0 0 auto; padding: 0.3rem 0.8rem; font-size: clamp(0.65rem, 1vw, 0.85rem);">Continue</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-summary">
                            <div class="summary-line">
                                <span class="label">Order</span>
                                <span id="summaryOrderLabel">Loading...</span>
                            </div>
                            <div class="summary-line">
                                <span class="label">Total</span>
                                <span id="summaryCardTotal">₹0</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ─── CARD 2: DELIVERY ─────────────────────── -->
                <div class="checkout-card pending" data-step="1" id="card1">
                    <div class="card-inner">
                        <div class="card-header">
                            <span class="step-icon">
                                <span class="num">2</span>
                                <span class="checkmark"><i class="fas fa-check"></i></span>
                            </span>
                            <span class="step-title">Delivery</span>
                            <span class="step-status" id="status1">Pending</span>
                            <div class="card-actions">
                                <button class="action-btn" data-step="1">Edit</button>
                                <button class="action-btn danger" onclick="alert('Address deleted')">Delete</button>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-content-inner">

                                <div class="delivery-summary">
                                    <div class="icon"><i class="fas fa-map-pin"></i></div>
                                    <div class="info">
                                        <div class="name">Shipping Address</div>
                                        <div class="address"><?= $default_address['name']; ?>, <?= $default_address['address']; ?> - <?= $default_address['pincode']; ?></div>
                                        <div class="delivery-date">Expected Delivery: <?= $default_delivery['from']; ?> – <?= $default_delivery['to']; ?></div>
                                    </div>
                                    <button class="change-btn" id="changeAddressBtn">Change</button>
                                </div>

                                <div class="btn-group">
                                   <button class="btn btn-primary btn-next" data-next="2" style="width:auto !important; flex: 0 0 auto; padding: 0.3rem 0.8rem; font-size: clamp(0.65rem, 1vw, 0.85rem);">Continue</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-summary">
                            <div class="summary-line">
                                <span class="label">Deliver To</span>
                                <span><?= $default_address['name']; ?>, <?= $default_address['address']; ?></span>
                            </div>
                            <div class="summary-line">
                                <span class="label">Delivery</span>
                                <span><?= $default_delivery['from']; ?> – <?= $default_delivery['to']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ─── CARD 3: OFFERS ───────────────────────── -->
                <div class="checkout-card pending" data-step="2" id="card2">
                    <div class="card-inner">
                        <div class="card-header">
                            <span class="step-icon">
                                <span class="num">3</span>
                                <span class="checkmark"><i class="fas fa-check"></i></span>
                            </span>
                            <span class="step-title">Offers</span>
                            <span class="step-status" id="status2">Pending</span>
                            <div class="card-actions">
                                <button class="action-btn" data-step="2">Edit</button>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-content-inner">

                                <div class="offers-collapsed">
                                    <span class="icon">🎁</span>
                                    <span class="text" id="offersText">Offers Available</span>
                                    <span class="applied" id="offersApplied" style="display:none;">✓ Applied</span>
                                </div>

                                <div class="offers-expanded">
                                    <div class="coupon-input">
                                        <input type="text" placeholder="Enter coupon code" id="couponInput" value="<?= $default_coupon['code']; ?>">
                                        <button class="btn-apply" id="applyCouponBtn">Apply</button>
                                    </div>

                                    <div class="coupon-list" id="couponList">
                                        <button class="coupon-chip" data-code="WELCOME10">WELCOME10</button>
                                        <button class="coupon-chip" data-code="FIRSTBUY">FIRSTBUY</button>
                                        <button class="coupon-chip" data-code="SAVE15">SAVE15</button>
                                    </div>

                                    <div class="coupon-success" id="couponSuccess">
                                        <i class="fas fa-check-circle"></i>
                                        <span id="couponMessage">Coupon applied! Saved ₹<?= number_format($default_coupon['discount']); ?></span>
                                    </div>
                                </div>

                                <div class="btn-group">
                                    <button class="btn btn-primary btn-next" data-next="3" style="width:auto !important; flex: 0 0 auto; padding: 0.3rem 0.8rem; font-size: clamp(0.65rem, 1vw, 0.85rem);">Continue</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-summary">
                            <div class="summary-line">
                                <span class="label">Offers</span>
                                <span id="summaryCoupon"><?= $default_coupon['discount'] > 0 ? $default_coupon['code'] . ' applied' : 'None applied'; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ─── CARD 4: PAYMENT ───────────────────────── -->
                <div class="checkout-card pending" data-step="3" id="card3">
                    <div class="card-inner">
                        <div class="card-header">
                            <span class="step-icon">
                                <span class="num">4</span>
                                <span class="checkmark"><i class="fas fa-check"></i></span>
                            </span>
                            <span class="step-title">Payment</span>
                            <span class="step-status" id="status3">Pending</span>
                            <div class="card-actions">
                                <button class="action-btn" data-step="3">Edit</button>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-content-inner">

                                <div class="payment-select">
                                    <!-- UPI -->
                                    <div class="payment-option selected" data-method="upi">
                                        <div class="radio"></div>
                                        <div class="info">
                                            <div class="name">UPI</div>
                                            <div class="desc">Google Pay · PhonePe · Paytm</div>
                                        </div>
                                        <div class="payment-sub-form">
                                            <div class="form-group">
                                                <label>UPI ID</label>
                                                <input type="text" placeholder="example@okaxis" value="janani@okaxis">
                                            </div>
                                            <div class="sub-options">
                                                <button class="active">Google Pay</button>
                                                <button>PhonePe</button>
                                                <button>Paytm</button>
                                            </div>
                                            <div class="qr-code-container">
                                                <div class="qr-placeholder">
                                                    <div class="qr-corner tl"></div>
                                                    <div class="qr-corner tr"></div>
                                                    <div class="qr-corner bl"></div>
                                                    <div class="qr-corner br"></div>
                                                    <i class="fas fa-qrcode"></i>
                                                </div>
                                                <span class="qr-label">Scan to pay with UPI</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card -->
                                    <div class="payment-option" data-method="card">
                                        <div class="radio"></div>
                                        <div class="info">
                                            <div class="name">Card</div>
                                            <div class="desc">Credit · Debit</div>
                                        </div>
                                        <div class="payment-sub-form">
                                            <div class="form-group">
                                                <label>Card Number</label>
                                                <input type="text" placeholder="1234 5678 9012 3456">
                                            </div>
                                            <div class="form-group">
                                                <label>Card Holder Name</label>
                                                <input type="text" placeholder="Janani A">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group">
                                                    <label>Expiry (MM/YY)</label>
                                                    <input type="text" placeholder="12/25">
                                                </div>
                                                <div class="form-group">
                                                    <label>CVV</label>
                                                    <input type="text" placeholder="***">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Wallet -->
                                    <div class="payment-option" data-method="wallet">
                                        <div class="radio"></div>
                                        <div class="info">
                                            <div class="name">Wallet</div>
                                            <div class="desc">Paytm · Amazon Pay</div>
                                        </div>
                                        <div class="payment-sub-form">
                                            <div class="sub-options">
                                                <button class="active">Paytm Wallet</button>
                                                <button>Amazon Pay</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- COD -->
                                    <div class="payment-option" data-method="cod">
                                        <div class="radio"></div>
                                        <div class="info">
                                            <div class="name">Cash On Delivery</div>
                                            <div class="desc">Additional Fee ₹49</div>
                                        </div>
                                        <div class="payment-sub-form">
                                            <div class="form-group">
                                                <label>OTP Verification (Optional)</label>
                                                <input type="text" placeholder="Enter OTP">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-summary">
                            <div class="summary-line">
                                <span class="label">Payment</span>
                                <span id="summaryPayment">UPI</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- ─── RIGHT PANEL ─────────────────────────────────── -->
        <div class="checkout-right" id="orderSummaryPanel">

            <!-- ─── VISION JOURNEY (Desktop) ─────────────────── -->
            <div class="vision-journey-container desktop-vision" id="visionJourneyDesktop">
                <div class="journey-inner">
                    <div class="journey-step active" data-jstep="0">
                        <div class="icon-wrap">
                            <svg class="icon-svg" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.5"/>
                                <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" fill="none"/>
                            </svg>
                        </div>
                        <span class="step-label">Focus</span>
                    </div>
                    <div class="journey-connector">
                        <div class="connector-dash"></div>
                        <div class="connector-particle" id="journeyParticleD1"></div>
                    </div>
                    <div class="journey-step" data-jstep="1">
                        <div class="icon-wrap">
                            <svg class="icon-svg" viewBox="0 0 24 24">
                                <circle cx="6" cy="10" r="2.5" stroke="currentColor" stroke-width="1.5"/>
                                <circle cx="18" cy="10" r="2.5" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M3 10h3m12 0h3M9 10h6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M6 10v2a4 4 0 0012 0v-2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <span class="step-label">Glasses</span>
                    </div>
                    <div class="journey-connector">
                        <div class="connector-dash"></div>
                        <div class="connector-particle" id="journeyParticleD2"></div>
                    </div>
                    <div class="journey-step" data-jstep="2">
                        <div class="icon-wrap">
                            <svg class="icon-svg" viewBox="0 0 24 24">
                                <rect x="3" y="7" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M3 7l4-3h10l4 3" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                                <path d="M8 11h8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <span class="step-label">Package</span>
                    </div>
                    <div class="journey-connector">
                        <div class="connector-dash"></div>
                        <div class="connector-particle" id="journeyParticleD3"></div>
                    </div>
                    <div class="journey-step" data-jstep="3">
                        <div class="icon-wrap">
                            <svg class="icon-svg" viewBox="0 0 24 24">
                                <path d="M3 10l9-7 9 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 21V10h12v11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="step-label">Home</span>
                    </div>
                </div>
                <div class="journey-label" id="journeyLabelDesktop">Preparing your premium eyewear</div>
            </div>

            <!-- Order Summary -->
            <div class="order-summary-panel">
                <div class="summary-title">Order Summary</div>

                <div class="product-preview" id="summaryProductPreview">
                    <!-- Rendered by JavaScript -->
                </div>

                <div class="summary-row delivery-date">
                    <span class="label">📍 Delivery</span>
                    <span class="value" id="summaryDelivery"><?= $default_delivery['from']; ?> – <?= $default_delivery['to']; ?></span>
                </div>

                <div class="divider"></div>

                <div class="summary-row">
                    <span class="label">Subtotal</span>
                    <span class="value" id="summarySubtotal">₹0</span>
                </div>
                <div class="summary-row">
                    <span class="label">Shipping</span>
                    <span class="value" id="summaryShipping">Free</span>
                </div>
                <div class="summary-row <?= $is_intra_state ? 'gst-breakdown' : ''; ?>">
                    <span class="label">GST</span>
                    <span class="value" id="summaryGST">₹0</span>
                </div>
                <?php if ($is_intra_state): ?>
                    <div class="summary-row gst-breakdown">
                        <span class="label"> </span>
                        <span class="value" id="summaryGSTBreakdown">CGST: 0 · SGST: 0</span>
                    </div>
                <?php endif; ?>
                <div class="summary-row discount" id="discountRow" style="display:none;">
                    <span class="label">Discount</span>
                    <span class="value" id="summaryDiscount">−₹0</span>
                </div>

                <div class="divider"></div>

                <div class="summary-row total">
                    <span class="label">Total</span>
                    <span class="value" id="summaryTotal">₹0</span>
                </div>

                <!-- ─── PLACE ORDER BUTTON ────────────────────── -->
                <button class="btn btn-primary btn-block mt-3 rounded-pill py-2 fw-bold" id="placeOrderBtn" style="background:#0F3D2E;border:none;font-size:clamp(0.75rem, 1.2vw, 0.9rem);box-shadow:0 4px 16px rgba(15,61,46,0.15);width:auto !important;padding:0.3rem 1.2rem;">
                    <i class="fas fa-lock me-2"></i> Place Order
                </button>
            </div>

        </div>

    </div>

    <!-- ─── ADDRESS MODAL ────────────────────────────────── -->
    <div class="address-modal-overlay" id="addressModal">
        <div class="address-modal">
            <h2>📍 Delivery Address</h2>
            <div class="sub">Enter your shipping address</div>

            <div class="address-form-grid">
                <div class="full-width">
                    <label>Full Name</label>
                    <input type="text" value="<?= $default_address['name']; ?>" placeholder="Full Name">
                </div>
                <div class="full-width">
                    <label>Address</label>
                    <input type="text" value="<?= $default_address['address']; ?>" placeholder="Address">
                </div>
                <div>
                    <label>City</label>
                    <input type="text" value="<?= $default_address['city']; ?>" placeholder="City">
                </div>
                <div>
                    <label>Pincode</label>
                    <input type="text" value="<?= $default_address['pincode']; ?>" placeholder="Pincode">
                </div>
                <div>
                    <label>State</label>
                    <input type="text" value="<?= $default_address['state']; ?>" placeholder="State">
                </div>
                <div>
                    <label>Country</label>
                    <select>
                        <option selected>India</option>
                        <option>USA</option>
                        <option>UK</option>
                        <option>UAE</option>
                    </select>
                </div>
                <div class="full-width">
                    <label>Landmark (optional)</label>
                    <input type="text" value="<?= $default_address['landmark']; ?>" placeholder="Landmark">
                </div>
                <div class="full-width">
                    <label>Phone</label>
                    <input type="text" value="<?= $default_address['phone']; ?>" placeholder="Phone">
                </div>
            </div>

            <div class="modal-actions">
                <button class="btn-primary" id="saveAddressBtn">Save Address</button>
                <button class="btn-secondary" id="closeAddressModal">Cancel</button>
            </div>
        </div>
    </div>

    <!-- ─── ORDER SUCCESS OVERLAY (Scooter full width, message bottom) ─── -->
    <div class="order-success-overlay" id="orderSuccessOverlay">
        <!-- Full-width scooter strip (no box) -->
        <div class="success-scooter-strip" id="successScooterStrip">
            <div class="scooter-track">
                <div class="scooter-container" id="successScooter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="800" height="350.599" viewBox="0 0 800 350.599" style="display:block; width:100%; max-width:220px; height:auto;">
                        <g transform="translate(-546 -359.521)">
                            <!-- ==== FULL SVG (same as orders.php) ==== -->
                            <path d="M632.444,555.588h23.3a14.848,14.848,0,0,1,14.848,14.848v.482H632.444Z" transform="translate(344.865 80.392)" fill="#090814" id="scooter-board"/>
                            <circle cx="54.282" cy="54.282" r="54.282" transform="translate(1070.979 600.107)" fill="#3f3d56" id="wheel-back"/>
                            <circle cx="13.304" cy="13.304" r="13.304" transform="translate(1111.957 641.086)" fill="#fff" id="wheel-back-inner"/>
                            <circle cx="62.485" cy="62.485" r="62.485" transform="translate(788.711 583.702)" fill="#3f3d56" id="wheel-front"/>
                            <circle cx="15.315" cy="15.315" r="15.315" transform="translate(835.881 630.872)" fill="#fff" id="wheel-front-inner"/>
                            <path d="M423.769,561.333c-2.75,21.549-12.864,41.264-23.653,60.256-.357.647-.724,1.284-1.1,1.93H286.881c-2.268-.589-4.507-1.235-6.736-1.93a122.584,122.584,0,0,1-35.406-17.419c-41.255-29.723-57.129-85.887-49.959-136.212,4.458-31.267,18.181-63.189,44.9-80.029,14.109-8.907,32.232-11.8,48.473-8.492.425.077.85.174,1.284.26,13.973,3.146,26.422,10.963,33.506,23.556,12.738,22.63,5.153,50.663-1.11,75.85-6.244,25.187-9.631,55.334,8.492,73.911-5.983-17.612-.077-38.62,14.215-50.528,10.8-8.984,25.833-12.352,39.546-9.563,1.312.28,2.606.6,3.879.984a43.04,43.04,0,0,1,8.849,3.706C418.191,509.55,426.847,537.043,423.769,561.333Z" transform="translate(360.234 86.601)" fill="#f2f2f2" id="rider-body"/>
                            <circle cx="13.304" cy="13.304" r="13.304" transform="translate(1111.957 641.086)" fill="#fff" id="rider-head"/>
                            <path d="M359.542,621.635c3.107.724,6.224,1.361,9.36,1.93H351.947c-2.22-.6-4.43-1.235-6.62-1.93q-7.223-2.258-14.225-5.182c-18.721-7.855-35.966-19.648-49.013-35.339a99.756,99.756,0,0,1-15.46-25.255,114.7,114.7,0,0,1-7.913-32.318c-2.365-22.774.048-46.176,4.555-68.545a286.081,286.081,0,0,1,22.35-67.04q1.838-3.836,3.8-7.624a1.488,1.488,0,0,1,.994-.849,1.715,1.715,0,0,1,1.284.26,2.033,2.033,0,0,1,.8,2.683,282.789,282.789,0,0,0-23.72,64.617c-5.134,21.877-8.048,44.767-7.054,67.262.946,21.018,6.437,41.689,18.9,58.876C292,588.873,307.71,601.244,325.09,609.669a163.212,163.212,0,0,0,34.451,11.966Z" transform="translate(357.971 86.554)" fill="#fff" id="backpack"/>
                            <path d="M-.017,3.729,21.5,7.117,17.3,24.838-2.119,19.5Z" transform="translate(927.256 410.999)" fill="#ed9da0"/>
                            <path d="M400.674,627.68h-5c-.56-.637-1.1-1.284-1.631-1.93a106.548,106.548,0,0,1-22.427-47.923,103.965,103.965,0,0,1,8.965-64.7,106.381,106.381,0,0,1,9.689-16.039c1.312.28,2.606.6,3.879.984a100.568,100.568,0,0,0,4.8,127.681C399.506,626.4,400.086,627.043,400.674,627.68Z" transform="translate(354.049 82.439)" fill="#fff"/>
                            <path d="M868.424,613.655c.726,5.687,3.4,10.89,6.242,15.9.094.171.191.339.29.509h29.595c.6-.155,1.189-.326,1.778-.509a32.348,32.348,0,0,0,9.345-4.6c10.888-7.844,15.077-22.667,13.185-35.949-1.177-8.252-4.8-16.677-11.85-21.121a17.792,17.792,0,0,0-12.793-2.241c-.112.02-.224.046-.339.069a13.2,13.2,0,0,0-8.843,6.217c-3.362,5.972-1.36,13.371.293,20.018s2.542,14.6-2.241,19.506A12.2,12.2,0,0,0,878.9,595.6c-.346.074-.688.158-1.024.26a11.355,11.355,0,0,0-2.336.978C869.9,599.988,867.611,607.244,868.424,613.655Z" transform="translate(336.616 80.053)" fill="#f2f2f2"/>
                            <path d="M886.524,629.57q-1.23.286-2.47.509h4.475c.586-.158,1.169-.326,1.747-.509q1.906-.6,3.754-1.368a33.677,33.677,0,0,0,12.936-9.327,26.326,26.326,0,0,0,4.08-6.665,30.27,30.27,0,0,0,2.088-8.529,60.663,60.663,0,0,0-1.2-18.09,75.5,75.5,0,0,0-5.9-17.693q-.485-1.012-1-2.012a.392.392,0,0,0-.262-.224.452.452,0,0,0-.339.069.536.536,0,0,0-.211.708,74.633,74.633,0,0,1,6.26,17.054,65.643,65.643,0,0,1,1.862,17.752,28.324,28.324,0,0,1-4.987,15.538,31.348,31.348,0,0,1-11.736,9.63,43.069,43.069,0,0,1-9.092,3.158Z" transform="translate(336.063 80.04)" fill="#fff"/>
                            <path d="M876.437,631.165h1.319c.148-.168.29-.339.43-.509a28.121,28.121,0,0,0,5.919-12.648,27.439,27.439,0,0,0-2.366-17.077,28.076,28.076,0,0,0-2.557-4.233c-.346.074-.688.158-1.024.26a26.542,26.542,0,0,1-1.266,33.7C876.745,630.826,876.592,631,876.437,631.165Z" transform="translate(336.33 78.954)" fill="#fff"/>
                            <path d="M588.616,478.741H495.993l-.982-28.478a8.55,8.55,0,0,1,9.583-8.78l53.9,6.6h.007a30.2,30.2,0,0,1,30.115,30.176Z" transform="translate(349.673 84.386)" fill="#6c63ff"/>
                            <path d="M546.652,375.414h-64.6a6.54,6.54,0,0,0-6.542,6.542v64.6a6.54,6.54,0,0,0,6.542,6.542h64.6a6.54,6.54,0,0,0,6.542-6.542v-64.6a6.54,6.54,0,0,0-6.542-6.542Z" transform="translate(350.355 86.695)" fill="#ccc"/>
                            <path d="M532.664,424.535l-30.5,5.94a6.958,6.958,0,0,1-8.151-5.494l-2.345-12.04a6.958,6.958,0,0,1,5.494-8.151l30.5-5.94a6.958,6.958,0,0,1,8.151,5.494l2.345,12.04A6.958,6.958,0,0,1,532.664,424.535Z" transform="translate(349.794 85.88)" fill="#6c63ff"/>
                            <path d="M526.917,410.614l-23.277,4.533a1.635,1.635,0,0,1-.625-3.211l23.277-4.533a1.635,1.635,0,1,1,.625,3.211Z" transform="translate(349.439 85.577)" fill="#fff"/>
                            <path d="M522.635,417.57l-12.04,2.345a1.635,1.635,0,1,1-.625-3.211l12.04-2.345a1.635,1.635,0,1,1,.625,3.211Z" transform="translate(349.196 85.334)" fill="#fff"/>
                            <path d="M553.194,381.956v8.586H475.51v-8.586a6.54,6.54,0,0,1,6.542-6.542h64.6a6.54,6.54,0,0,1,6.542,6.542Z" transform="translate(350.355 86.695)" fill="#b3b3b3"/>
                            <path d="M712.865,392.5a10.367,10.367,0,0,0-14.662-6.142L609.329,354.47l-3.914,22.2,88.592,24.362a10.423,10.423,0,0,0,18.859-8.536Z" transform="translate(345.811 87.428)" fill="#ed9da0"/>
                            <path d="M712.865,392.5a10.367,10.367,0,0,0-14.662-6.142L609.329,354.47l-3.914,22.2,88.592,24.362a10.423,10.423,0,0,0,18.859-8.536Z" transform="translate(345.811 87.428)" opacity="0.101"/>
                            <path d="M624.234,358.222l-8.392,21.925a4.648,4.648,0,0,1-6.621,2.389l-20.4-11.48a12.909,12.909,0,1,1,9.3-24.085l22.776,5.052a4.648,4.648,0,0,1,3.333,6.2Z" transform="translate(346.68 87.721)" fill="#6c63ff"/>
                            <path d="M722.855,414.914,691.01,429.39l4.181,15.74A244.859,244.859,0,0,1,701.5,538.4h0l23.284,4.863,19.3-49.216-6.755-55.971Z" transform="translate(342.816 85.313)" fill="#6c63ff"/>
                            <path d="M787.353,490.414c-20.924,0-37.975,15.211-38.8,34.258h77.6C825.328,505.625,808.277,490.414,787.353,490.414Z" transform="translate(340.803 82.672)" fill="#3f3d56"/>
                            <path d="M760.333,490.979c-1.089-85.982-50.057-78.071-50.057-78.071s.916,26.763,1.356,27.6c31.2,59.039-20.295,128.255-85.848,115.521q-1.854-.36-3.562-.731a33.372,33.372,0,0,1-26.213-37.407c6.457-51.856-25.661-50.938-25.661-50.938H523.385L499,445a7.09,7.09,0,0,0-11.4,2.819l-3.138,8.516S438.141,461.159,442,506.514h14.321a28.932,28.932,0,0,0,.155,3.86l106.877-.869c6.265-.051,11.795,5.025,11.82,11.29a11.342,11.342,0,0,1-11.72,11.383l-17.231-.575c-5.308,23.643,7.72,39.566,22.075,49.578A80.24,80.24,0,0,0,614.25,595.3h46.81c60.8,0,71.411-51.146,71.411-51.146C764.318,530.64,760.333,490.979,760.333,490.979Z" transform="translate(351.535 85.39)" fill="#3f3d56"/>
                            <path d="M690.659,432.116,679.2,400.994a13.161,13.161,0,0,1,7.8-16.9L719.854,372a23.158,23.158,0,1,1,16,43.463Z" transform="translate(343.258 86.865)" fill="#3f3d56"/>
                            <path d="M752.06,393.752a22.726,22.726,0,0,1-8.492,17.7,28.939,28.939,0,0,1-19.01-39.855,22.683,22.683,0,0,1,27.5,22.157Z" transform="translate(341.732 86.847)" fill="#6c63ff"/>
                            <ellipse cx="13.51" cy="16.405" rx="13.51" ry="16.405" transform="translate(788.229 565.366)" fill="#6c63ff"/>
                            <path d="M450.071,290.893H461.9l5.629-30.685H450.069Z" transform="translate(530.256 348.951)" fill="#ed9da0"/>
                            <path d="M646.9,542.49q-.207,0-.415-.02l-16.373-1.192a4.343,4.343,0,0,1-3.676-5.818l21.912-49.23a3.376,3.376,0,0,0-.189-2.7,3.33,3.33,0,0,0-2.134-1.7c-10.3-2.693-36.74-9.865-59.625-18.256-9.8-3.6-15.98-8.791-18.354-15.442-3.13-8.769,1.5-16.766,1.7-17.1l.155-.263,21.534,1.957,23.345,1.986,51.159,27.433a19.383,19.383,0,0,1,8.51,24.882l-23.586,52.89A4.34,4.34,0,0,1,646.9,542.49Z" transform="translate(347.156 84.759)" fill="#090814"/>
                            <circle cx="23.702" cy="23.702" r="23.702" transform="translate(918.636 374.151)" fill="#ed9da0"/>
                            <path d="M443.071,293.893H454.9l5.629-30.685H443.069Z" transform="translate(530.501 348.846)" fill="#ed9da0"/>
                            <path d="M625.444,558.588h23.3a14.848,14.848,0,0,1,14.848,14.849v.482H625.444Z" transform="translate(345.11 80.288)" fill="#090814"/>
                            <path d="M639.9,545.49q-.207,0-.415-.02l-16.373-1.192a4.342,4.342,0,0,1-3.676-5.818l21.912-49.23a3.376,3.376,0,0,0-.19-2.7,3.33,3.33,0,0,0-2.134-1.7c-10.3-2.693-36.74-9.865-59.625-18.256-9.8-3.6-15.98-8.791-18.354-15.442-3.13-8.769,1.5-16.766,1.7-17.1l.155-.263,21.534,1.957,23.345,1.986,51.159,27.433a19.383,19.383,0,0,1,8.51,24.882l-23.586,52.89A4.34,4.34,0,0,1,639.9,545.49Z" transform="translate(347.401 84.654)" fill="#090814"/>
                            <path d="M602.363,345.479l-25.09-8.685s-15.751,12.1-8.184,42.122a74.318,74.318,0,0,1-3.281,46.63,48.053,48.053,0,0,1-2.527,5.338s27.985,33.776,54.041,8.685l-10.133-48.733S623.111,358.507,602.363,345.479Z" transform="translate(347.285 88.046)" fill="#6c63ff"/>
                            <path d="M597.881,330.424c-3.373-5.049-6.036-12.051-2.321-16.855,3.666-4.742,10.9-4.044,16.512-6.142,7.821-2.923,12.356-12.11,10.942-20.338s-8.02-15.049-15.888-17.84-16.741-1.883-24.447,1.331c-9.485,3.956-17.622,11.609-21.034,21.3s-1.588,21.335,5.49,28.786c7.589,7.989,19.5,10.118,30.517,9.989" transform="translate(347.4 91.936)" fill="#090814"/>
                            <path d="M572.434,287.6c-4.251,3.46-10.736,1.923-15.3-1.114s-8.265-7.361-13.2-9.742c-8.7-4.2-19.227-1.407-27.7,3.243s-15.98,11.074-24.928,14.722-20.366,3.829-27.141-3.061a24.832,24.832,0,0,0,36.391,29.309c9.8-5.972,15.219-18.493,26.216-21.789,6.085-1.824,12.619-.355,18.769,1.236s12.563,3.31,18.769,1.956,12.012-6.932,11.222-13.235Z" transform="translate(350.799 91.687)" fill="#090814"/>
                            <path d="M711.6,391.972a10.367,10.367,0,0,0-15.308-4.286l-92.13-20.678-1.145,22.516,90.921,13.245a10.423,10.423,0,0,0,17.662-10.8Z" transform="translate(345.894 86.989)" fill="#ed9da0"/>
                            <path d="M619.374,368.849l-5.623,22.793a4.648,4.648,0,0,1-6.275,3.188l-21.657-8.876a12.909,12.909,0,1,1,6.258-25.049l23.226,2.2a4.649,4.649,0,0,1,4.073,5.741Z" transform="translate(346.838 87.216)" fill="#6c63ff"/>
                            <circle cx="6.755" cy="6.755" r="6.755" transform="translate(1040.099 483.34)" fill="#6c63ff"/>
                            <path d="M985.5,631.38a.968.968,0,0,1-.965.965H186.465a.965.965,0,0,1,0-1.93h798.07A.968.968,0,0,1,985.5,631.38Z" transform="translate(360.5 77.775)" fill="#3f3d56"/>
                        </g>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Success message box – centered at bottom -->
        <div class="order-success-dialog">
            <h2>Order Placed! 🎉</h2>
            <p>Your premium eyewear is being prepared with care.</p>
            <div class="order-id-display">
                Order ID: <strong id="orderIdDisplay">#OPT-XXXXX</strong>
            </div>
        </div>
    </div>

<!-- ========================== search-overlay.php ================================== -->
<?php include 'search-overlay.php'; ?>

<!-- ============================================================ -->
<!-- SCRIPTS                                                      -->
<!-- ============================================================ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js">
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 1. DETERMINE SOURCE: Single Product vs Cart
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───

        const singleProduct = <?= $single_product_json; ?>;
        const isSingleMode = <?= $is_single_mode ? 'true' : 'false'; ?>;

        let productData = [];
        let isCartOrder = false;

        const fromCart = document.referrer && document.referrer.includes('cart.php');
        const cart = JSON.parse(localStorage.getItem('optiq_cart')) || [];
        const cartHasItems = cart.length > 0;
        const cartHasMultiple = cart.length > 1;

        let useCart = false;

        if (fromCart) {
            useCart = true;
            console.log('🛒 Coming from cart.php – using cart data');
        } else if (cartHasMultiple) {
            useCart = true;
            console.log('🛒 Cart has multiple items – using cart data');
        } else if (cartHasItems && !isSingleMode) {
            useCart = true;
            console.log('🛒 Cart has 1 item and no single product mode – using cart data');
        } else if (isSingleMode && singleProduct) {
            useCart = false;
            console.log('📦 Buy Now mode – using single product');
        } else if (cartHasItems) {
            useCart = true;
            console.log('🛒 Fallback – using cart data');
        } else {
            console.warn('⚠️ No cart data and no single product – redirecting to cart.php');
            window.location.href = 'cart.php';
            return;
        }

        if (useCart) {
            if (cart.length === 0) {
                window.location.href = 'cart.php';
                return;
            }
            productData = cart;
            isCartOrder = true;
        } else {
            if (!singleProduct) {
                window.location.href = 'cart.php';
                return;
            }
            productData = [{
                id: singleProduct.id,
                name: singleProduct.name,
                price: singleProduct.price,
                image: singleProduct.hero_image || 'assets/images/placeholder.jpg',
                material: singleProduct.material || 'Titanium',
                lens_type: 'Blue Cut',
                frame_width: singleProduct.frame_width || 140,
                lens_width: singleProduct.lens_width || 52,
                bridge: singleProduct.bridge || 18,
                qty: 1
            }];
            isCartOrder = false;
        }

        if (isCartOrder && window.location.search.includes('id=')) {
            const newUrl = window.location.pathname;
            window.history.replaceState({}, document.title, newUrl);
        }

        console.log('useCart:', useCart);
        console.log('productData:', productData);

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 2. STATE
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        let state = {
            currentStep: 0,
            totalSteps: 4,
            products: productData,
            isCartOrder: isCartOrder,
            gstRate: <?= $gst_rate; ?>,
            isIntraState: <?= $is_intra_state ? 'true' : 'false'; ?>,
            cgstRate: <?= $cgst_rate ?? 0; ?>,
            sgstRate: <?= $sgst_rate ?? 0; ?>,
            shippingCost: 0,
            couponDiscount: <?= $default_coupon['discount']; ?>,
            couponCode: '<?= $default_coupon['code']; ?>',
            isAnimating: false,
        };

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 3. DOM REFS
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        const cards = document.querySelectorAll('.checkout-card');
        const dots = document.querySelectorAll('.progress-step');
        const progressLines = document.querySelectorAll('.progress-line .line-fill');
        const progressParticles = document.querySelectorAll('.progress-particle');

        const reviewContainer = document.getElementById('reviewProductsContainer');
        const summaryPreview = document.getElementById('summaryProductPreview');
        const summaryOrderLabel = document.getElementById('summaryOrderLabel');
        const summaryCardTotal = document.getElementById('summaryCardTotal');

        const summarySubtotal = document.getElementById('summarySubtotal');
        const summaryShipping = document.getElementById('summaryShipping');
        const summaryGST = document.getElementById('summaryGST');
        const summaryGSTBreakdown = document.getElementById('summaryGSTBreakdown');
        const summaryDiscount = document.getElementById('summaryDiscount');
        const discountRow = document.getElementById('discountRow');
        const summaryTotal = document.getElementById('summaryTotal');
        const summaryDelivery = document.getElementById('summaryDelivery');
        const orderIdDisplay = document.getElementById('orderIdDisplay');

        const couponInput = document.getElementById('couponInput');
        const applyCouponBtn = document.getElementById('applyCouponBtn');
        const couponSuccess = document.getElementById('couponSuccess');
        const couponMessage = document.getElementById('couponMessage');
        const offersText = document.getElementById('offersText');
        const offersApplied = document.getElementById('offersApplied');
        const summaryCoupon = document.getElementById('summaryCoupon');

        // Success overlay & scooter
        const successOverlay = document.getElementById('orderSuccessOverlay');
        const successScooter = document.getElementById('successScooter');

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 4. CALCULATE TOTALS
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        function calculateTotals() {
            const subtotal = state.products.reduce((sum, p) => sum + (p.price * p.qty), 0);
            const shipping = state.shippingCost;
            const gst = Math.round((subtotal + shipping) * state.gstRate / 100);
            let discount = state.couponDiscount || 0;
            if (discount > subtotal) discount = subtotal;
            const total = subtotal + shipping + gst - discount;
            return { subtotal, shipping, gst, discount, total };
        }

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 5. RENDER PRODUCTS
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        function renderProducts() {
            let html = '';
            state.products.forEach((item, idx) => {
                const itemTotal = item.price * item.qty;
                html += `
                        <div class="product-review-row" data-idx="${idx}">
                            <div class="product-image">
                                <img src="${item.image || 'assets/images/placeholder.jpg'}" alt="${item.name}">
                            </div>
                            <div class="product-info">
                                <div class="name">${item.name}</div>
                                <div class="meta">${item.material || 'Standard'} · ${item.lens_type || 'Standard'}</div>
                                <div class="specs">
                                    <span>Frame ${item.frame_width || 140}mm</span>
                                    <span>Lens ${item.lens_width || 52}mm</span>
                                    <span>Bridge ${item.bridge || 18}mm</span>
                                </div>
                            </div>
                            <div class="product-right">
                                <div class="price">
                                    ₹${item.price.toLocaleString('en-IN')}
                                    ${state.products.length > 1 ? `<button class="delete-btn" onclick="alert('Remove from order')" title="Remove item">✕</button>` : ''}
                                </div>
                                <div class="qty">
                                    <button class="qty-btn" data-dir="-1" data-idx="${idx}">−</button>
                                    <span class="value" data-idx="${idx}">${item.qty}</span>
                                    <button class="qty-btn" data-dir="1" data-idx="${idx}">+</button>
                                </div>
                            </div>
                        </div>
                    `;
            });
            reviewContainer.innerHTML = html;

            const first = state.products[0];
            let previewHtml = `
                    <div class="thumb">
                        <img src="${first.image || 'assets/images/placeholder.jpg'}" alt="${first.name}">
                    </div>
                    <div class="info">
                        <div class="name">${state.products.length === 1 ? first.name : state.products.length + ' items'}</div>
                        <div class="meta">
                            ${state.products.length === 1
                                ? (first.material || '') + ' · ' + (first.lens_type || '')
                                : state.products.map(p => p.name).join(', ')
                            }
                            <br /><span id="summaryQty">Qty: ${state.products.reduce((s,p) => s + p.qty, 0)}</span>
                        </div>
                    </div>
                `;
            summaryPreview.innerHTML = previewHtml;

            if (state.products.length === 1) {
                summaryOrderLabel.textContent = first.name + ' · x' + first.qty;
            } else {
                summaryOrderLabel.textContent = state.products.length + ' items in cart';
            }

            document.querySelectorAll('.qty-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const idx = parseInt(this.dataset.idx);
                    const dir = parseInt(this.dataset.dir);
                    const newQty = Math.max(1, state.products[idx].qty + dir);
                    state.products[idx].qty = newQty;
                    document.querySelector(`.qty .value[data-idx="${idx}"]`).textContent = newQty;
                    renderProducts();
                    updateSummary(true);
                });
            });

            updateSummary(false);
        }

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 6. UPDATE SUMMARY
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        function updateSummary(animate = false) {
            const totals = calculateTotals();

            summarySubtotal.textContent = '₹' + totals.subtotal.toLocaleString('en-IN');
            summaryShipping.textContent = totals.shipping === 0 ? 'Free' : '₹' + totals.shipping.toLocaleString('en-IN');
            summaryGST.textContent = '₹' + totals.gst.toLocaleString('en-IN');

            if (state.isIntraState) {
                const cgst = Math.round((totals.subtotal + totals.shipping) * state.cgstRate / 100);
                const sgst = Math.round((totals.subtotal + totals.shipping) * state.sgstRate / 100);
                summaryGSTBreakdown.textContent = 'CGST: ' + cgst.toLocaleString('en-IN') + ' · SGST: ' + sgst.toLocaleString('en-IN');
            }

            if (totals.discount > 0) {
                discountRow.style.display = 'flex';
                summaryDiscount.textContent = '−₹' + totals.discount.toLocaleString('en-IN');
            } else {
                discountRow.style.display = 'none';
            }

            summaryTotal.textContent = '₹' + totals.total.toLocaleString('en-IN');
            summaryCardTotal.textContent = '₹' + totals.total.toLocaleString('en-IN');

            state.total = totals.total;

            if (animate) {
                gsap.from(summaryTotal, {
                    scale: 1.05,
                    color: 'rgba(0,0,0,0.3)',
                    duration: 0.4,
                    ease: 'power2.out'
                });
            }
        }

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 7. CARD STACK MANAGEMENT
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        function updateCardStack(step, animate = true) {
            if (state.isAnimating) return;
            state.isAnimating = true;
            state.currentStep = step;

            cards.forEach((card, i) => {
                const index = parseInt(card.dataset.step);
                card.classList.remove('active', 'completed', 'pending');

                if (index < step) {
                    card.classList.add('completed');
                    card.style.transform = 'scale(0.97)';
                    card.style.opacity = '0.85';
                    document.getElementById('status' + index).textContent = 'Completed ✓';
                    const content = card.querySelector('.card-content');
                    if (content) {
                        content.style.maxHeight = '0';
                        content.style.opacity = '0';
                        content.style.paddingTop = '0';
                        content.style.margin = '0';
                    }
                } else if (index === step) {
                    card.classList.add('active');
                    card.style.transform = 'scale(1)';
                    card.style.opacity = '1';
                    card.style.background = '#ffffff';
                    card.style.filter = 'none';
                    document.getElementById('status' + index).textContent = 'In Progress';
                    const content = card.querySelector('.card-content');
                    if (content) {
                        content.style.maxHeight = '2000px';
                        content.style.opacity = '1';
                        content.style.paddingTop = '1.2rem';
                        content.style.margin = '0.2rem 0 0';
                        const inner = content.querySelector('.card-content-inner');
                        if (inner) {
                            inner.style.animation = 'none';
                            setTimeout(() => {
                                inner.style.animation = 'slideUp 0.5s cubic-bezier(0.34, 1.56, 0.64, 1)';
                            }, 10);
                        }
                    }
                } else {
                    card.classList.add('pending');
                    card.style.background = '#F5F0EA';
                    card.style.filter = 'blur(0.3px)';
                    const offset = (index - step) * 8;
                    card.style.transform = 'scale(' + (0.94 - (index - step) * 0.015) + ')';
                    card.style.opacity = (0.5 - (index - step) * 0.08);
                    document.getElementById('status' + index).textContent = 'Pending';
                    const content = card.querySelector('.card-content');
                    if (content) {
                        content.style.maxHeight = '0';
                        content.style.opacity = '0';
                        content.style.paddingTop = '0';
                        content.style.margin = '0';
                    }
                }
            });

            dots.forEach((dot, i) => {
                dot.classList.remove('active', 'completed');
                if (i < step) dot.classList.add('completed');
                else if (i === step) dot.classList.add('active');
            });

            progressLines.forEach((line, i) => {
                if (i < step) line.style.width = '100%';
                else if (i === step) line.style.width = '50%';
                else line.style.width = '0%';
            });

            progressParticles.forEach((particle, i) => {
                if (i <= step) {
                    const positions = [0, 50, 100];
                    particle.style.left = positions[i] + '%';
                    particle.style.opacity = '1';
                } else {
                    particle.style.opacity = '0';
                }
            });

            state.isAnimating = false;
        }

        function goToStep(step) {
            if (step < 0 || step >= state.totalSteps) return;
            updateCardStack(step, true);
            if (window.innerWidth < 768) {
                const card = cards[step];
                if (card) card.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }

        function nextStep() {
            const next = state.currentStep + 1;
            if (next < state.totalSteps) goToStep(next);
        }

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 8. EVENT BINDINGS
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        cards.forEach(card => {
            const header = card.querySelector('.card-header');
            if (header) {
                header.addEventListener('click', function(e) {
                    if (e.target.closest('button') || e.target.closest('.action-btn')) return;
                    const step = parseInt(card.dataset.step);
                    goToStep(step);
                });
            }
        });

        dots.forEach(dot => {
            dot.addEventListener('click', function() {
                const step = parseInt(this.dataset.step);
                goToStep(step);
            });
        });

        document.querySelectorAll('.btn-next').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                nextStep();
            });
        });

        document.querySelectorAll('.action-btn[data-step]').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const step = parseInt(btn.dataset.step);
                goToStep(step);
            });
        });

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 9. COUPON
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        const validCoupons = { 'WELCOME10': 200, 'FIRSTBUY': 300, 'SAVE15': 250, 'SAVE20': 200 };

        function applyCoupon(code) {
            const upperCode = code.toUpperCase().trim();
            if (validCoupons[upperCode]) {
                state.couponDiscount = validCoupons[upperCode];
                state.couponCode = upperCode;
                couponSuccess.classList.add('show');
                couponMessage.textContent = 'Coupon applied! Saved ₹' + validCoupons[upperCode];
                offersText.textContent = upperCode + ' Applied';
                offersApplied.style.display = 'inline';
                summaryCoupon.textContent = upperCode + ' applied';
                document.querySelectorAll('.coupon-chip').forEach(chip => {
                    chip.classList.toggle('applied', chip.dataset.code === upperCode);
                });
                updateSummary(true);
                setTimeout(() => couponSuccess.classList.remove('show'), 3000);
                return true;
            } else {
                couponSuccess.classList.add('show');
                couponMessage.textContent = 'Invalid coupon code';
                couponMessage.style.color = '#ef4444';
                setTimeout(() => {
                    couponSuccess.classList.remove('show');
                    couponMessage.style.color = '#22c55e';
                }, 2000);
                return false;
            }
        }

        applyCouponBtn.addEventListener('click', () => applyCoupon(couponInput.value));
        couponInput.addEventListener('keydown', (e) => { if (e.key === 'Enter') applyCoupon(couponInput.value); });
        document.querySelectorAll('.coupon-chip').forEach(chip => {
            chip.addEventListener('click', () => {
                const code = chip.dataset.code;
                couponInput.value = code;
                applyCoupon(code);
            });
        });

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 10. PAYMENT METHODS
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        document.querySelectorAll('.payment-option').forEach(el => {
            el.addEventListener('click', () => {
                document.querySelectorAll('.payment-option').forEach(p => p.classList.remove('selected'));
                el.classList.add('selected');
                const name = el.querySelector('.info .name')?.textContent || 'UPI';
                document.getElementById('summaryPayment').textContent = name;
            });
        });

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 11. ADDRESS MODAL
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        const addressModal = document.getElementById('addressModal');
        document.getElementById('changeAddressBtn').addEventListener('click', () => {
            addressModal.classList.add('show');
            document.body.style.overflow = 'hidden';
        });
        document.getElementById('closeAddressModal').addEventListener('click', () => {
            addressModal.classList.remove('show');
            document.body.style.overflow = '';
        });
        document.getElementById('saveAddressBtn').addEventListener('click', () => {
            addressModal.classList.remove('show');
            document.body.style.overflow = '';
            alert('✅ Address updated successfully!');
        });
        addressModal.addEventListener('click', function(e) {
            if (e.target === this) {
                addressModal.classList.remove('show');
                document.body.style.overflow = '';
            }
        });

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 12. PLACE ORDER (with Scooter)
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        document.getElementById('placeOrderBtn').addEventListener('click', function() {
            if (state.currentStep < state.totalSteps - 1) {
                alert('Please complete all checkout steps before placing order.');
                return;
            }
            placeOrder();
        });

        function generateOrderId() {
            const prefix = 'OPT';
            const timestamp = Date.now().toString(36).toUpperCase();
            const random = Math.random().toString(36).substring(2, 6).toUpperCase();
            return prefix + '-' + timestamp.slice(-4) + '-' + random;
        }

        function placeOrder() {
            const totals = calculateTotals();

            const order = {
                id: generateOrderId(),
                date: new Date().toISOString(),
                products: state.products.map(p => ({
                    id: p.id || 'unknown',
                    name: p.name,
                    price: p.price,
                    qty: p.qty,
                    image: p.image || 'assets/images/placeholder.jpg',
                    material: p.material || 'Standard',
                    lens_type: p.lens_type || 'Standard',
                    frame_width: p.frame_width || 140,
                    lens_width: p.lens_width || 52,
                    bridge: p.bridge || 18,
                })),
                subtotal: totals.subtotal,
                gst: totals.gst,
                discount: totals.discount,
                total: totals.total,
                status: 'Processing',
            };

            const orders = JSON.parse(localStorage.getItem('optiq_orders')) || [];
            orders.push(order);
            localStorage.setItem('optiq_orders', JSON.stringify(orders));

            if (state.isCartOrder) {
                localStorage.removeItem('optiq_cart');
                localStorage.setItem('optiq_cartCount', '0');
                if (typeof updateCartBadge === 'function') updateCartBadge(0);
            }

            orderIdDisplay.textContent = order.id;
            successOverlay.classList.add('show');

            // ─── FULL SCOOTER ANIMATION (ONCE) ─────────────────────
            const scooter = successScooter;
            if (scooter) {
                // Reset position
                gsap.set(scooter, { x: -220, y: 0, opacity: 0, scale: 1 });

                // Get all animated parts (same IDs as orders.php)
                const wheelBack = scooter.querySelector('#wheel-back, #wheel-back-inner');
                const wheelFront = scooter.querySelector('#wheel-front, #wheel-front-inner');
                const backpack = scooter.querySelector('#backpack');
                const body = scooter.querySelector('#rider-body');
                const board = scooter.querySelector('#scooter-board');

                // Main timeline – ride once
                const tl = gsap.timeline({
                    onComplete: function() {
                        // After ride finishes, wait 0.8s then close overlay
                        setTimeout(() => {
                            successOverlay.classList.remove('show');
                            // Reset for next time
                            gsap.set(scooter, { x: -220, opacity: 0 });
                        }, 800);
                    }
                });

                // 1. Fade in and start moving
tl.to(scooter, { opacity: 1, duration: 0.4 })
  .to(scooter, {
        x: window.innerWidth + 220,
        duration: 6,
        ease: 'power1.inOut',
        onUpdate: function() {
            const progress = this.progress();
            const bump = Math.sin(progress * Math.PI * 6) * 8;
            const terrain = Math.sin(progress * Math.PI * 1.5) * 3;
            gsap.set(scooter, { y: bump + terrain });
        }
    }, 0.2)
  .to(scooter, { opacity: 0, duration: 0.3 }, '-=0.5');

                // 2. Wheel rotations (continuous during ride)
                if (wheelBack) {
                    tl.to(wheelBack, {
                        rotation: 360 * 6,
                        duration: 6,
                        ease: 'linear',
                        transformOrigin: 'center'
                    }, 0.2);
                }
                if (wheelFront) {
                    tl.to(wheelFront, {
                        rotation: 360 * 6,
                        duration: 6,
                        ease: 'linear',
                        transformOrigin: 'center'
                    }, 0.2);
                }

                // 3. Backpack swing
                if (backpack) {
                    tl.to(backpack, {
                        rotation: 10,
                        duration: 0.2,
                        repeat: 30,
                        yoyo: true,
                        ease: 'sine.inOut',
                        transformOrigin: '50% 0%'
                    }, 0.2);
                }

                // 4. Rider body tilt
                if (body) {
                    tl.to(body, {
                        rotation: 2,
                        duration: 0.6,
                        repeat: 10,
                        yoyo: true,
                        ease: 'sine.inOut',
                        transformOrigin: '50% 80%'
                    }, 0.2);
                }

                // 5. Scooter board bounce
                if (board) {
                    tl.to(board, {
                        y: -4,
                        duration: 0.3,
                        repeat: 20,
                        yoyo: true,
                        ease: 'power1.inOut'
                    }, 0.2);
                }
            }
        }

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 13. VISION JOURNEY
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        const journeySets = [
            { steps: document.querySelectorAll('#visionJourneyDesktop .journey-step'),
                particles: document.querySelectorAll('#visionJourneyDesktop .connector-particle'),
                label: document.getElementById('journeyLabelDesktop') },
            { steps: document.querySelectorAll('#visionJourneyMobile .journey-step'),
                particles: document.querySelectorAll('#visionJourneyMobile .connector-particle'),
                label: document.getElementById('journeyLabelMobile') }
        ];
        let globalJourneyIndex = 0;
        let globalJourneyTimer = null;

        function animateAllJourneys() {
            const labels = ['Scanning your prescription', 'Crafting premium lenses', 'Packing with care', 'Ready for delivery'];
            journeySets.forEach(set => {
                set.steps.forEach(s => s.classList.remove('active'));
                set.particles.forEach(p => p.classList.remove('active'));
                set.steps[globalJourneyIndex].classList.add('active');
                if (set.particles[globalJourneyIndex]) {
                    const particle = set.particles[globalJourneyIndex];
                    particle.classList.add('active');
                    particle.style.left = '0%';
                    setTimeout(() => { particle.style.left = '100%'; }, 100);
                }
                if (set.label) {
                    set.label.textContent = labels[globalJourneyIndex] || 'Preparing your premium eyewear';
                    set.label.classList.add('active');
                }
            });
            globalJourneyIndex = (globalJourneyIndex + 1) % 4;
            clearTimeout(globalJourneyTimer);
            globalJourneyTimer = setTimeout(animateAllJourneys, 2500);
        }
        setTimeout(animateAllJourneys, 500);

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 14. PAYMENT SUB-OPTIONS
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        document.querySelectorAll('.payment-sub-form .sub-options button').forEach(btn => {
            btn.addEventListener('click', () => {
                const parent = btn.closest('.sub-options');
                if (parent) parent.querySelectorAll('button').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 15. HIDE/SHOW VISION JOURNEY
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        function toggleVisionJourney() {
            const desktop = document.getElementById('visionJourneyDesktop');
            const mobile = document.getElementById('visionJourneyMobile');
            if (window.innerWidth >= 1024) {
                desktop.style.display = 'block';
                mobile.style.display = 'none';
            } else {
                desktop.style.display = 'none';
                mobile.style.display = 'block';
            }
        }
        toggleVisionJourney();
        window.addEventListener('resize', toggleVisionJourney);

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 16. NAVBAR BADGE FIX
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
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
        const searchIcon = document.getElementById('openSearchOverlay');
        if (searchIcon) {
            searchIcon.addEventListener('click', function(e) {
                e.preventDefault();
                if (typeof showSearchOverlay === 'function') showSearchOverlay();
            });
        }

        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        // 17. INIT
        // ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ─── ───
        renderProducts();
        updateCardStack(0, false);
        updateSummary(false);

        console.log('✅ Order page ready – Mode: ' + (isCartOrder ? 'Cart (Multi)' : 'Single Product'));
        console.log('📦 Items:', state.products.length);
    });
</script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
</script>
<!-- Custom JS -->
<script src="assets/js/script.js"></script>

</body>
</html>