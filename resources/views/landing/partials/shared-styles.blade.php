/* ========== GOVERNMENT STYLE HEADER (TPSC Style) ========== */
.main-header {
    position: relative;
    z-index: 1000;
    background: #e5e7eb;
    box-shadow: none;
}

.header-top {
    background: #0088cc;
    padding: 12px 20px;
    color: white;
    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
    margin-bottom: 15px;
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
    overflow-x: auto;
    scrollbar-width: none;
}

.header-top-content::-webkit-scrollbar {
    display: none;
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
    padding: 5px 8px;
    border-radius: 4px;
}

.header-top-link:hover {
    background: rgba(255, 255, 255, 0.15);
    color: white;
}

.top-search-container {
    background: white;
    border-radius: 50px;
    padding: 4px 15px;
    display: flex;
    align-items: center;
    margin-left: 15px;
    flex-shrink: 0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.top-search-input {
    border: none;
    outline: none;
    font-size: 0.75rem;
    padding: 4px;
    width: 120px;
}

.top-search-btn {
    background: none;
    border: none;
    color: #0088cc;
    font-size: 0.8rem;
}

.header-middle {
    padding: 20px 0;
    text-align: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.gov-emblem-left,
.gov-emblem-right {
    width: 80px;
}

.header-middle-text {
    flex: 1;
}

.gov-text-top {
    font-size: 0.9rem;
    color: #003366;
    font-weight: 600;
    margin-bottom: 2px;
}

.gov-text-middle {
    font-size: 0.95rem;
    color: #cc3333;
    font-weight: 600;
    margin-bottom: 5px;
}

.gov-text-bottom {
    font-size: 1.8rem;
    color: #003366;
    font-weight: 800;
    letter-spacing: 1px;
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
