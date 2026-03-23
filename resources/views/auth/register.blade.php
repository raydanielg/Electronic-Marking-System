@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #ffffff;
        overflow-x: hidden;
    }
    .navbar {
        display: none;
    }
    .login-container {
        display: flex;
        max-width: 1100px;
        width: 100%;
        min-height: 600px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
        margin: auto;
        position: relative;
    }
    .wave-bg {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 0;
    }
    .wave-1 {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 200%;
        height: 200px;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23e0f2fe" fill-opacity="0.6" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
        background-size: 50% 100%;
        animation: wave-move 15s linear infinite;
    }
    .wave-2 {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 200%;
        height: 150px;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23bae6fd" fill-opacity="0.4" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,213.3C672,192,768,128,864,128C960,128,1056,192,1152,208C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
        background-size: 50% 100%;
        animation: wave-move 20s linear infinite reverse;
    }
    @keyframes wave-move {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .login-left {
        flex: 1.2;
        background: linear-gradient(rgba(43, 90, 142, 0.9), rgba(26, 54, 85, 0.9)), url('https://upload.wikimedia.org/wikipedia/commons/thumb/3/38/Flag_of_Tanzania.svg/1200px-Flag_of_Tanzania.svg.png');
        background-size: cover;
        background-position: center;
        padding: 50px;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        z-index: 1;
    }
    .login-left h1 {
        font-weight: 800;
        font-size: 2.2rem;
        margin-bottom: 20px;
        border-bottom: 2px solid rgba(255,255,255,0.3);
        padding-bottom: 10px;
    }
    .login-left .overview-text {
        font-size: 0.95rem;
        line-height: 1.6;
        text-align: justify;
    }
    .login-left .overview-text p {
        margin-bottom: 15px;
    }
    .login-right {
        flex: 0.8;
        background-color: #ffffff;
        padding: 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 1;
    }
    .coat-of-arms {
        width: 100px;
        margin-bottom: 20px;
    }
    .login-right h2 {
        font-weight: bold;
        margin-bottom: 20px;
        color: #1f2937;
    }
    .form-control {
        background-color: #f3f4f6;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        padding: 12px;
        margin-bottom: 15px;
    }
    .btn-login {
        background-color: #2b5a8e;
        color: white;
        border: none;
        width: 100%;
        padding: 12px;
        border-radius: 4px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .btn-login:hover {
        background-color: #1e3f64;
        color: white;
    }
    .btn-login-header {
        background-color: #cc3333;
        color: white !important;
        border-radius: 6px;
        padding: 8px 20px;
        font-weight: 800;
        text-transform: uppercase;
        font-size: 0.85rem;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 15px rgba(204, 51, 51, 0.3);
    }
    .btn-login-header:hover {
        background-color: #b32d2d;
        transform: scale(1.05);
    }
    .login-link {
        color: #065f46;
        font-weight: 700;
        text-decoration: none;
        font-size: 0.9rem;
        margin-left: 5px;
    }
    .login-link:hover {
        text-decoration: underline;
    }
    
    /* Step Progress Indicator */
    .step-progress {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 30px;
        gap: 20px;
    }
    .step-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .step-number {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: #d1d5db;
        color: #6b7280;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    .step-item.active .step-number {
        background-color: #065f46;
        color: white;
        box-shadow: 0 4px 12px rgba(6, 95, 70, 0.3);
    }
    .step-item.completed .step-number {
        background-color: #10b981;
        color: white;
    }
    .step-label {
        font-size: 0.85rem;
        color: #6b7280;
        font-weight: 600;
    }
    .step-item.active .step-label {
        color: #065f46;
    }
    .step-line {
        width: 40px;
        height: 2px;
        background-color: #d1d5db;
        transition: background-color 0.3s ease;
    }
    .step-line.active {
        background-color: #10b981;
    }
    
    /* Step Content */
    .step-content {
        width: 100%;
        display: none;
    }
    .step-content.active {
        display: block;
        animation: fadeInUp 0.5s ease;
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Role Cards */
    .role-cards {
        display: flex;
        flex-direction: row;
        gap: 12px;
        width: 100%;
        justify-content: center;
        flex-wrap: wrap;
    }
    .role-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        padding: 20px 16px;
        background-color: #f3f4f6;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        flex: 1;
        min-width: 100px;
        max-width: 140px;
        text-align: center;
    }
    .role-card:hover {
        background-color: #e5e7eb;
        border-color: #d1d5db;
        transform: translateY(-3px);
    }
    .role-card.selected {
        background-color: #065f46;
        border-color: #065f46;
        color: white;
        box-shadow: 0 6px 20px rgba(6, 95, 70, 0.3);
    }
    .role-card.selected .role-icon {
        background-color: rgba(255,255,255,0.2);
        color: white;
    }
    .role-card.selected .role-title {
        color: white;
    }
    .role-card.selected .role-desc {
        color: rgba(255,255,255,0.8);
    }
    .role-icon {
        width: 52px;
        height: 52px;
        background-color: #e5e7eb;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        color: #4b5563;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }
    .role-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .role-title {
        font-weight: 700;
        font-size: 0.95rem;
        color: #1f2937;
        margin-bottom: 4px;
        transition: color 0.3s ease;
    }
    .role-desc {
        font-size: 0.75rem;
        color: #6b7280;
        transition: color 0.3s ease;
        display: none;
    }
    
    /* Form Select */
    .form-select {
        background-color: #f3f4f6;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        padding: 12px;
        margin-bottom: 15px;
        width: 100%;
        color: #374151;
    }
    .form-select:focus {
        border-color: #2b5a8e;
        box-shadow: 0 0 0 0.2rem rgba(43, 90, 142, 0.25);
    }
    .phone-input-wrapper {
        display: flex;
        align-items: center;
        gap: 0;
        background-color: #f3f4f6;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        overflow: hidden;
        margin-bottom: 15px;
    }
    .phone-prefix {
        background-color: #065f46;
        color: white;
        padding: 12px 10px;
        font-weight: 600;
        font-size: 0.85rem;
        min-width: 55px;
        text-align: center;
        border-right: 1px solid #d1d5db;
    }
    .phone-input {
        flex: 1;
        border: none;
        background: transparent;
        padding: 12px;
        margin-bottom: 0;
    }
    .phone-input:focus {
        outline: none;
        box-shadow: none;
    }
    .phone-input-wrapper:focus-within {
        border-color: #2b5a8e;
        box-shadow: 0 0 0 0.2rem rgba(43, 90, 142, 0.25);
    }
    
    /* Password Fields */
    .password-wrapper {
        position: relative;
    }
    .password-toggle {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #6b7280;
        cursor: pointer;
        padding: 0;
        font-size: 1rem;
    }
    .password-toggle:hover {
        color: #374151;
    }
    .password-wrapper .form-control {
        padding-right: 40px;
    }
    
    /* Responsive Styles */
    @media (max-width: 992px) {
        .login-container {
            flex-direction: column;
            max-width: 500px;
            min-height: auto;
        }
        .login-left {
            flex: none;
            padding: 30px;
            min-height: 300px;
        }
        .login-left h1 {
            font-size: 1.8rem;
        }
        .login-right {
            flex: none;
            padding: 30px;
        }
        .role-cards {
            flex-wrap: wrap;
        }
        .role-card {
            min-width: 80px;
            padding: 15px 12px;
        }
    }
    
    @media (max-width: 576px) {
        .login-container {
            margin: 10px;
            border-radius: 8px;
        }
        .login-left {
            padding: 20px;
            min-height: 200px;
        }
        .login-left h1 {
            font-size: 1.5rem;
        }
        .login-left .overview-text {
            font-size: 0.85rem;
        }
        .login-right {
            padding: 20px;
        }
        .coat-of-arms {
            width: 80px;
        }
        .login-right h2 {
            font-size: 1.3rem;
        }
        .step-progress {
            gap: 10px;
        }
        .step-label {
            display: none;
        }
        .step-line {
            width: 30px;
        }
        .role-cards {
            gap: 8px;
        }
        .role-card {
            min-width: 70px;
            padding: 12px 8px;
        }
        .role-icon {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }
        .role-title {
            font-size: 0.8rem;
        }
        .form-control, .form-select {
            padding: 10px;
            font-size: 0.9rem;
        }
        .phone-prefix {
            padding: 10px;
            min-width: 60px;
            font-size: 0.85rem;
        }
        .step-navigation {
            flex-direction: column;
        }
        .btn-back, .btn-next {
            width: 100%;
        }
    }
    .step-navigation {
        display: flex;
        gap: 10px;
        margin-top: 20px;
        width: 100%;
    }
    .btn-back {
        background-color: #6b7280;
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 4px;
        font-weight: bold;
        flex: 1;
    }
    .btn-back:hover {
        background-color: #4b5563;
        color: white;
    }
    .btn-next {
        background-color: #065f46;
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 4px;
        font-weight: bold;
        flex: 2;
    }
    .btn-next:hover {
        background-color: #047857;
        color: white;
    }
    .btn-next:disabled {
        background-color: #d1d5db;
        cursor: not-allowed;
    }
    
    .copyright {
        margin-top: 30px;
        font-size: 0.8rem;
        color: #6b7280;
    }
    main {
        padding: 40px 20px !important;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        min-height: 100vh;
        gap: 60px;
    }
</style>

<div class="login-container animate__animated animate__fadeIn">
    <a href="{{ route('landing') }}" class="btn-login-header" style="position: absolute; top: 20px; right: 20px; z-index: 10;">
        <i class="fas fa-home"></i> HOME
    </a>
    <div class="wave-bg">
        <div class="wave-1"></div>
        <div class="wave-2"></div>
    </div>
    <div class="login-left" data-aos="fade-right">
        <h1 class="animate__animated animate__slideInDown">Electronic Marking System (EMaS)</h1>
        <div class="overview-text animate__animated animate__fadeIn animate__delay-1s">
            <p>Electronic Marking System (EMaS) is a web-based platform designed to manage and process large-scale examination results such as mock exams and joint assessments efficiently and accurately.</p>
            <p>The system allows only authorized managers to register and access the platform. Each role is given specific permissions to ensure secure and organized handling of examination data.</p>
            <p>Through EMaS, users can input student marks, manage subjects, and organize examination data in a structured way. The system ensures data accuracy, reduces manual errors, and improves overall efficiency in result processing.</p>
        </div>
    </div>
    <div class="login-right" data-aos="fade-left">
        <img src="{{ asset('Coat_of_arms_of_Tanzania.svg.png') }}" alt="Coat of Arms" class="coat-of-arms animate__animated animate__zoomIn">
        <h2 class="animate__animated animate__fadeIn">Manager Registration</h2>
        
        <!-- Step Progress Indicator -->
        <div class="step-progress animate__animated animate__fadeIn">
            <div class="step-item active" id="step1-indicator">
                <div class="step-number">1</div>
                <span class="step-label">Select Role</span>
            </div>
            <div class="step-line" id="step-line"></div>
            <div class="step-item" id="step2-indicator">
                <div class="step-number">2</div>
                <span class="step-label">Fill Details</span>
            </div>
        </div>
        
        <form method="POST" action="{{ route('register') }}" style="width: 100%;" id="registrationForm">
            @csrf
            
            <!-- Hidden Role Input -->
            <input type="hidden" name="role" id="selectedRole" value="{{ old('role') }}">
            
            <!-- Step 1: Role Selection -->
            <div class="step-content active" id="step1">
                <div class="role-cards">
                    <div class="role-card {{ old('role') == 'manager' ? 'selected' : '' }}" data-role="manager">
                        <div class="role-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="role-info">
                            <div class="role-title">Manager</div>
                            <div class="role-desc">Full access to manage schools, subjects, and examinations</div>
                        </div>
                    </div>
                    <div class="role-card {{ old('role') == 'clerk' ? 'selected' : '' }}" data-role="clerk">
                        <div class="role-icon">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <div class="role-info">
                            <div class="role-title">Clerk</div>
                            <div class="role-desc">Data entry and record management capabilities</div>
                        </div>
                    </div>
                    <div class="role-card {{ old('role') == 'admin' ? 'selected' : '' }}" data-role="admin">
                        <div class="role-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="role-info">
                            <div class="role-title">Admin</div>
                            <div class="role-desc">Complete system administration and user management</div>
                        </div>
                    </div>
                </div>
                
                @error('role')
                    <span class="text-danger" style="font-size: 0.8rem; margin-top: 10px; display: block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <div class="step-navigation">
                    <a href="{{ route('login') }}" class="btn btn-back">
                        <i class="fas fa-arrow-left me-2"></i> Back to Login
                    </a>
                    <button type="button" class="btn btn-next" id="nextStep1" disabled>
                        Continue <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
            
            <!-- Step 2: Registration Form -->
            <div class="step-content" id="step2">
                <div class="mb-3">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Full Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <select id="region" name="region" class="form-select @error('region') is-invalid @enderror" required>
                        <option value="">Select Region (Mkoa)</option>
                        @foreach($regions as $region)
                            <option value="{{ $region->name }}" @if(old('region') == $region->name) selected @endif>{{ $region->name }}</option>
                        @endforeach
                    </select>
                    @error('region')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <select id="district" name="district" class="form-select @error('district') is-invalid @enderror" required>
                        <option value="">Select District (Wilaya)</option>
                        @if(old('region'))
                            @foreach($districts->where('region_name', old('region')) as $district)
                                <option value="{{ $district['name'] }}" @if(old('district') == $district['name']) selected @endif>{{ $district['name'] }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('district')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="phone-input-wrapper">
                        <span class="phone-prefix">+255</span>
                        <input type="tel" id="phone" name="phone" class="form-control phone-input @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="7XX XXX XXX" required pattern="[0-9]{9}" maxlength="9">
                    </div>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="password-wrapper">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password (min 8 characters)">
                        <button type="button" class="password-toggle" onclick="togglePassword('password', this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="password-wrapper">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        <button type="button" class="password-toggle" onclick="togglePassword('password-confirm', this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="step-navigation">
                    <button type="button" class="btn btn-back" id="backStep2">
                        <i class="fas fa-arrow-left me-2"></i> Back
                    </button>
                    <button type="submit" class="btn btn-next">
                        <i class="fas fa-check me-2"></i> Complete Registration
                    </button>
                </div>
            </div>
        </form>

        <script>
            function togglePassword(inputId, button) {
                const input = document.getElementById(inputId);
                const icon = button.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            }
            
            document.addEventListener('DOMContentLoaded', function() {
                const roleCards = document.querySelectorAll('.role-card');
                const selectedRoleInput = document.getElementById('selectedRole');
                const nextStep1Btn = document.getElementById('nextStep1');
                const backStep2Btn = document.getElementById('backStep2');
                const step1 = document.getElementById('step1');
                const step2 = document.getElementById('step2');
                const step1Indicator = document.getElementById('step1-indicator');
                const step2Indicator = document.getElementById('step2-indicator');
                const stepLine = document.getElementById('step-line');
                const regionSelect = document.getElementById('region');
                const districtSelect = document.getElementById('district');
                const districts = @json($districts);
                
                // Check if role was previously selected
                if (selectedRoleInput.value) {
                    nextStep1Btn.disabled = false;
                }
                
                // Role card selection
                roleCards.forEach(card => {
                    card.addEventListener('click', function() {
                        roleCards.forEach(c => c.classList.remove('selected'));
                        this.classList.add('selected');
                        selectedRoleInput.value = this.dataset.role;
                        nextStep1Btn.disabled = false;
                    });
                });
                
                // Next button - Step 1
                nextStep1Btn.addEventListener('click', function() {
                    if (selectedRoleInput.value) {
                        step1.classList.remove('active');
                        step2.classList.add('active');
                        step1Indicator.classList.remove('active');
                        step1Indicator.classList.add('completed');
                        step2Indicator.classList.add('active');
                        stepLine.classList.add('active');
                    }
                });
                
                // Back button - Step 2
                backStep2Btn.addEventListener('click', function() {
                    step2.classList.remove('active');
                    step1.classList.add('active');
                    step2Indicator.classList.remove('active');
                    step1Indicator.classList.remove('completed');
                    step1Indicator.classList.add('active');
                    stepLine.classList.remove('active');
                });
                
                // Region-District filtering
                regionSelect.addEventListener('change', function() {
                    const selectedRegion = this.value;
                    districtSelect.innerHTML = '<option value="">Select District (Wilaya)</option>';
                    
                    if (selectedRegion) {
                        const regionDistricts = districts.filter(d => d.region_name === selectedRegion);
                        regionDistricts.forEach(function(district) {
                            const option = document.createElement('option');
                            option.value = district.name;
                            option.textContent = district.name;
                            districtSelect.appendChild(option);
                        });
                    }
                });
            });
        </script>

        <div class="copyright text-center">
            Copyright © {{ date('Y') }} . All Rights Reserved
        </div>
    </div>
</div>
@endsection
