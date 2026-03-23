<header class="main-header">
    <div class="header-top">
        <div class="header-top-content">
            <div class="top-menu-links">
                <a href="tel:+255742710054" class="header-top-link mobile-top-show"><i class="fas fa-phone-alt"></i> +255 742 710 054</a>
                <a href="{{ route('login') }}" class="header-top-link mobile-top-show login-link-top"><i class="fas fa-sign-in-alt"></i> LOGIN</a>
                <a href="#" class="header-top-link desktop-only">Matokeo ya Somo Moja Joints</a>
                <a href="#" class="header-top-link desktop-only">Matokeo ya Shule Moja Moja</a>
                <a href="#" class="header-top-link desktop-only">Feedback</a>
                <a href="#" class="header-top-link desktop-only">e-Mrejesho</a>
            </div>
            <div class="top-search-container desktop-only">
                <form action="{{ route('landing.news.index') }}" method="GET">
                    <input type="text" name="search" class="top-search-input" placeholder="Search news, blogs...">
                    <button type="submit" class="top-search-btn"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="header-middle">
            <div class="gov-emblem-left">
                <img src="{{ asset('eco-e.png') }}" alt="EMaS" class="img-fluid">
            </div>
            <div class="header-middle-text">
                <div class="gov-text-top">Jamhuri ya Muungano wa Tanzania</div>
                <div class="gov-text-middle">Ofisi ya Rais, Menejimenti ya Utumishi wa Umma na Utawala Bora</div>
                <div class="gov-text-bottom">Electronic Marking System (EMaS)</div>
            </div>
            <div class="gov-emblem-right">
                <img src="{{ asset('Coat_of_arms_of_Tanzania.svg.png') }}" alt="Coat of Arms" class="img-fluid" style="border-radius: 5px;">
            </div>
        </div>
    </div>

    <div class="header-bottom-nav">
        <div class="container">
            <nav class="nav-container">
                <!-- Mobile Menu Button -->
                <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle menu">
                    <i class="fas fa-bars"></i>
                </button>
                
                <!-- Full Screen Mobile Menu Overlay -->
                <div class="mobile-menu-overlay" id="mobileOverlay">
                    <div class="mobile-menu-container">
                        <button class="mobile-menu-close" id="mobileCloseBtn">
                            <i class="fas fa-times"></i>
                        </button>
                        
                        <div class="mobile-menu-card">
                            <div class="mobile-menu-logo">
                                <img src="{{ asset('eco-e.png') }}" alt="EMaS Logo">
                            </div>
                            
                            <ul class="mobile-menu-list">
                                <li class="mobile-menu-item">
                                    <a href="{{ route('landing') }}" class="mobile-menu-link active">Home</a>
                                </li>
                                <li class="mobile-menu-item has-dropdown">
                                    <div class="mobile-menu-link-wrapper">
                                        <a href="#" class="mobile-menu-link">About Us</a>
                                        <i class="fas fa-chevron-down dropdown-icon"></i>
                                    </div>
                                    <ul class="mobile-submenu">
                                        <li><a href="{{ route('landing.about') }}">Kuhusu EMaS</a></li>
                                        <li><a href="{{ route('landing.about') }}#history">Historia yetu</a></li>
                                        <li><a href="{{ route('landing.about') }}#vision">Dira & Dhima</a></li>
                                        <li><a href="{{ route('landing.about') }}#contact">Wasiliana Nasi</a></li>
                                    </ul>
                                </li>
                                <li class="mobile-menu-item">
                                    <a href="{{ route('landing.contact') }}" class="mobile-menu-link">Contact Us</a>
                                </li>
                                <li class="mobile-menu-item">
                                    <a href="{{ route('landing.guideline') }}" class="mobile-menu-link">Guideline</a>
                                </li>
                                <li class="mobile-menu-item">
                                    <a href="{{ route('landing.materials') }}" class="mobile-menu-link">Materials</a>
                                </li>
                                <li class="mobile-menu-item">
                                    <a href="{{ route('landing.examinations.index') }}" class="mobile-menu-link">Examinations</a>
                                </li>
                                <li class="mobile-menu-item has-dropdown">
                                    <div class="mobile-menu-link-wrapper">
                                        <a href="#" class="mobile-menu-link">Results</a>
                                        <i class="fas fa-chevron-down dropdown-icon"></i>
                                    </div>
                                    <ul class="mobile-submenu">
                                        @if(isset($navExamTypes) && $navExamTypes->count())
                                            @foreach($navExamTypes as $t)
                                                <li><a href="{{ route('landing.results.type', $t->slug) }}">{{ $t->name }} Results</a></li>
                                            @endforeach
                                        @else
                                            <li><a href="#">Mock Results</a></li>
                                            <li><a href="#">Joint Results</a></li>
                                            <li><a href="#">Midterm Results</a></li>
                                            <li><a href="#">Annual Results</a></li>
                                        @endif
                                    </ul>
                                </li>
                                <li class="mobile-menu-item">
                                    <a href="{{ route('landing.news.index') }}" class="mobile-menu-link">News</a>
                                </li>
                                <li class="mobile-menu-item">
                                    <a href="{{ route('landing.tafiti.index') }}" class="mobile-menu-link">Tafiti</a>
                                </li>
                                <li class="mobile-menu-item">
                                    <a href="{{ route('login') }}" class="mobile-menu-link">Staff Portal</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <ul class="nav-menu" id="mainNav">
                    <li class="nav-item">
                        <a href="{{ route('landing') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">About Us <i class="fas fa-chevron-down"></i></a>
                        <div class="dropdown-menu-custom">
                            <a href="{{ route('landing.about') }}" class="dropdown-item-custom">Kuhusu EMaS</a>
                            <a href="{{ route('landing.about') }}#history" class="dropdown-item-custom">Historia yetu</a>
                            <a href="{{ route('landing.about') }}#vision" class="dropdown-item-custom">Dira &amp; Dhima</a>
                            <a href="{{ route('landing.about') }}#contact" class="dropdown-item-custom">Wasiliana Nasi</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('landing.contact') }}" class="nav-link">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('landing.guideline') }}" class="nav-link">Guideline</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('landing.materials') }}" class="nav-link">Materials</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('landing.examinations.index') }}" class="nav-link">Examinations <span class="hot-label">HOT</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Results <i class="fas fa-chevron-down"></i> <span class="new-label">NEW</span></a>
                        <div class="dropdown-menu-custom">
                            @if(isset($navExamTypes) && $navExamTypes->count())
                                @foreach($navExamTypes as $t)
                                    <a href="{{ route('landing.results.type', $t->slug) }}" class="dropdown-item-custom">
                                        <i class="fas fa-file-alt"></i> {{ $t->name }} Results
                                    </a>
                                @endforeach
                            @else
                                <a href="#" class="dropdown-item-custom"><i class="fas fa-file-alt"></i> Mock Results</a>
                                <a href="#" class="dropdown-item-custom"><i class="fas fa-users"></i> Joint Results</a>
                                <a href="#" class="dropdown-item-custom"><i class="fas fa-calendar-alt"></i> Midterm Results</a>
                                <a href="#" class="dropdown-item-custom"><i class="fas fa-graduation-cap"></i> Annual Results</a>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('landing.news.index') }}" class="nav-link">News <span class="new-label">NEW</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('landing.tafiti.index') }}" class="nav-link">Tafiti <i class="fas fa-chevron-down"></i> <span class="new-label">NEW</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Staff Portal</a>
                    </li>
                </ul>

                <div class="nav-right-actions">
                    <a href="{{ route('register') }}" class="btn-nav-action btn-jisajili">
                        <i class="fas fa-user-plus"></i> JISAJILI
                    </a>
                    <a href="{{ route('login') }}" class="btn-nav-action btn-login-nav">
                        <i class="fas fa-sign-in-alt"></i> LOGIN
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileCloseBtn = document.getElementById('mobileCloseBtn');
    const mobileOverlay = document.getElementById('mobileOverlay');

    if (mobileMenuBtn && mobileOverlay) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    }

    if (mobileCloseBtn && mobileOverlay) {
        mobileCloseBtn.addEventListener('click', function() {
            mobileOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });
    }

    // Handle dropdown toggles
    document.querySelectorAll('.mobile-menu-item.has-dropdown').forEach(item => {
        const wrapper = item.querySelector('.mobile-menu-link-wrapper');
        const icon = item.querySelector('.dropdown-icon');
        
        if (wrapper) {
            wrapper.addEventListener('click', function(e) {
                e.preventDefault();
                item.classList.toggle('active');
            });
        }
    });
});
</script>
