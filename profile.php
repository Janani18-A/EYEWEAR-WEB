<?php
// profile.php – Premium Profile with Centered Modal (White, no glass) – BOOTSTRAP RESPONSIVE
include 'templates/header.php'; 
?>

<!-- ============================================================ -->
<!-- Custom Styles (only design – layout replaced by Bootstrap)   -->
<!-- ============================================================ -->
<style>
    /* ─── Global Section Spacing ────────────────────────────── */
    .section-title {
        font-weight: 700;
        font-size: clamp(1rem, 1.5vw, 1.1rem);
        color: var(--dark);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .section-title i { color: var(--accent); font-size: 1.2rem; }
    .section-title .view-all {
        margin-left: auto;
        font-size: clamp(0.7rem, 1vw, 0.8rem);
        font-weight: 600;
        color: var(--primary);
        text-decoration: none;
        cursor: pointer;
    }
    .section-title .view-all:hover { text-decoration: underline; }

    /* ─── Profile Header ────────────────────────────────────── */
    .profile-header {
        background: var(--white);
        border-radius: 24px;
        padding: 1.8rem 1.5rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.04);
        border: 1px solid var(--lightgray);
        position: relative;
        overflow: hidden;
    }
    .profile-header::before {
        content: '';
        position: absolute;
        inset: -50%;
        background: radial-gradient(ellipse at 70% 20%, rgba(200,169,81,0.04), transparent 50%);
        pointer-events: none;
    }
    .profile-avatar {
        width: clamp(64px, 10vw, 80px);
        height: clamp(64px, 10vw, 80px);
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--accent);
        box-shadow: 0 4px 16px rgba(200,169,81,0.2);
        flex-shrink: 0;
    }
    .profile-name {
        font-size: clamp(1.1rem, 2vw, 1.3rem);
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.1rem;
    }
    .profile-email, .profile-phone {
        font-size: clamp(0.75rem, 1vw, 0.85rem);
        color: var(--muted);
        margin-bottom: 0.1rem;
    }
    .profile-email i, .profile-phone i { color: var(--accent); width: 18px; }
    .member-since {
        font-size: clamp(0.65rem, 0.9vw, 0.75rem);
        color: var(--muted);
    }
    .premium-badge-sm {
        background: var(--accent);
        color: var(--dark);
        font-size: clamp(0.5rem, 0.8vw, 0.6rem);
        font-weight: 700;
        padding: 0.2rem 0.8rem;
        border-radius: 30px;
        display: inline-block;
        letter-spacing: 0.03em;
    }
    .profile-actions {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        margin-top: 0.8rem;
    }
    .profile-actions .btn-glass-sm {
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(4px);
        border: 1px solid rgba(200,169,81,0.25);
        color: var(--dark);
        font-size: clamp(0.65rem, 0.9vw, 0.75rem);
        font-weight: 600;
        padding: 0.3rem 1rem;
        border-radius: 30px;
        transition: all 0.3s ease;
    }
    .profile-actions .btn-glass-sm:hover {
        background: rgba(255,255,255,0.15);
        border-color: var(--accent);
        transform: translateY(-2px);
    }

    /* ─── Profile Completion ────────────────────────────────── */
    .completion-card {
        background: var(--white);
        border-radius: 16px;
        padding: 1.2rem 1.5rem;
        border: 1px solid var(--lightgray);
        display: flex;
        align-items: center;
        gap: 1.5rem;
        flex-wrap: wrap;
    }
    .completion-ring { width: 60px; height: 60px; flex-shrink: 0; }
    .completion-ring svg { transform: rotate(-90deg); }
    .completion-ring .ring-bg { fill: none; stroke: var(--lightgray); stroke-width: 6; }
    .completion-ring .ring-fill {
        fill: none;
        stroke: var(--accent);
        stroke-width: 6;
        stroke-linecap: round;
        transition: stroke-dashoffset 0.8s ease;
    }
    .completion-ring .ring-text { font-size: 0.7rem; font-weight: 700; fill: var(--dark); }
    .completion-tasks {
        display: flex;
        gap: 1.2rem;
        flex-wrap: wrap;
        flex: 1;
    }
    .completion-tasks .task {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        font-size: clamp(0.7rem, 1vw, 0.8rem);
        color: var(--muted);
        font-weight: 500;
    }
    .completion-tasks .task.done { color: #22c55e; }
    .completion-tasks .task i { font-size: 1rem; }
    .completion-tasks .task.done i { color: #22c55e; }

    /* ─── Order / Wishlist Cards ───────────────────────────── */
    .item-scroll {
        display: flex;
        gap: 1rem;
        overflow-x: auto;
        padding: 0.2rem 0.1rem 0.8rem;
        scrollbar-width: thin;
        scrollbar-color: var(--accent) var(--lightgray);
    }
    .item-scroll::-webkit-scrollbar { height: 4px; }
    .item-scroll::-webkit-scrollbar-track { background: var(--lightgray); border-radius: 10px; }
    .item-scroll::-webkit-scrollbar-thumb { background: var(--accent); border-radius: 10px; }
    .item-card-sm {
        min-width: clamp(100px, 20vw, 140px);
        max-width: clamp(120px, 25vw, 160px);
        background: var(--white);
        border-radius: 16px;
        padding: clamp(0.5rem, 1.2vw, 0.8rem);
        border: 1px solid var(--lightgray);
        transition: transform 0.2s, box-shadow 0.2s;
        flex-shrink: 0;
        text-align: center;
    }
    .item-card-sm:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(0,0,0,0.06); }
    .item-card-sm .item-img {
        width: 100%;
        aspect-ratio: 1/1;
        object-fit: cover;
        border-radius: 12px;
        background: var(--lightgray);
        margin-bottom: 0.4rem;
    }
    .item-card-sm .item-name {
        font-size: clamp(0.65rem, 0.9vw, 0.75rem);
        font-weight: 600;
        color: var(--dark);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .item-card-sm .item-price {
        font-size: clamp(0.7rem, 1vw, 0.8rem);
        font-weight: 700;
        color: var(--primary);
    }
    .item-card-sm .item-status {
        font-size: clamp(0.5rem, 0.7vw, 0.6rem);
        font-weight: 600;
        padding: 0.1rem 0.5rem;
        border-radius: 30px;
        display: inline-block;
        margin-top: 0.2rem;
    }
    .item-status.delivered { background: #d4edda; color: #155724; }
    .item-status.processing { background: #fff3cd; color: #856404; }
    .item-status.cancelled { background: #f8d7da; color: #721c24; }

    /* ─── Address Cards ────────────────────────────────────── */
    .address-card {
        background: var(--white);
        border-radius: 16px;
        padding: 1rem 1.2rem;
        border: 1px solid var(--lightgray);
        transition: border-color 0.2s, box-shadow 0.2s;
        margin-bottom: 0.8rem;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 0.5rem;
    }
    .address-card:hover { border-color: var(--accent); box-shadow: 0 4px 16px rgba(200,169,81,0.08); }
    .address-card .addr-type {
        font-size: clamp(0.55rem, 0.8vw, 0.65rem);
        font-weight: 700;
        background: var(--primary);
        color: var(--white);
        padding: 0.15rem 0.7rem;
        border-radius: 30px;
        display: inline-block;
        letter-spacing: 0.03em;
    }
    .address-card .addr-type.work { background: var(--muted); }
    .address-card .addr-default {
        font-size: clamp(0.5rem, 0.7vw, 0.6rem);
        font-weight: 600;
        background: var(--accent);
        color: var(--dark);
        padding: 0.1rem 0.5rem;
        border-radius: 30px;
        margin-left: 0.5rem;
    }
    .address-card .addr-name { font-weight: 600; color: var(--dark); margin-bottom: 0.1rem; }
    .address-card .addr-detail {
        font-size: clamp(0.7rem, 0.9vw, 0.8rem);
        color: var(--muted);
        margin-bottom: 0.1rem;
    }
    .address-card .addr-actions {
        display: flex;
        gap: 0.4rem;
        flex-wrap: wrap;
    }
    .address-card .addr-actions button {
        font-size: clamp(0.55rem, 0.8vw, 0.65rem);
        padding: 0.15rem 0.7rem;
        border-radius: 30px;
        border: 1px solid var(--lightgray);
        background: transparent;
        transition: all 0.2s;
        font-weight: 500;
    }
    .address-card .addr-actions button:hover { border-color: var(--accent); background: rgba(200,169,81,0.08); }
    .address-card .addr-actions button.danger:hover { border-color: #dc3545; background: rgba(220,53,69,0.08); color: #dc3545; }

    /* ─── Settings Accordion ────────────────────────────────── */
    .settings-accordion .accordion-item {
        border: none;
        border-bottom: 1px solid var(--lightgray);
        background: transparent;
    }
    .settings-accordion .accordion-button {
        background: transparent;
        box-shadow: none;
        padding: 0.8rem 0;
        font-weight: 600;
        color: var(--dark);
        font-size: clamp(0.85rem, 1.2vw, 0.95rem);
        border: none;
    }
    .settings-accordion .accordion-button:focus { box-shadow: none; }
    .settings-accordion .accordion-button:not(.collapsed) {
        background: transparent;
        color: var(--primary);
    }
    .settings-accordion .accordion-button i {
        color: var(--accent);
        width: 24px;
        font-size: 1.1rem;
    }
    .settings-accordion .accordion-button::after {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chevron-down' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
        background-size: 14px;
        transition: transform 0.3s;
    }
    .settings-accordion .accordion-button:not(.collapsed)::after { transform: rotate(180deg); }
    .settings-accordion .accordion-body {
        padding: 0 0 1rem 2.2rem;
    }
    .settings-accordion .accordion-body .setting-item {
        padding: 0.4rem 0;
        font-size: clamp(0.75rem, 1vw, 0.85rem);
        color: var(--muted);
        cursor: default;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        border-bottom: 1px solid rgba(0,0,0,0.02);
    }
    .settings-accordion .accordion-body .setting-item i {
        color: var(--accent);
        width: 18px;
        font-size: 0.85rem;
    }
    .settings-accordion .accordion-body .setting-item .toggle { margin-left: auto; }
    .settings-accordion .accordion-body .setting-item .toggle .form-check-input {
        cursor: pointer;
    }
    .settings-accordion .accordion-body .setting-item .toggle .form-check-input:checked {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    /* ─── Personal Info accordion header – click opens modal ── */
    .personal-info-trigger {
        cursor: pointer;
        transition: color 0.2s;
    }
    .personal-info-trigger:hover {
        color: var(--primary);
    }

    /* ─── Contact Support Card ──────────────────────────────── */
    .support-card {
        background: var(--white);
        border-radius: 16px;
        padding: 1.2rem;
        border: 1px solid var(--lightgray);
        text-align: center;
        margin-top: 0.5rem;
    }
    .support-card .support-icon { font-size: 2.5rem; color: var(--accent); }
    .support-card .support-email, .support-card .support-phone {
        font-size: clamp(0.8rem, 1vw, 0.9rem);
        color: var(--dark);
        margin: 0.2rem 0;
    }
    .support-card .support-email i, .support-card .support-phone i {
        color: var(--accent);
        width: 24px;
    }

    /* ─── Centered Modal (White, no glass) ──────────────────── */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.3);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        z-index: 1050;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    .modal-overlay.show {
        display: flex;
        opacity: 1;
    }
    .modal-box {
        background: var(--white);
        border-radius: 24px;
        padding: clamp(1.2rem, 3vw, 2rem);
        max-width: 480px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 30px 80px rgba(0,0,0,0.12);
        transform: scale(0.92) translateY(20px);
        transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .modal-overlay.show .modal-box {
        transform: scale(1) translateY(0);
    }
    .modal-box .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
        padding-bottom: 0.8rem;
        border-bottom: 1px solid var(--lightgray);
    }
    .modal-box .modal-header h5 {
        font-weight: 700;
        color: var(--dark);
        margin: 0;
        font-size: clamp(1rem, 1.5vw, 1.2rem);
    }
    .modal-box .modal-close {
        font-size: 1.6rem;
        cursor: pointer;
        color: var(--muted);
        background: none;
        border: none;
        padding: 0;
        transition: transform 0.3s, color 0.3s;
        line-height: 1;
    }
    .modal-box .modal-close:hover {
        transform: rotate(90deg);
        color: var(--dark);
    }
    .modal-box .modal-body {
        color: var(--dark);
    }
    .modal-box .modal-body label {
        font-size: clamp(0.65rem, 0.9vw, 0.75rem);
        font-weight: 600;
        color: var(--muted);
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }
    .modal-box .modal-body .form-control,
    .modal-box .modal-body .form-select {
        background: var(--cream);
        border: 1px solid var(--lightgray);
        border-radius: 12px;
        color: var(--dark);
        padding: 0.6rem 1rem;
        font-size: clamp(0.85rem, 1.1vw, 0.95rem);
        transition: border-color 0.3s, box-shadow 0.3s;
    }
    .modal-box .modal-body .form-control:focus,
    .modal-box .modal-body .form-select:focus {
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(200,169,81,0.12);
        background: var(--white);
    }
    .modal-box .modal-body .form-control::placeholder {
        color: var(--muted);
    }
    .modal-box .btn-modal {
        background: var(--primary);
        color: var(--white);
        font-weight: 600;
        padding: 0.6rem 1.5rem;
        border-radius: 30px;
        width: 100%;
        border: none;
        transition: all 0.3s ease;
        font-size: clamp(0.85rem, 1.1vw, 0.95rem);
    }
    .modal-box .btn-modal:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(15,61,46,0.2);
        color: var(--white);
    }

    /* ─── Toast ────────────────────────────────────────────── */
    .toast-container {
        position: fixed;
        top: 80px;
        right: 20px;
        z-index: 2000;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        max-width: 380px;
        width: 90%;
    }
    .toast-message {
        background: var(--dark);
        color: var(--white);
        padding: 0.8rem 1.2rem;
        border-radius: 16px;
        font-weight: 500;
        font-size: clamp(0.75rem, 1vw, 0.85rem);
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        opacity: 0;
        transform: translateX(40px);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }
    .toast-message.show { opacity: 1; transform: translateX(0); }
    .toast-message .toast-icon { font-size: 1.2rem; }
    .toast-message.success .toast-icon { color: #22c55e; }
    .toast-message.error .toast-icon { color: #ef4444; }
    .toast-message.info .toast-icon { color: var(--accent); }

    /* ─── Notification Dropdown ────────────────────────────── */
    .notif-dropdown {
        position: absolute;
        right: 0;
        top: 40px;
        background: var(--white);
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.12);
        width: clamp(260px, 60vw, 320px);
        max-height: 320px;
        overflow-y: auto;
        padding: 1rem;
        display: none;
        z-index: 1000;
        border: 1px solid var(--lightgray);
    }
    .notif-dropdown.show { display: block; }
    .notif-dropdown .notif-item {
        padding: 0.6rem 0;
        border-bottom: 1px solid var(--lightgray);
        font-size: clamp(0.75rem, 1vw, 0.85rem);
    }
    .notif-dropdown .notif-item:last-child { border-bottom: none; }
    .notif-dropdown .notif-item .time {
        font-size: clamp(0.6rem, 0.8vw, 0.7rem);
        color: var(--muted);
    }
    .notif-dropdown .notif-item.unread { font-weight: 600; }

    /* ─── Responsive ───────────────────────────────────────── */
    @media (max-width: 575.98px) {
        .profile-header { padding: 1rem; }
        .completion-card { flex-direction: column; align-items: stretch; gap: 1rem; }
        .completion-tasks { justify-content: center; }
        .address-card { flex-direction: column; }
        .address-card .addr-actions { width: 100%; justify-content: flex-start; }
        .notif-dropdown { right: -20px; }
        .modal-box { padding: 1.2rem; border-radius: 20px; }
    }
    @media (max-width: 480px) {
        .profile-actions .btn-glass-sm { font-size: 0.6rem; padding: 0.15rem 0.6rem; }
        .profile-avatar { width: 56px; height: 56px; }
        .profile-name { font-size: 1rem; }
        .notif-dropdown { width: 240px; right: -30px; max-height: 260px; }
        .toast-container { top: 70px; right: 10px; max-width: 92%; }
    }
</style>

<!-- ============================================================ -->
<!-- MAIN PROFILE CONTENT (Bootstrap grid & classes)              -->
<!-- ============================================================ -->
<div class="container py-3 py-md-4" id="mainContainer">

    <!-- ─── TOP BAR ──────────────────────────────────────────── -->
    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
        <div class="d-flex align-items-center gap-3">
            <a href="index.php" class="text-dark text-decoration-none fs-4"><i class="bi bi-arrow-left"></i></a>
            <h5 class="fw-bold mb-0" style="color: var(--primary); font-size: clamp(1.1rem, 2vw, 1.3rem);">My Profile</h5>
        </div>
        <div class="d-flex gap-3 align-items-center position-relative">
            <span class="position-relative" id="notificationBell" style="cursor:pointer;">
                <i class="bi bi-bell fs-5"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background:var(--accent);color:var(--dark);font-size:0.55rem;padding:0.15rem 0.4rem;" id="notifBadge">3</span>
                <div class="notif-dropdown" id="notifDropdown">
                    <h6 class="fw-bold mb-2">Notifications</h6>
                    <div id="notifList"></div>
                </div>
            </span>
            <i class="bi bi-gear fs-5 text-dark" style="cursor:pointer;" onclick="openModal('settings')"></i>
        </div>
    </div>

    <!-- ─── PROFILE OVERVIEW ────────────────────────────────── -->
    <section class="mb-4">
        <div class="profile-header" id="profileOverview">
            <div class="d-flex align-items-start gap-3 flex-wrap">
                <img src="https://i.pravatar.cc/200?img=11" alt="Avatar" class="profile-avatar" id="profileAvatar" />
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <h4 class="profile-name" id="profileName">Janani A</h4>
                        <span class="premium-badge-sm">✦ GOLD</span>
                    </div>
                    <div class="profile-email"><i class="bi bi-envelope"></i> <span id="profileEmail">janani@optiq.com</span></div>
                    <div class="profile-phone"><i class="bi bi-phone"></i> <span id="profilePhone">+91 98765 43210</span></div>
                    <div class="member-since">Member since <span id="memberSince">Jan 2024</span></div>
                    <div class="profile-actions">
                        <button class="btn-glass-sm" onclick="openModal('profile')"><i class="bi bi-pencil me-1"></i> Edit</button>
                        <button class="btn-glass-sm" onclick="showToast('Share profile link copied!', 'success')"><i class="bi bi-share me-1"></i> Share</button>
                        <button class="btn-glass-sm text-danger" onclick="logout()"><i class="bi bi-box-arrow-right me-1"></i> Logout</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── PROFILE COMPLETION ──────────────────────────────── -->
    <section class="mb-4" id="completionSection">
        <div class="completion-card">
            <div class="completion-ring">
                <svg viewBox="0 0 60 60" width="60" height="60">
                    <circle class="ring-bg" cx="30" cy="30" r="24" />
                    <circle class="ring-fill" cx="30" cy="30" r="24"
                            stroke-dasharray="150.8"
                            stroke-dashoffset="45.24" id="completionRing" />
                    <text class="ring-text" x="30" y="34" text-anchor="middle" id="completionText">70%</text>
                </svg>
            </div>
            <div class="completion-tasks" id="completionTasks">
                <span class="task done"><i class="bi bi-check-circle-fill"></i> Email</span>
                <span class="task done"><i class="bi bi-check-circle-fill"></i> Phone</span>
                <span class="task"><i class="bi bi-circle"></i> Address</span>
                <span class="task"><i class="bi bi-circle"></i> Prescription</span>
            </div>
        </div>
    </section>

    <!-- ─── MY ORDERS ────────────────────────────────────────── -->
    <section class="mb-4">
        <div class="section-title">
            <i class="bi bi-box-seam"></i> My Orders
            <span class="view-all" onclick="redirectTo('orders.php')">View All <i class="bi bi-arrow-right"></i></span>
        </div>
        <div class="item-scroll" id="ordersScroll"><!-- Rendered by JS --></div>
    </section>

    <!-- ─── WISHLIST ─────────────────────────────────────────── -->
    <section class="mb-4">
        <div class="section-title">
            <i class="bi bi-heart"></i> Wishlist
            <span class="view-all" onclick="redirectTo('wishlist.php')">View All <i class="bi bi-arrow-right"></i></span>
        </div>
        <div class="item-scroll" id="wishlistScroll"><!-- Rendered by JS --></div>
    </section>

    <!-- ─── SAVED ADDRESSES ──────────────────────────────────── -->
    <section class="mb-4">
        <div class="section-title">
            <i class="bi bi-geo-alt"></i> Saved Addresses
            <span class="view-all" onclick="openModal('addAddress')"><i class="bi bi-plus-circle"></i> Add New</span>
        </div>
        <div id="addressesContainer"><!-- Rendered by JS --></div>
    </section>

    <!-- ─── ACCOUNT SETTINGS ─────────────────────────────────── -->
    <section class="mb-4">
        <div class="section-title"><i class="bi bi-gear"></i> Account Settings</div>
        <div class="settings-accordion accordion" id="settingsAccordion">

            <!-- Personal Information – Click directly opens modal -->
            <div class="accordion-item">
                <div class="accordion-header">
                    <button class="accordion-button collapsed personal-info-trigger" type="button" onclick="openModal('profile')" style="background:transparent; border:none; width:100%; text-align:left; padding:0.8rem 0; font-weight:600; color:var(--dark); font-size:clamp(0.85rem, 1.2vw, 0.95rem);">
                        <i class="bi bi-person" style="color:var(--accent); width:24px; font-size:1.1rem;"></i> Personal Information
                    </button>
                </div>
                <!-- No collapse body -->
            </div>

            <!-- Security -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#security">
                        <i class="bi bi-lock"></i> Security
                    </button>
                </h2>
                <div id="security" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                    <div class="accordion-body">
                        <div class="setting-item"><i class="bi bi-key"></i> Change Password</div>
                        <div class="setting-item">
                            <i class="bi bi-shield-check"></i> Two Factor Authentication
                            <span class="toggle"><input class="form-check-input" type="checkbox" checked /></span>
                        </div>
                        <div class="setting-item"><i class="bi bi-clock-history"></i> Login Activity</div>
                        <div class="setting-item"><i class="bi bi-box-arrow-right"></i> Logout All Devices</div>
                    </div>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#payments">
                        <i class="bi bi-credit-card"></i> Payment Methods
                    </button>
                </h2>
                <div id="payments" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                    <div class="accordion-body">
                        <div class="setting-item"><i class="bi bi-upc-scan"></i> Saved UPI IDs
                            <span style="margin-left:auto; font-size:0.8rem; color:var(--dark);">janani@okaxis, janani@paytm</span>
                        </div>
                        <div class="setting-item"><i class="bi bi-credit-card"></i> Saved Cards
                            <span style="margin-left:auto; font-size:0.8rem; color:var(--dark);">•••• 4567 (Visa)</span>
                        </div>
                        <div class="setting-item"><i class="bi bi-wallet2"></i> Saved Wallets
                            <span style="margin-left:auto; font-size:0.8rem; color:var(--dark);">Paytm, Amazon Pay</span>
                        </div>
                        <div class="setting-item"><i class="bi bi-trash"></i> Remove Payment Method</div>
                    </div>
                </div>
            </div>

            <!-- Notifications -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#notifications">
                        <i class="bi bi-bell"></i> Notifications
                    </button>
                </h2>
                <div id="notifications" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                    <div class="accordion-body">
                        <div class="setting-item">
                            <i class="bi bi-box-seam"></i> Order Updates
                            <span class="toggle"><input class="form-check-input" type="checkbox" checked /></span>
                        </div>
                        <div class="setting-item">
                            <i class="bi bi-tag"></i> Offers & Discounts
                            <span class="toggle"><input class="form-check-input" type="checkbox" /></span>
                        </div>
                        <div class="setting-item">
                            <i class="bi bi-stars"></i> New Arrivals
                            <span class="toggle"><input class="form-check-input" type="checkbox" checked /></span>
                        </div>
                        <div class="setting-item">
                            <i class="bi bi-heart"></i> Wishlist Alerts
                            <span class="toggle"><input class="form-check-input" type="checkbox" checked /></span>
                        </div>
                        <div class="setting-item"><i class="bi bi-envelope"></i> SMS / Email Preferences</div>
                    </div>
                </div>
            </div>

            <!-- Privacy Settings -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacy">
                        <i class="bi bi-shield-lock"></i> Privacy Settings
                    </button>
                </h2>
                <div id="privacy" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                    <div class="accordion-body">
                        <div class="setting-item"><i class="bi bi-sliders"></i> Data Preferences</div>
                        <div class="setting-item"><i class="bi bi-download"></i> Download My Data</div>
                        <div class="setting-item" style="color:#dc3545;">
                            <i class="bi bi-trash" style="color:#dc3545;"></i> Delete Account
                        </div>
                    </div>
                </div>
            </div>

            <!-- Help & Support -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#support">
                        <i class="bi bi-question-circle"></i> Help & Support
                    </button>
                </h2>
                <div id="support" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                    <div class="accordion-body">
                        <div class="support-card">
                            <div class="support-icon"><i class="bi bi-headset"></i></div>
                            <h6 class="fw-bold mt-2">Need Help?</h6>
                            <div class="support-email"><i class="bi bi-envelope"></i> support@optiq.com</div>
                            <div class="support-phone"><i class="bi bi-phone"></i> +91 98765 43210</div>
                            <button class="btn btn-sm mt-2" style="background:var(--primary);color:var(--white);" onclick="showToast('Connecting to support...', 'info')">
                                <i class="bi bi-chat-dots me-1"></i> Contact Support
                            </button>
                            <div class="mt-2 d-flex flex-wrap justify-content-center gap-2">
                                <span class="badge bg-light text-dark" onclick="showToast('FAQ', 'info')" style="cursor:pointer;">FAQ</span>
                                <span class="badge bg-light text-dark" onclick="showToast('Return Policy', 'info')" style="cursor:pointer;">Return Policy</span>
                                <span class="badge bg-light text-dark" onclick="showToast('Privacy Policy', 'info')" style="cursor:pointer;">Privacy Policy</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div> <!-- container -->

<!-- ============================================================ -->
<!-- CENTERED MODAL (White, no glass)                            -->
<!-- ============================================================ -->
<div class="modal-overlay" id="modalOverlay">
    <div class="modal-box" id="modalBox">
        <div class="modal-header">
            <h5 id="modalTitle">Edit Profile</h5>
            <button class="modal-close" onclick="closeModal()">&times;</button>
        </div>
        <div class="modal-body" id="modalBody">
            <!-- Dynamic content -->
        </div>
        <button class="btn-modal" id="modalSubmitBtn">Save Changes</button>
    </div>
</div>

<!-- ============================================================ -->
<!-- TOAST CONTAINER                                             -->
<!-- ============================================================ -->
<div class="toast-container" id="toastContainer"></div>

<!-- ============================================================ -->
<!-- SCRIPTS                                                     -->
<!-- ============================================================ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script>
    (function() {
        'use strict';

        // ─── Default Profile Data ────────────────────────────
        const defaultProfile = {
            name: 'Janani A',
            email: 'janani@optiq.com',
            phone: '+91 98765 43210',
            dob: '1995-06-15',
            gender: 'Female',
            avatar: 'https://i.pravatar.cc/200?img=11',
            memberSince: 'Jan 2024',
            completion: 70,
            addresses: [
                { id: 'addr1', type: 'HOME', name: 'Janani A', phone: '+91 98765 43210', address: '12 Anna Nagar, Thanjavur - 613001', default: true },
                { id: 'addr2', type: 'WORK', name: 'Janani (Office)', phone: '+91 98765 43210', address: '456 Tech Park, Chennai - 600001', default: false }
            ],
            notifications: [
                { text: 'Your order #1002 has been shipped!', time: '2 hours ago', read: false },
                { text: 'New arrival: Aviator Gold just dropped!', time: '1 day ago', read: false },
                { text: 'Sale ends tonight!', time: '3 days ago', read: true }
            ]
        };

        function loadProfile() {
            const stored = localStorage.getItem('optiqProfile');
            if (stored) {
                try { return JSON.parse(stored); } catch(e) { /* ignore */ }
            }
            localStorage.setItem('optiqProfile', JSON.stringify(defaultProfile));
            return defaultProfile;
        }

        function saveProfile(profile) {
            localStorage.setItem('optiqProfile', JSON.stringify(profile));
        }

        let profile = loadProfile();

        // ─── Data helpers ──────────────────────────────────────
        function getOrders() {
            return JSON.parse(localStorage.getItem('optiq_orders')) || [];
        }

        function getWishlist() {
            return JSON.parse(localStorage.getItem('optiq_wishlist')) || [];
        }

        // ─── Render Functions ─────────────────────────────────
        function renderProfile() {
            document.getElementById('profileName').textContent = profile.name;
            document.getElementById('profileEmail').textContent = profile.email;
            document.getElementById('profilePhone').textContent = profile.phone;
            document.getElementById('profileAvatar').src = profile.avatar;
            document.getElementById('memberSince').textContent = profile.memberSince;

            // Completion
            const ring = document.getElementById('completionRing');
            const totalLen = 150.8;
            const offset = totalLen - (profile.completion / 100) * totalLen;
            ring.style.strokeDashoffset = offset;
            document.getElementById('completionText').textContent = profile.completion + '%';

            const tasks = document.querySelectorAll('#completionTasks .task');
            const statuses = [
                { done: true },
                { done: true },
                { done: profile.addresses && profile.addresses.length > 0 },
                { done: false }
            ];
            tasks.forEach((task, i) => {
                if (statuses[i].done) {
                    task.classList.add('done');
                    task.innerHTML = `<i class="bi bi-check-circle-fill"></i> ${task.textContent.trim()}`;
                } else {
                    task.classList.remove('done');
                    task.innerHTML = `<i class="bi bi-circle"></i> ${task.textContent.trim()}`;
                }
            });

            renderNotifications();
        }

        function renderOrders() {
            const container = document.getElementById('ordersScroll');
            const orders = getOrders();
            if (orders.length === 0) {
                container.innerHTML = `<div class="text-muted py-2">No orders yet</div>`;
                return;
            }
            const lastOrders = orders.slice(-3).reverse();
            container.innerHTML = lastOrders.map(order => {
                const product = order.products && order.products[0] ? order.products[0] : null;
                const statusClass = order.status === 'Delivered' ? 'delivered' : (order.status === 'Cancelled' ? 'cancelled' : 'processing');
                return `
                    <div class="item-card-sm" onclick="redirectTo('orders.php')">
                        <img src="${product ? product.image : 'https://via.placeholder.com/120x120/0F3D2E/FFFFFF?text=👓'}" class="item-img" alt="${product ? product.name : 'Order'}" />
                        <div class="item-name">${product ? product.name : 'Order'}</div>
                        <div class="item-price">₹${order.total.toLocaleString('en-IN')}</div>
                        <span class="item-status ${statusClass}">${order.status}</span>
                    </div>
                `;
            }).join('');
        }

        function renderWishlist() {
            const container = document.getElementById('wishlistScroll');
            const wishlist = getWishlist();
            if (wishlist.length === 0) {
                container.innerHTML = `<div class="text-muted py-2">No saved items</div>`;
                return;
            }
            const items = wishlist.slice(0, 3);
            container.innerHTML = items.map(item => `
                <div class="item-card-sm" onclick="redirectTo('wishlist.php')">
                    <img src="${item.image || 'https://via.placeholder.com/120x120/0F3D2E/FFFFFF?text=👓'}" class="item-img" alt="${item.name}" />
                    <div class="item-name">${item.name}</div>
                    <div class="item-price">₹${item.price.toLocaleString('en-IN')}</div>
                </div>
            `).join('');
        }

        function renderAddresses() {
            const container = document.getElementById('addressesContainer');
            if (!profile.addresses || profile.addresses.length === 0) {
                container.innerHTML = `<div class="text-muted py-2">No saved addresses</div>`;
                return;
            }
            container.innerHTML = profile.addresses.map(addr => `
                <div class="address-card ${addr.default ? 'default' : ''}">
                    <div>
                        <span class="addr-type ${addr.type === 'WORK' ? 'work' : ''}">${addr.type}</span>
                        ${addr.default ? '<span class="addr-default">Default</span>' : ''}
                        <div class="addr-name">${addr.name}</div>
                        <div class="addr-detail">${addr.phone}</div>
                        <div class="addr-detail">${addr.address}</div>
                    </div>
                    <div class="addr-actions">
                        <button onclick="openModal('editAddress', '${addr.id}')"><i class="bi bi-pencil"></i> Edit</button>
                        <button onclick="setDefaultAddress('${addr.id}')"><i class="bi bi-check-circle"></i> Set Default</button>
                        <button class="danger" onclick="deleteAddress('${addr.id}')"><i class="bi bi-trash"></i> Delete</button>
                    </div>
                </div>
            `).join('');
        }

        // ─── Notifications ─────────────────────────────────────
        function renderNotifications() {
            const list = document.getElementById('notifList');
            if (!profile.notifications || profile.notifications.length === 0) {
                list.innerHTML = '<div class="text-muted small">No notifications</div>';
                return;
            }
            list.innerHTML = profile.notifications.map(n =>
                `<div class="notif-item ${n.read ? '' : 'unread'}">
                    ${n.text}
                    <div class="time">${n.time}</div>
                </div>`
            ).join('');

            const unread = profile.notifications.filter(n => !n.read).length;
            const badge = document.getElementById('notifBadge');
            if (unread > 0) {
                badge.textContent = unread;
                badge.style.display = 'inline-block';
            } else {
                badge.style.display = 'none';
            }
        }

        // ─── Address Actions ──────────────────────────────────
        function setDefaultAddress(id) {
            profile.addresses.forEach(a => a.default = (a.id === id));
            saveProfile(profile);
            renderAddresses();
            showToast('Default address updated', 'success');
        }
        window.setDefaultAddress = setDefaultAddress;

        function deleteAddress(id) {
            if (!confirm('Delete this address?')) return;
            profile.addresses = profile.addresses.filter(a => a.id !== id);
            saveProfile(profile);
            renderAddresses();
            showToast('Address deleted', 'info');
        }
        window.deleteAddress = deleteAddress;

        // ─── Modal System ──────────────────────────────────────
        const modalOverlay = document.getElementById('modalOverlay');
        const modalBox = document.getElementById('modalBox');
        const modalTitle = document.getElementById('modalTitle');
        const modalBody = document.getElementById('modalBody');
        const modalSubmit = document.getElementById('modalSubmitBtn');

        function openModal(mode, extra = null) {
            const mainContainer = document.getElementById('mainContainer');

            if (mode === 'profile') {
                modalTitle.textContent = 'Edit Profile';
                modalBody.innerHTML = `
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="modalName" value="${profile.name}" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="modalEmail" value="${profile.email}" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="modalPhone" value="${profile.phone}" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="modalDob" value="${profile.dob || ''}" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-select" id="modalGender">
                            <option value="Female" ${profile.gender === 'Female' ? 'selected' : ''}>Female</option>
                            <option value="Male" ${profile.gender === 'Male' ? 'selected' : ''}>Male</option>
                            <option value="Other" ${profile.gender === 'Other' ? 'selected' : ''}>Other</option>
                            <option value="Prefer not to say" ${profile.gender === 'Prefer not to say' ? 'selected' : ''}>Prefer not to say</option>
                        </select>
                    </div>
                `;
                modalSubmit.textContent = 'Save Changes';
                modalSubmit.style.display = 'block';
                modalSubmit.onclick = function() {
                    profile.name = document.getElementById('modalName').value.trim() || profile.name;
                    profile.email = document.getElementById('modalEmail').value.trim() || profile.email;
                    profile.phone = document.getElementById('modalPhone').value.trim() || profile.phone;
                    profile.dob = document.getElementById('modalDob').value || profile.dob;
                    profile.gender = document.getElementById('modalGender').value;
                    saveProfile(profile);
                    renderProfile();
                    closeModal();
                    showToast('Profile updated!', 'success');
                };
            } else if (mode === 'addAddress') {
                modalTitle.textContent = 'Add New Address';
                modalBody.innerHTML = `
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select class="form-select" id="modalAddrType">
                            <option value="HOME">Home</option>
                            <option value="WORK">Work</option>
                            <option value="OTHER">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" id="modalAddrName" placeholder="Full name" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="modalAddrPhone" placeholder="Phone number" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" id="modalAddrAddress" placeholder="Street, City, State - Pincode" />
                    </div>
                `;
                modalSubmit.textContent = 'Add Address';
                modalSubmit.style.display = 'block';
                modalSubmit.onclick = function() {
                    const type = document.getElementById('modalAddrType').value;
                    const name = document.getElementById('modalAddrName').value.trim();
                    const phone = document.getElementById('modalAddrPhone').value.trim();
                    const address = document.getElementById('modalAddrAddress').value.trim();
                    if (!name || !phone || !address) {
                        showToast('Please fill all fields', 'error');
                        return;
                    }
                    const newAddr = {
                        id: 'addr' + Date.now(),
                        type: type,
                        name: name,
                        phone: phone,
                        address: address,
                        default: profile.addresses.length === 0
                    };
                    profile.addresses.push(newAddr);
                    saveProfile(profile);
                    renderAddresses();
                    closeModal();
                    showToast('Address added!', 'success');
                };
            } else if (mode === 'editAddress') {
                const addr = profile.addresses.find(a => a.id === extra);
                if (!addr) { showToast('Address not found', 'error'); return; }
                modalTitle.textContent = 'Edit Address';
                modalBody.innerHTML = `
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select class="form-select" id="modalAddrType">
                            <option value="HOME" ${addr.type === 'HOME' ? 'selected' : ''}>Home</option>
                            <option value="WORK" ${addr.type === 'WORK' ? 'selected' : ''}>Work</option>
                            <option value="OTHER" ${addr.type === 'OTHER' ? 'selected' : ''}>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" id="modalAddrName" value="${addr.name}" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="modalAddrPhone" value="${addr.phone}" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" id="modalAddrAddress" value="${addr.address}" />
                    </div>
                `;
                modalSubmit.textContent = 'Update Address';
                modalSubmit.style.display = 'block';
                modalSubmit.onclick = function() {
                    const addrObj = profile.addresses.find(a => a.id === extra);
                    if (!addrObj) { showToast('Address not found', 'error'); return; }
                    addrObj.type = document.getElementById('modalAddrType').value;
                    addrObj.name = document.getElementById('modalAddrName').value.trim() || addrObj.name;
                    addrObj.phone = document.getElementById('modalAddrPhone').value.trim() || addrObj.phone;
                    addrObj.address = document.getElementById('modalAddrAddress').value.trim() || addrObj.address;
                    saveProfile(profile);
                    renderAddresses();
                    closeModal();
                    showToast('Address updated!', 'success');
                };
            } else {
                modalTitle.textContent = 'Settings';
                modalBody.innerHTML = `<div class="text-center py-3 text-muted">This section will be available soon.</div>`;
                modalSubmit.style.display = 'none';
            }

            modalOverlay.classList.add('show');

            // Push main container back
            if (mainContainer) {
                gsap.to(mainContainer, {
                    x: '-=30',
                    scale: 0.96,
                    duration: 0.5,
                    ease: 'power2.out',
                    overwrite: true
                });
            }

            // Animate modal in
            gsap.from(modalBox, {
                scale: 0.9,
                y: 30,
                opacity: 0,
                duration: 0.5,
                ease: 'power2.out',
                clearProps: 'all'
            });

            // Stagger form fields
            gsap.from('#modalBody .mb-3', {
                opacity: 0,
                y: 15,
                stagger: 0.06,
                duration: 0.4,
                ease: 'power2.out',
                delay: 0.1
            });
        }
        window.openModal = openModal;

        function closeModal() {
            modalOverlay.classList.remove('show');

            const mainContainer = document.getElementById('mainContainer');
            if (mainContainer) {
                gsap.to(mainContainer, {
                    x: 0,
                    scale: 1,
                    duration: 0.4,
                    ease: 'power2.inOut',
                    overwrite: true
                });
            }
        }
        window.closeModal = closeModal;

        // Close modal on overlay click
        modalOverlay.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // ─── Toast ─────────────────────────────────────────────
        function showToast(text, type = 'info') {
            const container = document.getElementById('toastContainer');
            const icons = {
                success: 'bi-check-circle-fill',
                error: 'bi-x-circle-fill',
                info: 'bi-info-circle-fill'
            };
            const el = document.createElement('div');
            el.className = `toast-message ${type}`;
            el.innerHTML = `<span class="toast-icon"><i class="bi ${icons[type] || icons.info}"></i></span> ${text}`;
            container.appendChild(el);
            requestAnimationFrame(() => el.classList.add('show'));
            setTimeout(() => {
                el.classList.remove('show');
                setTimeout(() => el.remove(), 400);
            }, 3000);
        }
        window.showToast = showToast;

        // ─── Notification Bell ────────────────────────────────
        document.getElementById('notificationBell').addEventListener('click', function(e) {
            e.stopPropagation();
            document.getElementById('notifDropdown').classList.toggle('show');
        });
        document.addEventListener('click', function(e) {
            const bell = document.getElementById('notificationBell');
            const dropdown = document.getElementById('notifDropdown');
            if (!bell.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.remove('show');
            }
        });

        // ─── Redirect ──────────────────────────────────────────
        function redirectTo(page) {
            window.location.href = page;
        }
        window.redirectTo = redirectTo;

        // ─── Logout ────────────────────────────────────────────
        function logout() {
            if (confirm('Log out?')) {
                showToast('Logged out (demo)', 'info');
            }
        }
        window.logout = logout;

        // ─── GSAP Animations ──────────────────────────────────
        function runAnimations() {
            const tl = gsap.timeline({ defaults: { ease: 'power2.out', duration: 0.5 } });
            tl.from('#profileOverview', { opacity: 0, y: 20, duration: 0.6 });
            tl.from('#completionSection', { opacity: 0, y: 15, duration: 0.4 }, 0.3);
            tl.from('#ordersScroll .item-card-sm', { opacity: 0, y: 15, stagger: 0.08, duration: 0.4 }, 0.5);
            tl.from('#wishlistScroll .item-card-sm', { opacity: 0, y: 15, stagger: 0.08, duration: 0.4 }, 0.7);
            tl.from('#addressesContainer .address-card', { opacity: 0, y: 12, stagger: 0.06, duration: 0.3 }, 0.9);
            tl.from('.settings-accordion .accordion-item', { opacity: 0, y: 10, stagger: 0.04, duration: 0.3 }, 1.1);
        }

        // ─── Init ──────────────────────────────────────────────
        renderProfile();
        renderOrders();
        renderWishlist();
        renderAddresses();
        runAnimations();

        // ─── Storage listener ─────────────────────────────────
        window.addEventListener('storage', function(e) {
            if (e.key === 'optiqProfile') {
                profile = loadProfile();
                renderProfile();
                renderAddresses();
            }
            if (e.key === 'optiq_orders') renderOrders();
            if (e.key === 'optiq_wishlist') renderWishlist();
        });

        // ─── Expose for debugging ─────────────────────────────
        window.profile = profile;
        window.renderProfile = renderProfile;

    })();
</script>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>