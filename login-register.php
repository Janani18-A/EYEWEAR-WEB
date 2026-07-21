<?php
// login-register.php – Responsive: Side-by-side on desktop, stacked on mobile
include 'templates/header.php';
include 'templates/navbar.php';
?>

<!-- Font Awesome + GSAP -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    /* ============================================================
       GLOBAL – EMERALD GREEN BACKGROUND
       ============================================================ */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
        background: #0F3D2E;
        overflow: hidden;
        font-family: 'Poppins', 'Inter', sans-serif;
    }

    .auth-page {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #0F3D2E;
        padding: 20px;
        position: relative;
        overflow: hidden;
    }

    /* ============================================================
       AMBIENT GLOW
       ============================================================ */
    .ambient-glow {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
        filter: blur(80px);
        opacity: 0.3;
    }

    .ambient-glow-1 {
        width: 400px;
        height: 400px;
        top: -100px;
        right: -100px;
        background: radial-gradient(circle, rgba(212, 175, 55, 0.2), transparent 70%);
        animation: glowFloat 8s ease-in-out infinite;
    }

    .ambient-glow-2 {
        width: 300px;
        height: 300px;
        bottom: -50px;
        left: -50px;
        background: radial-gradient(circle, rgba(212, 175, 55, 0.15), transparent 70%);
        animation: glowFloat 6s ease-in-out infinite reverse;
    }

    @keyframes glowFloat {
        0%,
        100% {
            transform: translate(0, 0) scale(1);
            opacity: 0.3;
        }
        50% {
            transform: translate(30px, -20px) scale(1.1);
            opacity: 0.5;
        }
    }

    /* ============================================================
       BENTO GRID – Responsive: side-by-side on desktop, stacked on mobile
       ============================================================ */
    .bento-grid {
        display: grid;
        grid-template-columns: 1fr 1.2fr; /* side-by-side by default */
        gap: 20px;
        max-width: 900px;
        width: 100%;
        position: relative;
        z-index: 1;
        height: auto;
        align-items: stretch;
    }

    /* ============================================================
       LEFT SIDE – Lens + Bag (desktop)
       ============================================================ */
    .bento-left {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        position: relative;
    }

    /* ============================================================
       GLASS CARD – Shared style
       ============================================================ */
    .glass-card {
        background: linear-gradient(145deg, rgba(247, 245, 240, 0.06), rgba(15, 61, 46, 0.10));
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 24px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.08);
        padding: 20px 16px;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        will-change: transform, opacity, filter;
        height: 100%;
        width: 100%;
    }

    .glass-card::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 24px;
        background: linear-gradient(135deg, rgba(247, 245, 240, 0.05) 0%, rgba(15, 61, 46, 0.04) 40%, transparent 80%);
        pointer-events: none;
    }

    .glass-card::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 24px;
        background: radial-gradient(circle at 30% 40%, rgba(247, 245, 240, 0.05) 0%, transparent 60%);
        pointer-events: none;
        animation: waterRipple 4s ease-in-out infinite;
    }

    @keyframes waterRipple {
        0%,
        100% {
            opacity: 0.4;
            transform: scale(1) translate(0, 0);
        }
        50% {
            opacity: 1;
            transform: scale(1.02) translate(5px, -5px);
        }
    }

    .glass-card:hover {
        transform: translateY(-4px);
        border-color: rgba(212, 175, 55, 0.15);
        box-shadow: 0 8px 32px rgba(212, 175, 55, 0.05);
    }

    /* ============================================================
       FLOATING LENS – Inside top glass card, top-left
       ============================================================ */
    .floating-lens {
        position: absolute;
        top: 12px;
        left: 12px;
        width: 100px;
        height: 100px;
        z-index: 10;
        pointer-events: none;
    }

    .floating-lens .lens-ring {
        width: 100%;
        height: 100%;
        animation: rotateLens 16s linear infinite;
        position: relative;
    }

    .floating-lens .lens-item {
        position: absolute;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 2px solid rgba(212, 175, 55, 0.4);
        object-fit: cover;
        box-shadow: 0 0 30px rgba(212, 175, 55, 0.15);
        background: rgba(15, 23, 42, 0.9);
        transition: transform 0.3s, border-color 0.3s;
        will-change: transform;
    }

    .floating-lens .lens-item:nth-child(1) {
        top: 0;
        left: 50%;
        transform: translateX(-50%);
    }
    .floating-lens .lens-item:nth-child(2) {
        top: 50%;
        right: 0;
        transform: translateY(-50%);
    }
    .floating-lens .lens-item:nth-child(3) {
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }
    .floating-lens .lens-item:nth-child(4) {
        top: 50%;
        left: 0;
        transform: translateY(-50%);
    }

    @keyframes rotateLens {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .floating-lens .lens-glow {
        position: absolute;
        top: -15px;
        left: -15px;
        width: calc(100% + 30px);
        height: calc(100% + 30px);
        border-radius: 50%;
        background: radial-gradient(circle, rgba(212, 175, 55, 0.05) 0%, transparent 70%);
        pointer-events: none;
        animation: pulseLens 3s ease-in-out infinite;
    }

    @keyframes pulseLens {
        0%,
        100% {
            opacity: 0.5;
            transform: scale(1);
        }
        50% {
            opacity: 1;
            transform: scale(1.05);
        }
    }

    /* ============================================================
       BAG CONTAINER – Centered in the glass card
       ============================================================ */
    .bag-container {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        padding: 0;
        margin: 0;
    }

    .bag-label-text {
        font-family: 'Poppins', sans-serif;
        font-size: 0.5rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        color: rgba(255, 255, 255, 0.2);
        margin-top: 2px;
        text-align: center;
    }

    .bag-label-text.gold {
        color: rgba(212, 175, 55, 0.25);
        letter-spacing: 3px;
    }

    .svg-bag-wrapper {
        display: inline-block;
        position: relative;
        transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        width: 120px;
        height: 85px;
    }

    .svg-bag-wrapper svg {
        width: 100%;
        height: 100%;
        display: block;
    }

    .bag-fill-glow {
        position: absolute;
        bottom: 8px;
        left: 50%;
        transform: translateX(-50%);
        width: 70%;
        height: 35%;
        background: radial-gradient(ellipse at bottom, rgba(212, 175, 55, 0.2), transparent);
        border-radius: 50%;
        pointer-events: none;
        transition: all 0.8s;
        opacity: 0;
    }

    .bag-fill-glow.active {
        opacity: 1;
    }

    .bag-tagline {
        font-family: 'Poppins', sans-serif;
        font-size: 0.35rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: rgba(255, 255, 255, 0.08);
        margin-top: 4px;
    }

    .bag-tagline .line {
        display: inline-block;
        width: 16px;
        height: 1px;
        background: rgba(212, 175, 55, 0.1);
        vertical-align: middle;
        margin: 0 4px;
    }

    /* ============================================================
       RIGHT SIDE – Auth Form (desktop)
       ============================================================ */
    .auth-card-wrapper {
        position: relative;
        height: 100%;
        display: flex;
        align-items: center;
        grid-column: 2;
        grid-row: 1 / span 1;
    }

    .auth-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(32px);
        -webkit-backdrop-filter: blur(32px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 28px;
        padding: 28px 32px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.06);
        position: relative;
        overflow: hidden;
        width: 100%;
        will-change: transform, opacity;
        transform-origin: center center;
        opacity: 0;
        transform: translateY(30px);
        height: auto;
        max-height: 100%;
    }

    .auth-card.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .auth-card::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 28px;
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.04) 0%, transparent 40%, rgba(255, 255, 255, 0.02) 80%);
        pointer-events: none;
    }

    .auth-card::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 28px;
        background: radial-gradient(ellipse at 20% 30%, rgba(212, 175, 55, 0.03) 0%, transparent 70%);
        pointer-events: none;
        animation: waterRipple 5s ease-in-out infinite;
    }

    /* ===== AUTH FORM ELEMENTS ===== */
    .auth-logo {
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
        font-size: 1.6rem;
        color: #D4AF37;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .auth-heading {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #fff;
        font-size: 1.3rem;
        text-align: center;
        margin-bottom: 2px;
    }

    .auth-subtext {
        color: rgba(255, 255, 255, 0.4);
        text-align: center;
        font-size: 0.75rem;
        margin-bottom: 16px;
    }

    .auth-input-group {
        position: relative;
        margin-bottom: 10px;
        opacity: 0;
        transform: translateY(15px);
        display: flex;
        align-items: center;
    }

    .auth-input-group.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .auth-input {
        width: 100%;
        padding: 10px 40px 10px 38px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        color: #fff;
        font-size: 0.85rem;
        transition: border-color 0.3s, box-shadow 0.3s;
        flex: 1;
    }

    .auth-input:focus {
        outline: none;
        border-color: #D4AF37;
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.08);
    }

    .auth-input::placeholder {
        color: rgba(255, 255, 255, 0.2);
    }

    .input-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.2);
        font-size: 0.9rem;
        pointer-events: none;
        z-index: 2;
    }

    .toggle-password {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: all;
        cursor: pointer;
        color: rgba(255, 255, 255, 0.2);
        font-size: 0.9rem;
        z-index: 2;
        background: none;
        border: none;
        padding: 0;
        font-family: inherit;
    }

    .toggle-password:hover {
        color: #D4AF37;
    }

    .auth-btn {
        background: #D4AF37;
        color: #0F3D2E;
        font-weight: 700;
        font-size: 0.9rem;
        padding: 10px;
        border: none;
        border-radius: 12px;
        width: 100%;
        transition: all 0.3s ease;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        position: relative;
        overflow: hidden;
        margin-top: 4px;
    }

    .auth-btn:hover {
        background: #e6c766;
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(212, 175, 55, 0.15);
    }

    .auth-btn:active {
        transform: scale(0.97);
    }

    .auth-switch {
        text-align: center;
        margin-top: 12px;
        color: rgba(255, 255, 255, 0.3);
        font-size: 0.75rem;
    }

    .auth-switch a {
        color: #D4AF37;
        text-decoration: none;
        font-weight: 600;
        cursor: pointer;
        transition: color 0.3s;
    }

    .auth-switch a:hover {
        color: #fff;
    }

    /* ============================================================
       SPLIT EFFECT
       ============================================================ */
    #splitContainer {
        display: none;
        position: absolute;
        inset: 0;
        border-radius: 28px;
        overflow: hidden;
        pointer-events: none;
        z-index: 5;
    }

    .split-half {
        flex: 1;
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        opacity: 0;
        transform: scale(0.9);
    }

    .split-half.active {
        opacity: 1;
        transform: scale(1);
    }

    .split-half.login-half {
        transform-origin: right center;
    }
    .split-half.register-half {
        transform-origin: left center;
    }

    /* ============================================================
       FLYING LENS
       ============================================================ */
    .flying-lens {
        position: fixed;
        pointer-events: none;
        z-index: 999;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 2px solid rgba(212, 175, 55, 0.4);
        object-fit: cover;
        box-shadow: 0 0 30px rgba(212, 175, 55, 0.3);
        opacity: 0;
        will-change: transform, left, top, opacity;
    }

    /* ============================================================
       RESPONSIVE
       ============================================================ */
    @media (max-width: 991.98px) {
        /* Stack on tablet and mobile */
        .bento-grid {
            grid-template-columns: 1fr;
            gap: 20px;
            max-width: 500px;
            height: auto;
            align-items: center;
        }

        .bento-left {
            height: auto;
            min-height: 180px;
            max-height: 220px;
            width: 100%;
        }

        .auth-card-wrapper {
            grid-column: 1;
            grid-row: 2;
            height: auto;
            width: 100%;
        }

        .auth-card {
            padding: 20px 18px;
        }

        .floating-lens {
            width: 80px;
            height: 80px;
            top: 10px;
            left: 10px;
        }
        .floating-lens .lens-item {
            width: 36px;
            height: 36px;
        }

        .svg-bag-wrapper {
            width: 100px;
            height: 70px;
        }

        .auth-heading {
            font-size: 1.1rem;
        }
        .auth-subtext {
            font-size: 0.7rem;
            margin-bottom: 10px;
        }
        .auth-input {
            font-size: 0.75rem;
            padding: 8px 34px 8px 32px;
        }
        .auth-btn {
            font-size: 0.8rem;
            padding: 8px;
        }
        .auth-logo {
            font-size: 1.3rem;
        }
        .input-icon {
            font-size: 0.8rem;
            left: 10px;
        }
        .toggle-password {
            font-size: 0.8rem;
            right: 10px;
        }
        .auth-switch {
            font-size: 0.7rem;
            margin-top: 8px;
        }

        html,
        body {
            overflow-y: auto;
            height: auto;
        }

        .auth-page {
            height: auto;
            min-height: 100vh;
            padding: 15px;
            overflow-y: auto;
        }
    }

    @media (max-width: 575.98px) {
        .bento-left {
            min-height: 140px;
            max-height: 170px;
        }

        .floating-lens {
            width: 60px;
            height: 60px;
            top: 8px;
            left: 8px;
        }
        .floating-lens .lens-item {
            width: 28px;
            height: 28px;
        }

        .svg-bag-wrapper {
            width: 80px;
            height: 55px;
        }

        .bag-label-text {
            font-size: 0.4rem;
        }
        .bag-tagline {
            font-size: 0.3rem;
        }

        .auth-card {
            padding: 16px 14px;
            border-radius: 20px;
        }
        .auth-heading {
            font-size: 1rem;
        }
        .auth-input {
            font-size: 0.7rem;
            padding: 6px 28px 6px 28px;
        }
        .auth-btn {
            font-size: 0.75rem;
            padding: 6px;
        }
        .auth-logo {
            font-size: 1.1rem;
        }
        .input-icon {
            font-size: 0.7rem;
            left: 8px;
        }
        .toggle-password {
            font-size: 0.7rem;
            right: 8px;
        }
    }
</style>

<!-- ============================================================ -->
<!-- AUTH PAGE                                                   -->
<!-- ============================================================ -->
<section class="auth-page">

    <!-- Ambient Glow -->
    <div class="ambient-glow ambient-glow-1"></div>
    <div class="ambient-glow ambient-glow-2"></div>

    <div class="bento-grid">

        <!-- ===== LEFT: Lens + Bag (always visible) ===== -->
        <div class="bento-left">
            <div class="glass-card" style="height:100%;">

                <!-- Floating Lens (top-left) -->
                <div class="floating-lens" id="floatingLens">
                    <div class="lens-ring" id="floatingLensRing">
                        <img src="assets/images/women-1.jpg" alt="Lens 1" class="lens-item">
                        <img src="assets/images/women-9.jpg" alt="Lens 2" class="lens-item">
                        <img src="assets/images/computer-3.jpg" alt="Lens 3" class="lens-item">
                        <img src="assets/images/kids-1.jpg" alt="Lens 4" class="lens-item">
                    </div>
                    <div class="lens-glow"></div>
                </div>

                <div class="bag-container" id="bagContainer">
                    <span class="bag-label-text gold">EXPRESS YOURSELF</span>

                    <div class="svg-bag-wrapper" id="svgBagWrapper">
                        <svg version="1.1" id="bagSvg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 290.277 229.269" style="enable-background:new 0 0 290.277 229.269;" xml:space="preserve">
                            <g>
                                <path style="fill:#E7E3C6;" d="M25.558,32.115L10.56,31.257c0,0,17.141,83.56,18.426,89.13c1.285,5.57-11.14,13.712-5.141,21.425
                                    c5.998,7.714,10.129,18.323,10.129,18.323s-13.986,29.241-13.986,41.238c0,0,0,4.285,3.858,1.715l4.285-2.142
                                    c0,0,57.419,14.139,102.412,13.711c44.992-0.428,123.408-12.854,123.408-12.854s8.57,5.571,8.999,2.143
                                    c0.429-3.429-4.285-8.142-4.285-8.142s-2.999-42.422-10.284-51.42c0,0,7.285-14.997,4.714-19.712
                                    c-2.571-4.714-7.712-15.426-4.714-21.854c3-6.427,28.28-77.133,28.28-77.133L25.558,32.115z"/>
                                <path style="fill:#B473AA;" d="M248.38,144.384c0,0,7.285-14.997,4.714-19.712c-2.571-4.714-7.712-15.426-4.714-21.854
                                    c3-6.427,28.28-77.133,28.28-77.133l-251.102,6.43L10.56,31.257c0,0,17.141,83.56,18.426,89.13
                                    c1.285,5.57-11.14,13.712-5.141,21.425c5.998,7.714,10.129,18.323,10.129,18.323s-13.986,29.241-13.986,41.238
                                    c0,0,0,4.285,3.858,1.715l4.285-2.142c0,0,57.419,14.139,102.412,13.711c44.992-0.428,123.408-12.854,123.408-12.854
                                    s8.57,5.571,8.999,2.143c0.429-3.429-4.285-8.142-4.285-8.142S255.665,153.382,248.38,144.384z"/>
                                <path style="opacity:0.4;fill:#86739B;" d="M248.38,144.384c0,0,7.285-14.997,4.714-19.712c-2.571-4.714-7.712-15.426-4.714-21.854
                                    c3-6.427,28.28-77.133,28.28-77.133l-251.102,6.43L10.56,31.257c0,0,17.141,83.56,18.426,89.13
                                    c1.285,5.57-11.14,13.712-5.141,21.425c5.998,7.714,10.129,18.323,10.129,18.323s-13.986,29.241-13.986,41.238
                                    c0,0,0,4.285,3.858,1.715l4.285-2.142c0,0,57.419,14.139,102.412,13.711c44.992-0.428,123.408-12.854,123.408-12.854
                                    s8.57,5.571,8.999,2.143c0.429-3.429-4.285-8.142-4.285-8.142S255.665,153.382,248.38,144.384z M247.09,72.268
                                    c-0.103,0.178-0.203,0.355-0.306,0.533c-4.225,7.354-8.207,14.835-12.579,22.105c-8.831,14.691-18.418,28.905-27.552,43.405
                                    c6.496-1.552,12.891-3.529,19.471-4.719c6.192-1.119,12.827-1.834,18.912,0.195c0.151,0.05,0.293,0.227,0.225,0.395
                                    c-0.357,0.877-0.715,1.751-1.071,2.628c0.136,0.056,0.247,0.187,0.215,0.371c-1.614,9.165-7.134,17.307-11.936,25.078
                                    c-2.26,3.657-4.291,7.464-7.11,10.735c-2.544,2.95-5.464,5.565-8.687,7.758c-12.423,8.451-27.756,11.256-42.391,13.114
                                    c-19.202,2.439-38.829,3.735-58.123,1.589c-8.779-0.977-17.462-2.717-25.933-5.231c-6.453-1.916-12.837-4.345-18.538-7.974
                                    c-5.523-3.514-10.308-8.018-14.239-13.25c-2.401-3.194-4.449-6.598-6.456-10.047c-2.375-4.085-4.507-8.293-6.033-12.773
                                    c-0.077-0.226,0.17-0.474,0.396-0.396c9.032,3.103,17.665,7.157,26.081,11.658c-4.243-3.88-8.453-7.796-12.449-11.938
                                    c-5.652-5.86-10.996-12.166-15.003-19.289c-4.137-7.355-7.292-15.402-10.032-23.368c-4.172-12.125-7.336-24.604-9.676-37.223
                                    c-1.82-6.938-3.298-13.974-4.598-21.001c-0.043-0.235,0.144-0.462,0.396-0.395c7.424,1.98,14.723,4.378,22.003,6.825
                                    c9.179,3.084,18.361,6.233,27.785,8.502c10.11,2.434,20.431,3.56,30.789,4.311c13.866,1.005,27.761,1.208,41.656,1.123
                                    c20.857-1.957,41.716-4.751,62.27-8.826c10.354-2.054,20.635-4.45,30.946-6.693c9.252-2.012,18.257-4.396,26.407-9.388
                                    c0.201-0.123,0.496,0.034,0.484,0.278c-0.289,5.482-3.105,10.724-5.738,15.415c-3.041,5.423-6.186,10.824-9.383,16.157
                                    C247.226,72.045,247.156,72.155,247.09,72.268z"/>
                                <path style="opacity:0.4;fill:#86739B;" d="M248.38,144.384c0,0,7.285-14.997,4.714-19.712c-2.571-4.714-7.712-15.426-4.714-21.854
                                    c1.257-2.694,6.432-16.689,12.018-32.034c-2.78,4.196-5.574,8.381-8.278,12.612c-5.232,8.186-9.92,16.69-15.346,24.755
                                    c-5.152,7.661-10.657,15.074-16.337,22.351c8.301-4.668,15.495-11.068,23.924-15.537c0.145-0.077,0.361-0.048,0.439,0.116
                                    c9.122,19.076-3.941,38.228-14.475,53.766c5.406-3.813,9.973-8.652,14.828-13.123c0.194-0.179,0.562-0.066,0.548,0.228
                                    c-0.222,4.704-0.708,9.416-1.596,14.044c-0.938,4.887-2.212,9.948-4.742,14.282c-2.297,3.937-5.545,6.383-9.8,7.969
                                    c-5.173,1.928-10.637,2.832-16.026,3.923c-4.268,0.864-8.448,2.1-12.693,3.071c-5.03,1.151-10.093,2.162-15.181,3.027
                                    c-9.887,1.684-19.846,2.907-29.828,3.858c-18.463,1.76-37.038,3.329-55.601,2.627c-9.143-0.345-18.293-1.197-27.277-2.962
                                    c-7.997-1.571-15.682-3.989-23.314-6.814c-2.92-1.08-5.837-2.257-8.569-3.759c-1.999-1.098-4.828-2.585-5.773-4.825
                                    c-0.887-2.1,0.168-4.768,0.872-6.774c0.923-2.623,2.012-5.2,3.249-7.691c0.08-0.163,0.293-0.19,0.44-0.114
                                    c4.809,2.475,8.68,6.62,13.71,8.663c-5.31-9.879-13.2-18.192-18.871-27.864c-5.173-8.818-9.312-19.757-2.992-29.105
                                    c0.099-0.146,0.281-0.208,0.44-0.115c1.795,1.038,3.494,2.19,5.033,3.527c-5.105-7.852-8.309-16.73-11.361-25.584
                                    c1.656,7.98,2.86,13.725,3.166,15.051c1.285,5.57-11.14,13.712-5.141,21.425c5.998,7.714,10.129,18.323,10.129,18.323
                                    s-13.986,29.241-13.986,41.238c0,0,0,4.285,3.858,1.715l4.285-2.142c0,0,57.419,14.139,102.412,13.711
                                    c44.992-0.428,123.408-12.854,123.408-12.854s8.57,5.571,8.999,2.143c0.429-3.429-4.285-8.142-4.285-8.142
                                    S255.665,153.382,248.38,144.384z"/>
                                <path style="fill:#613D65;" d="M260.167,20.226c0,0-163.05-15.536-235.895,5.032c0,0-20.14,3.855-11.569,8.998
                                    c8.569,5.142,56.563,19.28,112.696,23.139c42.583,2.928,118.861-15.384,140.203-24.188C286.944,24.4,273.238,21.621,260.167,20.226
                                    z"/>
                                <path style="fill:#734A77;" d="M255.823,20.854c0,0-156.973-14.608-227.102,4.733c0,0-22.02,3.513-13.77,8.348
                                    c8.251,4.834,57.086,18.245,111.125,21.873c40.997,2.752,114.432-14.468,134.978-22.746c7.076-2.853,13.415-4.834,13.891-6.52
                                    C275.853,23.333,264.074,21.715,255.823,20.854z"/>
                                <path style="fill:#4B2C4F;" d="M205.64,31.089c-16.278-0.707-32.592-0.862-48.883-0.964c-16.241-0.102-32.53-0.402-48.767,0.031
                                    c-15.972,0.426-31.562,3.402-47.076,7.058c-7.007,1.651-14.011,3.382-21.054,4.903c21.072,5.404,52.638,11.437,86.217,13.69
                                    c34.352,2.306,91.469-9.409,121.174-18.138C233.443,35.018,219.707,31.7,205.64,31.089z"/>
                                <path style="opacity:0.5;fill:#B473AA;" d="M153.787,71.856c0,0-71.988,3.214-103.483-10.927
                                    c-31.494-14.141-20.247,44.993,10.926,77.773c31.175,32.78,91.594,28.925,133.051-27.638
                                    C235.738,54.503,184.961,73.464,153.787,71.856z"/>
                                <path style="opacity:0.4;fill:#86739B;" d="M215.097,80.369c0,0-5.681-16.471-13.747-23.717l-3.725,0.645l-13.149,1.66
                                    c0,0-0.004,0.221-0.015,0.619l-0.233,0.04c0,0,0.082,0.14,0.221,0.379c-0.294,8.619-3.523,68.711-36.521,76.048
                                    c-35.56,7.907-44.12-19.436-49.058-36.235c-4.939-16.803-5.269-40.191-5.269-40.191l-17.122-2.964
                                    c-8.065,7.246-12.73,24.268-12.73,24.268c-3.183,6.972,1.701,11.146,6.639,12.134c4.941,0.986,10.044-6.589,10.044-6.589
                                    c0.055-0.203,0.117-0.417,0.182-0.63c5.59,26.32,18.461,61.531,47.561,65.691c46.095,6.589,64.205-40.354,67.497-57.485
                                    c0.509-2.644,0.997-5.357,1.46-8.056c0.064,0.218,0.13,0.437,0.186,0.645c0,0,3.294,7.247,10.125,6.425
                                    C212.441,92.449,218.279,87.344,215.097,80.369z"/>
                                <path style="opacity:0.5;fill:#B473AA;" d="M141.402,187.452c-9.138-2.544-18.176-5.443-27.3-8.041
                                    c-9.887-2.814-19.959-4.994-29.756-8.115c-8.753-2.79-17.371-5.981-26.107-8.824c3.344,3.197,6.955,6.042,10.808,8.581
                                    c0.876,0.688,1.729,1.36,2.53,2.019c6.978,5.725,15.482,9.465,23.973,12.352c9.18,3.122,18.102,5.225,27.8,5.903
                                    c6.44,0.45,12.882,0.04,19.309-0.2c3.78,0.287,7.564,0.317,11.339,0.041C149.854,189.755,145.599,188.621,141.402,187.452z"/>
                                <g>
                                    <g>
                                        <path style="fill:#F08C46;" d="M64.391,78.66c0,0,4.554-16.605,12.427-23.675l16.712,2.892c0,0-10.605,17.837-12.855,26.192
                                            c0,0-4.98,7.391-9.803,6.428C66.051,89.533,61.284,85.462,64.391,78.66z"/>
                                        <path style="fill:#F08C46;" d="M78.138,87.099c1.535-1.549,2.536-3.029,2.536-3.029c2.25-8.355,12.855-26.192,12.855-26.192
                                            l-16.712-2.892c-0.931,0.835-1.813,1.808-2.648,2.866C73.991,67.703,75.481,77.573,78.138,87.099z"/>
                                        <path style="fill:#F08C46;" d="M212.117,78.123c0,0-5.544-16.068-13.418-23.138l-16.712,2.892c0,0,10.525,17.997,12.775,26.353
                                            c0,0,3.215,7.07,9.883,6.268C209.526,89.908,215.225,84.927,212.117,78.123z"/>
                                        <path style="fill:#F08C46;" d="M195.172,84.991c2.246-8.979,3.905-18.108,6.315-27.041c-0.891-1.093-1.822-2.098-2.788-2.965
                                            l-16.712,2.892c0,0,10.525,17.997,12.775,26.353C194.763,84.229,194.903,84.531,195.172,84.991z"/>
                                    </g>
                                    <g>
                                        <path style="fill:#FFF67E;" d="M210.51,84.712c-0.127,0-0.257-0.024-0.382-0.079l-16.39-7.071
                                            c-0.489-0.209-0.714-0.776-0.504-1.266c0.211-0.488,0.776-0.716,1.268-0.504l16.391,7.07c0.488,0.211,0.714,0.778,0.503,1.267
                                            C211.238,84.494,210.882,84.712,210.51,84.712z"/>
                                        <path style="fill:#FFF67E;" d="M200.709,89.372c-0.101,0-0.202-0.016-0.304-0.048c-0.505-0.167-0.779-0.714-0.613-1.219
                                            l5.304-16.068c0.166-0.506,0.714-0.778,1.218-0.613c0.506,0.167,0.779,0.712,0.613,1.217l-5.303,16.069
                                            C201.49,89.115,201.113,89.372,200.709,89.372z"/>
                                        <g>
                                            <path style="fill:#FFF67E;" d="M64.712,84.712c-0.372,0-0.728-0.218-0.885-0.583c-0.211-0.488,0.014-1.056,0.503-1.267
                                                l16.391-7.07c0.489-0.212,1.056,0.016,1.268,0.504c0.21,0.489-0.016,1.057-0.504,1.266l-16.39,7.071
                                                C64.97,84.688,64.841,84.712,64.712,84.712z"/>
                                            <path style="fill:#FFF67E;" d="M74.514,89.372c-0.405,0-0.781-0.257-0.915-0.662l-5.303-16.069
                                                c-0.166-0.505,0.107-1.05,0.613-1.217c0.504-0.165,1.051,0.107,1.219,0.613l5.303,16.068c0.166,0.505-0.109,1.052-0.614,1.219
                                                C74.716,89.356,74.614,89.372,74.514,89.372z"/>
                                        </g>
                                    </g>
                                    <path style="fill:#F8C64C;" d="M76.817,54.985c0,0,4.47,85.986,50.456,92.556c44.993,6.428,62.669-39.368,65.883-56.081
                                        c3.214-16.711,5.624-36.314,5.624-36.314l-16.551,2.088c0,0-0.965,67.49-35.674,75.203c-34.709,7.714-43.064-18.961-47.885-35.351
                                        c-4.82-16.392-5.142-39.209-5.142-39.209L76.817,54.985z"/>
                                </g>
                                <path style="fill:#F8C64C;" d="M80.056,57.081c0,0,1.25,48.5,23,74s51.75,10.75,51.75,10.75s-22.25,8-38.5-2.5
                                    S87.306,109.581,80.056,57.081z"/>
                            </g>
                        </svg>
                        <div class="bag-fill-glow" id="bagFillGlow"></div>
                    </div>

                    <span class="bag-tagline">
                        <span class="line"></span> style your look <span class="line"></span>
                    </span>
                </div>

            </div>
        </div>

        <!-- ===== RIGHT: Morphing Auth Card ===== -->
        <div class="auth-card-wrapper">

            <div class="auth-card" id="authCard">

                <div id="authCardGlow" style="position:absolute; inset:0; border-radius:28px; background:radial-gradient(circle at 50% 50%, rgba(212,175,55,0.03), transparent 70%); pointer-events:none; opacity:0; transition:opacity 0.6s;"></div>

                <!-- ===== LOGIN FORM ===== -->
                <div id="loginFormContainer" style="width:100%; display:none;">
                    <div class="text-center mb-2">
                        <span class="auth-logo">
                            Optiq
                            <i class="fa-solid fa-glasses" style="font-size:1rem; color:rgba(212,175,55,0.3);"></i>
                        </span>
                    </div>
                    <h2 class="auth-heading" id="loginHeading">Welcome back</h2>
                    <p class="auth-subtext" id="loginSubtext">Sign in to your account</p>

                    <div id="loginFields">
                        <div class="auth-input-group" data-index="0">
                            <i class="bi bi-envelope input-icon"></i>
                            <input type="email" class="auth-input" placeholder="Email" id="loginEmail">
                        </div>
                        <div class="auth-input-group" data-index="1">
                            <i class="bi bi-lock input-icon"></i>
                            <input type="password" class="auth-input" placeholder="Password" id="loginPassword">
                            <button type="button" class="toggle-password" onclick="togglePassword(this)">
                                <i class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <button class="auth-btn" id="loginBtn">
                        <span class="btn-text">Sign In</span>
                    </button>

                    <div class="auth-switch">
                        New user? <a id="switchToRegister">Create account</a>
                    </div>
                </div>

                <!-- ===== REGISTER FORM ===== -->
                <div id="registerFormContainer" style="width:100%; display:block;">
                    <div class="text-center mb-2">
                        <span class="auth-logo">
                            Optiq
                            <i class="fa-solid fa-glasses" style="font-size:1rem; color:rgba(212,175,55,0.3);"></i>
                        </span>
                    </div>
                    <h2 class="auth-heading" id="registerHeading">Join the family</h2>
                    <p class="auth-subtext" id="registerSubtext">Create your Optiq account</p>

                    <div id="registerFields">
                        <div class="auth-input-group" data-index="0">
                            <i class="bi bi-person input-icon"></i>
                            <input type="text" class="auth-input" placeholder="Full Name" id="regName">
                        </div>
                        <div class="auth-input-group" data-index="1">
                            <i class="bi bi-envelope input-icon"></i>
                            <input type="email" class="auth-input" placeholder="Email" id="regEmail">
                        </div>
                        <div class="auth-input-group" data-index="2">
                            <i class="bi bi-phone input-icon"></i>
                            <input type="tel" class="auth-input" placeholder="Phone Number" id="regPhone">
                        </div>
                        <div class="auth-input-group" data-index="3">
                            <i class="bi bi-lock input-icon"></i>
                            <input type="password" class="auth-input" placeholder="Password" id="regPassword">
                            <button type="button" class="toggle-password" onclick="togglePassword(this)">
                                <i class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                        <div class="auth-input-group" data-index="4">
                            <i class="bi bi-shield-check input-icon"></i>
                            <input type="password" class="auth-input" placeholder="Confirm Password" id="regConfirm">
                            <button type="button" class="toggle-password" onclick="togglePassword(this)">
                                <i class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <button class="auth-btn" id="registerBtn">
                        <span class="btn-text">Create Account</span>
                    </button>

                    <div class="auth-switch">
                        Already a member? <a id="switchToLogin">Sign in</a>
                    </div>
                </div>

                <!-- Split Effect -->
                <div id="splitContainer">
                    <div class="split-half login-half" id="splitLeft" style="background:rgba(15,61,46,0.95); backdrop-filter:blur(16px);"></div>
                    <div class="split-half register-half" id="splitRight" style="background:rgba(15,61,46,0.95); backdrop-filter:blur(16px);"></div>
                </div>

            </div>
        </div>

    </div>
</section>

<?php include 'search-overlay.php'; ?>

<!-- ============================================================ -->
<!-- SCRIPTS – MORPHING + BAG ANIMATION                          -->
<!-- ============================================================ -->
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ============================================================
        // 1. ELEMENTS
        // ============================================================
        const loginContainer = document.getElementById('loginFormContainer');
        const registerContainer = document.getElementById('registerFormContainer');
        const switchToRegister = document.getElementById('switchToRegister');
        const switchToLogin = document.getElementById('switchToLogin');
        const authCardEl = document.getElementById('authCard');
        const splitContainer = document.getElementById('splitContainer');
        const splitLeft = document.getElementById('splitLeft');
        const splitRight = document.getElementById('splitRight');

        // ============================================================
        // 2. BAG ANIMATION – Runs continuously
        // ============================================================
        const svgBagWrapper = document.getElementById('svgBagWrapper');
        const bagFillGlow = document.getElementById('bagFillGlow');
        const lensRing = document.getElementById('floatingLensRing');

        let isBagAnimating = false;
        let bagAnimationInterval = null;

        function animateBagOpenClose() {
            if (isBagAnimating) return;
            isBagAnimating = true;

            const lensRect = lensRing.getBoundingClientRect();
            const bagRect = svgBagWrapper.getBoundingClientRect();

            const flyLens = document.createElement('img');
            const lensImages = document.querySelectorAll('#floatingLensRing .lens-item');
            const randomLens = lensImages[Math.floor(Math.random() * lensImages.length)];
            flyLens.src = randomLens.src;
            flyLens.className = 'flying-lens';
            flyLens.style.left = (lensRect.left + lensRect.width / 2 - 18) + 'px';
            flyLens.style.top = (lensRect.top + lensRect.height / 2 - 18) + 'px';
            flyLens.style.transform = 'scale(0.3)';
            flyLens.style.opacity = '0';
            document.body.appendChild(flyLens);

            const tl = gsap.timeline();

            tl.to(svgBagWrapper, {
                scale: 1.1,
                rotation: 0,
                duration: 0.3,
                ease: 'back.out(1.7)'
            });

            tl.to(flyLens, {
                opacity: 1,
                scale: 1.2,
                duration: 0.3,
                ease: 'power2.out'
            }, '+=0.1');

            tl.to(flyLens, {
                left: bagRect.left + bagRect.width / 2 - 18 + 'px',
                top: bagRect.top + bagRect.height / 2 - 18 + 'px',
                scale: 0.2,
                opacity: 0.4,
                duration: 0.5,
                ease: 'power2.in',
                onComplete: () => {
                    flyLens.remove();
                    bagFillGlow.classList.add('active');
                }
            }, '+=0.2');

            tl.to(svgBagWrapper, {
                scale: 1,
                duration: 0.3,
                ease: 'back.out(1.7)'
            }, '+=0.1');

            tl.to(svgBagWrapper, {
                scale: 1.12,
                duration: 0.15,
                ease: 'power2.out'
            }, '+=0.05');

            tl.to(svgBagWrapper, {
                scale: 1,
                duration: 0.2,
                ease: 'back.out(1.7)',
                onComplete: () => {
                    isBagAnimating = false;
                    setTimeout(() => {
                        bagFillGlow.classList.remove('active');
                    }, 500);
                }
            }, '+=0.05');
        }

        function startBagAnimation() {
            if (bagAnimationInterval) return;
            animateBagOpenClose();
            bagAnimationInterval = setInterval(animateBagOpenClose, 4000);
        }

        // ============================================================
        // 3. PASSWORD TOGGLE
        // ============================================================
        window.togglePassword = function(btn) {
            const group = btn.closest('.auth-input-group');
            if (!group) return;
            const input = group.querySelector('.auth-input');
            if (!input) return;
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            }
        };

        // ============================================================
        // 4. STAGED FIELD ANIMATION
        // ============================================================
        function stageFormFields(containerId) {
            const container = document.getElementById(containerId);
            if (!container) return;
            const fields = container.querySelectorAll('.auth-input-group');
            fields.forEach((f, i) => {
                f.style.opacity = '0';
                f.style.transform = 'translateY(15px)';
                setTimeout(() => {
                    gsap.to(f, {
                        opacity: 1,
                        y: 0,
                        duration: 0.4,
                        ease: 'power2.out',
                        delay: i * 0.06
                    });
                }, 100);
            });
        }

        // ============================================================
        // 5. MORPHING – Login ↔ Register
        // ============================================================
        let isRegister = true; // default state

        function morphToRegister() {
            if (isRegister) return;

            const loginFields = document.querySelectorAll('#loginFields .auth-input-group');
            const registerFields = document.querySelectorAll('#registerFields .auth-input-group');

            registerFields.forEach(f => {
                f.style.opacity = '0';
                f.style.transform = 'translateY(20px)';
            });

            gsap.to(loginContainer, {
                opacity: 0,
                y: -10,
                duration: 0.3,
                ease: 'power2.in',
                onComplete: () => {
                    loginContainer.style.display = 'none';
                    registerContainer.style.display = 'block';

                    gsap.fromTo(registerContainer, {
                        opacity: 0,
                        y: 20
                    }, {
                        opacity: 1,
                        y: 0,
                        duration: 0.4,
                        ease: 'power2.out'
                    });

                    registerFields.forEach((f, i) => {
                        setTimeout(() => {
                            gsap.to(f, {
                                opacity: 1,
                                y: 0,
                                duration: 0.4,
                                ease: 'power2.out'
                            });
                        }, 120 + i * 70);
                    });

                    const btn = document.getElementById('registerBtn').querySelector('.btn-text');
                    btn.textContent = 'Create Account';

                    const glow = document.getElementById('authCardGlow');
                    glow.style.opacity = '0.6';
                    setTimeout(() => { glow.style.opacity = '0'; }, 800);

                    isRegister = true;
                }
            });

            gsap.to(authCardEl, {
                scale: 0.96,
                duration: 0.3,
                ease: 'power2.out'
            });
            setTimeout(() => {
                gsap.to(authCardEl, {
                    scale: 1,
                    duration: 0.4,
                    ease: 'back.out(1.5)'
                });
            }, 500);
        }

        function morphToLogin() {
            if (!isRegister) return;

            const loginFields = document.querySelectorAll('#loginFields .auth-input-group');
            const registerFields = document.querySelectorAll('#registerFields .auth-input-group');

            loginFields.forEach(f => {
                f.style.opacity = '0';
                f.style.transform = 'translateY(20px)';
            });

            gsap.to(registerContainer, {
                opacity: 0,
                y: -10,
                duration: 0.3,
                ease: 'power2.in',
                onComplete: () => {
                    registerContainer.style.display = 'none';
                    loginContainer.style.display = 'block';

                    gsap.fromTo(loginContainer, {
                        opacity: 0,
                        y: 20
                    }, {
                        opacity: 1,
                        y: 0,
                        duration: 0.4,
                        ease: 'power2.out'
                    });

                    loginFields.forEach((f, i) => {
                        setTimeout(() => {
                            gsap.to(f, {
                                opacity: 1,
                                y: 0,
                                duration: 0.4,
                                ease: 'power2.out'
                            });
                        }, 120 + i * 70);
                    });

                    const btn = document.getElementById('loginBtn').querySelector('.btn-text');
                    btn.textContent = 'Sign In';

                    const glow = document.getElementById('authCardGlow');
                    glow.style.opacity = '0.6';
                    setTimeout(() => { glow.style.opacity = '0'; }, 800);

                    isRegister = false;
                }
            });

            gsap.to(authCardEl, {
                scale: 0.96,
                duration: 0.3,
                ease: 'power2.out'
            });
            setTimeout(() => {
                gsap.to(authCardEl, {
                    scale: 1,
                    duration: 0.4,
                    ease: 'back.out(1.5)'
                });
            }, 500);
        }

        // ============================================================
        // 6. EVENT LISTENERS
        // ============================================================
        switchToRegister.addEventListener('click', function(e) {
            e.preventDefault();
            morphToRegister();
        });

        switchToLogin.addEventListener('click', function(e) {
            e.preventDefault();
            morphToLogin();
        });

        // ============================================================
        // 7. INITIALIZATION
        // ============================================================

        // Auth card entrance
        setTimeout(() => {
            authCardEl.classList.add('visible');
        }, 400);

        // Stage register fields (default)
        setTimeout(() => {
            stageFormFields('registerFields');
        }, 600);

        // Start bag animation (runs forever)
        setTimeout(startBagAnimation, 800);

        // Bento grid stagger reveal
        const bentoItems = document.querySelectorAll('.glass-card');
        bentoItems.forEach((item, idx) => {
            setTimeout(() => {
                item.classList.add('visible');
            }, 200 + idx * 80);
        });

        console.log('✅ Login/Register loaded – side-by-side on desktop, stacked on mobile');
        console.log('🔄 Morphing only the form on the right');

        // ============================================================
        // 8. LOGIN / REGISTER FORM SUBMISSIONS
        // ============================================================

        document.getElementById('loginBtn').addEventListener('click', function() {
            const email = document.getElementById('loginEmail').value.trim();
            const password = document.getElementById('loginPassword').value;

            if (!email || !password) {
                alert('Please fill in all fields.');
                return;
            }

            const users = JSON.parse(localStorage.getItem('users')) || [];
            const user = users.find(u => u.email === email);

            if (!user) {
                alert('No account found with this email.');
                return;
            }

            if (user.password !== password) {
                alert('Incorrect password.');
                return;
            }

            const currentUser = {
                id: user.id,
                fullName: user.fullName,
                email: user.email,
                phone: user.phone
            };
            localStorage.setItem('currentUser', JSON.stringify(currentUser));

            const btn = this.querySelector('.btn-text');
            btn.textContent = '✅ Signed In';
            btn.style.color = '#0F3D2E';

            setTimeout(() => {
                window.location.href = 'index.php';
            }, 1200);
        });

        document.getElementById('registerBtn').addEventListener('click', function() {
            const name = document.getElementById('regName').value.trim();
            const email = document.getElementById('regEmail').value.trim();
            const phone = document.getElementById('regPhone').value.trim();
            const password = document.getElementById('regPassword').value;
            const confirm = document.getElementById('regConfirm').value;

            if (!name || !email || !password || !confirm) {
                alert('Please fill in all required fields.');
                return;
            }

            if (password !== confirm) {
                alert('Passwords do not match.');
                return;
            }

            if (password.length < 8) {
                alert('Password must be at least 8 characters.');
                return;
            }

            let users = JSON.parse(localStorage.getItem('users')) || [];
            if (users.some(u => u.email === email)) {
                alert('Email already registered. Please sign in.');
                return;
            }

            const newUser = {
                id: Date.now().toString(),
                fullName: name,
                email: email,
                phone: phone,
                password: password
            };

            users.push(newUser);
            localStorage.setItem('users', JSON.stringify(users));

            const currentUser = {
                id: newUser.id,
                fullName: newUser.fullName,
                email: newUser.email,
                phone: newUser.phone
            };
            localStorage.setItem('currentUser', JSON.stringify(currentUser));

            const btn = this.querySelector('.btn-text');
            btn.textContent = '✅ Created!';
            btn.style.color = '#0F3D2E';

            setTimeout(() => {
                window.location.href = 'index.php';
            }, 1200);
        });

        document.querySelectorAll('.auth-input').forEach(input => {
            input.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    const container = this.closest('[id$="FormContainer"]');
                    if (container) {
                        const btn = container.querySelector('.auth-btn');
                        if (btn) btn.click();
                    }
                }
            });
        });
    });
</script>

<?php include 'templates/footer.php'; ?>
</body>
</html>