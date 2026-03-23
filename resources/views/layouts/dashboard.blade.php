<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EMaS - {{ isset($pageTitle) ? $pageTitle : 'Dashboard' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('eco-e.png') }}">
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background: linear-gradient(135deg, #f0f4f8 0%, #e8f4f0 100%);
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: #343a40;
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }
        /* Sidebar Collapsed State */
        .sidebar.collapsed {
            width: 70px;
        }
        .sidebar.collapsed .sidebar-brand,
        .sidebar.collapsed .menu-text,
        .sidebar.collapsed .menu-arrow,
        .sidebar.collapsed .menu-header,
        .sidebar.collapsed .user-info,
        .sidebar.collapsed .user-role {
            display: none;
        }
        .sidebar.collapsed .sidebar-header {
            justify-content: center;
            padding: 15px 0;
        }
        .sidebar.collapsed .menu-link {
            justify-content: center;
            padding: 12px 0;
        }
        .sidebar.collapsed .menu-icon {
            margin-right: 0;
            font-size: 1.2rem;
        }
        .sidebar.collapsed .sidebar-user {
            justify-content: center;
            padding: 15px 0;
        }
        .sidebar.collapsed .submenu {
            position: absolute;
            left: 70px;
            top: 0;
            background: #343a40;
            min-width: 180px;
            border-radius: 4px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.3);
            display: none;
            z-index: 1001;
            padding: 8px 0;
            max-height: none;
        }
        .sidebar.collapsed .menu-item:hover > .submenu,
        .sidebar.collapsed .menu-item.show-submenu > .submenu {
            display: block;
        }
        .sidebar.collapsed .submenu-link {
            padding: 8px 15px;
            white-space: nowrap;
        }
        .sidebar.collapsed .submenu-link::before {
            display: none;
        }
        .sidebar-header {
            padding: 15px 20px;
            background: #343a40;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #4b545c;
            min-height: 60px;
            flex-shrink: 0;
        }
        .sidebar-brand {
            color: rgba(255,255,255,.8);
            font-size: 1.4rem;
            font-weight: 400;
            white-space: nowrap;
            letter-spacing: 0.5px;
        }
        
        /* Sidebar Menu */
        .sidebar-menu {
            padding: 10px 0;
            flex-grow: 1;
        }
        .menu-header {
            color: #6c757d;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            padding: 12px 20px 8px;
            letter-spacing: 0.1em;
            border-top: 1px solid #4b545c;
            margin-top: 10px;
        }
        .menu-header:first-of-type {
            border-top: none;
            margin-top: 0;
        }
        
        .menu-item {
            position: relative;
        }
        .menu-link {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: #c2c7d0;
            text-decoration: none;
            transition: all 0.3s ease;
            gap: 10px;
            cursor: pointer;
        }
        .menu-link:hover {
            background: rgba(255,255,255,.1);
            color: #fff;
        }
        .menu-link.active {
            background: #007bff;
            color: #fff;
            border-radius: 4px;
            margin: 0 10px;
        }
        .menu-icon {
            width: 24px;
            text-align: center;
            font-size: 1rem;
        }
        .menu-text {
            font-size: 0.9rem;
        }
        .submenu {
            background: transparent;
            margin-left: 0;
            border-left: none;
            padding: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .menu-item.open > .submenu {
            max-height: 500px;
        }
        .submenu-link {
            display: flex;
            align-items: center;
            color: #c2c7d0;
            padding: 8px 20px 8px 45px;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.2s;
            gap: 10px;
        }
        .submenu-link::before {
            content: "\f10c";
            font-family: "Font Awesome 6 Free";
            font-weight: 400;
            font-size: 0.6rem;
        }
        .submenu-link:hover {
            color: #fff;
            background: rgba(255,255,255,0.05);
        }
        .menu-arrow {
            margin-left: auto;
            font-size: 0.75rem;
            transition: transform 0.3s;
            color: #c2c7d0;
        }
        .menu-item.open > .menu-link .menu-arrow {
            transform: rotate(-90deg);
        }
        
        /* Sidebar User Panel */
        .sidebar-user {
            padding: 15px;
            border-top: 1px solid #4b545c;
            display: flex;
            align-items: center;
            gap: 12px;
            background: #343a40;
            flex-shrink: 0;
        }
        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #007bff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
        }
        .user-info {
            flex: 1;
            overflow: hidden;
        }
        .user-name {
            color: rgba(255,255,255,.8);
            font-weight: 400;
            font-size: 0.9rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .user-role {
            color: #6c757d;
            font-size: 0.75rem;
        }
        
        /* Top Header - AdminLTE Style */
        .top-header {
            background: #fff;
            height: 57px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            border-bottom: 1px solid #dee2e6;
            position: sticky;
            top: 0;
            z-index: 1030;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }
        .header-left {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .sidebar-toggle {
            color: #495057;
            padding: .5rem .75rem;
            cursor: pointer;
            background: transparent;
            border: none;
            font-size: 1.1rem;
            transition: color 0.2s;
        }
        .sidebar-toggle:hover {
            color: #007bff;
        }
        .search-box {
            position: relative;
        }
        .search-box input {
            padding: 6px 12px 6px 35px;
            border: 1px solid #d9d9d9;
            border-radius: 4px;
            width: 180px;
            font-size: 0.875rem;
            background: #f8f9fa;
            transition: all 0.3s ease;
        }
        .search-box input:focus {
            width: 220px;
            background: #fff;
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        .search-box i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
        .header-icon {
            padding: .5rem .75rem;
            color: #495057;
            background: transparent;
            border: none;
            position: relative;
            font-size: 1rem;
            cursor: pointer;
            transition: color 0.2s;
        }
        .header-icon:hover {
            color: #007bff;
        }
        .notification-badge {
            position: absolute;
            top: 4px;
            right: 4px;
            background: #dc3545;
            color: #fff;
            padding: 2px 5px;
            font-size: 0.6rem;
            border-radius: 10px;
            font-weight: 600;
            min-width: 18px;
            text-align: center;
        }
        
        .user-dropdown {
            position: relative;
            margin-left: 0.5rem;
        }
        .user-dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 5px 10px;
            color: #495057;
            text-decoration: none;
            font-size: 0.9rem;
            cursor: pointer;
            border-radius: 4px;
            transition: background 0.2s;
        }
        .user-dropdown-toggle:hover {
            background: #f8f9fa;
        }
        .user-dropdown-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid #fff;
            box-shadow: 0 0 0 2px #e5e7eb;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f3f4f6;
        }
        .user-avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .user-dropdown-name {
            font-weight: 400;
            max-width: 120px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .user-dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border: none;
            border-radius: 4px;
            box-shadow: 0 10px 40px rgba(0,0,0,.15);
            min-width: 200px;
            margin-top: 8px;
            display: none;
            z-index: 1050;
            padding: 8px 0;
        }
        .user-dropdown-menu.show {
            display: block;
            animation: fadeInDown 0.2s ease;
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .dropdown-menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            color: #495057;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s;
        }
        .dropdown-menu-item:hover {
            background-color: #f8f9fa;
            color: #212529;
        }
        .dropdown-menu-item i {
            width: 18px;
            text-align: center;
            color: #6c757d;
        }
        .dropdown-divider {
            height: 1px;
            background: #e9ecef;
            margin: 5px 0;
        }
        .dropdown-menu-item.logout {
            color: #dc3545;
        }
        .dropdown-menu-item.logout i {
            color: #dc3545;
        }
        .dropdown-menu-item.logout:hover {
            background: rgba(220, 53, 69, 0.1);
        }
        
        /* Main Content */
        .main-content {
            margin-left: 250px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: #f4f6f9;
            min-height: 100vh;
            width: calc(100% - 250px);
            display: flex;
            flex-direction: column;
        }
        .main-content.expanded {
            margin-left: 70px;
            width: calc(100% - 70px);
        }
        
        .content-area {
            padding: 15px;
            flex-grow: 1;
        }
        
        /* Stats Box (AdminLTE style) */
        .small-box {
            border-radius: .25rem;
            box-shadow: 0 0 1px rgba(0,0,0,.125),0 1px 3px rgba(0,0,0,.2);
            display: block;
            margin-bottom: 20px;
            position: relative;
            color: #fff;
        }
        .small-box > .inner {
            padding: 10px;
        }
        .small-box h3 {
            font-size: 2.2rem;
            font-weight: 700;
            margin: 0 0 10px;
            padding: 0;
            white-space: nowrap;
        }
        .small-box p {
            font-size: 1rem;
        }
        .small-box .icon {
            color: rgba(0,0,0,.15);
            z-index: 0;
        }
        .small-box .icon > i {
            font-size: 70px;
            position: absolute;
            right: 15px;
            top: 15px;
            transition: transform .3s linear;
        }
        .small-box:hover .icon > i {
            transform: scale(1.1);
        }
        .small-box > .small-box-footer {
            background-color: rgba(0,0,0,.1);
            color: rgba(255,255,255,.8);
            display: block;
            padding: 3px 0;
            position: relative;
            text-align: center;
            text-decoration: none;
            z-index: 10;
        }
        .small-box > .small-box-footer:hover {
            background-color: rgba(0,0,0,.15);
            color: #fff;
        }

        .bg-info { background-color: #17a2b8 !important; }
        .bg-success { background-color: #28a745 !important; }
        .bg-warning { background-color: #ffc107 !important; }
        .bg-danger { background-color: #dc3545 !important; }

        /* Card & Table */
        .card {
            box-shadow: 0 0 1px rgba(0,0,0,.125),0 1px 3px rgba(0,0,0,.2);
            margin-bottom: 1rem;
            background: #fff;
            border-radius: .25rem;
            border: none;
        }
        .card-header {
            background-color: transparent;
            border-bottom: 1px solid rgba(0,0,0,.125);
            padding: .75rem 1.25rem;
            position: relative;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
        }
        .card-title {
            float: left;
            font-size: 1.1rem;
            font-weight: 400;
            margin: 0;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent;
            border-collapse: collapse;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            text-align: inherit;
            padding: .75rem;
            text-transform: uppercase;
            font-size: 0.8rem;
            color: #495057;
        }
        .table td {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
            font-size: 0.9rem;
        }
        .badge-inc {
            background-color: #17a2b8;
            color: #fff;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            border-radius: .25rem;
        }
        
        /* Quick Links */
        .quick-link-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 10px 0;
            border-bottom: 1px solid #f4f6f9;
        }
        .quick-link-icon {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            color: #007bff;
            border: 1px solid #dee2e6;
        }
        
        .btn-view-all {
            border: 1px solid #007bff;
            color: #007bff;
            border-radius: 20px;
            padding: 2px 15px;
            font-size: 0.8rem;
            text-decoration: none;
        }
        .btn-view-all:hover {
            background: #007bff;
            color: #fff;
        }
        
        /* Page Header */
        .page-header {
            margin-bottom: 25px;
        }
        .page-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: #1f2937;
        }
        .page-breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            color: #6b7280;
            margin-top: 5px;
        }
        .page-breadcrumb a {
            color: #065f46;
            text-decoration: none;
            font-weight: 500;
        }
        .page-breadcrumb a:hover {
            text-decoration: underline;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            .search-box input {
                width: 150px;
            }
            .search-box input:focus {
                width: 180px;
            }
            .top-header {
                padding: 0 0.75rem;
            }
        }
        @media (max-width: 768px) {
            .search-box {
                display: none;
            }
            .user-dropdown-name {
                display: none;
            }
            .header-icon {
                padding: .5rem .5rem;
            }
        }
        @media (max-width: 576px) {
            .content-area {
                padding: 10px;
            }
            .top-header {
                height: 50px;
            }
        }
    </style>
    @stack('styles')
</head><body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <span class="sidebar-brand">EMAS</span>
        </div>
        
        <nav class="sidebar-menu">
            <div class="menu-item">
                <a href="{{ route('home') }}" class="menu-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="menu-icon fas fa-tachometer-alt"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </div>
            
            <div class="menu-header">MAIN MENU</div>
            
            <div class="menu-item">
                <div class="menu-link" onclick="toggleSubmenu(this)">
                    <i class="menu-icon fas fa-school"></i>
                    <span class="menu-text">Schools</span>
                    <i class="menu-arrow fas fa-chevron-left"></i>
                </div>
                <div class="submenu">
                    <a href="{{ route('schools.index') }}" class="submenu-link">List Schools</a>
                    <a href="{{ route('schools.create') }}" class="submenu-link">Add School</a>
                    <a href="{{ route('schools.import-page') }}" class="submenu-link">Import Schools</a>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-link" onclick="toggleSubmenu(this)">
                    <i class="menu-icon fas fa-user-graduate"></i>
                    <span class="menu-text">Students</span>
                    <i class="menu-arrow fas fa-chevron-left"></i>
                </div>
                <div class="submenu">
                    <a href="{{ route('students.index') }}" class="submenu-link">List Students</a>
                    <a href="{{ route('students.create') }}" class="submenu-link">Add Student</a>
                    <a href="{{ route('students.import-page') }}" class="submenu-link">Import Students</a>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-link" onclick="toggleSubmenu(this)">
                    <i class="menu-icon fas fa-book"></i>
                    <span class="menu-text">Subjects</span>
                    <i class="menu-arrow fas fa-chevron-left"></i>
                </div>
                <div class="submenu">
                    <a href="#" class="submenu-link">All Subjects</a>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-link" onclick="toggleSubmenu(this)">
                    <i class="menu-icon fas fa-edit"></i>
                    <span class="menu-text">Exams</span>
                    <i class="menu-arrow fas fa-chevron-left"></i>
                </div>
                <div class="submenu">
                    <a href="#" class="submenu-link">All Exams</a>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-link" onclick="toggleSubmenu(this)">
                    <i class="menu-icon fas fa-file-invoice"></i>
                    <span class="menu-text">Marks</span>
                    <i class="menu-arrow fas fa-chevron-left"></i>
                </div>
                <div class="submenu">
                    <a href="#" class="submenu-link">Enter Marks</a>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-link" onclick="toggleSubmenu(this)">
                    <i class="menu-icon fas fa-chart-line"></i>
                    <span class="menu-text">Results</span>
                    <i class="menu-arrow fas fa-chevron-left"></i>
                </div>
                <div class="submenu">
                    <a href="#" class="submenu-link">View Results</a>
                </div>
            </div>

            <div class="menu-header">SETTINGS</div>

            <div class="menu-item">
                <div class="menu-link" onclick="toggleSubmenu(this)">
                    <i class="menu-icon fas fa-comment-alt"></i>
                    <span class="menu-text">SMS & Notifications</span>
                    <i class="menu-arrow fas fa-chevron-left"></i>
                </div>
                <div class="submenu">
                    <a href="#" class="submenu-link">Send SMS</a>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-link" onclick="toggleSubmenu(this)">
                    <i class="menu-icon fas fa-cog"></i>
                    <span class="menu-text">Settings</span>
                    <i class="menu-arrow fas fa-chevron-left"></i>
                </div>
                <div class="submenu">
                    <a href="{{ route('settings.index') }}" class="submenu-link">System Settings</a>
                </div>
            </div>
        </nav>
        
        @auth('manager')
        <div class="sidebar-user">
            <div class="user-avatar">{{ strtoupper(Auth::guard('manager')->user()->full_name[0]) }}</div>
            <div class="user-info">
                <div class="user-name">{{ Auth::guard('manager')->user()->full_name }}</div>
                <div class="user-role">{{ ucfirst(Auth::guard('manager')->user()->role) }}</div>
            </div>
        </div>
        @endauth
    </aside>
    
    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Top Header -->
        <header class="top-header">
            <div class="header-left">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search...">
                </div>
            </div>
            
            <div class="header-right">
                <button class="header-icon">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </button>
                <button class="header-icon">
                    <i class="fas fa-envelope"></i>
                    <span class="notification-badge">5</span>
                </button>
                
                @auth('manager')
                <div class="user-dropdown">
                    <div class="user-dropdown-toggle" id="userDropdownToggle">
                        <div class="user-dropdown-avatar">
                            <img class="user-avatar-img profile-image-preview" src="{{ Auth::guard('manager')->user()->profile_photo ? asset('storage/' . Auth::guard('manager')->user()->profile_photo) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::guard('manager')->user()->full_name) . '&color=7F9CF5&background=EBF4FF' }}" alt="{{ Auth::guard('manager')->user()->full_name }}">
                        </div>
                        <span class="user-dropdown-name">{{ Auth::guard('manager')->user()->full_name }}</span>
                        <i class="fas fa-chevron-down" style="font-size: 0.7rem; color: #6b7280;"></i>
                    </div>
                    <div class="user-dropdown-menu" id="userDropdownMenu">
                        <a href="{{ route('profile.index') }}" class="dropdown-menu-item">
                            <i class="fas fa-user"></i>
                            <span>My Profile</span>
                        </a>
                        <a href="{{ route('profile.index') }}#password" class="dropdown-menu-item">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-menu-item logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                @endauth
            </div>
        </header>
        
        <!-- Content Area -->
        <div class="content-area">
            @yield('content')
        </div>
    </div>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Cropper.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true,
                easing: 'ease-out-cubic'
            });
            
            // Sidebar Toggle
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
                
                // For mobile
                if (window.innerWidth <= 992) {
                    sidebar.classList.toggle('show');
                }
            });
            
            // User Dropdown
            const userDropdownToggle = document.getElementById('userDropdownToggle');
            const userDropdownMenu = document.getElementById('userDropdownMenu');
            
            userDropdownToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                userDropdownMenu.classList.toggle('show');
            });
            
            document.addEventListener('click', function(e) {
                if (!userDropdownMenu.contains(e.target) && !userDropdownToggle.contains(e.target)) {
                    userDropdownMenu.classList.remove('show');
                }
            });
            
            // Close sidebar on mobile when clicking outside
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 992) {
                    if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                        sidebar.classList.remove('show');
                    }
                }
            });
        });
        
        // Toggle Submenu
        function toggleSubmenu(element) {
            const menuItem = element.parentElement;
            const sidebar = document.getElementById('sidebar');
            const isCollapsed = sidebar.classList.contains('collapsed');
            
            if (isCollapsed) {
                // In collapsed mode, toggle popup submenu
                const siblings = menuItem.parentElement.querySelectorAll(':scope > .menu-item.show-submenu');
                siblings.forEach(sibling => {
                    if (sibling !== menuItem) {
                        sibling.classList.remove('show-submenu');
                    }
                });
                menuItem.classList.toggle('show-submenu');
            } else {
                // Normal mode - toggle open class
                const isOpen = menuItem.classList.contains('open');
                const siblings = menuItem.parentElement.querySelectorAll(':scope > .menu-item.open');
                siblings.forEach(sibling => {
                    if (sibling !== menuItem) {
                        sibling.classList.remove('open');
                    }
                });
                menuItem.classList.toggle('open');
            }
        }
        
        // Close popup submenus when clicking outside (collapsed mode)
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            if (sidebar.classList.contains('collapsed')) {
                if (!sidebar.contains(e.target)) {
                    document.querySelectorAll('.menu-item.show-submenu').forEach(item => {
                        item.classList.remove('show-submenu');
                    });
                }
            }
        });
    </script>
    
    <!-- Toast Container -->
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div id="toastSuccess" class="toast align-items-center text-white bg-success border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-check-circle me-2"></i>
                    <span id="toastSuccessMessage">Success!</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
        <div id="toastError" class="toast align-items-center text-white bg-danger border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <span id="toastErrorMessage">Error!</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
        <div id="toastWarning" class="toast align-items-center text-white bg-warning border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <span id="toastWarningMessage">Warning!</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
        <div id="toastInfo" class="toast align-items-center text-white bg-info border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-info-circle me-2"></i>
                    <span id="toastInfoMessage">Info!</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    
    <script>
    // Toast notification functions
    function showToast(type, message) {
        const toastEl = document.getElementById('toast' + type.charAt(0).toUpperCase() + type.slice(1));
        const messageEl = document.getElementById('toast' + type.charAt(0).toUpperCase() + type.slice(1) + 'Message');
        if (toastEl && messageEl) {
            messageEl.textContent = message;
            const toast = new bootstrap.Toast(toastEl, { delay: 4000 });
            toast.show();
        }
    }
    
    // Show session messages as toast
    @if(session('success'))
        document.addEventListener('DOMContentLoaded', function() {
            showToast('success', '{{ session('success') }}');
        });
    @endif
    @if(session('error'))
        document.addEventListener('DOMContentLoaded', function() {
            showToast('error', '{{ session('error') }}');
        });
    @endif
    </script>
    @stack('scripts')
</body>
</html>
