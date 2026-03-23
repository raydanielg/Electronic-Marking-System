<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $examLabel }} Schools - EMaS</title>

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
            font-size: 2.25rem;
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 12px;
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

        .alpha-row {
            display: grid;
            grid-template-columns: repeat(26, 1fr);
            gap: 6px;
        }

        .alpha-btn {
            border-radius: 8px;
            border: 1px solid rgba(148, 163, 184, 0.55);
            background: rgba(255,255,255,0.95);
            font-weight: 900;
            padding: 6px 0;
            text-align: center;
            cursor: pointer;
            user-select: none;
            transition: all 0.18s ease;
            color: #0f172a;
            font-size: 0.78rem;
        }

        .alpha-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 22px rgba(2, 6, 23, 0.10);
            border-color: rgba(0, 136, 204, 0.35);
        }

        .alpha-btn.active {
            background: rgba(0, 136, 204, 0.10);
            border-color: rgba(0, 136, 204, 0.35);
            color: #005a9e;
        }

        .centres-wrap {
            border-radius: 12px;
            border: 1px solid rgba(148, 163, 184, 0.55);
            overflow: hidden;
            background: #ffffff;
        }

        .centres-head {
            padding: 14px 16px;
            background: rgba(0, 136, 204, 0.08);
            border-bottom: 1px solid rgba(148, 163, 184, 0.35);
            font-weight: 900;
            color: #0f172a;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-size: 0.85rem;
            text-align: center;
        }

        .centres-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }

        .centre-col {
            border-right: 1px solid rgba(148, 163, 184, 0.35);
            padding: 10px;
        }

        .centre-col:last-child { border-right: none; }

        .centre-item {
            display: block;
            padding: 8px 10px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 900;
            color: #0f172a;
            transition: all 0.18s ease;
        }

        .centre-item:hover {
            background: rgba(0, 136, 204, 0.08);
            color: #005a9e;
            transform: translateX(3px);
        }

        .centre-code {
            color: #005a9e;
        }

        .toolbar {
            border-radius: 18px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: rgba(255,255,255,0.92);
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            padding: 14px;
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

        @media (max-width: 992px) {
            .centres-grid { grid-template-columns: 1fr; }
            .centre-col { border-right: none; border-bottom: 1px solid rgba(148, 163, 184, 0.35); }
            .centre-col:last-child { border-bottom: none; }
        }

        @media (max-width: 768px) {
            .alpha-row { grid-template-columns: repeat(13, 1fr); }
        }

        @media (max-width: 576px) {
            .page-title { font-size: 1.85rem; }
        }
    </style>
</head>
<body>
    @include('landing.partials.header')

    <section class="page-hero">
        <div class="network-layer">
            <div class="network-lines"></div>
        </div>
        <div class="container">
            <div class="page-hero-inner" data-aos="fade-up">
                <div class="page-kicker"><i class="fas fa-school"></i> Centres</div>
                <h1 class="page-title">{{ $examLabel }} – School Centres</h1>

                <div class="breadcrumb-wrap">
                    <div class="breadcrumb-pill">
                        <a href="{{ route('landing') }}"><i class="fas fa-house"></i> Home</a>
                        <span class="sep">/</span>
                        <a href="{{ route('landing.results.type', $type) }}">{{ $typeLabel }}</a>
                        <span class="sep">/</span>
                        <a href="{{ route('landing.results.year', ['type' => $type, 'year' => $year]) }}">{{ $year }}</a>
                        <span class="sep">/</span>
                        <span>{{ $examLabel }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="toolbar" data-aos="fade-up">
                <div class="row g-3 align-items-center">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-text" style="border-radius: 9999px 0 0 9999px; font-weight: 900;"><i class="fas fa-magnifying-glass"></i></span>
                            <input id="centreSearch" type="text" class="form-control" placeholder="Andika jina la shule, mf. 'Nyakato' au 'Girls'" style="border-radius: 0 9999px 9999px 0; font-weight: 800;" />
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-lg-end">
                        <a href="{{ route('landing.results.year', ['type' => $type, 'year' => $year]) }}" class="btn btn-soft"><i class="fas fa-arrow-left me-1"></i>Back to Exams</a>
                    </div>
                </div>

                <div class="mt-3 text-center" style="font-weight: 900; color: #0f172a; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.85rem;">
                    Click any letter below to filter schools by alphabet
                </div>
                <div class="alpha-row mt-2" id="alphaRow"></div>
            </div>

            <div class="centres-wrap mt-4" data-aos="fade-up" data-aos-delay="100">
                <div class="centres-head">All Centres</div>
                <div class="centres-grid" id="centresGrid">
                    <div class="centre-col" id="colA"></div>
                    <div class="centre-col" id="colB"></div>
                    <div class="centre-col" id="colC"></div>
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

            const schools = @json($schools);
            const alphaRow = document.getElementById('alphaRow');
            const search = document.getElementById('centreSearch');
            const cols = [
                document.getElementById('colA'),
                document.getElementById('colB'),
                document.getElementById('colC')
            ].filter(Boolean);

            let activeLetter = 'ALL';

            function slugify(s) {
                return (s || '').toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
            }

            function buildAlpha() {
                if (!alphaRow) return;

                const letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
                const all = document.createElement('div');
                all.className = 'alpha-btn active';
                all.textContent = 'ALL';
                all.dataset.letter = 'ALL';
                alphaRow.appendChild(all);

                letters.forEach(l => {
                    const btn = document.createElement('div');
                    btn.className = 'alpha-btn';
                    btn.textContent = l;
                    btn.dataset.letter = l;
                    alphaRow.appendChild(btn);
                });

                alphaRow.addEventListener('click', function(e) {
                    const t = e.target;
                    if (!t || !t.classList.contains('alpha-btn')) return;
                    activeLetter = t.dataset.letter || 'ALL';
                    Array.from(alphaRow.querySelectorAll('.alpha-btn')).forEach(b => b.classList.remove('active'));
                    t.classList.add('active');
                    render();
                });
            }

            function render() {
                cols.forEach(c => c.innerHTML = '');

                const q = (search && search.value ? search.value : '').toLowerCase().trim();

                const filtered = schools.filter(s => {
                    const name = (s.name || '').toLowerCase();
                    const code = (s.code || '').toLowerCase();
                    const okQuery = !q || name.includes(q) || code.includes(q);

                    if (!okQuery) return false;
                    if (activeLetter === 'ALL') return true;

                    const first = (s.name || '').trim().charAt(0).toUpperCase();
                    return first === activeLetter;
                });

                filtered.forEach((s, idx) => {
                    const col = cols[idx % cols.length];
                    if (!col) return;

                    const a = document.createElement('a');
                    a.className = 'centre-item';
                    a.href = "{{ route('landing.results.exam', ['type' => $type, 'year' => $year, 'exam' => $exam]) }}/schools/" + slugify(s.code + '-' + s.name);
                    a.innerHTML = '<span class="centre-code">' + (s.code || '') + '</span> – ' + (s.name || '');
                    col.appendChild(a);
                });
            }

            buildAlpha();
            render();

            if (search) {
                search.addEventListener('input', function() {
                    render();
                });
            }
        });
    </script>
</body>
</html>
