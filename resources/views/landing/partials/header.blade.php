<header class="main-header">
    <div class="header-top">
        <div class="header-top-content">
            <div class="top-menu-links">
                <a href="#" class="header-top-link">Maombi ya Mafunzo ya Muda Mfupi</a>
                <a href="#" class="header-top-link">Uthibitisho waliochaguliwa na TAMISEMI</a>
                <a href="#" class="header-top-link">Mfumo wa Maombi ya Kujiunga (OAS)</a>
                <a href="#" class="header-top-link">eMrejesho</a>
                <a href="#" class="header-top-link">Maswali</a>
                <a href="#" class="header-top-link">Barua pepe</a>
                <a href="#" class="header-top-link">TSIMS</a>
                <a href="#" class="header-top-link">e-Office</a>
                <a href="#" class="header-top-link">Wasiliana nasi</a>
                <a href="#" class="header-top-link">ENGLISH</a>
            </div>
            <div class="top-search-container">
                <input type="text" class="top-search-input" placeholder="Search...">
                <button class="top-search-btn"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="header-middle">
            <div class="gov-emblem-left">
                <img src="{{ asset('Coat_of_arms_of_Tanzania.svg.png') }}" alt="Coat of Arms" class="img-fluid">
            </div>
            <div class="header-middle-text">
                <div class="gov-text-top">Jamhuri ya Muungano wa Tanzania</div>
                <div class="gov-text-middle">Ofisi ya Rais, Menejimenti ya Utumishi wa Umma na Utawala Bora</div>
                <div class="gov-text-bottom">Electronic Marking System (EMaS)</div>
            </div>
            <div class="gov-emblem-right">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/38/Flag_of_Tanzania.svg/1200px-Flag_of_Tanzania.svg.png" alt="Tanzania Flag" class="img-fluid" style="border-radius: 5px;">
            </div>
        </div>
    </div>

    <div class="header-bottom-nav">
        <div class="container">
            <nav class="nav-container">
                <ul class="nav-menu">
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
