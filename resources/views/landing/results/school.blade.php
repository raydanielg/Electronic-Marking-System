<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $schoolName }} - Results - EMaS</title>

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

        .page-hero-inner {
            position: relative;
            z-index: 2;
            max-width: 1100px;
            margin: 0 auto;
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
            font-size: 2.05rem;
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 10px;
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

        .content {
            padding: 86px 0;
            background: #ffffff;
        }

        .cardx {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: #ffffff;
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            overflow: hidden;
        }

        .table thead th {
            background: rgba(0, 136, 204, 0.08);
            color: #0f172a;
            font-weight: 900;
            border-bottom: 1px solid rgba(148, 163, 184, 0.22);
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 10px;
            border-radius: 9999px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: rgba(248, 250, 252, 0.92);
            color: #0f172a;
            font-weight: 900;
            font-size: 0.75rem;
            white-space: nowrap;
        }

        .grade {
            width: 40px;
            height: 40px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            border: 1px solid rgba(148, 163, 184, 0.30);
        }

        .grade-a { background: rgba(6, 95, 70, 0.10); color: #065f46; border-color: rgba(6, 95, 70, 0.18); }
        .grade-b { background: rgba(0, 136, 204, 0.10); color: #005a9e; border-color: rgba(0, 136, 204, 0.18); }
        .grade-c { background: rgba(251, 146, 60, 0.12); color: #7c2d12; border-color: rgba(251, 146, 60, 0.22); }

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

        @media (max-width: 576px) {
            .page-title { font-size: 1.7rem; }
        }
    </style>
</head>
<body>
    @include('landing.partials.header')

    <section class="page-hero">
        <div class="network-layer"></div>
        <div class="container">
            <div class="page-hero-inner" data-aos="fade-up">
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start gap-3">
                    <div>
                        <div class="page-kicker"><i class="fas fa-trophy"></i> Results</div>
                        <h1 class="page-title">{{ $schoolName }}</h1>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="pill"><i class="fas fa-tag"></i> {{ $typeLabel }}</span>
                            <span class="pill"><i class="fas fa-calendar"></i> {{ $year }}</span>
                            <span class="pill"><i class="fas fa-file-signature"></i> {{ $examLabel }}</span>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-start align-items-lg-end gap-2">
                        <div class="breadcrumb-pill">
                            <a href="{{ route('landing') }}"><i class="fas fa-house"></i> Home</a>
                            <span class="sep">/</span>
                            <a href="{{ route('landing.results.type', $type) }}">{{ $typeLabel }}</a>
                            <span class="sep">/</span>
                            <a href="{{ route('landing.results.year', ['type' => $type, 'year' => $year]) }}">{{ $year }}</a>
                            <span class="sep">/</span>
                            <a href="{{ route('landing.results.exam', ['type' => $type, 'year' => $year, 'exam' => $exam]) }}">Schools</a>
                            <span class="sep">/</span>
                            <span>Results</span>
                        </div>

                        <a href="{{ route('landing.results.exam', ['type' => $type, 'year' => $year, 'exam' => $exam]) }}" class="btn btn-soft">
                            <i class="fas fa-arrow-left me-1"></i>Back to Schools
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="cardx" data-aos="fade-up">
                <div class="p-3 p-md-4" style="border-bottom: 1px solid rgba(148, 163, 184, 0.22);">
                    <div style="font-weight: 900; font-size: 1.2rem;">School Results</div>
                    <div style="color:#64748b; font-weight: 800;">Mock data for UI. Later we will connect to real results.</div>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Score</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $r)
                                @php
                                    $g = strtoupper($r['grade']);
                                    $gClass = $g === 'A' ? 'grade-a' : ($g === 'B' ? 'grade-b' : 'grade-c');
                                @endphp
                                <tr>
                                    <td style="font-weight: 900;">{{ $r['subject'] }}</td>
                                    <td style="font-weight: 900;">{{ $r['score'] }}%</td>
                                    <td><span class="grade {{ $gClass }}">{{ $g }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
        });
    </script>
</body>
</html>
