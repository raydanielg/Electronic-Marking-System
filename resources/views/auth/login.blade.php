@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #d1d5db;
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
        background-color: #e5e7eb;
        padding: 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .features-section {
        background-color: transparent;
        padding: 40px 0;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }
    .feature-card {
        text-align: center;
        padding: 32px;
        transition: all 0.3s ease;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        border: 1px solid #f1f5f9;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .feature-card:hover {
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transform: translateY(-4px);
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
        transition: filter 0.3s ease;
    }
    .feature-card:hover .feature-icon-wrapper img {
        filter: grayscale(0%);
    }
    .feature-title {
        font-weight: 700;
        font-size: 1.125rem;
        color: #1e293b;
        margin-bottom: 16px;
    }
    .feature-desc {
        color: #64748b;
        font-size: 0.875rem;
        line-height: 1.6;
    }
    .core-features-badge {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 8px 24px;
        background-color: #f1f5f9;
        border-left: 4px solid #065f46;
        margin-bottom: 32px;
    }
    .core-features-badge::before {
        content: "";
        display: inline-block;
        width: 8px;
        height: 8px;
        background-color: #fb923c;
        border-radius: 50%;
    }
    .core-features-badge span {
        font-weight: 700;
        color: #065f46;
        text-transform: uppercase;
        font-size: 0.875rem;
        letter-spacing: 0.05em;
    }
    .login-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        padding: 20px;
    }
    .coat-of-arms {
        width: 100px;
        margin-bottom: 20px;
    }
    .login-right h2 {
        font-weight: bold;
        margin-bottom: 30px;
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
    .forgot-password {
        color: #3b82f6;
        text-decoration: none;
        font-size: 0.9rem;
    }
    .forgot-password:hover {
        text-decoration: underline;
    }
    .register-link {
        color: #065f46;
        font-weight: 700;
        text-decoration: none;
        font-size: 0.9rem;
        margin-left: 5px;
    }
    .register-link:hover {
        text-decoration: underline;
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
        <h2 class="animate__animated animate__fadeIn">Login</h2>
        
        <form method="POST" action="{{ route('login') }}" style="width: 100%;" class="animate__animated animate__fadeInUp animate__delay-1s">
            @csrf

            <div class="mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-login">
                Login
            </button>

            <div class="text-center mt-3">
                @if (Route::has('password.request'))
                    <a class="forgot-password" href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                @endif
            </div>

            <div class="text-center mt-4 pt-3 border-top">
                <span class="text-muted" style="font-size: 0.85rem;">Don't have an account?</span>
                @if (Route::has('register'))
                    <a class="register-link" href="{{ route('register') }}">
                        Register Here
                    </a>
                @endif
            </div>
        </form>

        <div class="copyright text-center">
            Copyright © {{ date('Y') }} . All Rights Reserved
        </div>
    </div>
</div>

<div class="features-section" data-aos="fade-up">
    <div class="container">
        <div class="core-features-badge">
            <span>Core Features</span>
        </div>
        
        <div class="row">
            <!-- Row 1 -->
            <div class="col-md-3 mb-4">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon-wrapper">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="Teacher Access">
                    </div>
                    <h3 class="feature-title">Teacher Access</h3>
                    <p class="feature-desc">Secure login and registration for teachers to manage their own data.</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon-wrapper">
                        <img src="https://cdn-icons-png.flaticon.com/512/3589/3589030.png" alt="Multi-School">
                    </div>
                    <h3 class="feature-title">Multi-School</h3>
                    <p class="feature-desc">One teacher can create and manage multiple organized schools.</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon-wrapper">
                        <img src="https://cdn-icons-png.flaticon.com/512/4323/4323013.png" alt="Subject-Based">
                    </div>
                    <h3 class="feature-title">Subject-Based</h3>
                    <p class="feature-desc">Comprehensive management of all subjects with unified joint examination processing.</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-icon-wrapper">
                        <img src="https://cdn-icons-png.flaticon.com/512/2641/2641409.png" alt="CA Tracking">
                    </div>
                    <h3 class="feature-title">CA Tracking</h3>
                    <p class="feature-desc">Record and track Continuous Assessment and student trends.</p>
                </div>
            </div>
            
            <!-- Row 2 -->
            <div class="col-md-3 mb-4">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-icon-wrapper">
                        <img src="https://cdn-icons-png.flaticon.com/512/681/681494.png" alt="Student Mgmt">
                    </div>
                    <h3 class="feature-title">Student Mgmt</h3>
                    <p class="feature-desc">Manage student records and assign them to schools/subjects.</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-icon-wrapper">
                        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828946.png" alt="Analysis">
                    </div>
                    <h3 class="feature-title">Analysis</h3>
                    <p class="feature-desc">Automatic calculation of results, rankings, and simple analytics.</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="700">
                    <div class="feature-icon-wrapper">
                        <img src="https://cdn-icons-png.flaticon.com/512/201/201614.png" alt="Joint Exams">
                    </div>
                    <h3 class="feature-title">Joint Exams</h3>
                    <p class="feature-desc">Efficient management of joint examinations across all schools and subjects.</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="800">
                    <div class="feature-icon-wrapper">
                        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828919.png" alt="Modern UI">
                    </div>
                    <h3 class="feature-title">Modern UI</h3>
                    <p class="feature-desc">Clean and professional interface using AdminLTE UI.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
