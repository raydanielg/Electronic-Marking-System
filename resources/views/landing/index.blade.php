<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EMaS - Electronic Marking System | Advanced Exam & Assessment Platform</title>

    <!-- Primary Meta Tags -->
    <meta name="title" content="EMaS - Electronic Marking System | Advanced Exam & Assessment Platform">
    <meta name="description" content="EMaS (Electronic Marking System) is a state-of-the-art digital assessment platform designed for efficient, secure, and accurate marking of examinations in Tanzania. Streamline your academic grading process with EMaS.">
    <meta name="keywords" content="EMaS, Electronic Marking System, Digital Assessment, Exam Marking Tanzania, Education Technology, Automated Grading, Academic Assessment Platform">
    <meta name="author" content="EMaS Team">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="EMaS - Electronic Marking System | Advanced Exam & Assessment Platform">
    <meta property="og:description" content="Revolutionizing examination marking with precision and speed. EMaS provides a secure digital environment for academic assessment and grading.">
    <meta property="og:image" content="{{ asset('hero/analyzing-business-activity.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="EMaS - Electronic Marking System | Advanced Exam & Assessment Platform">
    <meta property="twitter:description" content="Revolutionizing examination marking with precision and speed. EMaS provides a secure digital environment for academic assessment and grading.">
    <meta property="twitter:image" content="{{ asset('hero/analyzing-business-activity.jpg') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('eco-e.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('eco-e.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- AOS and Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap -->
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

        /* ========== GOVERNMENT STYLE HEADER (TPSC Style) ========== */
        .main-header {
            position: relative;
            z-index: 1000;
            background: #e5e7eb; /* Light gray background for middle section */
            box-shadow: none;
        }

        .desktop-only {
            display: inline-block;
        }

        .mobile-top-show {
            display: none;
        }

        /* Top Blue Bar with Curved Bottom */
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

        /* Middle Logo Section */
        .header-middle {
            padding: 10px 0; /* Reduced padding */
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .gov-emblem-left {
            width: 60px; /* Reduced size */
        }

        .gov-emblem-right {
            width: 60px; /* Reduced size */
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
            font-size: 1.4rem; /* Reduced size */
            color: #003366;
            font-weight: 800;
            letter-spacing: 0.5px;
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
        }

        /* Bottom Blue Navigation Bar */
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
            height: 60px; /* Fixed height for consistent vertical alignment */
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

        /* Dropdown Fix - Positioned exactly below the nav-item */
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

        /* Right side actions - Properly Aligned */
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
            height: 42px; /* Fixed height for buttons */
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

        /* Animated 'New' Label for Menu Items */
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

        /* Adjust Hero to compensate for relative header */
        .hero-section {
            min-height: calc(100vh - 200px);
            padding-top: 50px;
        }

        /* Mobile Menu Toggle */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary-color);
            cursor: pointer;
            padding: 10px;
        }

        /* Mega Menu */
        .mega-menu {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            width: 900px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            padding: 30px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .nav-item-mega:hover .mega-menu {
            opacity: 1;
            visibility: visible;
        }

        .mega-menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .mega-menu-column h4 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid rgba(43, 90, 142, 0.1);
        }

        .mega-menu-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mega-menu-links li {
            margin-bottom: 8px;
        }

        .mega-menu-links a {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-dark);
            text-decoration: none;
            font-size: 0.9rem;
            padding: 8px 0;
            transition: all 0.3s ease;
        }

        .mega-menu-links a:hover {
            color: var(--primary-color);
            padding-left: 10px;
        }

        .mega-menu-links a i {
            color: var(--accent-color);
            font-size: 0.8rem;
        }

                /* ========== NEW MOBILE MENU STYLES (MATCHING IMAGE) ========== */
        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #0c0c54; /* Deep blue background from image */
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
            color: #4ade80; /* Greenish close icon as seen in image */
            font-size: 1.5rem;
            cursor: pointer;
        }

        .mobile-menu-card {
            background-color: #d1d5db; /* Light gray card from image */
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
            color: #1e3a8a; /* Deep blue text */
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 600;
            transition: color 0.2s;
        }

        .mobile-menu-link.active {
            color: #84cc16; /* Light green for active Home link as in image */
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
            .mobile-menu-btn {
                display: block;
            }
            .nav-menu, .nav-right-actions {
                display: none;
            }
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            overflow: hidden;
            background: #000;
            padding-top: 0;
        }

        .hero-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .slide-item {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0;
            transition: opacity 1.2s ease-in-out;
            display: flex;
            align-items: center;
        }

        .slide-item.active {
            opacity: 1;
        }

        .slide-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(0, 51, 102, 0.85) 0%, rgba(0, 0, 0, 0.4) 100%);
            z-index: 2;
        }

        .hero-container {
            position: relative;
            z-index: 3;
            color: white;
            width: 100%;
        }

        .hero-content {
            max-width: 850px;
            padding: 40px 20px;
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 4rem);
            font-weight: 800;
            margin-bottom: 25px;
            line-height: 1.1;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
        }

        .hero-title span {
            color: #fb923c;
        }

        .hero-subtitle {
            font-size: clamp(1rem, 2vw, 1.4rem);
            font-weight: 600;
            opacity: 0.95;
            margin-bottom: 40px;
            line-height: 1.6;
            max-width: 700px;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.5);
        }

        .hero-btns {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .btn-hero {
            padding: 16px 35px;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 50px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-hero-primary {
            background: #cc3333;
            color: white;
            border: none;
            box-shadow: 0 4px 20px rgba(204, 51, 51, 0.4);
        }

        .btn-hero-primary:hover {
            background: #b32d2d;
            transform: translateY(-3px);
            color: white;
            box-shadow: 0 8px 25px rgba(204, 51, 51, 0.5);
        }

        .btn-hero-outline {
            background: rgba(255,255,255,0.1);
            color: white;
            border: 2px solid white;
            backdrop-filter: blur(5px);
        }

        .btn-hero-outline:hover {
            background: white;
            color: #003366;
            transform: translateY(-3px);
        }

        @media (max-width: 767px) {
            .hero-section {
                min-height: 90vh;
                text-align: center;
            }

            .hero-content {
                margin: 0 auto;
                padding: 30px 15px;
            }

            .hero-btns {
                justify-content: center;
                flex-direction: row; /* Hakikisha zinabaki kwenye mstari mmoja */
                width: 100%;
                gap: 10px; /* Punguza gap kidogo ili zitoshee */
            }

            .btn-hero {
                width: auto; /* Ondoa full width */
                flex: 1; /* Zigawe nafasi sawa */
                padding: 12px 15px; /* Punguza padding kidogo */
                font-size: 0.85rem; /* Punguza font size kidogo */
                min-width: 140px; /* Weka kiwango cha chini cha upana */
            }

            .hero-subtitle {
                margin-bottom: 30px;
            }

            /* 2 Columns for Hero Features on Mobile */
            .hero-features-section .row > div {
                width: 50%;
            }

            .hero-feature-card {
                padding: 15px 10px;
            }

            .hero-feature-title {
                font-size: 0.9rem;
            }

            .hero-feature-desc {
                font-size: 0.75rem;
            }

            /* 2 Columns for Core Features (Lower) on Mobile */
            .features-section .row > div {
                width: 50%;
                padding: 5px;
            }

            .feature-card {
                padding: 20px 10px;
                border-radius: 12px;
            }

            .feature-title {
                font-size: 1rem;
                margin-bottom: 10px;
            }

            .feature-desc {
                font-size: 0.8rem;
            }

            .feature-icon-wrapper {
                width: 40px;
                height: 40px;
                margin-bottom: 15px;
            }
        }
            background: var(--bg-light);
        }

        .stat-card {
            text-align: center;
            padding: 30px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1.1rem;
            color: var(--text-muted);
            font-weight: 600;
        }

        /* Hero Features Section */
        .hero-features-section {
            padding: 40px 0;
            background: #f8fafc;
            position: relative;
            z-index: 5;
            margin-top: -50px;
        }

        .hero-feature-card {
            background: white;
            padding: 30px 20px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            text-align: center;
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid #f1f5f9;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .hero-feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            border-color: #cc3333;
        }

        .hero-feature-icon-wrapper {
            width: 64px;
            height: 64px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-feature-icon-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: grayscale(100%);
            transition: all 0.3s ease;
        }

        .hero-feature-card:hover .hero-feature-icon-wrapper img {
            filter: grayscale(0%);
            transform: scale(1.1);
        }

        .hero-feature-title {
            font-weight: 800;
            font-size: 1.1rem;
            color: #1e293b;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .hero-feature-desc {
            color: #64748b;
            font-size: 0.85rem;
            line-height: 1.6;
            margin: 0;
        }

        /* Features Section (Lower) */
        .features-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #f8fafc 0%, #e5e7eb 100%);
        }

        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(43, 90, 142, 0.15);
            border-color: #cc3333;
        }

        .feature-icon-wrapper {
            width: 64px;
            height: 64px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feature-icon-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: grayscale(100%);
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon-wrapper img {
            filter: grayscale(0%);
            transform: scale(1.1);
        }

        .feature-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 15px;
        }

        .feature-desc {
            color: #64748b;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .about-section {
            padding: 100px 0;
            background: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .about-image-wrapper {
            position: relative;
            padding: 20px;
        }

        .about-image-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 80%;
            height: 80%;
            background: rgba(0, 136, 204, 0.1);
            border-radius: 30px;
            z-index: 0;
        }

        .about-image {
            position: relative;
            z-index: 1;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            transition: all 0.5s ease;
        }

        .about-image:hover {
            transform: scale(1.02);
        }

        .about-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 20px;
            background: rgba(0, 136, 204, 0.1);
            border-radius: 50px;
            margin-bottom: 20px;
        }

        .section-badge i {
            color: #0088cc;
            font-size: 0.9rem;
        }

        .section-badge span {
            color: #0088cc;
            font-weight: 800;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .section-desc {
            font-size: 1.1rem;
            color: #64748b;
            line-height: 1.8;
            margin-bottom: 35px;
        }

        .about-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .about-list li {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
            padding: 15px;
            background: #f8fafc;
            border-radius: 12px;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .about-list li:hover {
            background: #ffffff;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            border-left-color: #0088cc;
            transform: translateX(10px);
        }

        .about-list li i {
            color: #0088cc;
            font-size: 1.25rem;
            margin-top: 3px;
        }

        .about-list li span {
            font-weight: 700;
            color: #1e293b;
            font-size: 1rem;
        }

        /* Process / How It Works Section Redesign */
        .how-it-works-section {
            padding: 100px 0;
            background: #f8fafc;
            position: relative;
        }

        .role-switcher {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 60px;
            background: #e2e8f0;
            padding: 8px;
            border-radius: 50px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .role-btn {
            padding: 12px 35px;
            border-radius: 50px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: none;
            background: transparent;
            color: #64748b;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .role-btn.active {
            background: #0088cc;
            color: white;
            box-shadow: 0 10px 20px rgba(0, 136, 204, 0.3);
        }

        .process-steps {
            display: none;
            position: relative;
            max-width: 1100px;
            margin: 0 auto;
        }

        .process-steps.active {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .step-card {
            flex: 1;
            min-width: 220px;
            text-align: center;
            position: relative;
            z-index: 1;
            background: white;
            padding: 40px 25px;
            border-radius: 20px;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid #f1f5f9;
        }

        .step-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            border-color: #0088cc;
        }

        .step-number {
            width: 50px;
            height: 50px;
            background: #0088cc;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: 800;
            margin: 0 auto 20px;
            position: relative;
            transition: all 0.3s ease;
            border: 4px solid white;
            box-shadow: 0 0 0 2px #0088cc;
        }

        .step-card:hover .step-number {
            background: #cc3333;
            box-shadow: 0 0 0 2px #cc3333;
            transform: scale(1.1) rotate(360deg);
        }

        /* Improved Connecting Lines */
        .step-card:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 65px;
            left: 70%;
            width: 60%;
            height: 2px;
            background: #cbd5e1;
            z-index: -1;
        }

        .step-card:not(:last-child)::before {
            content: '\f105';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 56px;
            left: 100%;
            transform: translateX(-50%);
            color: #0088cc;
            font-size: 1.2rem;
            z-index: 2;
            background: white;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .step-title {
            font-size: 1.1rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 15px;
            text-transform: uppercase;
            min-height: 2.4em;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .step-desc {
            font-size: 0.85rem;
            color: #64748b;
            line-height: 1.6;
        }

        .step-icon {
            font-size: 2.5rem;
            color: #0088cc;
            margin-bottom: 20px;
            display: block;
            transition: all 0.4s ease;
        }

        .step-card:hover .step-icon {
            color: #cc3333;
            transform: scale(1.2);
        }

        @media (max-width: 991px) {
            .step-card:not(:last-child)::after,
            .step-card:not(:last-child)::before {
                display: none;
            }
            .step-card {
                min-width: 45%; /* Use 2 columns on mobile */
                margin-bottom: 20px;
            }
            .process-steps.active {
                justify-content: center;
                gap: 15px;
            }
        }

        /* Testimonials Section (Flowbite-like) */
        .testimonials-section {
            padding: 100px 0;
            background: #ffffff;
        }

        .testimonials-wrap {
            max-width: 900px;
            margin: 0 auto;
            position: relative;
        }

        .testimonial-quote-icon {
            height: 48px;
            width: 48px;
            margin: 0 auto 16px;
            color: #9ca3af;
        }

        .testimonial-figure {
            display: none;
            text-align: center;
            animation: testimonialFade 0.7s ease;
        }

        .testimonial-figure.active {
            display: block;
        }

        @keyframes testimonialFade {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .testimonial-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: #111827;
            line-height: 1.5;
            margin: 0;
        }

        .testimonial-caption {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-top: 24px;
        }

        .testimonial-avatar {
            width: 40px;
            height: 40px;
            border-radius: 9999px;
            object-fit: cover;
            border: 2px solid #e5e7eb;
        }

        .testimonial-meta {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-left: 12px;
            border-left: 2px solid #e5e7eb;
        }

        .testimonial-name {
            font-weight: 800;
            color: #111827;
            white-space: nowrap;
        }

        .testimonial-role {
            font-size: 0.9rem;
            color: #6b7280;
            white-space: nowrap;
        }

        .testimonial-dots {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 28px;
        }

        .testimonial-dot {
            width: 10px;
            height: 10px;
            border-radius: 9999px;
            background: #d1d5db;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .testimonial-dot.active {
            background: #0088cc;
            transform: scale(1.2);
        }

        @media (max-width: 576px) {
            .testimonial-text {
                font-size: 1.15rem;
            }

            .testimonial-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 2px;
                padding-left: 10px;
            }
        }

        /* CTA Section */
        .cta-section {
            padding: 110px 0;
            position: relative;
            text-align: center;
            background: radial-gradient(1200px circle at 20% 0%, rgba(0, 136, 204, 0.18), transparent 55%),
                        radial-gradient(900px circle at 80% 20%, rgba(204, 51, 51, 0.12), transparent 55%),
                        linear-gradient(135deg, #f8fafc 0%, #eef2f7 100%);
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(rgba(0, 136, 204, 0.20) 1px, transparent 1px);
            background-size: 20px 20px;
            opacity: 0.25;
            pointer-events: none;
        }

        .cta-card {
            position: relative;
            z-index: 2;
            max-width: 900px;
            margin: 0 auto;
            padding: 60px 28px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(148, 163, 184, 0.35);
            box-shadow: 0 24px 60px rgba(2, 6, 23, 0.12);
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            color: #0f172a;
        }

        .cta-desc {
            font-size: 1.2rem;
            color: #475569;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-cta {
            position: relative;
            padding: 16px 52px;
            font-size: 1.05rem;
            font-weight: 800;
            border-radius: 9999px;
            background: linear-gradient(135deg, #0088cc 0%, #005a9e 100%);
            color: #ffffff;
            border: none;
            transition: transform 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 18px 40px rgba(0, 90, 158, 0.30);
        }

        .btn-cta::after {
            content: '';
            position: absolute;
            top: -120%;
            left: -30%;
            width: 40%;
            height: 300%;
            background: rgba(255, 255, 255, 0.35);
            transform: rotate(25deg);
            transition: left 0.6s ease;
        }

        .btn-cta:hover {
            background: linear-gradient(135deg, #cc3333 0%, #991b1b 100%);
            transform: translateY(-6px);
            box-shadow: 0 22px 55px rgba(204, 51, 51, 0.35);
            color: #ffffff;
        }

        .btn-cta:hover::after {
            left: 140%;
        }

        .btn-cta:focus {
            outline: none;
            box-shadow: 0 0 0 6px rgba(0, 136, 204, 0.18), 0 18px 40px rgba(0, 90, 158, 0.30);
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

        /* Animations */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        /* Responsive */
        @media (max-width: 991px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .section-title {
                font-size: 2rem;
            }
            .step-card::after {
                display: none;
            }
        }

        @media (max-width: 767px) {
            .hero-title {
                font-size: 2rem;
            }
            .btn-hero {
                display: block;
                width: 100%;
                margin-right: 0;
            }
            .hero-image {
                margin-top: 40px;
            }
        }
    </style>
</head>
<body>
    @include('landing.partials.header')

    <!-- ========== HERO SLIDER SECTION ========== -->
    <section class="hero-section">
        <!-- Background Slider -->
        <div class="hero-slider" id="heroSlider">
            <div class="slide-item active" style="background-image: url('{{ asset('hero/african-girl-holding-books-studying-while-standing-oudoors_926199-2693472.jpg') }}');">
                <div class="slide-overlay"></div>
            </div>
            <div class="slide-item" style="background-image: url('{{ asset('hero/group-children-wearing-school-uniforms-walking-down-dirt-road_1262781-165936.jpg') }}');">
                <div class="slide-overlay"></div>
            </div>
            <div class="slide-item" style="background-image: url('{{ asset('hero/rural-african-children-learning_89223-29982.jpg') }}');">
                <div class="slide-overlay"></div>
            </div>
            <div class="slide-item" style="background-image: url('{{ asset('hero/students-paying-attention-class.jpg') }}');">
                <div class="slide-overlay"></div>
            </div>
            <div class="slide-item" style="background-image: url('{{ asset('hero/african-american-migrants-seek-asylum-europe-facing-integration-challenges-illegal-migration-concept-migration-asylum-seeking-integration-african-american-europe_864588-164403.jpg') }}');">
                <div class="slide-overlay"></div>
            </div>
            <div class="slide-item" style="background-image: url('{{ asset('hero/analyzing-business-activity.jpg') }}');">
                <div class="slide-overlay"></div>
            </div>
            <div class="slide-item" style="background-image: url('{{ asset('hero/challenges-faced-by-african-migrants-seeking-asylum-europe-due-illegal-migration-flows-concept-legal-hurdles-discrimination-language-barriers-social-integration-lack-access-resources_918839-118759.jpg') }}');">
                <div class="slide-overlay"></div>
            </div>
            <div class="slide-item" style="background-image: url('{{ asset('hero/people-park_1629768-514.jpg') }}');">
                <div class="slide-overlay"></div>
            </div>
        </div>

        <div class="container hero-container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="hero-content" data-aos="fade-right">
                        <h1 class="hero-title">
                            Electronic Marking System<br>
                            <span id="typedText"></span><span class="typed-cursor">|</span>
                        </h1>
                        <p class="hero-subtitle">
                            Modernizing examination management across Tanzania. Secure, accurate, and efficient processing of large-scale educational assessments for schools and joint councils.
                        </p>
                        <div class="hero-btns">
                            <a href="{{ route('login') }}" class="btn-hero btn-hero-primary">
                                <i class="fas fa-rocket"></i> GET STARTED NOW
                            </a>
                            <a href="#about" class="btn-hero btn-hero-outline">
                                <i class="fas fa-info-circle"></i> LEARN MORE
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Dots -->
        <div class="slider-dots">
            <div class="dot active" onclick="goToSlide(0)"></div>
            <div class="dot" onclick="goToSlide(1)"></div>
            <div class="dot" onclick="goToSlide(2)"></div>
            <div class="dot" onclick="goToSlide(3)"></div>
            <div class="dot" onclick="goToSlide(4)"></div>
            <div class="dot" onclick="goToSlide(5)"></div>
            <div class="dot" onclick="goToSlide(6)"></div>
            <div class="dot" onclick="goToSlide(7)"></div>
        </div>
    </section>

    <!-- ========== HERO FEATURES SECTION ========== -->
    <section class="hero-features-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="hero-feature-card">
                        <div class="hero-feature-icon-wrapper">
                            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="Teacher Access">
                        </div>
                        <h3 class="hero-feature-title">Teacher Access</h3>
                        <p class="hero-feature-desc">Secure login for teachers to manage their student data and examinations.</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="hero-feature-card">
                        <div class="hero-feature-icon-wrapper">
                            <img src="https://cdn-icons-png.flaticon.com/512/3589/3589030.png" alt="Multi-School">
                        </div>
                        <h3 class="hero-feature-title">Multi-School</h3>
                        <p class="hero-feature-desc">One teacher can create and manage multiple organized schools efficiently.</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="hero-feature-card">
                        <div class="hero-feature-icon-wrapper">
                            <img src="https://cdn-icons-png.flaticon.com/512/4323/4323013.png" alt="Subject-Based">
                        </div>
                        <h3 class="hero-feature-title">Subject-Based</h3>
                        <p class="hero-feature-desc">Comprehensive management of all subjects with unified joint examination processing.</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="hero-feature-card">
                        <div class="hero-feature-icon-wrapper">
                            <img src="https://cdn-icons-png.flaticon.com/512/2641/2641409.png" alt="CA Tracking">
                        </div>
                        <h3 class="hero-feature-title">CA Tracking</h3>
                        <p class="hero-feature-desc">Record and track Continuous Assessment and monitor student trends.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                    <div class="about-image-wrapper">
                        <div class="about-image">
                            <img src="{{ asset('hero/analyzing-business-activity.jpg') }}" alt="Analysis">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="section-badge">
                        <i class="fas fa-info-circle"></i>
                        <span>About EMaS</span>
                    </div>
                    <h2 class="section-title">Transforming Education Management</h2>
                    <p class="section-desc">
                        Electronic Marking System (EMaS) is a comprehensive web-based platform designed to revolutionize how educational institutions manage and process examination results. Our system ensures data accuracy, reduces manual errors, and improves overall efficiency.
                    </p>
                    <ul class="about-list">
                        <li>
                            <i class="fas fa-shield-alt"></i>
                            <span>Secure and organized handling of examination data</span>
                        </li>
                        <li>
                            <i class="fas fa-user-lock"></i>
                            <span>Role-based access control for authorized managers</span>
                        </li>
                        <li>
                            <i class="fas fa-chart-line"></i>
                            <span>Real-time result processing and analytics</span>
                        </li>
                        <li>
                            <i class="fas fa-university"></i>
                            <span>Multi-school management capabilities</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <div class="section-badge mx-auto">
                    <span>Core Features</span>
                </div>
                <h2 class="section-title">Powerful Features for Modern Education</h2>
                <p class="section-desc mx-auto" style="max-width: 600px;">
                    Discover the tools that make EMaS the preferred choice for educational institutions across Tanzania.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="Secure Access">
                        </div>
                        <h3 class="feature-title">Secure Access</h3>
                        <p class="feature-desc">Role-based authentication ensures only authorized personnel can access sensitive examination data.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <img src="https://cdn-icons-png.flaticon.com/512/3589/3589030.png" alt="Multi-School">
                        </div>
                        <h3 class="feature-title">Multi-School Management</h3>
                        <p class="feature-desc">Create and manage multiple schools under one account with unified data processing.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <img src="https://cdn-icons-png.flaticon.com/512/4323/4323013.png" alt="Subject Management">
                        </div>
                        <h3 class="feature-title">Subject Management</h3>
                        <p class="feature-desc">Comprehensive management of all subjects with unified joint examination processing.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <img src="https://cdn-icons-png.flaticon.com/512/2641/2641409.png" alt="CA Tracking">
                        </div>
                        <h3 class="feature-title">CA Tracking</h3>
                        <p class="feature-desc">Record and track Continuous Assessment scores and monitor student performance trends.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <img src="https://cdn-icons-png.flaticon.com/512/681/681494.png" alt="Student Records">
                        </div>
                        <h3 class="feature-title">Student Records</h3>
                        <p class="feature-desc">Manage comprehensive student records and assign them to schools and subjects.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828946.png" alt="Auto Analysis">
                        </div>
                        <h3 class="feature-title">Auto Analysis</h3>
                        <p class="feature-desc">Automatic calculation of results, rankings, and comprehensive analytics.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="700">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <img src="https://cdn-icons-png.flaticon.com/512/201/201614.png" alt="Joint Exams">
                        </div>
                        <h3 class="feature-title">Joint Exams</h3>
                        <p class="feature-desc">Efficient management of joint examinations across multiple schools and subjects.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="800">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828919.png" alt="Bulk Import">
                        </div>
                        <h3 class="feature-title">Bulk Import</h3>
                        <p class="feature-desc">Import student and school data in bulk using Excel templates for quick setup.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="900">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828919.png" alt="Modern UI">
                        </div>
                        <h3 class="feature-title">Modern UI</h3>
                        <p class="feature-desc">Clean and professional interface designed for ease of use and efficiency.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== PROCESS SECTION ========== -->
    <section class="how-it-works-section" id="how-it-works">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <div class="section-badge mx-auto">
                    <span>Process / Role-Based Workflow</span>
                </div>
                <h2 class="section-title">How It Works</h2>
                <p class="section-desc mx-auto" style="max-width: 700px;">
                    Our system is designed with specific workflows for different management levels to ensure efficiency and data integrity.
                </p>
            </div>

            <!-- Role Switcher -->
            <div class="role-switcher" data-aos="fade-up">
                <div class="role-btn active" onclick="switchRole('council')">Council Manager</div>
                <div class="role-btn" onclick="switchRole('school')">School Manager</div>
            </div>

            <!-- Council Manager Workflow -->
            <div class="process-steps active" id="council-workflow" data-aos="fade-up">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <i class="fas fa-user-plus step-icon"></i>
                    <h3 class="step-title">Jisajili</h3>
                    <p class="step-desc">Jisajili kama Council/Exam Manager wa Wilaya au Mkoa wako kwa usalama.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">2</div>
                    <i class="fas fa-school step-icon"></i>
                    <h3 class="step-title">Setup Schools & Clerks</h3>
                    <p class="step-desc">Ongeza shule zote, masomo, na sajili Clerks na Data Entrants kwa ajili ya uingizaji wa alama.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">3</div>
                    <i class="fas fa-tasks step-icon"></i>
                    <h3 class="step-title">Manage Centers</h3>
                    <p class="step-desc">Simamia vituo vya mitihani, panga wasimamizi na hakikisha usalama wa data kila hatua.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">4</div>
                    <i class="fas fa-file-invoice-dollar step-icon"></i>
                    <h3 class="step-title">Joint Analysis</h3>
                    <p class="step-desc">Zalisha matokeo ya pamoja, fanya uchambuzi wa kiwilaya na kulinganisha ufaulu wa shule.</p>
                </div>
            </div>

            <!-- School Manager Workflow -->
            <div class="process-steps" id="school-workflow" data-aos="fade-up">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <i class="fas fa-id-card step-icon"></i>
                    <h3 class="step-title">School Registration</h3>
                    <p class="step-desc">Jisajili chini ya shule yako na thibitisha umiliki wa kituo chako cha mitihani.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">2</div>
                    <i class="fas fa-users-cog step-icon"></i>
                    <h3 class="step-title">Student & Subject Setup</h3>
                    <p class="step-desc">Sajili wanafunzi, panga madarasa na walimu wa masomo na kugawa majukumu ya uingizaji alama.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">3</div>
                    <i class="fas fa-edit step-icon"></i>
                    <h3 class="step-title">Mark Entry</h3>
                    <p class="step-desc">Ingiza alama za Mock, Midterm au Annual kwa usahihi kupitia mfumo wetu rahisi.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">4</div>
                    <i class="fas fa-chart-pie step-icon"></i>
                    <h3 class="step-title">Internal Reports</h3>
                    <p class="step-desc">Pata ripoti za ufaulu wa kila mwanafunzi, somo na darasa kwa ujumla papo hapo.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section" id="testimonials">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <div class="section-badge mx-auto">
                    <i class="fas fa-quote-left"></i>
                    <span>Testimonials</span>
                </div>
                <h2 class="section-title">What Educators Say</h2>
                <p class="section-desc mx-auto" style="max-width: 700px;">
                    Feedback from educators across Tanzania using EMaS to improve examination processing and reporting.
                </p>
            </div>

            <div class="testimonials-wrap" data-aos="fade-up">
                <figure class="testimonial-figure active" data-testimonial-index="0">
                    <svg class="testimonial-quote-icon" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor"/>
                    </svg>
                    <blockquote>
                        <p class="testimonial-text">"EMaS imerahisisha usimamizi wa mitihani ya pamoja. Uchambuzi wa matokeo unapatikana haraka na kwa usahihi."</p>
                    </blockquote>
                    <figcaption class="testimonial-caption">
                        <img class="testimonial-avatar" src="https://ui-avatars.com/api/?name=Neema+Mashauri&background=0D8ABC&color=fff&size=128" alt="Neemaashauri">
                        <div class="testimonial-meta">
                            <div class="testimonial-name">Neema Mashauri</div>
                            <div class="testimonial-role">Head Teacher, Dodoma</div>
                        </div>
                    </figcaption>
                </figure>

                <figure class="testimonial-figure" data-testimonial-index="1">
                    <svg class="testimonial-quote-icon" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor"/>
                    </svg>
                    <blockquote>
                        <p class="testimonial-text">"Kwa shule yetu, uingizaji wa alama na utoaji wa ripoti umekuwa rahisi. Mfumo ni wa kisasa na unaeleweka."</p>
                    </blockquote>
                    <figcaption class="testimonial-caption">
                        <img class="testimonial-avatar" src="https://ui-avatars.com/api/?name=Hassan+Mwinuka&background=CC3333&color=fff&size=128" alt="HassanMwinuka">
                        <div class="testimonial-meta">
                            <div class="testimonial-name">Hassan Mwinuka</div>
                            <div class="testimonial-role">School Manager, Morogoro</div>
                        </div>
                    </figcaption>
                </figure>

                <figure class="testimonial-figure" data-testimonial-index="2">
                    <svg class="testimonial-quote-icon" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor"/>
                    </svg>
                    <blockquote>
                        <p class="testimonial-text">"Ufuatiliaji wa CA na matokeo ya Mock umeboreshwa sana. Tunapata takwimu na trend za wanafunzi kwa wakati."</p>
                    </blockquote>
                    <figcaption class="testimonial-caption">
                        <img class="testimonial-avatar" src="https://ui-avatars.com/api/?name=Asha+Kibwana&background=065F46&color=fff&size=128" alt="AshaKibwana">
                        <div class="testimonial-meta">
                            <div class="testimonial-name">Asha Kibwana</div>
                            <div class="testimonial-role">Academic Master, Mwanza</div>
                        </div>
                    </figcaption>
                </figure>

                <figure class="testimonial-figure" data-testimonial-index="3">
                    <svg class="testimonial-quote-icon" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor"/>
                    </svg>
                    <blockquote>
                        <p class="testimonial-text">"Kama Council Manager, naweza kusimamia shule nyingi, kuassign clerks, na kupata matokeo ya pamoja kwa click chache."</p>
                    </blockquote>
                    <figcaption class="testimonial-caption">
                        <img class="testimonial-avatar" src="https://ui-avatars.com/api/?name=Godfrey+Mashauri&background=111827&color=fff&size=128" alt="GodfreyMashauri">
                        <div class="testimonial-meta">
                            <div class="testimonial-name">Godfrey Mashauri</div>
                            <div class="testimonial-role">Council Manager, Arusha</div>
                        </div>
                    </figcaption>
                </figure>

                <div class="testimonial-dots">
                    <div class="testimonial-dot active" onclick="goToTestimonial(0)"></div>
                    <div class="testimonial-dot" onclick="goToTestimonial(1)"></div>
                    <div class="testimonial-dot" onclick="goToTestimonial(2)"></div>
                    <div class="testimonial-dot" onclick="goToTestimonial(3)"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container" data-aos="fade-up">
            <div class="cta-card">
                <h2 class="cta-title">Ready to Transform Your Examination Management?</h2>
                <p class="cta-desc">Join hundreds of schools already using EMaS to streamline their examination processes.</p>
                <a href="{{ route('login') }}" class="btn btn-cta">
                    <i class="fas fa-rocket me-2"></i>Get Started Now
                </a>
            </div>
        </div>
    </section>

    @include('landing.partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 1000,
                once: true
            });

            // --- Background Slider Logic ---
            const slides = document.querySelectorAll('.slide-item');
            const dots = document.querySelectorAll('.dot');
            let currentSlide = 0;
            const slideInterval = 6000; // 6 seconds

            function showSlide(n) {
                slides.forEach(slide => slide.classList.remove('active'));
                dots.forEach(dot => dot.classList.remove('active'));
                
                currentSlide = (n + slides.length) % slides.length;
                slides[currentSlide].classList.add('active');
                dots[currentSlide].classList.add('active');
            }

            window.goToSlide = function(n) {
                showSlide(n);
                resetInterval();
            };

            let autoSlide = setInterval(() => showSlide(currentSlide + 1), slideInterval);

            function resetInterval() {
                clearInterval(autoSlide);
                autoSlide = setInterval(() => showSlide(currentSlide + 1), slideInterval);
            }

            // --- Typing Effect Logic ---
            const typedTextElement = document.getElementById('typedText');
            const phrases = [
                "Streamlining Mock Exams Across Tanzania",
                "Accurate Result Processing & Analysis",
                "Efficient Joint Assessments for Schools",
                "Data-Driven Education Management System",
                "Secure Student Performance Tracking",
                "Automated Rankings and Result Reports",
                "Connecting Educators and Students Effectively",
                "Modern Solutions for Educational Challenges"
            ];
            let phraseIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            let typeSpeed = 100;

            function type() {
                const currentPhrase = phrases[phraseIndex];
                
                if (isDeleting) {
                    typedTextElement.textContent = currentPhrase.substring(0, charIndex - 1);
                    charIndex--;
                    typeSpeed = 50;
                } else {
                    typedTextElement.textContent = currentPhrase.substring(0, charIndex + 1);
                    charIndex++;
                    typeSpeed = 100;
                }

                if (!isDeleting && charIndex === currentPhrase.length) {
                    isDeleting = true;
                    typeSpeed = 2000; // Pause at end
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    phraseIndex = (phraseIndex + 1) % phrases.length;
                    typeSpeed = 500;
                }

                setTimeout(type, typeSpeed);
            }

            type(); // Start typing effect

            // Role Switcher Logic
            window.switchRole = function(role) {
                // Update buttons
                document.querySelectorAll('.role-btn').forEach(btn => {
                    btn.classList.remove('active');
                    if (btn.textContent.toLowerCase().includes(role)) {
                        btn.classList.add('active');
                    }
                });

                // Update workflows
                document.querySelectorAll('.process-steps').forEach(steps => {
                    steps.classList.remove('active');
                    steps.style.display = 'none';
                });

                const targetWorkflow = document.getElementById(role + '-workflow');
                targetWorkflow.classList.add('active');
                targetWorkflow.style.display = 'flex';
                
                // Trigger AOS refresh
                if (typeof AOS !== 'undefined') {
                    AOS.refresh();
                }
            };

            // --- Newsletter Subscription Logic ---
            const newsletterForm = document.querySelector('.footer-newsletter');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const emailInput = this.querySelector('input[name="email"]');
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const originalBtnContent = submitBtn.innerHTML;
                    
                    // Create message element if not exists
                    let msgDiv = document.getElementById('newsletter-message');
                    if (!msgDiv) {
                        msgDiv = document.createElement('div');
                        msgDiv.id = 'newsletter-message';
                        msgDiv.style.marginTop = '10px';
                        msgDiv.style.fontSize = '0.85rem';
                        msgDiv.style.borderRadius = '8px';
                        msgDiv.style.padding = '8px 12px';
                        newsletterForm.parentNode.insertBefore(msgDiv, newsletterForm.nextSibling);
                    }
                    
                    // Reset message
                    msgDiv.style.display = 'none';
                    msgDiv.className = '';
                    
                    // Validation
                    if (!emailInput.value) {
                        msgDiv.textContent = 'Tafadhali weka barua pepe yako.';
                        msgDiv.style.color = '#ef4444';
                        msgDiv.style.display = 'block';
                        return;
                    }
                    
                    // Loading state
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Inatuma...';
                    
                    // AJAX Request
                    fetch('{{ route("newsletter.subscribe") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ email: emailInput.value })
                    })
                    .then(response => response.json())
                    .then(data => {
                        msgDiv.textContent = data.message;
                        msgDiv.style.display = 'block';
                        
                        if (data.success) {
                            msgDiv.style.color = '#4ade80';
                            msgDiv.style.backgroundColor = 'rgba(74, 222, 128, 0.1)';
                            emailInput.value = '';
                        } else {
                            msgDiv.style.color = '#ef4444';
                            msgDiv.style.backgroundColor = 'rgba(239, 68, 68, 0.1)';
                        }
                    })
                    .catch(error => {
                        msgDiv.textContent = 'Kumeshindikana kuunganisha na server. Jaribu tena.';
                        msgDiv.style.color = '#ef4444';
                        msgDiv.style.backgroundColor = 'rgba(239, 68, 68, 0.1)';
                        msgDiv.style.display = 'block';
                    })
                    .finally(() => {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnContent;
                    });
                });
            }

            // --- Testimonials Slider Logic ---
            const testimonialFigures = document.querySelectorAll('.testimonial-figure');
            const testimonialDots = document.querySelectorAll('.testimonial-dot');
            let currentTestimonial = 0;
            const testimonialInterval = 6500;

            function showTestimonial(n) {
                if (!testimonialFigures.length) return;

                testimonialFigures.forEach(f => f.classList.remove('active'));
                testimonialDots.forEach(d => d.classList.remove('active'));

                currentTestimonial = (n + testimonialFigures.length) % testimonialFigures.length;
                testimonialFigures[currentTestimonial].classList.add('active');
                if (testimonialDots[currentTestimonial]) {
                    testimonialDots[currentTestimonial].classList.add('active');
                }
            }

            window.goToTestimonial = function(n) {
                showTestimonial(n);
                resetTestimonialInterval();
            };

            let autoTestimonials = setInterval(() => showTestimonial(currentTestimonial + 1), testimonialInterval);

            function resetTestimonialInterval() {
                clearInterval(autoTestimonials);
                autoTestimonials = setInterval(() => showTestimonial(currentTestimonial + 1), testimonialInterval);
            }

            // Header scroll effect
            window.addEventListener('scroll', function() {
                const header = document.querySelector('.main-header');
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // Mobile menu toggle
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

            // Mobile dropdown toggues
            document.querySelectorAll('.nav-item').forEach(item => {
                const link = item.querySelector('.nav-link');
                const dropdown = item.querySelector('.dropdown-menu-custom, .mega-menu');
                
                if (dropdown && window.innerWidth <= 991) {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        item.classList.toggle('show-dropdown');
                    });
                }
            });

            // Submenu toggues for mobile
            document.querySelectorAll('.has-submenu').forEach(item => {
                const link = item.querySelector('.dropdown-item-custom');
                link.addEventListener('click', function(e) {
                    if (window.innerWidth <= 991) {
                        e.preventDefault();
                        item.classList.toggle('show-submenu');
                    }
                });
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
