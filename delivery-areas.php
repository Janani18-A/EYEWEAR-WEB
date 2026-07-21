<?php
// delivery-areas.php – Premium Delivery Checker + Our Locations (BOOTSTRAP RESPONSIVE)
include 'templates/header.php';
include 'templates/navbar.php';
?>

<!-- ============================================================ -->
<!-- STYLES – Glassmorphism + Animations (visual only)            -->
<!-- ============================================================ -->
<style>
    /* ─── RESET & BASE ─────────────────────────────────────── */
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

    .delivery-page {
        background: var(--cream);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        color: var(--charcoal);
        padding-top: 90px;
        min-height: 100vh;
        overflow-x: hidden;
    }

    /* ─── GLASS CARDS ──────────────────────────────────────── */
    .glass-card {
        background: rgba(255, 255, 255, 0.55) !important;
        backdrop-filter: blur(20px) !important;
        -webkit-backdrop-filter: blur(20px) !important;
        border: 1px solid rgba(200, 169, 81, 0.06) !important;
        box-shadow: var(--shadow-md) !important;
        transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1) !important;
    }

    .glass-card:hover {
        box-shadow: var(--shadow-lg) !important;
    }

    /* ─── SEARCH BAR ───────────────────────────────────────── */
    .search-wrapper {
        position: relative;
        max-width: 560px;
        margin: 0 auto;
    }

    .search-wrapper .form-control {
        border-color: rgba(0, 0, 0, 0.04);
        background: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border-radius: 100px;
        font-size: clamp(0.85rem, 1.2vw, 0.95rem);
        transition: all 0.3s ease;
        padding: 0.75rem 1.2rem 0.75rem 3rem;
    }

    .search-wrapper .form-control:focus {
        border-color: var(--gold);
        box-shadow: 0 0 0 4px var(--gold-glow);
        background: rgba(255, 255, 255, 0.6);
    }

    .search-wrapper .search-icon-wrap {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.1rem;
        color: rgba(0, 0, 0, 0.2);
        transition: transform 0.6s ease;
        z-index: 5;
    }

    .search-wrapper .search-icon-wrap.rotating {
        animation: searchSpin 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes searchSpin {
        0% {
            transform: translateY(-50%) rotate(0deg) scale(1);
        }
        50% {
            transform: translateY(-50%) rotate(180deg) scale(1.2);
        }
        100% {
            transform: translateY(-50%) rotate(360deg) scale(1);
        }
    }

    .search-wrapper .search-btn {
        position: absolute;
        right: 6px;
        top: 50%;
        transform: translateY(-50%);
        padding: 0.45rem 1.5rem;
        border-radius: 100px;
        background: var(--emerald);
        color: #fff;
        border: none;
        font-weight: 600;
        font-size: clamp(0.75rem, 1vw, 0.85rem);
        transition: all 0.3s ease;
        font-family: inherit;
        cursor: pointer;
    }

    .search-wrapper .search-btn:hover {
        background: var(--emerald-light);
        transform: translateY(-50%) scale(1.03);
        box-shadow: 0 8px 24px rgba(15, 61, 46, 0.15);
    }

    .search-wrapper .search-btn:active {
        transform: translateY(-50%) scale(0.96);
    }

    /* ─── SUGGESTIONS DROPDOWN ────────────────────────────── */
    .suggestions-dropdown {
        position: absolute;
        top: calc(100% + 8px);
        left: 0;
        right: 0;
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: var(--radius-sm);
        border: 1px solid var(--glass-border);
        box-shadow: var(--shadow-md);
        z-index: 50;
        display: none;
        overflow: hidden;
        max-height: 240px;
        overflow-y: auto;
    }

    .suggestions-dropdown.show {
        display: block;
    }

    .suggestions-dropdown .suggestion-item {
        padding: 0.6rem 1.2rem;
        cursor: pointer;
        transition: all 0.2s ease;
        border-bottom: 1px solid rgba(0, 0, 0, 0.02);
        display: flex;
        align-items: center;
        gap: 0.8rem;
        opacity: 0;
        transform: translateX(-10px);
    }

    .suggestions-dropdown .suggestion-item:last-child {
        border-bottom: none;
    }

    .suggestions-dropdown .suggestion-item:hover {
        background: var(--gold-glow);
    }

    .suggestions-dropdown .suggestion-item .pincode {
        font-weight: 700;
        color: var(--charcoal);
        font-size: 0.85rem;
    }

    .suggestions-dropdown .suggestion-item .place {
        font-size: 0.8rem;
        color: rgba(0, 0, 0, 0.3);
    }

    /* ─── RADAR SCAN ──────────────────────────────────────── */
    .radar-container {
        position: relative;
        width: 80px;
        height: 80px;
        margin: 0 auto;
    }

    .radar-ring {
        position: absolute;
        inset: 0;
        border-radius: 50%;
        border: 2px solid rgba(212, 175, 55, 0.1);
        animation: radarPulse 1.8s ease-out infinite;
    }

    .radar-ring:nth-child(2) {
        animation-delay: 0.6s;
    }
    .radar-ring:nth-child(3) {
        animation-delay: 1.2s;
    }

    @keyframes radarPulse {
        0% {
            transform: scale(0.2);
            opacity: 1;
            border-color: rgba(212, 175, 55, 0.3);
        }
        100% {
            transform: scale(1.8);
            opacity: 0;
            border-color: rgba(212, 175, 55, 0);
        }
    }

    .radar-center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 2rem;
        z-index: 2;
        transition: all 0.6s ease;
    }

    .radar-center.scanning {
        animation: radarBounce 0.6s ease infinite alternate;
    }

    @keyframes radarBounce {
        0% {
            transform: translate(-50%, -50%) scale(1);
        }
        100% {
            transform: translate(-50%, -50%) scale(1.15);
        }
    }

    /* ─── RESULT CARD ──────────────────────────────────────── */
    .result-card {
        opacity: 0;
        transform: scale(0.92);
        filter: blur(4px);
        transition: all 0.7s cubic-bezier(0.23, 1, 0.32, 1);
        max-height: 0;
        overflow: hidden;
        padding: 0 1.5rem;
        margin: 0;
    }

    .result-card.visible {
        opacity: 1;
        transform: scale(1);
        filter: blur(0px);
        max-height: 2000px;
        padding: 1.5rem;
        margin: 1.5rem 0;
    }

    .result-card .status-icon {
        font-size: 3rem;
        display: inline-block;
        transition: all 0.6s ease;
    }

    .result-card .status-icon.success {
        animation: successPop 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes successPop {
        0% {
            transform: scale(0.2) rotate(-20deg);
            opacity: 0;
        }
        50% {
            transform: scale(1.3) rotate(5deg);
            opacity: 1;
        }
        100% {
            transform: scale(1) rotate(0deg);
            opacity: 1;
        }
    }

    .result-card .status-icon.error {
        animation: errorShake 0.5s ease;
    }

    @keyframes errorShake {
        0%,
        100% {
            transform: translateX(0);
        }
        20% {
            transform: translateX(-12px);
        }
        40% {
            transform: translateX(12px);
        }
        60% {
            transform: translateX(-8px);
        }
        80% {
            transform: translateX(8px);
        }
    }

    /* ─── SHIPPING CHARGE COUNTER ────────────────────────── */
    .shipping-counter {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--emerald);
        display: inline-block;
        transition: all 0.3s ease;
        min-width: 60px;
        text-align: center;
    }

    .shipping-counter.counting {
        animation: countPop 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes countPop {
        0% {
            transform: scale(0.8);
            opacity: 0.5;
        }
        50% {
            transform: scale(1.2);
            opacity: 1;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* ─── COURIER CHIPS ────────────────────────────────────── */
    .courier-chip {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        padding: 0.25rem 0.8rem;
        border-radius: 100px;
        background: rgba(255, 255, 255, 0.3);
        border: 1px solid rgba(0, 0, 0, 0.04);
        font-size: clamp(0.6rem, 0.8vw, 0.7rem);
        font-weight: 600;
        color: rgba(0, 0, 0, 0.4);
        transition: all 0.3s ease;
        cursor: default;
        font-family: inherit;
    }

    .courier-chip:hover {
        transform: translateY(-3px);
        border-color: var(--gold);
        box-shadow: 0 0 20px var(--gold-glow);
        color: var(--charcoal);
    }

    /* ─── STATUS CHIPS ────────────────────────────────────── */
    .status-chip {
        display: inline-block;
        padding: 0.2rem 0.8rem;
        border-radius: 100px;
        font-size: clamp(0.5rem, 0.7vw, 0.6rem);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        background: rgba(34, 197, 94, 0.08);
        color: #22c55e;
        border: 1px solid rgba(34, 197, 94, 0.1);
    }

    .status-chip.free {
        background: rgba(34, 197, 94, 0.08);
        color: #22c55e;
    }

    .status-chip.express {
        background: rgba(212, 175, 55, 0.08);
        color: var(--gold);
    }

    .status-chip.cod {
        background: rgba(74, 158, 255, 0.08);
        color: #4a9eff;
    }

    .status-chip.unavailable {
        background: rgba(239, 68, 68, 0.08);
        color: #ef4444;
    }

    /* ─── DELIVERY ZONES ──────────────────────────────────── */
    .zone-item {
        padding: 0.8rem 1.2rem;
        background: rgba(255, 255, 255, 0.2);
        border-radius: var(--radius-sm);
        border: 1px solid rgba(0, 0, 0, 0.04);
        transition: all 0.4s ease;
        cursor: pointer;
        overflow: hidden;
        max-height: 60px;
    }

    .zone-item.expanded {
        max-height: 200px;
        background: rgba(255, 255, 255, 0.3);
        border-color: rgba(212, 175, 55, 0.1);
    }

    .zone-item .zone-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .zone-item .zone-details {
        opacity: 0;
        max-height: 0;
        transition: all 0.4s ease;
        overflow: hidden;
    }

    .zone-item.expanded .zone-details {
        opacity: 1;
        max-height: 100px;
        margin-top: 0.5rem;
        padding-top: 0.5rem;
        border-top: 1px solid rgba(0, 0, 0, 0.04);
    }

    /* ─── LOCATION CARDS (inside Bootstrap grid) ──────────── */
    .location-card {
        padding: 1.2rem;
        background: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: var(--radius-sm);
        border: 1px solid var(--glass-border);
        transition: all 0.4s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        height: 100%;
    }

    .location-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-md);
        border-color: rgba(200, 169, 81, 0.08);
    }

    .location-card .map-pin {
        font-size: 1.8rem;
        transition: transform 0.4s ease;
        display: inline-block;
    }

    .location-card:hover .map-pin {
        transform: rotate(3deg) scale(1.1);
    }

    .location-card .eta-text {
        opacity: 0;
        max-height: 0;
        transition: all 0.4s ease;
        overflow: hidden;
    }

    .location-card:hover .eta-text {
        opacity: 1;
        max-height: 40px;
    }

    .location-card .city-name {
        font-weight: 700;
        font-size: clamp(0.85rem, 1.2vw, 1rem);
        color: var(--charcoal);
    }

    .location-card .state-name {
        font-size: clamp(0.6rem, 0.8vw, 0.7rem);
        color: rgba(0, 0, 0, 0.3);
    }

    .location-card .shipping-badge {
        font-size: clamp(0.65rem, 0.9vw, 0.75rem);
        font-weight: 700;
        color: var(--emerald);
        display: inline-block;
        transition: all 0.3s ease;
    }

    .location-card:hover .shipping-badge {
        transform: scale(1.05);
    }

    /* ─── DELIVER HERE BUTTON ────────────────────────────── */
    .deliver-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.6rem 1.8rem;
        border-radius: 100px;
        background: var(--emerald);
        color: #fff;
        border: none;
        font-weight: 600;
        font-size: clamp(0.75rem, 1vw, 0.85rem);
        cursor: pointer;
        transition: all 0.4s ease;
        font-family: inherit;
        box-shadow: 0 4px 16px rgba(15, 61, 46, 0.08);
        position: relative;
        overflow: hidden;
    }

    .deliver-btn .arrow {
        display: inline-block;
        transition: transform 0.4s ease;
    }

    .deliver-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 40px rgba(15, 61, 46, 0.2);
        background: var(--emerald-light);
    }

    .deliver-btn:hover .arrow {
        transform: translateX(6px);
    }

    .deliver-btn:active {
        transform: scale(0.96);
    }

    .deliver-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 100px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.05), transparent);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .deliver-btn:hover::before {
        opacity: 1;
    }

    /* ─── CONFETTI ─────────────────────────────────────────── */
    .confetti-particle {
        position: fixed;
        pointer-events: none;
        z-index: 999;
        width: 8px;
        height: 8px;
        border-radius: 2px;
        will-change: transform, opacity;
    }

    /* ─── OFFICE LOCATION CARDS (inside Bootstrap grid) ──── */
    .location-office-card {
        padding: 1.5rem;
        background: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: var(--radius-sm);
        border: 1px solid var(--glass-border);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        height: 100%;
    }

    .location-office-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-md);
        border-color: rgba(200, 169, 81, 0.08);
    }

    .location-office-card .office-icon {
        font-size: 2rem;
        display: inline-block;
        margin-bottom: 0.5rem;
    }

    .location-office-card .office-name {
        font-weight: 700;
        font-size: clamp(0.95rem, 1.2vw, 1.1rem);
        color: var(--charcoal);
    }

    .location-office-card .office-address {
        font-size: clamp(0.75rem, 1vw, 0.85rem);
        color: rgba(0, 0, 0, 0.4);
        line-height: 1.6;
        margin-top: 0.2rem;
    }

    .location-office-card .office-detail {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        font-size: clamp(0.7rem, 0.9vw, 0.8rem);
        color: rgba(0, 0, 0, 0.4);
        margin-top: 0.3rem;
    }

    .location-office-card .office-detail i {
        color: var(--accent);
        width: 18px;
        font-size: 0.9rem;
    }

    .location-office-card .office-hours {
        margin-top: 0.6rem;
        padding-top: 0.6rem;
        border-top: 1px solid rgba(0, 0, 0, 0.04);
        font-size: clamp(0.7rem, 0.9vw, 0.8rem);
        color: var(--emerald);
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .location-office-card .office-hours i {
        color: var(--gold);
    }

    .office-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: clamp(0.45rem, 0.6vw, 0.55rem);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        background: var(--gold-glow);
        color: var(--gold);
        padding: 0.15rem 0.6rem;
        border-radius: 100px;
        border: 1px solid rgba(212, 175, 55, 0.08);
    }

    /* ─── SCROLLBAR ────────────────────────────────────────── */
    ::-webkit-scrollbar {
        width: 4px;
    }
    ::-webkit-scrollbar-track {
        background: transparent;
    }
    ::-webkit-scrollbar-thumb {
        background: var(--gold);
        border-radius: 10px;
    }

    /* ─── ENTRANCE ANIMATION ──────────────────────────────── */
    .delivery-page .glass-card {
        opacity: 0;
        animation: fadeSlideUp 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    }

    .delivery-page .glass-card:nth-child(1) {
        animation-delay: 0.04s;
    }
    .delivery-page .glass-card:nth-child(2) {
        animation-delay: 0.08s;
    }
    .delivery-page .glass-card:nth-child(3) {
        animation-delay: 0.12s;
    }
    .delivery-page .glass-card:nth-child(4) {
        animation-delay: 0.16s;
    }

    @keyframes fadeSlideUp {
        0% {
            opacity: 0;
            transform: translateY(20px) scale(0.96);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
</style>

<!-- ============================================================ -->
<!-- MAIN CONTENT – BOOTSTRAP GRID CLASSES ADDED                  -->
<!-- ============================================================ -->
<section class="delivery-page">
    <div class="container py-4">

        <!-- ─── HEADER ─── -->
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold text-primary" style="font-family: 'Poppins', sans-serif; font-size: clamp(1.8rem, 4vw, 2.5rem);">
                Delivery Areas
            </h1>
            <p class="text-muted-custom" style="font-size: clamp(0.9rem, 1.2vw, 1rem);">Find out if we deliver to your location with love and care</p>
        </div>

        <!-- ─── SEARCH SECTION ─── -->
        <div class="glass-card p-3 p-md-4 p-lg-5 rounded-4">
            <div class="search-wrapper" id="searchWrapper">
                <span class="search-icon-wrap" id="searchIconWrap">
                    <i class="bi bi-geo-alt"></i>
                </span>
                <input type="text" class="form-control rounded-pill" id="pincodeInput" placeholder="Enter your pincode..." maxlength="6" autocomplete="off">
                <button class="search-btn" id="searchBtn">Check</button>

                <!-- Suggestions Dropdown -->
                <div class="suggestions-dropdown" id="suggestionsDropdown"></div>
            </div>

            <!-- ─── RESULT CARD ─── -->
            <div class="result-card glass-card rounded-4" id="resultCard" style="padding:1.5rem;margin:1.5rem 0;">
                <div class="text-center mb-3">
                    <span class="status-icon" id="resultIcon">📍</span>
                    <h4 class="fw-bold text-primary mt-2" id="resultTitle">Checking...</h4>
                    <p class="text-muted-custom" id="resultDesc">Please wait while we verify your location</p>
                </div>

                <!-- Radar -->
                <div class="radar-container mb-3" id="radarContainer">
                    <div class="radar-ring"></div>
                    <div class="radar-ring"></div>
                    <div class="radar-ring"></div>
                    <span class="radar-center" id="radarCenter">📍</span>
                </div>

                <!-- Result Details (hidden initially) -->
                <div id="resultDetails" style="display:none;">
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="glass-card p-3 rounded-3" style="background:rgba(255,255,255,0.3);">
                                <h6 class="fw-bold text-primary mb-1"><i class="bi bi-geo-alt me-1 text-accent"></i>Location</h6>
                                <p class="mb-0 fw-bold" id="resultLocation">Thanjavur, Tamil Nadu</p>
                                <p class="text-muted-custom small" id="resultPincode">PIN: 613001</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="glass-card p-3 rounded-3" style="background:rgba(255,255,255,0.3);">
                                <h6 class="fw-bold text-primary mb-1"><i class="bi bi-truck me-1 text-accent"></i>Delivery</h6>
                                <p class="mb-0 fw-bold" id="resultEta">19 Jul – 21 Jul</p>
                                <p class="text-muted-custom small" id="resultShipping">Shipping: <span class="shipping-counter" id="shippingCounter">FREE</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mt-2">
                        <div class="col-12 col-md-6">
                            <div class="glass-card p-3 rounded-3" style="background:rgba(255,255,255,0.3);">
                                <h6 class="fw-bold text-primary mb-1"><i class="bi bi-box me-1 text-accent"></i>Options</h6>
                                <div class="d-flex flex-wrap gap-2">
                                    <span class="status-chip free">FREE Delivery</span>
                                    <span class="status-chip express">Express Available</span>
                                    <span class="status-chip cod">COD Available</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="glass-card p-3 rounded-3" style="background:rgba(255,255,255,0.3);">
                                <h6 class="fw-bold text-primary mb-1"><i class="bi bi-truck me-1 text-accent"></i>Courier Partners</h6>
                                <div class="d-flex flex-wrap gap-2">
                                    <span class="courier-chip">BlueDart</span>
                                    <span class="courier-chip">DTDC</span>
                                    <span class="courier-chip">Delhivery</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button class="deliver-btn" id="deliverBtn">
                            <span>📍 Deliver Here</span>
                            <span class="arrow">→</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ─── DELIVERY ZONES ─── (already using Bootstrap grid) -->
        <div class="glass-card p-3 p-md-4 p-lg-5 rounded-4 mt-4">
            <h5 class="fw-bold text-primary mb-3"><i class="bi bi-diagram-3 me-2 text-accent"></i>Delivery Zones</h5>
            <div class="row g-3" id="zonesContainer">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="zone-item" data-zone="A">
                        <div class="zone-header">
                            <span class="fw-bold">Zone A</span>
                            <span class="text-muted-custom small">Thanjavur City</span>
                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill">FREE</span>
                        </div>
                        <div class="zone-details">
                            <p class="mb-0 small text-muted-custom">🚚 0-10 km · 📅 Today – Tomorrow</p>
                            <p class="mb-0 small text-muted-custom">📦 COD Available · Express Available</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="zone-item" data-zone="B">
                        <div class="zone-header">
                            <span class="fw-bold">Zone B</span>
                            <span class="text-muted-custom small">Nearby District</span>
                            <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill">₹49</span>
                        </div>
                        <div class="zone-details">
                            <p class="mb-0 small text-muted-custom">🚚 11-50 km · 📅 2-3 Days</p>
                            <p class="mb-0 small text-muted-custom">📦 COD Available</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="zone-item" data-zone="C">
                        <div class="zone-header">
                            <span class="fw-bold">Zone C</span>
                            <span class="text-muted-custom small">Tamil Nadu</span>
                            <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill">₹99</span>
                        </div>
                        <div class="zone-details">
                            <p class="mb-0 small text-muted-custom">🚚 51-200 km · 📅 3-5 Days</p>
                            <p class="mb-0 small text-muted-custom">📦 COD Available</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="zone-item" data-zone="D">
                        <div class="zone-header">
                            <span class="fw-bold">Zone D</span>
                            <span class="text-muted-custom small">South India</span>
                            <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill">₹149</span>
                        </div>
                        <div class="zone-details">
                            <p class="mb-0 small text-muted-custom">🚚 201-500 km · 📅 4-6 Days</p>
                            <p class="mb-0 small text-muted-custom">📦 COD Available</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="zone-item" data-zone="E">
                        <div class="zone-header">
                            <span class="fw-bold">Zone E</span>
                            <span class="text-muted-custom small">Rest of India</span>
                            <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill">₹199</span>
                        </div>
                        <div class="zone-details">
                            <p class="mb-0 small text-muted-custom">🚚 500+ km · 📅 5-8 Days</p>
                            <p class="mb-0 small text-muted-custom">📦 COD Available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ─── SERVICEABLE AREAS GRID (Bootstrap row/col) ─── -->
        <div class="glass-card p-3 p-md-4 p-lg-5 rounded-4 mt-4">
            <h5 class="fw-bold text-primary mb-3"><i class="bi bi-grid-3x3-gap me-2 text-accent"></i>Serviceable Areas</h5>
            <div class="row g-3" id="locationGrid">
                <!-- Chennai -->
                <div class="col-6 col-sm-4 col-lg-3">
                    <div class="location-card" data-city="Chennai" data-pincode="600001" data-state="Tamil Nadu" data-shipping="₹99" data-eta="3-5 Days" data-cod="yes" data-express="yes">
                        <span class="map-pin">📍</span>
                        <div class="city-name">Chennai</div>
                        <div class="state-name">Tamil Nadu</div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="shipping-badge">₹99</span>
                            <span class="status-chip free">Serviceable</span>
                        </div>
                        <div class="eta-text text-muted-custom small">📅 3-5 Days</div>
                    </div>
                </div>
                <!-- Madurai -->
                <div class="col-6 col-sm-4 col-lg-3">
                    <div class="location-card" data-city="Madurai" data-pincode="625001" data-state="Tamil Nadu" data-shipping="₹99" data-eta="3-5 Days" data-cod="yes" data-express="no">
                        <span class="map-pin">📍</span>
                        <div class="city-name">Madurai</div>
                        <div class="state-name">Tamil Nadu</div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="shipping-badge">₹99</span>
                            <span class="status-chip free">Serviceable</span>
                        </div>
                        <div class="eta-text text-muted-custom small">📅 3-5 Days</div>
                    </div>
                </div>
                <!-- Coimbatore -->
                <div class="col-6 col-sm-4 col-lg-3">
                    <div class="location-card" data-city="Coimbatore" data-pincode="641001" data-state="Tamil Nadu" data-shipping="₹99" data-eta="3-5 Days" data-cod="yes" data-express="yes">
                        <span class="map-pin">📍</span>
                        <div class="city-name">Coimbatore</div>
                        <div class="state-name">Tamil Nadu</div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="shipping-badge">₹99</span>
                            <span class="status-chip free">Serviceable</span>
                        </div>
                        <div class="eta-text text-muted-custom small">📅 3-5 Days</div>
                    </div>
                </div>
                <!-- Trichy -->
                <div class="col-6 col-sm-4 col-lg-3">
                    <div class="location-card" data-city="Trichy" data-pincode="620001" data-state="Tamil Nadu" data-shipping="₹49" data-eta="2-3 Days" data-cod="yes" data-express="yes">
                        <span class="map-pin">📍</span>
                        <div class="city-name">Trichy</div>
                        <div class="state-name">Tamil Nadu</div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="shipping-badge">₹49</span>
                            <span class="status-chip free">Serviceable</span>
                        </div>
                        <div class="eta-text text-muted-custom small">📅 2-3 Days</div>
                    </div>
                </div>
                <!-- Salem -->
                <div class="col-6 col-sm-4 col-lg-3">
                    <div class="location-card" data-city="Salem" data-pincode="636001" data-state="Tamil Nadu" data-shipping="₹49" data-eta="2-3 Days" data-cod="yes" data-express="no">
                        <span class="map-pin">📍</span>
                        <div class="city-name">Salem</div>
                        <div class="state-name">Tamil Nadu</div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="shipping-badge">₹49</span>
                            <span class="status-chip free">Serviceable</span>
                        </div>
                        <div class="eta-text text-muted-custom small">📅 2-3 Days</div>
                    </div>
                </div>
                <!-- Thanjavur -->
                <div class="col-6 col-sm-4 col-lg-3">
                    <div class="location-card" data-city="Thanjavur" data-pincode="613001" data-state="Tamil Nadu" data-shipping="FREE" data-eta="Today – Tomorrow" data-cod="yes" data-express="yes">
                        <span class="map-pin">📍</span>
                        <div class="city-name">Thanjavur</div>
                        <div class="state-name">Tamil Nadu</div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="shipping-badge" style="color:#22c55e;">FREE</span>
                            <span class="status-chip free">Serviceable</span>
                        </div>
                        <div class="eta-text text-muted-custom small">📅 Today – Tomorrow</div>
                    </div>
                </div>
                <!-- Ooty -->
                <div class="col-6 col-sm-4 col-lg-3">
                    <div class="location-card" data-city="Ooty" data-pincode="643001" data-state="Tamil Nadu" data-shipping="₹149" data-eta="4-6 Days" data-cod="yes" data-express="no">
                        <span class="map-pin">📍</span>
                        <div class="city-name">Ooty</div>
                        <div class="state-name">Tamil Nadu</div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="shipping-badge">₹149</span>
                            <span class="status-chip free">Serviceable</span>
                        </div>
                        <div class="eta-text text-muted-custom small">📅 4-6 Days</div>
                    </div>
                </div>
                <!-- Vellore -->
                <div class="col-6 col-sm-4 col-lg-3">
                    <div class="location-card" data-city="Vellore" data-pincode="632001" data-state="Tamil Nadu" data-shipping="₹99" data-eta="3-5 Days" data-cod="yes" data-express="no">
                        <span class="map-pin">📍</span>
                        <div class="city-name">Vellore</div>
                        <div class="state-name">Tamil Nadu</div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="shipping-badge">₹99</span>
                            <span class="status-chip free">Serviceable</span>
                        </div>
                        <div class="eta-text text-muted-custom small">📅 3-5 Days</div>
                    </div>
                </div>
                <!-- Kumbakonam -->
                <div class="col-6 col-sm-4 col-lg-3">
                    <div class="location-card" data-city="Kumbakonam" data-pincode="612001" data-state="Tamil Nadu" data-shipping="₹49" data-eta="2-3 Days" data-cod="yes" data-express="yes">
                        <span class="map-pin">📍</span>
                        <div class="city-name">Kumbakonam</div>
                        <div class="state-name">Tamil Nadu</div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="shipping-badge">₹49</span>
                            <span class="status-chip free">Serviceable</span>
                        </div>
                        <div class="eta-text text-muted-custom small">📅 2-3 Days</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ─── LOCATION DETAIL (Inline) ─── -->
        <div id="locationDetail" class="glass-card p-3 p-md-4 p-lg-5 rounded-4 mt-4 d-none">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="fw-bold text-primary mb-0" id="detailCity">📍 Chennai</h5>
                <button class="btn btn-sm btn-outline-emerald" id="closeDetail">← Back</button>
            </div>
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="glass-card p-3 rounded-3" style="background:rgba(255,255,255,0.3);">
                        <h6 class="fw-bold text-primary mb-1">📍 Address</h6>
                        <p class="mb-0" id="detailAddress">Anna Salai, Chennai - 600001</p>
                        <p class="text-muted-custom small" id="detailState">Tamil Nadu, India</p>
                        <p class="text-muted-custom small" id="detailPincode">Postal: 600001</p>
                        <p class="text-muted-custom small" id="detailContact">📞 +91 1800-123-4567</p>
                        <p class="text-muted-custom small" id="detailHours">🕐 9:00 AM – 9:00 PM</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="glass-card p-3 rounded-3" style="background:rgba(255,255,255,0.3);">
                        <h6 class="fw-bold text-primary mb-1">🚚 Delivery Details</h6>
                        <p class="mb-0 fw-bold" id="detailShipping">Shipping: ₹99</p>
                        <p class="text-muted-custom small" id="detailEta">ETA: 3-5 Days</p>
                        <p class="text-muted-custom small" id="detailCod">COD: ✅ Available</p>
                        <p class="text-muted-custom small" id="detailExpress">Express: ✅ Available</p>
                        <div class="mt-2">
                            <span class="status-chip free">Serviceable</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ════════════════════════════════════════════════════════════════ -->
        <!-- ─── OUR LOCATIONS (Company Offices) – Bootstrap grid ───       -->
        <!-- ════════════════════════════════════════════════════════════════ -->
        <div class="glass-card p-3 p-md-4 p-lg-5 rounded-4 mt-4">
            <div class="d-flex align-items-center gap-2 mb-3">
                <i class="bi bi-building fs-3 text-accent"></i>
                <h5 class="fw-bold text-primary mb-0">Our Locations</h5>
            </div>
            <p class="text-muted-custom small mb-3">Visit us at any of our premium showrooms across India</p>

            <div class="row g-3" id="locationsGrid">
                <!-- Location 1: Chennai -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="location-office-card">
                        <span class="office-badge">📍 Showroom</span>
                        <div class="office-icon">🏢</div>
                        <div class="office-name">Optiq Chennai</div>
                        <div class="office-address">
                            45, Anna Salai,<br />
                            Chennai - 600001<br />
                            Tamil Nadu, India
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-envelope"></i>
                            <span>chennai@optiq.com</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-telephone"></i>
                            <span>+91 1800-123-4567</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-pin-map"></i>
                            <span>Postal: 600001</span>
                        </div>
                        <div class="office-hours">
                            <i class="bi bi-clock"></i>
                            Mon – Sat: 9:00 AM – 9:00 PM · Sun: 10:00 AM – 6:00 PM
                        </div>
                    </div>
                </div>

                <!-- Location 2: Coimbatore -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="location-office-card">
                        <span class="office-badge">📍 Showroom</span>
                        <div class="office-icon">🏢</div>
                        <div class="office-name">Optiq Coimbatore</div>
                        <div class="office-address">
                            112, Avinashi Road,<br />
                            Coimbatore - 641001<br />
                            Tamil Nadu, India
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-envelope"></i>
                            <span>coimbatore@optiq.com</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-telephone"></i>
                            <span>+91 1800-123-4568</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-pin-map"></i>
                            <span>Postal: 641001</span>
                        </div>
                        <div class="office-hours">
                            <i class="bi bi-clock"></i>
                            Mon – Sat: 9:00 AM – 9:00 PM · Sun: 10:00 AM – 6:00 PM
                        </div>
                    </div>
                </div>

                <!-- Location 3: Madurai -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="location-office-card">
                        <span class="office-badge">📍 Showroom</span>
                        <div class="office-icon">🏢</div>
                        <div class="office-name">Optiq Madurai</div>
                        <div class="office-address">
                            78, Main Road,<br />
                            Madurai - 625001<br />
                            Tamil Nadu, India
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-envelope"></i>
                            <span>madurai@optiq.com</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-telephone"></i>
                            <span>+91 1800-123-4569</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-pin-map"></i>
                            <span>Postal: 625001</span>
                        </div>
                        <div class="office-hours">
                            <i class="bi bi-clock"></i>
                            Mon – Sat: 9:00 AM – 9:00 PM · Sun: 10:00 AM – 6:00 PM
                        </div>
                    </div>
                </div>

                <!-- Location 4: Trichy -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="location-office-card">
                        <span class="office-badge">📍 Showroom</span>
                        <div class="office-icon">🏢</div>
                        <div class="office-name">Optiq Trichy</div>
                        <div class="office-address">
                            34, Main Road,<br />
                            Trichy - 620001<br />
                            Tamil Nadu, India
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-envelope"></i>
                            <span>trichy@optiq.com</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-telephone"></i>
                            <span>+91 1800-123-4570</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-pin-map"></i>
                            <span>Postal: 620001</span>
                        </div>
                        <div class="office-hours">
                            <i class="bi bi-clock"></i>
                            Mon – Sat: 9:00 AM – 9:00 PM · Sun: 10:00 AM – 6:00 PM
                        </div>
                    </div>
                </div>

                <!-- Location 5: Salem -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="location-office-card">
                        <span class="office-badge">📍 Showroom</span>
                        <div class="office-icon">🏢</div>
                        <div class="office-name">Optiq Salem</div>
                        <div class="office-address">
                            56, Salem Main,<br />
                            Salem - 636001<br />
                            Tamil Nadu, India
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-envelope"></i>
                            <span>salem@optiq.com</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-telephone"></i>
                            <span>+91 1800-123-4571</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-pin-map"></i>
                            <span>Postal: 636001</span>
                        </div>
                        <div class="office-hours">
                            <i class="bi bi-clock"></i>
                            Mon – Sat: 9:00 AM – 9:00 PM · Sun: 10:00 AM – 6:00 PM
                        </div>
                    </div>
                </div>

                <!-- Location 6: Thanjavur -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="location-office-card">
                        <span class="office-badge">📍 Headquarters</span>
                        <div class="office-icon">🏢</div>
                        <div class="office-name">Optiq Thanjavur</div>
                        <div class="office-address">
                            1, Anna Nagar,<br />
                            Thanjavur - 613001<br />
                            Tamil Nadu, India
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-envelope"></i>
                            <span>hello@optiq.com</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-telephone"></i>
                            <span>+91 1800-123-4572</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-pin-map"></i>
                            <span>Postal: 613001</span>
                        </div>
                        <div class="office-hours">
                            <i class="bi bi-clock"></i>
                            Mon – Sat: 9:00 AM – 9:00 PM · Sun: 10:00 AM – 6:00 PM
                        </div>
                    </div>
                </div>

                <!-- Location 7: Ooty -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="location-office-card">
                        <span class="office-badge">📍 Showroom</span>
                        <div class="office-icon">🏢</div>
                        <div class="office-name">Optiq Ooty</div>
                        <div class="office-address">
                            89, Ooty Main,<br />
                            Ooty - 643001<br />
                            Tamil Nadu, India
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-envelope"></i>
                            <span>ooty@optiq.com</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-telephone"></i>
                            <span>+91 1800-123-4573</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-pin-map"></i>
                            <span>Postal: 643001</span>
                        </div>
                        <div class="office-hours">
                            <i class="bi bi-clock"></i>
                            Mon – Sat: 9:00 AM – 9:00 PM · Sun: 10:00 AM – 6:00 PM
                        </div>
                    </div>
                </div>

                <!-- Location 8: Vellore -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="location-office-card">
                        <span class="office-badge">📍 Showroom</span>
                        <div class="office-icon">🏢</div>
                        <div class="office-name">Optiq Vellore</div>
                        <div class="office-address">
                            23, Vellore Main,<br />
                            Vellore - 632001<br />
                            Tamil Nadu, India
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-envelope"></i>
                            <span>vellore@optiq.com</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-telephone"></i>
                            <span>+91 1800-123-4574</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-pin-map"></i>
                            <span>Postal: 632001</span>
                        </div>
                        <div class="office-hours">
                            <i class="bi bi-clock"></i>
                            Mon – Sat: 9:00 AM – 9:00 PM · Sun: 10:00 AM – 6:00 PM
                        </div>
                    </div>
                </div>

                <!-- Location 9: Kumbakonam -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="location-office-card">
                        <span class="office-badge">📍 Showroom</span>
                        <div class="office-icon">🏢</div>
                        <div class="office-name">Optiq Kumbakonam</div>
                        <div class="office-address">
                            12, Kumbakonam Main,<br />
                            Kumbakonam - 612001<br />
                            Tamil Nadu, India
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-envelope"></i>
                            <span>kumbakonam@optiq.com</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-telephone"></i>
                            <span>+91 1800-123-4575</span>
                        </div>
                        <div class="office-detail">
                            <i class="bi bi-pin-map"></i>
                            <span>Postal: 612001</span>
                        </div>
                        <div class="office-hours">
                            <i class="bi bi-clock"></i>
                            Mon – Sat: 9:00 AM – 9:00 PM · Sun: 10:00 AM – 6:00 PM
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php include 'search-overlay.php'; ?>

<?php include 'templates/footer.php'; ?>

<!-- ============================================================ -->
<!-- SCRIPTS (unchanged)                                           -->
<!-- ============================================================ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ============================================================
        // 1. DATA – Locations with full details
        // ============================================================
        const locationData = {
            '600001': {
                city: 'Chennai',
                state: 'Tamil Nadu',
                country: 'India',
                address: 'Anna Salai, Chennai - 600001',
                contact: '+91 1800-123-4567',
                hours: '9:00 AM – 9:00 PM',
                shipping: '₹99',
                eta: '3-5 Days',
                cod: 'Available',
                express: 'Available',
                serviceable: true
            },
            '625001': {
                city: 'Madurai',
                state: 'Tamil Nadu',
                country: 'India',
                address: 'Madurai Main, Madurai - 625001',
                contact: '+91 1800-123-4567',
                hours: '9:00 AM – 9:00 PM',
                shipping: '₹99',
                eta: '3-5 Days',
                cod: 'Available',
                express: 'Not Available',
                serviceable: true
            },
            '641001': {
                city: 'Coimbatore',
                state: 'Tamil Nadu',
                country: 'India',
                address: 'Avinashi Road, Coimbatore - 641001',
                contact: '+91 1800-123-4567',
                hours: '9:00 AM – 9:00 PM',
                shipping: '₹99',
                eta: '3-5 Days',
                cod: 'Available',
                express: 'Available',
                serviceable: true
            },
            '620001': {
                city: 'Trichy',
                state: 'Tamil Nadu',
                country: 'India',
                address: 'Main Road, Trichy - 620001',
                contact: '+91 1800-123-4567',
                hours: '9:00 AM – 9:00 PM',
                shipping: '₹49',
                eta: '2-3 Days',
                cod: 'Available',
                express: 'Available',
                serviceable: true
            },
            '636001': {
                city: 'Salem',
                state: 'Tamil Nadu',
                country: 'India',
                address: 'Salem Main, Salem - 636001',
                contact: '+91 1800-123-4567',
                hours: '9:00 AM – 9:00 PM',
                shipping: '₹49',
                eta: '2-3 Days',
                cod: 'Available',
                express: 'Not Available',
                serviceable: true
            },
            '613001': {
                city: 'Thanjavur',
                state: 'Tamil Nadu',
                country: 'India',
                address: 'Anna Nagar, Thanjavur - 613001',
                contact: '+91 1800-123-4567',
                hours: '9:00 AM – 9:00 PM',
                shipping: 'FREE',
                eta: 'Today – Tomorrow',
                cod: 'Available',
                express: 'Available',
                serviceable: true
            },
            '643001': {
                city: 'Ooty',
                state: 'Tamil Nadu',
                country: 'India',
                address: 'Ooty Main, Ooty - 643001',
                contact: '+91 1800-123-4567',
                hours: '9:00 AM – 9:00 PM',
                shipping: '₹149',
                eta: '4-6 Days',
                cod: 'Available',
                express: 'Not Available',
                serviceable: true
            },
            '632001': {
                city: 'Vellore',
                state: 'Tamil Nadu',
                country: 'India',
                address: 'Vellore Main, Vellore - 632001',
                contact: '+91 1800-123-4567',
                hours: '9:00 AM – 9:00 PM',
                shipping: '₹99',
                eta: '3-5 Days',
                cod: 'Available',
                express: 'Not Available',
                serviceable: true
            },
            '612001': {
                city: 'Kumbakonam',
                state: 'Tamil Nadu',
                country: 'India',
                address: 'Kumbakonam Main, Kumbakonam - 612001',
                contact: '+91 1800-123-4567',
                hours: '9:00 AM – 9:00 PM',
                shipping: '₹49',
                eta: '2-3 Days',
                cod: 'Available',
                express: 'Available',
                serviceable: true
            }
        };

        // ============================================================
        // 2. DOM REFS
        // ============================================================
        const pincodeInput = document.getElementById('pincodeInput');
        const searchBtn = document.getElementById('searchBtn');
        const searchIconWrap = document.getElementById('searchIconWrap');
        const suggestionsDropdown = document.getElementById('suggestionsDropdown');
        const resultCard = document.getElementById('resultCard');
        const resultIcon = document.getElementById('resultIcon');
        const resultTitle = document.getElementById('resultTitle');
        const resultDesc = document.getElementById('resultDesc');
        const resultDetails = document.getElementById('resultDetails');
        const resultLocation = document.getElementById('resultLocation');
        const resultPincode = document.getElementById('resultPincode');
        const resultEta = document.getElementById('resultEta');
        const shippingCounter = document.getElementById('shippingCounter');
        const radarCenter = document.getElementById('radarCenter');
        const deliverBtn = document.getElementById('deliverBtn');
        const locationGrid = document.getElementById('locationGrid');
        const locationDetail = document.getElementById('locationDetail');

        // ============================================================
        // 3. SUGGESTIONS
        // ============================================================
        pincodeInput.addEventListener('input', function() {
            const val = this.value.trim();
            if (val.length === 0) {
                suggestionsDropdown.classList.remove('show');
                return;
            }

            const matches = Object.keys(locationData).filter(p =>
                p.startsWith(val) ||
                locationData[p].city.toLowerCase().includes(val.toLowerCase())
            );

            if (matches.length === 0) {
                suggestionsDropdown.classList.remove('show');
                return;
            }

            let html = '';
            matches.forEach((pincode, index) => {
                const loc = locationData[pincode];
                html += `
                    <div class="suggestion-item" data-pincode="${pincode}" style="animation-delay:${index * 60}ms; opacity:0; transform:translateX(-10px);">
                        <span class="pincode">${pincode}</span>
                        <span class="place">${loc.city}, ${loc.state}</span>
                    </div>
                `;
            });
            suggestionsDropdown.innerHTML = html;
            suggestionsDropdown.classList.add('show');

            // Staggered slide-in for suggestions
            document.querySelectorAll('.suggestion-item').forEach((el, i) => {
                gsap.to(el, {
                    opacity: 1,
                    x: 0,
                    duration: 0.3,
                    delay: i * 0.06,
                    ease: 'power2.out'
                });
            });

            // Click on suggestion
            document.querySelectorAll('.suggestion-item').forEach(el => {
                el.addEventListener('click', function() {
                    const pincode = this.dataset.pincode;
                    pincodeInput.value = pincode;
                    suggestionsDropdown.classList.remove('show');
                    performSearch(pincode);
                });
            });
        });

        // Close suggestions on outside click
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.search-wrapper')) {
                suggestionsDropdown.classList.remove('show');
            }
        });

        // ============================================================
        // 4. PERFORM SEARCH
        // ============================================================
        function performSearch(pincode) {
            // Reset result card
            resultCard.classList.remove('visible');
            resultDetails.style.display = 'none';
            radarCenter.classList.add('scanning');
            searchIconWrap.classList.add('rotating');

            // Show scanning state
            resultIcon.textContent = '📍';
            resultIcon.className = 'status-icon';
            resultTitle.textContent = 'Scanning...';
            resultDesc.textContent = 'Checking availability in your area';
            resultCard.classList.add('visible');

            // Simulate scan (1.5s)
            setTimeout(() => {
                const loc = locationData[pincode];
                radarCenter.classList.remove('scanning');

                if (loc && loc.serviceable) {
                    // ── SUCCESS ──
                    resultIcon.textContent = '✓';
                    resultIcon.className = 'status-icon success';
                    resultTitle.textContent = 'Great News! We deliver to your location.';
                    resultDesc.textContent = `${loc.city}, ${loc.state}`;

                    // Fill details
                    resultLocation.textContent = `${loc.city}, ${loc.state}`;
                    resultPincode.textContent = `PIN: ${pincode}`;
                    resultEta.textContent = loc.eta;

                    // Animate shipping counter
                    const shippingText = loc.shipping;
                    shippingCounter.textContent = shippingText;
                    shippingCounter.className = 'shipping-counter counting';
                    setTimeout(() => {
                        shippingCounter.className = 'shipping-counter';
                    }, 500);

                    resultDetails.style.display = 'block';

                    // Confetti
                    spawnConfetti();

                    // Deliver button glow
                    deliverBtn.style.boxShadow = '0 0 40px rgba(212,175,55,0.2)';
                    setTimeout(() => {
                        deliverBtn.style.boxShadow = '';
                    }, 2000);

                } else {
                    // ── ERROR ──
                    resultIcon.textContent = '⚠️';
                    resultIcon.className = 'status-icon error';
                    resultTitle.textContent = 'Delivery Not Available';
                    resultDesc.textContent = 'Sorry! Currently we don\'t deliver to this pincode.';

                    // Show nearest area
                    const nearest = Object.keys(locationData)[0];
                    const nearestLoc = locationData[nearest];
                    resultLocation.textContent = `Nearest: ${nearestLoc.city}, ${nearestLoc.state} (${nearest})`;
                    resultPincode.textContent = `Try: ${nearest}`;
                    resultDetails.style.display = 'block';
                }

                // Radar center icon update
                radarCenter.textContent = loc && loc.serviceable ? '✅' : '❌';

            }, 1500);
        }

        // ── Search button click ──
        searchBtn.addEventListener('click', function() {
            const val = pincodeInput.value.trim();
            if (val.length === 0) {
                alert('Please enter a pincode.');
                return;
            }
            performSearch(val);
        });

        // ── Enter key ──
        pincodeInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchBtn.click();
            }
        });

        // ============================================================
        // 5. CONFETTI
        // ============================================================
        function spawnConfetti() {
            const colors = ['#D4AF37', '#0F3D2E', '#22c55e', '#4a9eff', '#f59e0b', '#ef4444', '#ec4899'];
            for (let i = 0; i < 40; i++) {
                const particle = document.createElement('div');
                particle.className = 'confetti-particle';
                particle.style.background = colors[Math.floor(Math.random() * colors.length)];
                particle.style.left = (Math.random() * window.innerWidth) + 'px';
                particle.style.top = '-10px';
                particle.style.width = (4 + Math.random() * 8) + 'px';
                particle.style.height = (4 + Math.random() * 8) + 'px';
                particle.style.borderRadius = Math.random() > 0.5 ? '50%' : '2px';
                document.body.appendChild(particle);

                gsap.to(particle, {
                    y: window.innerHeight + 50,
                    x: (Math.random() - 0.5) * 200,
                    rotation: Math.random() * 720,
                    opacity: 0,
                    duration: 1.5 + Math.random() * 1.5,
                    ease: 'power2.out',
                    onComplete: () => particle.remove()
                });
            }
        }

        // ============================================================
        // 6. DELIVERY ZONES – Expand on click
        // ============================================================
        document.querySelectorAll('.zone-item').forEach(zone => {
            zone.addEventListener('click', function() {
                this.classList.toggle('expanded');
                if (this.classList.contains('expanded')) {
                    const details = this.querySelector('.zone-details');
                    gsap.from(details, {
                        opacity: 1,
                        y: 10,
                        duration: 0.4,
                        ease: 'power2.out'
                    });
                }
            });
        });

        // ============================================================
        // 7. LOCATION GRID – Click to show details
        // ============================================================
        document.querySelectorAll('.location-card').forEach(card => {
            card.addEventListener('click', function() {
                const city = this.dataset.city;
                const pincode = this.dataset.pincode;
                const state = this.dataset.state;
                const shipping = this.dataset.shipping;
                const eta = this.dataset.eta;
                const cod = this.dataset.cod;
                const express = this.dataset.express;

                const loc = locationData[pincode];
                if (!loc) return;

                document.getElementById('detailCity').textContent = '📍 ' + city;
                document.getElementById('detailAddress').textContent = loc.address || city + ' Main';
                document.getElementById('detailState').textContent = state + ', ' + (loc.country || 'India');
                document.getElementById('detailPincode').textContent = 'Postal: ' + pincode;
                document.getElementById('detailContact').textContent = '📞 ' + (loc.contact || '+91 1800-123-4567');
                document.getElementById('detailHours').textContent = '🕐 ' + (loc.hours || '9:00 AM – 9:00 PM');

                document.getElementById('detailShipping').textContent = 'Shipping: ' + shipping;
                document.getElementById('detailEta').textContent = 'ETA: ' + eta;
                document.getElementById('detailCod').textContent = 'COD: ' + (cod === 'yes' ? '✅ Available' : '❌ Not Available');
                document.getElementById('detailExpress').textContent = 'Express: ' + (express === 'yes' ? '✅ Available' : '❌ Not Available');

                locationDetail.classList.remove('d-none');
                locationDetail.scrollIntoView({ behavior: 'smooth', block: 'center' });
            });
        });

        // ── Close detail ──
        document.getElementById('closeDetail').addEventListener('click', function() {
            locationDetail.classList.add('d-none');
        });

        // ============================================================
        // 8. DELIVER HERE BUTTON
        // ============================================================
        deliverBtn.addEventListener('click', function() {
            alert('📍 Redirecting to checkout with this address!');
        });

        // ============================================================
        // 9. NAVBAR BADGE
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
        // 10. INIT – Entrance animations for grid cards
        // ============================================================
        setTimeout(() => {
            const cards = document.querySelectorAll('.location-card');
            gsap.from(cards, {
                opacity: 1,
                y: 30,
                duration: 0.6,
                stagger: 0.06,
                ease: 'power3.out',
                clearProps: 'transform'
            });

            // Also animate office location cards
            const officeCards = document.querySelectorAll('.location-office-card');
            gsap.from(officeCards, {
                opacity: 1,
                y: 30,
                duration: 0.6,
                stagger: 0.04,
                ease: 'power3.out',
                clearProps: 'transform'
            });
        }, 300);

        console.log('🚚 Delivery Areas page ready with Our Locations!');
    });
</script>
</body>
</html>