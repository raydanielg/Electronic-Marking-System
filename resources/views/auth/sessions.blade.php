<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sessions - EMaS</title>

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
            max-width: 950px;
            margin: 0 auto;
            line-height: 1.7;
        }

        .content {
            padding: 86px 0;
            background: #ffffff;
        }

        .profile-card {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: #ffffff;
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            padding: 24px;
        }

        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 9999px;
            background: linear-gradient(135deg, rgba(0, 136, 204, 0.22) 0%, rgba(0, 90, 158, 0.12) 100%);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 2rem;
            color: #005a9e;
        }

        .sessions-card {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: #ffffff;
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            overflow: hidden;
        }

        .sessions-head {
            padding: 18px 20px;
            background: rgba(0, 136, 204, 0.08);
            border-bottom: 1px solid rgba(148, 163, 184, 0.35);
            font-weight: 900;
            color: #0f172a;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-size: 0.85rem;
        }

        .session-item {
            padding: 18px 20px;
            border-bottom: 1px solid rgba(148, 163, 184, 0.22);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .session-item:last-child { border-bottom: none; }

        .session-info {
            flex: 1;
        }

        .session-device {
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .session-meta {
            color: #64748b;
            font-weight: 800;
            font-size: 0.85rem;
        }

        .current-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            border-radius: 9999px;
            background: rgba(6, 95, 70, 0.10);
            border: 1px solid rgba(6, 95, 70, 0.18);
            color: #065f46;
            font-weight: 900;
            font-size: 0.75rem;
        }

        .btn-soft {
            border-radius: 9999px;
            font-weight: 900;
            border: 1px solid rgba(148, 163, 184, 0.30);
            background: rgba(255, 255, 255, 0.85);
            color: #0f172a;
            padding: 10px 12px;
        }

        .btn-soft:hover {
            background: rgba(0, 136, 204, 0.08);
            border-color: rgba(0, 136, 204, 0.24);
            color: #005a9e;
        }

        .btn-danger-soft {
            border-radius: 9999px;
            font-weight: 900;
            border: 1px solid rgba(220, 38, 38, 0.30);
            background: rgba(254, 226, 226, 0.85);
            color: #991b1b;
            padding: 10px 12px;
        }

        .btn-danger-soft:hover {
            background: rgba(220, 38, 38, 0.08);
            border-color: rgba(220, 38, 38, 0.24);
            color: #7f1d1d;
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
            .session-item { flex-direction: column; align-items: flex-start; }
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
                <div class="page-kicker"><i class="fas fa-shield-halved"></i> Security</div>
                <h1 class="page-title">Active Sessions</h1>
                <p class="page-desc">
                    Manage your active sessions and devices. You can revoke sessions you no longer recognize.
                </p>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up">
                    <div class="profile-card">
                        <div class="text-center">
                            <div class="avatar mb-3">
                                {{ substr($manager->first_name ?? 'U', 0, 1) }}{{ substr($manager->last_name ?? '', 0, 1) }}
                            </div>
                            <div style="font-weight: 900; font-size: 1.2rem;">{{ $manager->first_name }} {{ $manager->last_name }}</div>
                            <div style="color:#64748b; font-weight: 800;">{{ $manager->email }}</div>
                        </div>

                        <hr style="border-color: rgba(148, 163, 184, 0.22); margin: 18px 0;">

                        <div class="d-grid gap-2">
                            <a href="{{ route('profile.index') }}" class="btn btn-soft"><i class="fas fa-user me-1"></i> Profile</a>
                            <a href="{{ route('home') }}" class="btn btn-soft"><i class="fas fa-home me-1"></i> Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger-soft w-100"><i class="fas fa-sign-out-alt me-1"></i> Logout</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="sessions-card">
                        <div class="sessions-head">
                            <i class="fas fa-laptop me-2"></i> Active Sessions
                        </div>

                        @if(session('success'))
                            <div class="alert-box mb-3" style="background: rgba(6, 95, 70, 0.08); border-color: rgba(6, 95, 70, 0.18); color: #065f46;">
                                <i class="fas fa-circle-check me-2"></i> {{ session('success') }}
                            </div>
                        @endif

                        @if($sessions->count())
                            @foreach($sessions as $sess)
                                <div class="session-item">
                                    <div class="session-info">
                                        <div class="session-device">
                                            {{ $sess['device'] }}
                                            @if($sess['is_current'])
                                                <span class="current-badge ms-2"><i class="fas fa-circle-check"></i> Current</span>
                                            @endif
                                        </div>
                                        <div class="session-meta">
                                            <i class="fas fa-map-marker-alt me-1"></i> {{ $sess['location'] }} &nbsp;|&nbsp;
                                            <i class="fas fa-clock me-1"></i> Last active: {{ $sess['last_active']->diffForHumans() }}
                                        </div>
                                    </div>
                                    @if(!$sess['is_current'])
                                        <form method="POST" action="{{ route('auth.sessions.destroy', $sess['id']) }}" onsubmit="return confirm('Revoke this session?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger-soft"><i class="fas fa-times"></i></button>
                                        </form>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="p-4 text-center" style="color:#64748b; font-weight: 800;">No active sessions.</div>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('auth.sessions.revoke-all') }}" onsubmit="return confirm('This will revoke all sessions and log you out. Continue?');" class="mt-4" data-aos="fade-up" data-aos-delay="150">
                        @csrf
                        <button type="submit" class="btn btn-danger-soft w-100"><i class="fas fa-trash me-1"></i> Revoke All Sessions</button>
                    </form>
                </div>
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
