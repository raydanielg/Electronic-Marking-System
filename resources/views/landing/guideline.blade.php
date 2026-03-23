<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Guideline - EMaS</title>

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
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --bg-light: #f8fafc;
            --bg-gray: #e5e7eb;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Nunito', sans-serif;
            color: var(--text-dark);
            overflow-x: hidden;
            background: #ffffff;
        }

        @include('landing.partials.shared-styles')

        /* Page hero + breadcrumb */
        .page-hero {
            position: relative;
            padding: 76px 0 44px;
            overflow: hidden;
            background: radial-gradient(1200px circle at 20% 0%, rgba(0, 136, 204, 0.22), transparent 58%),
                        radial-gradient(900px circle at 85% 20%, rgba(204, 51, 51, 0.14), transparent 60%),
                        linear-gradient(135deg, #f8fafc 0%, #eef2f7 100%);
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
            background-image: radial-gradient(rgba(0, 136, 204, 0.26) 1px, transparent 1px);
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

        .page-hero-inner {
            position: relative;
            z-index: 2;
            max-width: 1050px;
            margin: 0 auto;
            text-align: center;
        }

        .page-kicker {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 14px;
            border-radius: 9999px;
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(148, 163, 184, 0.35);
            color: #0f172a;
            font-weight: 900;
            font-size: 0.75rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .page-kicker i { color: #cc3333; }

        .page-title {
            font-size: 2.6rem;
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 14px;
        }

        .page-desc {
            font-size: 1.1rem;
            color: #475569;
            max-width: 900px;
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

        .breadcrumb-pill a:hover { text-decoration: underline; }

        .breadcrumb-pill .sep { opacity: 0.45; }

        /* Guideline content */
        .guideline-section {
            padding: 86px 0;
            background: #ffffff;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 14px;
            border-radius: 9999px;
            background: rgba(0, 136, 204, 0.08);
            border: 1px solid rgba(0, 136, 204, 0.16);
            color: #005a9e;
            font-weight: 900;
            font-size: 0.75rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .section-title {
            font-size: 2.2rem;
            font-weight: 900;
            color: #0f172a;
            margin: 14px 0 10px;
        }

        .section-desc {
            color: #475569;
            line-height: 1.75;
            max-width: 900px;
            margin: 0 auto;
        }

        .guide-card {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            background: #ffffff;
            padding: 26px;
            height: 100%;
            transition: all 0.25s ease;
        }

        .guide-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 60px rgba(2, 6, 23, 0.12);
        }

        .guide-icon {
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

        .guide-card h3 {
            font-weight: 900;
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #0f172a;
        }

        .guide-card p {
            color: #475569;
            line-height: 1.75;
            margin-bottom: 0;
        }

        .guide-list {
            margin: 14px 0 0;
            padding-left: 18px;
            color: #475569;
            line-height: 1.75;
        }

        .guide-list li { margin-bottom: 8px; }

        .guide-image {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            overflow: hidden;
            background: #0f172a;
            height: 100%;
        }

        .guide-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.92;
        }

        .guide-image.is-svg {
            background: #ffffff;
        }

        .guide-image.is-svg img {
            object-fit: contain;
            padding: 18px;
            opacity: 1;
            background: radial-gradient(800px circle at 20% 0%, rgba(0, 136, 204, 0.10), transparent 60%),
                        radial-gradient(700px circle at 90% 20%, rgba(204, 51, 51, 0.08), transparent 60%),
                        linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        }

        .note-strip {
            margin-top: 18px;
            padding: 14px 16px;
            border-radius: 18px;
            border: 1px solid rgba(251, 146, 60, 0.25);
            background: rgba(251, 146, 60, 0.08);
            color: #7c2d12;
            font-weight: 800;
        }

        .workflow {
            background: #f8fafc;
        }

        .workflow-step {
            display: flex;
            gap: 14px;
            align-items: flex-start;
            padding: 18px 16px;
            border-radius: 18px;
            border: 1px solid rgba(148, 163, 184, 0.24);
            background: #ffffff;
        }

        .step-bullet {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0088cc 0%, #005a9e 100%);
            color: #ffffff;
            font-weight: 900;
        }

        .workflow-step h4 {
            font-weight: 900;
            margin-bottom: 6px;
            color: #0f172a;
        }

        .workflow-step p {
            margin-bottom: 0;
            color: #475569;
            line-height: 1.7;
        }

        @media (max-width: 576px) {
            .page-title { font-size: 2rem; }
            .section-title { font-size: 1.75rem; }
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
                <div class="page-kicker"><i class="fas fa-book-open"></i> System Guideline</div>
                <h1 class="page-title">Electronic Marking System (EMaS) – Complete User Guide</h1>
                <p class="page-desc">
                    EMaS helps councils and schools run exams end-to-end: organize data, capture marks, approve results, and publish reports.
                    This page highlights what matters most—modules, roles, and the standard workflow.
                </p>

                <div class="breadcrumb-wrap">
                    <div class="breadcrumb-pill">
                        <a href="{{ route('landing') }}"><i class="fas fa-house"></i> Home</a>
                        <span class="sep">/</span>
                        <span>Guideline</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="guideline-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <div class="section-badge mx-auto"><i class="fas fa-circle-info"></i> Introduction</div>
                <h2 class="section-title">What is EMaS?</h2>
                <p class="section-desc">
                    A secure digital platform for exam management and result processing—from student data to final reporting.
                </p>
            </div>

            <div class="row g-4 align-items-stretch">
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                    <div class="guide-card">
                        <div class="guide-icon"><i class="fas fa-bullseye"></i></div>
                        <h3>Core Objectives</h3>
                        <p>
                            Deliver reliable results faster—while keeping access controlled and auditable.
                        </p>
                        <ul class="guide-list">
                            <li>Secure, role-based access</li>
                            <li>Fewer errors in entry and calculations</li>
                            <li>Fast processing at scale</li>
                            <li>Clear reports and performance insights</li>
                            <li>Structured collaboration (Manager, Clerk, Teacher, Admin)</li>
                        </ul>
                        <div class="note-strip"><i class="fas fa-shield-halved me-2"></i>Tip: Always verify your account and use strong passwords to keep your data safe.</div>
                    </div>
                </div>
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="guide-image">
                        <img src="{{ asset('guideline/%F0%9F%8F%9B%EF%B8%8F%20ELECTRONIC%20MARKING%20SYSTEM%20%28EMaS%29%20%E2%80%93%20MAELEKEZO%20KAMILI%20NA%20MAPANA%20-%20visual%20selection.png') }}" alt="EMaS guideline overview">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="guideline-section workflow">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <div class="section-badge mx-auto"><i class="fas fa-users"></i> Roles</div>
                <h2 class="section-title">Who Does What?</h2>
                <p class="section-desc">
                    EMaS is structured around clear responsibilities—so data entry, approvals, and reporting stay consistent.
                </p>
            </div>

            <div class="row g-4 align-items-stretch">
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                    <div class="guide-card">
                        <div class="guide-icon"><i class="fas fa-user-gear"></i></div>
                        <h3>Role Summary</h3>
                        <ul class="guide-list" style="margin-top: 10px;">
                            <li><strong>Manager</strong>: configures exams, assigns users, approves marks, publishes reports.</li>
                            <li><strong>Clerk</strong>: captures marks (manual/Excel) and submits for approval.</li>
                            <li><strong>Teacher</strong>: reviews outcomes and supports performance follow-up.</li>
                            <li><strong>Admin</strong>: governance, security, and system-wide configuration.</li>
                        </ul>
                        <div class="note-strip"><i class="fas fa-circle-info me-2"></i>Tip: If you can’t see a module, your role may not be assigned permission.</div>
                    </div>
                </div>
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="guide-image is-svg">
                        <img src="{{ asset('guideline/emas-roles.svg') }}" alt="EMaS roles overview">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="guideline-section workflow">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <div class="section-badge mx-auto"><i class="fas fa-layer-group"></i> Modules</div>
                <h2 class="section-title">Main System Components</h2>
                <p class="section-desc">
                    A quick map of the modules you’ll use most.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="guide-card">
                        <div class="guide-icon"><i class="fas fa-user-check"></i></div>
                        <h3>Online Application (OAS)</h3>
                        <p>Registration and verification for Council and School Managers.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="guide-card">
                        <div class="guide-icon"><i class="fas fa-lock"></i></div>
                        <h3>Authentication & Roles</h3>
                        <p>Role-based access so users only see what they’re allowed to.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="guide-card">
                        <div class="guide-icon"><i class="fas fa-school"></i></div>
                        <h3>School & Student Management</h3>
                        <p>Manage schools, students, and subjects—manual or bulk import.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="guide-card">
                        <div class="guide-icon"><i class="fas fa-clipboard-list"></i></div>
                        <h3>Examination Management</h3>
                        <p>Create exams, set schedules, and allocate subjects.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="guide-card">
                        <div class="guide-icon"><i class="fas fa-pen-to-square"></i></div>
                        <h3>Marks Entry</h3>
                        <p>Enter marks or upload Excel, then submit for approval.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="guide-card">
                        <div class="guide-icon"><i class="fas fa-chart-line"></i></div>
                        <h3>Results & Reporting</h3>
                        <p>Generate PDFs/Excel and performance analytics.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="guideline-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <div class="section-badge mx-auto"><i class="fas fa-sitemap"></i> Workflow</div>
                <h2 class="section-title">How the System Works (Step-by-Step)</h2>
                <p class="section-desc">
                    A simple lifecycle from setup to reporting. Your steps depend on your role.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="workflow-step">
                        <div class="step-bullet">1</div>
                        <div>
                            <h4>Manager Workflow</h4>
                            <p>
                                Register → verify → login → set up data → assign users → create exams → approve marks → publish reports.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="workflow-step">
                        <div class="step-bullet">2</div>
                        <div>
                            <h4>Clerk (Data Entrant) Workflow</h4>
                            <p>
                                Get assignment → login → select class/subject → enter or upload marks → submit for approval.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="workflow-step">
                        <div class="step-bullet">3</div>
                        <div>
                            <h4>Teacher Workflow</h4>
                            <p>
                                Login → review outcomes → use analysis to support learning improvement.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="workflow-step">
                        <div class="step-bullet">4</div>
                        <div>
                            <h4>Admin Workflow</h4>
                            <p>
                                Login → manage users → configure settings → monitor system governance and security.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-2 align-items-stretch">
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="guide-image is-svg">
                        <img src="{{ asset('guideline/emas-flow.svg') }}" alt="EMaS workflow overview">
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                    <div class="guide-card">
                        <div class="guide-icon" style="background: linear-gradient(135deg, rgba(204,51,51,0.16) 0%, rgba(153,27,27,0.10) 100%); color: #991b1b;"><i class="fas fa-shield-halved"></i></div>
                        <h3>Security & Data Protection</h3>
                        <p>
                            Built-in controls protect student data and keep changes accountable.
                        </p>
                        <ul class="guide-list">
                            <li>Password hashing (bcrypt)</li>
                            <li>Email verification before activation</li>
                            <li>Role-based access control</li>
                            <li>Activity logging (who did what and when)</li>
                            <li>Encrypted communication (SSL/TLS)</li>
                        </ul>
                        <div class="note-strip"><i class="fas fa-circle-exclamation me-2"></i>Note: Some features depend on your institution configuration and assigned role.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="guideline-section workflow">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <div class="section-badge mx-auto"><i class="fas fa-handshake-angle"></i> Support</div>
                <h2 class="section-title">Need Help?</h2>
                <p class="section-desc">
                    If you need support, visit the Contact page or reach our support team. We are ready to help you succeed.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="guide-card">
                        <div class="guide-icon"><i class="fas fa-envelope"></i></div>
                        <h3>Email Support</h3>
                        <p>Send an email to <strong>support@emas.go.tz</strong> for technical help and inquiries.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="guide-card">
                        <div class="guide-icon"><i class="fas fa-phone"></i></div>
                        <h3>Phone Support</h3>
                        <p>Call <strong>+255 123 456 789</strong> during business hours (Mon–Fri, 08:00–17:00).</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="guide-card">
                        <div class="guide-icon"><i class="fas fa-headset"></i></div>
                        <h3>Contact Form</h3>
                        <p>Use our online form for quick assistance and we will respond promptly.</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4" data-aos="fade-up">
                <a href="{{ route('landing.contact') }}" class="btn btn-primary" style="font-weight: 900; border-radius: 9999px; padding: 12px 18px;">
                    <i class="fas fa-paper-plane me-2"></i>Go to Contact Us
                </a>
            </div>
        </div>
    </section>

    @include('landing.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({ duration: 1000, once: true });
        });
    </script>
</body>
</html>
