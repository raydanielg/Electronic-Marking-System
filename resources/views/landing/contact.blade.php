<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contact Us - EMaS</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @include('landing.partials.shared-styles')

        /* --- Breadcrumb / Page Hero with Network Animation --- */
        .page-hero {
            position: relative;
            padding: 72px 0 38px;
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
            max-width: 820px;
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

        /* --- Contact Layout --- */
        .contact-section {
            padding: 80px 0;
            background: #ffffff;
        }

        .contact-card {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            background: #ffffff;
            padding: 28px;
            height: 100%;
        }

        .contact-card h3 {
            font-weight: 900;
            margin-bottom: 12px;
            color: #0f172a;
        }

        .contact-card p {
            color: #475569;
            line-height: 1.75;
        }

        .contact-icon {
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

        .info-list {
            list-style: none;
            padding: 0;
            margin: 18px 0 0;
            display: grid;
            gap: 10px;
        }

        .info-list li {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            color: #475569;
            line-height: 1.6;
        }

        .info-list i {
            margin-top: 3px;
            color: #cc3333;
        }

        .form-label {
            font-weight: 800;
            color: #0f172a;
        }

        .form-control {
            border-radius: 14px;
            padding: 12px 14px;
            border: 1px solid rgba(148, 163, 184, 0.40);
        }

        .form-control:focus {
            border-color: rgba(0, 136, 204, 0.55);
            box-shadow: 0 0 0 0.25rem rgba(0, 136, 204, 0.12);
        }

        .btn-send {
            border-radius: 9999px;
            font-weight: 900;
            padding: 12px 18px;
            background: linear-gradient(135deg, #0088cc 0%, #005a9e 100%);
            border: none;
            color: #fff;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-send:hover {
            background: linear-gradient(135deg, #cc3333 0%, #991b1b 100%);
            transform: translateY(-2px);
        }

        .contact-alert {
            border-radius: 16px;
            border: 1px solid rgba(34, 197, 94, 0.25);
            background: rgba(34, 197, 94, 0.08);
            color: #14532d;
            padding: 12px 14px;
            font-weight: 800;
            display: none;
            align-items: flex-start;
            gap: 10px;
        }

        .contact-alert.show {
            display: flex;
        }

        @media (max-width: 576px) {
            .page-title { font-size: 2rem; }
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
                <div class="page-kicker"><i class="fas fa-headset"></i> Contact Us</div>
                <h1 class="page-title">Get in Touch with EMaS</h1>
                <p class="page-desc">
                    Tuko tayari kukusaidia. Wasiliana nasi kwa maswali, msaada wa kiufundi, au maelekezo ya kuanza kutumia mfumo.
                </p>

                <div class="breadcrumb-wrap">
                    <div class="breadcrumb-pill">
                        <a href="{{ route('landing') }}"><i class="fas fa-house"></i> Home</a>
                        <span class="sep">/</span>
                        <span>Contact Us</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-card">
                        <div class="contact-icon"><i class="fas fa-location-dot"></i></div>
                        <h3>Contact Information</h3>
                        <p>Njia rahisi za kutufikia na kupata msaada wa haraka.</p>
                        <ul class="info-list">
                            <li><i class="fas fa-map-marker-alt"></i> United Republic of Tanzania</li>
                            <li><i class="fas fa-envelope"></i> support@emas.go.tz</li>
                            <li><i class="fas fa-phone-alt"></i> +255 123 456 789</li>
                            <li><i class="fas fa-clock"></i> Mon - Fri: 08:00 - 17:00</li>
                        </ul>
                        <div class="mt-4">
                            <div class="contact-icon" style="background: linear-gradient(135deg, rgba(204,51,51,0.16) 0%, rgba(153,27,27,0.10) 100%); color: #991b1b;"><i class="fas fa-circle-info"></i></div>
                            <h3 style="margin-bottom: 8px;">Quick Help</h3>
                            <p style="margin-bottom: 0;">
                                Kwa masuala ya akaunti, unaweza kuingia kwenye <strong>Staff Portal</strong> au kutengeneza akaunti mpya.
                            </p>
                            <div class="d-flex flex-wrap gap-2 mt-3">
                                <a href="{{ route('login') }}" class="btn btn-outline-primary" style="font-weight: 900; border-radius: 14px; padding: 12px 16px;">Staff Portal</a>
                                <a href="{{ route('register') }}" class="btn btn-primary" style="font-weight: 900; border-radius: 14px; padding: 12px 16px;">Create Account</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-card">
                        <div class="contact-icon"><i class="fas fa-paper-plane"></i></div>
                        <h3>Send Us a Message</h3>
                        <p>Jaza fomu hii na tutakurudia haraka.</p>

                        <div id="contactSuccess" class="contact-alert" role="status" aria-live="polite">
                            <i class="fas fa-circle-check" style="margin-top: 2px;"></i>
                            <div>
                                Ujumbe wako umetumwa kikamilifu. Asante! Tutakujibu muda si mrefu.
                            </div>
                        </div>

                        <form id="contactForm" onsubmit="return false;">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <input id="contactName" type="text" class="form-control" placeholder="Your name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address</label>
                                    <input id="contactEmail" type="email" class="form-control" placeholder="you@example.com" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Subject</label>
                                    <input id="contactSubject" type="text" class="form-control" placeholder="How can we help?" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Message</label>
                                    <textarea id="contactMessage" class="form-control" rows="6" placeholder="Write your message..." required></textarea>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button class="btn-send" type="submit"><i class="fas fa-paper-plane"></i> Send Message</button>
                                </div>
                            </div>
                        </form>
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
            AOS.init({ duration: 1000, once: true });

            const form = document.getElementById('contactForm');
            const success = document.getElementById('contactSuccess');
            const fields = [
                document.getElementById('contactName'),
                document.getElementById('contactEmail'),
                document.getElementById('contactSubject'),
                document.getElementById('contactMessage'),
            ].filter(Boolean);

            if (form && success) {
                form.addEventListener('submit', function() {
                    if (!form.checkValidity()) {
                        form.reportValidity();
                        return;
                    }

                    success.classList.add('show');
                    fields.forEach(f => {
                        f.value = '';
                    });

                    setTimeout(() => {
                        success.classList.remove('show');
                    }, 6000);
                });
            }
        });
    </script>
</body>
</html>
