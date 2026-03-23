<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>About Us - EMaS</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #2b5a8e;
            --primary-dark: #1e3f64;
            --secondary-color: #065f46;
            --accent-color: #fb923c;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --bg-light: #f8fafc;
            --bg-gray: #e5e7eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Animated 'New' & 'Hot' Labels for Menu Items */
        .new-label {
            background: #ff0000;
            color: white;
            font-size: 0.6rem;
            padding: 2px 6px;
            border-radius: 10px;
            font-weight: 800;
            margin-left: 6px;
            animation: pulseNew 1.5s infinite;
        }

        @keyframes pulseNew {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.1); }
        }

        .hot-label {
            background: #fb923c;
            color: white;
            font-size: 0.6rem;
            padding: 2px 6px;
            border-radius: 10px;
            font-weight: 800;
            margin-left: 6px;
        }

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

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .dropdown-menu-custom {
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 260px;
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.18);
            padding: 10px;
            opacity: 0;
            transform: translateY(10px);
            visibility: hidden;
            transition: all 0.25s ease;
            z-index: 9999;
            border: 1px solid rgba(2, 6, 23, 0.08);
        }

        .nav-item:hover .dropdown-menu-custom {
            opacity: 1;
            transform: translateY(0);
            visibility: visible;
        }

        .dropdown-item-custom {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 12px;
            border-radius: 10px;
            color: #0f172a;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .dropdown-item-custom i {
            width: 18px;
            color: #cc3333;
        }

        .dropdown-item-custom:hover {
            background: rgba(0, 136, 204, 0.10);
            color: #0b3a66;
        }

        .nav-right-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-nav-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            height: 44px;
            padding: 0 18px;
            border-radius: 9999px;
            font-weight: 900;
            font-size: 0.85rem;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            text-decoration: none;
            transition: all 0.25s ease;
            white-space: nowrap;
        }

        .btn-jisajili {
            background: #ffffff;
            color: #003366;
            border: 2px solid rgba(255,255,255,0.75);
        }

        .btn-jisajili:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.18);
        }

        .btn-login-nav {
            background: #cc3333;
            color: #ffffff;
            border: 2px solid rgba(204,51,51,0.6);
        }

        .btn-login-nav:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(204,51,51,0.35);
        }

        .mobile-menu-btn {
            display: none;
            color: white;
            background: none;
            border: none;
            font-size: 1.3rem;
            height: 60px;
            padding: 0 15px;
        }

        @media (max-width: 991px) {
            .mobile-menu-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            #mainNav {
                display: none;
                position: absolute;
                left: 0;
                right: 0;
                top: 60px;
                background: #0088cc;
                padding: 10px 0;
                box-shadow: 0 12px 30px rgba(0,0,0,0.2);
                z-index: 9998;
            }

            #mainNav.active {
                display: block;
            }

            .nav-container {
                position: relative;
            }

            .nav-menu {
                flex-direction: column;
                align-items: stretch;
            }

            .nav-item {
                height: auto;
                flex-direction: column;
                align-items: stretch;
            }

            .nav-link {
                border-right: none;
                height: 52px;
                justify-content: space-between;
            }

            .dropdown-menu-custom {
                position: static;
                opacity: 1;
                transform: none;
                visibility: visible;
                display: none;
                margin: 0 12px 10px;
            }

            .nav-item.show-dropdown .dropdown-menu-custom {
                display: block;
            }

            .nav-right-actions {
                width: 100%;
                padding: 12px;
            }

            .btn-nav-action {
                flex: 1;
            }
        }

        /* Page Header */
        .page-hero {
            padding: 70px 0 40px;
            background: radial-gradient(1200px circle at 20% 0%, rgba(0, 136, 204, 0.18), transparent 55%),
                        radial-gradient(900px circle at 80% 20%, rgba(204, 51, 51, 0.12), transparent 55%),
                        linear-gradient(135deg, #f8fafc 0%, #eef2f7 100%);
            position: relative;
            overflow: hidden;
        }

        .page-hero .network-layer {
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: 0.85;
        }

        .network-layer::before {
            content: '';
            position: absolute;
            inset: -40px;
            background:
                radial-gradient(circle at 10% 20%, rgba(0, 136, 204, 0.35), transparent 35%),
                radial-gradient(circle at 90% 25%, rgba(204, 51, 51, 0.22), transparent 40%),
                radial-gradient(circle at 40% 80%, rgba(251, 146, 60, 0.18), transparent 35%);
            filter: blur(22px);
            animation: floatGlow 9s ease-in-out infinite;
        }

        @keyframes floatGlow {
            0%, 100% { transform: translate3d(0,0,0) scale(1); }
            50% { transform: translate3d(0,-14px,0) scale(1.05); }
        }

        .network-layer::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(rgba(0, 136, 204, 0.26) 1px, transparent 1px);
            background-size: 24px 24px;
            opacity: 0.35;
        }

        .network-nodes {
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 12% 30%, rgba(0, 136, 204, 0.35) 0 2px, transparent 2px),
                radial-gradient(circle at 26% 62%, rgba(0, 136, 204, 0.25) 0 2px, transparent 2px),
                radial-gradient(circle at 36% 26%, rgba(204, 51, 51, 0.28) 0 2px, transparent 2px),
                radial-gradient(circle at 58% 52%, rgba(251, 146, 60, 0.26) 0 2px, transparent 2px),
                radial-gradient(circle at 72% 30%, rgba(0, 136, 204, 0.22) 0 2px, transparent 2px),
                radial-gradient(circle at 88% 62%, rgba(204, 51, 51, 0.22) 0 2px, transparent 2px);
            opacity: 0.85;
        }

        .network-lines {
            position: absolute;
            inset: -20px;
            background:
                linear-gradient(120deg, transparent 0%, rgba(0, 136, 204, 0.18) 40%, transparent 70%),
                linear-gradient(45deg, transparent 0%, rgba(204, 51, 51, 0.14) 45%, transparent 75%);
            mask-image: radial-gradient(circle at 30% 40%, rgba(0,0,0,0.95), transparent 62%);
            animation: sweepLines 7.5s linear infinite;
            opacity: 0.85;
        }

        @keyframes sweepLines {
            0% { transform: translateX(-10%) translateY(0); }
            100% { transform: translateX(10%) translateY(-2%); }
        }

        .page-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(0, 136, 204, 0.20) 1px, transparent 1px);
            background-size: 20px 20px;
            opacity: 0.22;
            pointer-events: none;
        }

        .page-hero-inner {
            position: relative;
            z-index: 2;
            max-width: 980px;
            margin: 0 auto;
            text-align: center;
        }

        .page-kicker {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 14px;
            border-radius: 9999px;
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(148, 163, 184, 0.35);
            color: #0f172a;
            font-weight: 900;
            font-size: 0.75rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .page-kicker i {
            color: #cc3333;
        }

        .page-title {
            font-size: 2.6rem;
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 14px;
        }

        .page-desc {
            font-size: 1.1rem;
            color: #475569;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.7;
        }

        .breadcrumb-wrap {
            display: flex;
            justify-content: center;
            margin-top: 22px;
        }

        .breadcrumb-pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 9999px;
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid rgba(148, 163, 184, 0.35);
            color: #0f172a;
            font-weight: 800;
            font-size: 0.9rem;
        }

        .breadcrumb-pill a {
            color: #0f172a;
            text-decoration: none;
        }

        .breadcrumb-pill a:hover {
            text-decoration: underline;
        }

        .breadcrumb-pill .sep {
            opacity: 0.45;
        }

        .content-section {
            padding: 80px 0;
            background: #ffffff;
        }

        .content-card {
            border-radius: 20px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            background: #ffffff;
            padding: 28px;
            height: 100%;
        }

        .content-card h3 {
            font-weight: 900;
            margin-bottom: 10px;
            color: #0f172a;
        }

        .content-card p {
            color: #475569;
            line-height: 1.75;
        }

        .content-icon {
            width: 54px;
            height: 54px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(0,136,204,0.18) 0%, rgba(0,90,158,0.10) 100%);
            color: #005a9e;
            margin-bottom: 14px;
            font-size: 1.3rem;
        }

        .content-list {
            list-style: none;
            padding: 0;
            margin: 18px 0 0;
            display: grid;
            gap: 10px;
        }

        .content-list li {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            color: #475569;
            line-height: 1.6;
        }

        .content-list i {
            margin-top: 3px;
            color: #cc3333;
        }

        /* Footer (same as landing) */
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

        @media (max-width: 576px) {
            .page-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    @include('landing.partials.header')

    <section class="page-hero">
        <div class="network-layer">
            <div class="network-lines"></div>
            <div class="network-nodes"></div>
        </div>
        <div class="container">
            <div class="page-hero-inner" data-aos="fade-up">
                <div class="page-kicker"><i class="fas fa-circle-info"></i> About EMaS</div>
                <h1 class="page-title">Electronic Marking System (EMaS)</h1>
                <p class="page-desc">
                    EMaS ni mfumo wa kisasa unaosaidia shule na halmashauri kusimamia mitihani, uingizaji wa alama, uchambuzi wa matokeo, na utoaji wa ripoti kwa usahihi na kwa wakati.
                </p>

                <div class="breadcrumb-wrap">
                    <div class="breadcrumb-pill">
                        <a href="{{ route('landing') }}"><i class="fas fa-house"></i> Home</a>
                        <span class="sep">/</span>
                        <span>About Us</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-section" id="vision">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="content-card">
                        <div class="content-icon"><i class="fas fa-bullseye"></i></div>
                        <h3>Dira (Vision)</h3>
                        <p>Kuwa mfumo unaoongoza Tanzania katika usimamizi wa mitihani kwa kutumia teknolojia ya kisasa yenye uwazi na ufanisi.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="content-card">
                        <div class="content-icon"><i class="fas fa-flag-checkered"></i></div>
                        <h3>Dhima (Mission)</h3>
                        <p>Kuwapa walimu na wasimamizi zana rahisi na salama za kuingiza alama, kuchakata matokeo, na kutoa ripoti kwa viwango bora.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="content-card">
                        <div class="content-icon"><i class="fas fa-shield-halved"></i></div>
                        <h3>Maadili Yetu</h3>
                        <ul class="content-list">
                            <li><i class="fas fa-check-circle"></i> Usahihi na Uwajibikaji</li>
                            <li><i class="fas fa-check-circle"></i> Usalama wa Taarifa</li>
                            <li><i class="fas fa-check-circle"></i> Ufanisi na Ubunifu</li>
                            <li><i class="fas fa-check-circle"></i> Huduma kwa Jamii</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-section" id="history" style="background: #f8fafc;">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="content-card">
                        <div class="content-icon"><i class="fas fa-timeline"></i></div>
                        <h3>Historia Yetu</h3>
                        <p>
                            EMaS imeundwa ili kutatua changamoto za muda mrefu katika uandaaji wa matokeo ya mitihani ya pamoja.
                            Mfumo unarahisisha ugawaji wa majukumu (clerks/data entrants), huongeza uwazi katika uhakiki wa alama,
                            na hutoa ripoti za kisasa kwa shule na halmashauri.
                        </p>
                        <ul class="content-list">
                            <li><i class="fas fa-check-circle"></i> Kupunguza makosa ya kibinadamu kwenye calculations</li>
                            <li><i class="fas fa-check-circle"></i> Kurahisisha ufuatiliaji wa CA, Mock, Midterm na Annual</li>
                            <li><i class="fas fa-check-circle"></i> Kuongeza kasi ya kutolewa kwa matokeo na ripoti</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="content-card">
                        <div class="content-icon"><i class="fas fa-gears"></i></div>
                        <h3>Kwanini EMaS?</h3>
                        <p>
                            Tunazingatia matumizi rahisi, muonekano safi (UI), na utendaji wa haraka.
                            EMaS inasaidia uendeshaji wa shule nyingi (multi-school), mitihani ya pamoja, rankings, na uchambuzi wa matokeo.
                        </p>
                        <ul class="content-list">
                            <li><i class="fas fa-check-circle"></i> Dashboards &amp; analytics kwa maamuzi ya haraka</li>
                            <li><i class="fas fa-check-circle"></i> Reports zinazoeleweka na zinazoweza kuchapishwa</li>
                            <li><i class="fas fa-check-circle"></i> Usalama na access control (roles)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-section" id="contact">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="content-card">
                        <div class="content-icon"><i class="fas fa-headset"></i></div>
                        <h3>Wasiliana Nasi</h3>
                        <p>
                            Unahitaji msaada, maelekezo, au unataka kuanza kutumia EMaS? Wasiliana nasi kupitia njia zifuatazo.
                        </p>
                        <div class="footer-contact">
                            <div class="footer-contact-item"><i class="fas fa-map-marker-alt"></i> United Republic of Tanzania</div>
                            <div class="footer-contact-item"><i class="fas fa-envelope"></i> support@emas.go.tz</div>
                            <div class="footer-contact-item"><i class="fas fa-phone-alt"></i> +255 123 456 789</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="content-card">
                        <div class="content-icon"><i class="fas fa-rocket"></i></div>
                        <h3>Anza Sasa</h3>
                        <p>
                            Jiunge na shule nyingi zinazotumia EMaS kuboresha uingizaji wa alama, uchambuzi wa matokeo, na usimamizi wa mitihani.
                        </p>
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <a href="{{ route('register') }}" class="btn btn-primary" style="font-weight: 900; border-radius: 14px; padding: 12px 16px;">Create Account</a>
                            <a href="{{ route('login') }}" class="btn btn-outline-primary" style="font-weight: 900; border-radius: 14px; padding: 12px 16px;">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('landing.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 1000,
                once: true
            });

            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mainNav = document.getElementById('mainNav');

            if (mobileMenuBtn && mainNav) {
                mobileMenuBtn.addEventListener('click', function() {
                    mainNav.classList.toggle('active');
                    const icon = this.querySelector('i');
                    if (!icon) return;
                    if (mainNav.classList.contains('active')) {
                        icon.classList.remove('fa-bars');
                        icon.classList.add('fa-times');
                    } else {
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                });
            }

            document.querySelectorAll('.nav-item').forEach(item => {
                const link = item.querySelector('.nav-link');
                const dropdown = item.querySelector('.dropdown-menu-custom');

                if (!link || !dropdown) return;
                if (window.innerWidth <= 991) {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        item.classList.toggle('show-dropdown');
                    });
                }
            });

            window.addEventListener('scroll', function() {
                const header = document.querySelector('.main-header');
                if (!header) return;
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
        });
    </script>
</body>
</html>
