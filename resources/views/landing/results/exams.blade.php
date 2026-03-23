<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $typeLabel }} {{ $year }} Exams - EMaS</title>

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
            font-size: 2.5rem;
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .page-desc {
            font-size: 1.05rem;
            color: #475569;
            max-width: 920px;
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

        .content {
            padding: 86px 0;
            background: #ffffff;
        }

        .table-card {
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

        .pill.status {
            background: rgba(6, 95, 70, 0.10);
            border-color: rgba(6, 95, 70, 0.18);
            color: #065f46;
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
                <div class="page-kicker"><i class="fas fa-list-check"></i> Results</div>
                <h1 class="page-title">{{ $typeLabel }} Results – {{ $year }}</h1>
                <p class="page-desc">Choose an examination to list school centres.</p>

                <div class="breadcrumb-wrap">
                    <div class="breadcrumb-pill">
                        <a href="{{ route('landing') }}"><i class="fas fa-house"></i> Home</a>
                        <span class="sep">/</span>
                        <a href="{{ route('landing.results.type', $type) }}">{{ $typeLabel }}</a>
                        <span class="sep">/</span>
                        <span>{{ $year }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="table-card" data-aos="fade-up">
                <div class="p-3 p-md-4" style="border-bottom: 1px solid rgba(148, 163, 184, 0.22);">
                    <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
                        <div>
                            <div style="font-weight: 900; font-size: 1.2rem;">Examinations</div>
                            <div style="color:#64748b; font-weight: 800;">Table with three columns as requested.</div>
                        </div>
                        <a href="{{ route('landing.results.type', $type) }}" class="btn btn-soft"><i class="fas fa-arrow-left me-1"></i>Back</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Examination Name</th>
                                <th>Centres</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exams as $e)
                                <tr>
                                    <td>
                                        <div style="font-weight: 900;">{{ $e['name'] }}</div>
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            <span class="pill"><i class="fas fa-layer-group"></i> {{ $e['level'] }}</span>
                                            <span class="pill status"><i class="fas fa-circle-check"></i> {{ $e['status'] }}</span>
                                        </div>
                                    </td>
                                    <td style="font-weight: 900; color:#0f172a;">{{ $e['centres'] }}</td>
                                    <td class="text-end">
                                        <a class="btn btn-primary" style="border-radius: 9999px; font-weight: 900; padding: 10px 14px;" href="{{ route('landing.results.exam', ['type' => $type, 'year' => $year, 'exam' => $e['slug']]) }}">
                                            <i class="fas fa-school me-1"></i>View Schools
                                        </a>
                                    </td>
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
