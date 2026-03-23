/* ========== GOVERNMENT STYLE HEADER (TPSC Style) ========== */
.main-header {
    position: relative;
    z-index: 1000;
    background: #e5e7eb;
    box-shadow: none;
}

.desktop-only {
    display: inline-block;
}

.mobile-top-show {
    display: none;
}

.header-top {
    background: #0088cc;
    padding: 8px 20px;
    color: white;
    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
    margin-bottom: 5px;
    width: 95%;
    margin-left: auto;
    margin-right: auto;
    display: flex;
    justify-content: center;
    align-items: center;
}

.header-top-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    width: 100%;
    flex-wrap: nowrap;
}

.top-menu-links {
    display: flex;
    align-items: center;
    gap: 15px;
    flex: 1;
    justify-content: center;
}

.header-top-link {
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 0.75rem;
    font-weight: 600;
    white-space: nowrap;
    padding: 4px 8px;
    border-radius: 4px;
}

.login-link-top {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.4);
}

.top-search-container {
    background: white;
    border-radius: 50px;
    padding: 2px 12px;
    display: flex;
    align-items: center;
    margin-left: 15px;
    flex-shrink: 0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.top-search-container form {
    display: flex;
    align-items: center;
    width: 100%;
}

.top-search-input {
    border: none;
    outline: none;
    font-size: 0.75rem;
    padding: 4px;
    width: 180px;
    background: transparent;
}

.top-search-btn {
    background: none;
    border: none;
    color: #0088cc;
    font-size: 0.8rem;
    cursor: pointer;
    padding: 0 5px;
}

.header-middle {
    padding: 10px 0;
    text-align: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.gov-emblem-left {
    width: 60px;
}

.gov-emblem-right {
    width: 60px;
}

.header-middle-text {
    flex: 1;
}

.gov-text-top {
    font-size: 0.8rem;
    color: #003366;
    font-weight: 600;
    margin-bottom: 1px;
}

.gov-text-middle {
    font-size: 0.85rem;
    color: #cc3333;
    font-weight: 600;
    margin-bottom: 2px;
}

.gov-text-bottom {
    font-size: 1.4rem;
    color: #003366;
    font-weight: 800;
    letter-spacing: 0.5px;
}

.header-bottom-nav {
    background: #0088cc;
    padding: 0;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    position: relative;
}

.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.nav-menu {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    align-items: center;
}

.nav-item {
    position: relative;
    display: flex;
    align-items: center;
    height: 60px;
}

.nav-link {
    display: flex;
    align-items: center;
    padding: 0 15px;
    height: 100%;
    color: white !important;
    text-decoration: none;
    font-weight: 700;
    font-size: 0.8rem;
    transition: all 0.3s ease;
    border-right: 1px solid rgba(255, 255, 255, 0.1);
    text-transform: uppercase;
    letter-spacing: 0.2px;
    white-space: nowrap;
}

.nav-item:first-child .nav-link {
    background: rgba(255, 255, 255, 0.2);
    padding-left: 20px;
}

.nav-link:hover {
    background: rgba(255, 255, 255, 0.15);
    color: white;
}

.nav-link i.fa-chevron-down {
    font-size: 0.6rem;
    margin-left: 6px;
    opacity: 0.8;
    transition: transform 0.3s ease;
}

.dropdown-menu-custom {
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 240px;
    background: #ffffff;
    border: none;
    border-radius: 0 0 4px 4px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    padding: 5px 0;
    opacity: 0;
    visibility: hidden;
    transform: translateY(0);
    transition: all 0.2s ease;
    z-index: 2000;
}

.nav-item:hover .dropdown-menu-custom {
    opacity: 1;
    visibility: visible;
}

.dropdown-item-custom {
    display: flex;
    align-items: center;
    padding: 12px 20px;
    color: #334155;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.85rem;
    transition: all 0.2s ease;
    border-bottom: 1px solid #f1f5f9;
}

.dropdown-item-custom:last-child {
    border-bottom: none;
}

.dropdown-item-custom:hover {
    background: #f8fafc;
    color: #0088cc;
    padding-left: 25px;
}

.dropdown-item-custom i {
    margin-right: 10px;
    font-size: 0.85rem;
    color: #0088cc;
}

.nav-right-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    height: 100%;
}

.btn-nav-action {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 800;
    font-size: 0.85rem;
    text-transform: uppercase;
    text-decoration: none;
    transition: all 0.3s ease;
    height: 42px;
}

.btn-jisajili {
    background: #f1f5f9;
    color: #0088cc !important;
    border: none;
}

.btn-jisajili:hover {
    background: #ffffff;
    transform: scale(1.02);
}

@media (max-width: 991px) {
    .nav-right-actions {
        display: flex !important;
        height: auto;
        padding: 10px;
        gap: 8px;
        background: transparent;
        border-top: none;
        margin-top: 0;
        width: auto;
    }
    
    .nav-right-actions .btn-nav-action {
        padding: 6px 12px;
        height: 36px;
        font-size: 0.75rem;
        border-radius: 4px;
    }

    .btn-jisajili {
        background: rgba(255, 255, 255, 0.2);
        color: white !important;
        border: 1px solid rgba(255, 255, 255, 0.4);
    }
}

.btn-login-nav {
    background: #cc3333;
    color: white !important;
    box-shadow: 0 4px 15px rgba(204, 51, 51, 0.3);
    border: none;
}

.btn-login-nav:hover {
    background: #b32d2d;
    transform: scale(1.02);
}

.btn-nav-action i {
    font-size: 1.1rem;
    margin-right: 8px;
}

.new-label {
    background: #ff0000;
    color: white;
    font-size: 0.6rem;
    padding: 2px 5px;
    border-radius: 4px;
    margin-left: 5px;
    font-weight: 800;
    animation: pulse-red 1.5s infinite;
    vertical-align: middle;
    display: inline-block;
    line-height: 1;
    box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
}

.hot-label {
    background: #fb923c;
    color: white;
    font-size: 0.6rem;
    padding: 2px 5px;
    border-radius: 4px;
    margin-left: 5px;
    font-weight: 800;
    animation: pulse-orange 1.5s infinite;
    vertical-align: middle;
    display: inline-block;
    line-height: 1;
    box-shadow: 0 0 10px rgba(251, 146, 60, 0.5);
}

@keyframes pulse-orange {
    0% { transform: scale(0.9); box-shadow: 0 0 0 0 rgba(251, 146, 60, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(251, 146, 60, 0); }
    100% { transform: scale(0.9); box-shadow: 0 0 0 0 rgba(251, 146, 60, 0); }
}

@keyframes pulse-red {
    0% { transform: scale(0.9); box-shadow: 0 0 0 0 rgba(255, 0, 0, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(255, 0, 0, 0); }
    100% { transform: scale(0.9); box-shadow: 0 0 0 0 rgba(255, 0, 0, 0); }
}

/* ========== NEW MOBILE MENU STYLES (MATCHING IMAGE) ========== */
.mobile-menu-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #0c0c54;
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    padding: 20px;
}

.mobile-menu-overlay.active {
    opacity: 1;
    visibility: visible;
}

.mobile-menu-container {
    width: 100%;
    max-width: 500px;
    position: relative;
}

.mobile-menu-close {
    position: absolute;
    top: -40px;
    right: 0;
    background: none;
    border: none;
    color: #4ade80;
    font-size: 1.5rem;
    cursor: pointer;
}

.mobile-menu-card {
    background-color: #d1d5db;
    border-radius: 15px;
    padding: 30px 20px;
    width: 100%;
    max-height: 85vh;
    overflow-y: auto;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}

.mobile-menu-logo {
    text-align: center;
    margin-bottom: 30px;
}

.mobile-menu-logo img {
    width: 120px;
    height: auto;
}

.mobile-menu-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.mobile-menu-item {
    margin-bottom: 5px;
}

.mobile-menu-link-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
}

.mobile-menu-link {
    display: block;
    padding: 12px 0;
    color: #1e3a8a;
    text-decoration: none;
    font-size: 1.1rem;
    font-weight: 600;
    transition: color 0.2s;
}

.mobile-menu-link.active {
    color: #84cc16;
}

.mobile-menu-link:hover {
    color: #2563eb;
}

.dropdown-icon {
    color: #1e3a8a;
    font-size: 0.9rem;
    transition: transform 0.3s ease;
}

.mobile-menu-item.active .dropdown-icon {
    transform: rotate(180deg);
}

.mobile-submenu {
    list-style: none;
    padding-left: 15px;
    display: none;
    margin-bottom: 10px;
}

.mobile-menu-item.active .mobile-submenu {
    display: block;
}

.mobile-submenu li a {
    display: block;
    padding: 8px 0;
    color: #475569;
    text-decoration: none;
    font-size: 0.95rem;
}

.mobile-menu-btn {
    display: none;
    background: rgba(255, 255, 255, 0.15);
    border: none;
    font-size: 1.25rem;
    color: white;
    cursor: pointer;
    padding: 10px 14px;
    border-radius: 8px;
    z-index: 1100;
}

@media (max-width: 991px) {
    .desktop-only {
        display: none !important;
    }

    .mobile-top-show {
        display: inline-flex !important;
        align-items: center;
        gap: 5px;
    }

    .header-top {
        padding: 10px 15px;
        border-radius: 0 0 30px 30px;
        width: 100%;
        margin-bottom: 0;
    }

    .header-top-content {
        justify-content: space-around;
    }

    .top-menu-links {
        justify-content: space-between;
        width: 100%;
    }

    .header-middle {
        padding: 10px 10px;
    }

    .gov-emblem-left, .gov-emblem-right {
        width: 45px;
    }

    .gov-text-top { font-size: 0.65rem; }
    .gov-text-middle { font-size: 0.7rem; }
    .gov-text-bottom { font-size: 1.1rem; }

    .mobile-menu-btn {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .nav-menu, .nav-right-actions {
        display: none;
    }
}

/* Footer */
.landing-footer {
    background: radial-gradient(900px circle at 20% 0%, rgba(0, 136, 204, 0.18), transparent 60%),
                radial-gradient(700px circle at 90% 20%, rgba(204, 51, 51, 0.14), transparent 60%),
                linear-gradient(135deg, #0b1220 0%, #0f172a 45%, #111827 100%);
    color: #e5e7eb;
    padding: 80px 0 30px;
    position: relative;
    overflow: hidden;
}

.landing-footer::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(148, 163, 184, 0.18) 1px, transparent 1px);
    background-size: 22px 22px;
    opacity: 0.15;
    pointer-events: none;
}

.footer-inner {
    position: relative;
    z-index: 2;
}

.footer-brand {
    font-size: 1.8rem;
    font-weight: 800;
    margin-bottom: 20px;
    color: #ffffff;
}

.footer-brand span {
    color: var(--accent-color);
}

.footer-desc {
    color: rgba(229, 231, 235, 0.78);
    line-height: 1.8;
    margin-bottom: 20px;
}

.footer-title {
    font-weight: 700;
    font-size: 1.1rem;
    margin-bottom: 25px;
    color: #ffffff;
}

.footer-kicker {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 8px 14px;
    border-radius: 9999px;
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(148, 163, 184, 0.20);
    color: rgba(229, 231, 235, 0.92);
    font-weight: 800;
    font-size: 0.75rem;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin-bottom: 16px;
}

.footer-kicker i {
    color: #fb923c;
}

.footer-links {
    list-style: none;
    padding: 0;
}

.footer-links li {
    margin-bottom: 12px;
}

.footer-links a {
    color: rgba(229, 231, 235, 0.78);
    text-decoration: none;
    transition: all 0.3s ease;
}

.footer-links a:hover {
    color: #ffffff;
    padding-left: 6px;
}

.footer-links a i {
    width: 18px;
    color: rgba(251, 146, 60, 0.95);
}

.footer-contact {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-top: 10px;
}

.footer-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    color: rgba(229, 231, 235, 0.78);
    line-height: 1.5;
}

.footer-contact-item i {
    margin-top: 2px;
    color: #fb923c;
}

.footer-newsletter {
    margin-top: 14px;
    display: flex;
    gap: 10px;
}

.footer-input {
    flex: 1;
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(148, 163, 184, 0.25);
    color: #ffffff;
    padding: 12px 14px;
    border-radius: 12px;
    outline: none;
}

.footer-input::placeholder {
    color: rgba(226, 232, 240, 0.70);
}

.footer-btn {
    background: linear-gradient(135deg, #0088cc 0%, #005a9e 100%);
    color: #ffffff;
    border: none;
    padding: 12px 16px;
    border-radius: 12px;
    font-weight: 800;
    transition: all 0.25s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    white-space: nowrap;
}

.footer-btn:hover {
    background: linear-gradient(135deg, #cc3333 0%, #991b1b 100%);
    transform: translateY(-2px);
}

.social-links {
    display: flex;
    gap: 15px;
}

.social-links a {
    width: 45px;
    height: 45px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    transition: all 0.3s ease;
}

.social-links a:hover {
    background: #cc3333;
    transform: translateY(-5px);
}

.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    margin-top: 40px;
    padding-top: 30px;
    text-align: center;
    color: rgba(229, 231, 235, 0.68);
}

.footer-bottom a {
    color: rgba(255, 255, 255, 0.85);
    text-decoration: none;
    font-weight: 700;
}

.footer-bottom a:hover {
    text-decoration: underline;
}

/* ========== MOBILE RESPONSIVE STYLES ========== */
.mobile-menu-btn {
    display: none;
    color: white;
    background: none;
    border: none;
    font-size: 1.3rem;
    height: 60px;
    padding: 0 15px;
    cursor: pointer;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.mobile-menu-btn:hover {
    background: rgba(255, 255, 255, 0.1);
}

@media (max-width: 991px) {
    /* Ficha header ya juu na middle kwenye simu ili kutoa nafasi */
    .header-top,
    .header-middle {
        display: none !important;
    }

    .main-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1100;
        background: #0088cc;
        height: 60px;
    }

    .header-bottom-nav {
        background: #0088cc;
        padding: 0;
        height: 60px;
        display: flex;
        align-items: center;
    }

    .mobile-menu-btn {
        display: inline-flex;
        z-index: 1200;
        position: relative;
    }

    .nav-container {
        padding: 0 15px;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    #mainNav {
        display: none;
        position: fixed;
        top: 60px;
        left: 0;
        right: 0;
        bottom: 0;
        background: #0088cc;
        flex-direction: column;
        width: 100%;
        height: calc(100vh - 60px);
        overflow-y: auto;
        z-index: 1150;
        padding: 20px 0;
        box-shadow: none;
    }

    #mainNav.active {
        display: flex;
    }

    .nav-item {
        height: auto;
        width: 100%;
        flex-direction: column;
        align-items: stretch;
        display: flex;
    }

    .nav-link {
        height: auto;
        min-height: 50px;
        padding: 15px 25px;
        border-right: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        justify-content: space-between;
        font-size: 1.1rem;
        width: 100%;
    }

    .nav-item:first-child .nav-link {
        background: rgba(255, 255, 255, 0.1);
        padding-left: 25px;
    }

    .nav-link i.fa-chevron-down {
        transition: transform 0.3s ease;
    }

    .nav-item.show-dropdown > .nav-link i.fa-chevron-down {
        transform: rotate(180deg);
    }

    /* Dropdown kwenye mobile */
    .dropdown-menu-custom {
        position: static;
        opacity: 1;
        visibility: visible;
        transform: none;
        display: none;
        box-shadow: none;
        background: rgba(0, 0, 0, 0.15);
        border-radius: 0;
        margin: 0;
        padding: 0;
        width: 100%;
    }

    .nav-item.show-dropdown .dropdown-menu-custom {
        display: block;
    }

    .dropdown-item-custom {
        padding: 15px 25px 15px 45px;
        color: white;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        font-size: 1rem;
        display: block;
    }

    .dropdown-item-custom:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        padding-left: 45px;
    }

    .dropdown-item-custom i {
        color: rgba(255, 255, 255, 0.8);
        margin-right: 10px;
    }

    /* Buttons kwenye mobile */
    .nav-right-actions {
        width: 100%;
        flex-direction: row;
        padding: 20px;
        gap: 15px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        background: rgba(0, 0, 0, 0.05);
        margin-top: auto;
        display: flex;
    }

    .btn-nav-action {
        flex: 1;
        height: 45px;
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .nav-link {
        padding: 12px 15px;
        font-size: 0.9rem;
    }

    .dropdown-item-custom {
        padding: 10px 15px 10px 30px;
        font-size: 0.85rem;
    }

    .btn-nav-action {
        padding: 10px 15px;
        font-size: 0.8rem;
    }
}
