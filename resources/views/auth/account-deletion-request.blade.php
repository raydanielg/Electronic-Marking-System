<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Request Account Deletion - EMaS</title>

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
            --danger-color: #dc2626;
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

        .page-hero {
            position: relative;
            padding: 76px 0 44px;
            overflow: hidden;
            background: radial-gradient(1200px circle at 20% 0%, rgba(220, 38, 38, 0.22), transparent 58%),
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
                radial-gradient(circle at 10% 20%, rgba(220, 38, 38, 0.35), transparent 35%),
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
            background-image: radial-gradient(rgba(220, 38, 38, 0.26) 1px, transparent 1px);
            background-size: 24px 24px;
            opacity: 0.35;
        }

        .network-nodes {
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 12% 30%, rgba(220, 38, 38, 0.35) 0 2px, transparent 2px),
                radial-gradient(circle at 26% 62%, rgba(220, 38, 38, 0.25) 0 2px, transparent 2px),
                radial-gradient(circle at 36% 26%, rgba(204, 51, 51, 0.28) 0 2px, transparent 2px),
                radial-gradient(circle at 58% 52%, rgba(251, 146, 60, 0.26) 0 2px, transparent 2px),
                radial-gradient(circle at 72% 30%, rgba(220, 38, 38, 0.22) 0 2px, transparent 2px),
                radial-gradient(circle at 88% 62%, rgba(204, 51, 51, 0.22) 0 2px, transparent 2px);
            opacity: 0.85;
        }

        .network-lines {
            position: absolute;
            inset: -20px;
            background:
                linear-gradient(120deg, transparent 0%, rgba(220, 38, 38, 0.18) 40%, transparent 70%),
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

        .page-kicker i { color: #dc2626; }

        .page-title {
            font-size: 2.6rem;
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 14px;
        }

        .page-desc {
            font-size: 1.1rem;
            color: #475569;
            max-width: 950px;
            margin: 0 auto;
            line-height: 1.7;
        }

        .content {
            padding: 86px 0;
            background: #ffffff;
        }

        .form-card {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: #ffffff;
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            padding: 28px;
            max-width: 700px;
            margin: 0 auto;
        }

        .warning-box {
            border-radius: 18px;
            border: 1px solid rgba(220, 38, 38, 0.30);
            background: rgba(254, 226, 226, 0.85);
            padding: 18px;
            margin-bottom: 24px;
        }

        .warning-box h3 {
            font-weight: 900;
            color: #991b1b;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .warning-box ul {
            color: #7f1d1d;
            font-weight: 800;
            padding-left: 20px;
            margin: 0;
        }

        .warning-box li {
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid rgba(148, 163, 184, 0.35);
            background: rgba(248, 250, 252, 0.92);
            padding: 12px 16px;
            font-weight: 800;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: rgba(220, 38, 38, 0.35);
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.10);
            background: #ffffff;
        }

        .btn-danger {
            border-radius: 9999px;
            font-weight: 900;
            background: #dc2626;
            color: #ffffff;
            border: none;
            padding: 14px 28px;
            transition: all 0.2s ease;
        }

        .btn-danger:hover {
            background: #b91c1c;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(220, 38, 38, 0.25);
        }

        .btn-soft {
            border-radius: 9999px;
            font-weight: 900;
            border: 1px solid rgba(148, 163, 184, 0.30);
            background: rgba(255, 255, 255, 0.85);
            color: #0f172a;
            padding: 14px 28px;
        }

        .btn-soft:hover {
            background: rgba(0, 136, 204, 0.08);
            border-color: rgba(0, 136, 204, 0.24);
            color: #005a9e;
        }

        .alert-box {
            border-radius: 18px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: rgba(255,255,255,0.92);
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            padding: 16px 18px;
            font-weight: 900;
        }

        @media (max-width: 576px) {
            .page-title { font-size: 2rem; }
            .form-card { padding: 20px; }
        }
    </style>
</head>
<body>
    <section class="page-hero">
        <div class="network-layer">
            <div class="network-lines"></div>
            <div class="network-nodes"></div>
        </div>
        <div class="container">
            <div class="page-hero-inner" data-aos="fade-up">
                <div class="page-kicker"><i class="fas fa-triangle-exclamation"></i> Account Deletion</div>
                <h1 class="page-title">Request Account Deletion</h1>
                <p class="page-desc">
                    Submit a request to permanently delete your account and associated data. This action cannot be undone.
                </p>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="form-card" data-aos="fade-up">
                @if(session('success'))
                    <div class="alert-box mb-4" style="background: rgba(6, 95, 70, 0.08); border-color: rgba(6, 95, 70, 0.18); color: #065f46;">
                        <i class="fas fa-circle-check me-2"></i> {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert-box mb-4" style="background: rgba(220, 38, 38, 0.08); border-color: rgba(220, 38, 38, 0.18); color: #991b1b;">
                        <i class="fas fa-circle-exclamation me-2"></i>
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <div class="warning-box">
                    <h3><i class="fas fa-shield-halved"></i> Important Notice</h3>
                    <ul>
                        <li>Account deletion is permanent and cannot be undone.</li>
                        <li>All your data (schools, students, marks, etc.) will be removed.</li>
                        <li>You will be logged out immediately after submission.</li>
                        <li>The request will be reviewed by administrators before final deletion.</li>
                        <li>Rate limiting applies: 3 requests per hour per IP address.</li>
                    </ul>
                </div>

                <form method="POST" action="{{ route('profile.delete-request') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="reason" class="form-label" style="font-weight: 900;">Reason for deletion</label>
                        <select id="reason" name="reason" class="form-select form-control" required>
                            <option value="">Select a reason...</option>
                            <option value="no_longer_needed">No longer need the account</option>
                            <option value="privacy_concerns">Privacy concerns</option>
                            <option value="data_inaccuracy">Data accuracy issues</option>
                            <option value="technical_issues">Technical issues</option>
                            <option value="other">Other</option>
                        </select>
                        @error('reason')
                            <div class="invalid-feedback d-block" style="font-weight: 900;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="details" class="form-label" style="font-weight: 900;">Additional details (optional)</label>
                        <textarea id="details" name="details" class="form-control" rows="4" placeholder="Please provide any additional information..."></textarea>
                        @error('details')
                            <div class="invalid-feedback d-block" style="font-weight: 900;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label" style="font-weight: 900;">Confirmation</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="confirm" name="confirm" required>
                            <label class="form-check-label" for="confirm" style="font-weight: 800;">
                                I understand that this action is permanent and cannot be undone.
                            </label>
                        </div>
                        @error('confirm')
                            <div class="invalid-feedback d-block" style="font-weight: 900;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-3 justify-content-center">
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-2"></i> Submit Deletion Request
                        </button>
                        <a href="{{ route('profile.index') }}" class="btn btn-soft">
                            <i class="fas fa-arrow-left me-2"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({ duration: 1000, once: true });
        });
    </script>
</body>
</html>
