<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Examinations - EMaS</title>

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

        .exam-section {
            padding: 86px 0;
            background: #ffffff;
        }

        .exam-section.alt {
            background: #f8fafc;
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
            max-width: 950px;
            margin: 0 auto;
        }

        .filters {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: rgba(255,255,255,0.92);
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            padding: 18px;
        }

        .chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 12px;
            border-radius: 9999px;
            border: 1px solid rgba(148, 163, 184, 0.35);
            background: #ffffff;
            font-weight: 800;
            color: #0f172a;
            cursor: pointer;
            transition: all 0.2s ease;
            user-select: none;
        }

        .chip:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(2, 6, 23, 0.10);
        }

        .chip.active {
            border-color: rgba(0, 136, 204, 0.35);
            background: rgba(0, 136, 204, 0.08);
            color: #005a9e;
        }

        .exam-card {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: #ffffff;
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            padding: 22px;
            height: 100%;
            transition: all 0.25s ease;
        }

        .exam-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 60px rgba(2, 6, 23, 0.12);
        }

        .exam-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 10px;
        }

        .exam-icon {
            width: 54px;
            height: 54px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(0,136,204,0.18) 0%, rgba(0,90,158,0.10) 100%);
            color: #005a9e;
            font-size: 1.3rem;
            flex: 0 0 auto;
        }

        .exam-title {
            font-weight: 900;
            font-size: 1.15rem;
            color: #0f172a;
            margin-bottom: 6px;
        }

        .exam-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            color: #64748b;
            font-weight: 800;
            font-size: 0.86rem;
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

        .pill.status-published {
            background: rgba(6, 95, 70, 0.10);
            border-color: rgba(6, 95, 70, 0.18);
            color: #065f46;
        }

        .pill.status-processing {
            background: rgba(0, 136, 204, 0.10);
            border-color: rgba(0, 136, 204, 0.18);
            color: #005a9e;
        }

        .pill.status-archived {
            background: rgba(148, 163, 184, 0.18);
            border-color: rgba(148, 163, 184, 0.25);
            color: #334155;
        }

        .exam-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 14px;
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

        .btn-primary-pill {
            border-radius: 9999px;
            font-weight: 900;
            padding: 10px 14px;
        }

        .empty-state {
            border-radius: 22px;
            border: 1px dashed rgba(148, 163, 184, 0.55);
            background: rgba(255,255,255,0.75);
            padding: 24px;
            color: #475569;
            font-weight: 800;
            text-align: center;
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
                <div class="page-kicker"><i class="fas fa-calendar-check"></i> Examinations</div>
                <h1 class="page-title">Examinations Overview</h1>
                <p class="page-desc">
                    Browse all examinations conducted across regions. Open an exam to view uploaded subject files and progress status.
                </p>

                <div class="breadcrumb-wrap">
                    <div class="breadcrumb-pill">
                        <a href="{{ route('landing') }}"><i class="fas fa-house"></i> Home</a>
                        <span class="sep">/</span>
                        <span>Examinations</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="exam-section alt">
        <div class="container">
            <div class="text-center mb-4" data-aos="fade-up">
                <div class="section-badge mx-auto"><i class="fas fa-filter"></i> Filter</div>
                <h2 class="section-title">Find an examination</h2>
                <p class="section-desc">Search by name and filter by region, type, or status.</p>
            </div>

            <div class="filters" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-3 align-items-center">
                    <div class="col-lg-5">
                        <div class="input-group">
                            <span class="input-group-text" style="border-radius: 9999px 0 0 9999px; font-weight: 900;"><i class="fas fa-magnifying-glass"></i></span>
                            <input id="examSearch" type="text" class="form-control" placeholder="Search exams (e.g., Mock 2025)..." style="border-radius: 0 9999px 9999px 0; font-weight: 800;" />
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                            <span class="chip active" data-filter-group="region" data-filter-value="all"><i class="fas fa-layer-group"></i> All Regions</span>
                            @foreach($regions as $r)
                                <span class="chip" data-filter-group="region" data-filter-value="{{ strtolower($r) }}"><i class="fas fa-location-dot"></i> {{ $r }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-wrap gap-2">
                            <span class="chip active" data-filter-group="type" data-filter-value="all"><i class="fas fa-layer-group"></i> All Types</span>
                            <span class="chip" data-filter-group="type" data-filter-value="mock"><i class="fas fa-pen"></i> Mock</span>
                            <span class="chip" data-filter-group="type" data-filter-value="joint"><i class="fas fa-users"></i> Joint</span>
                            <span class="chip" data-filter-group="type" data-filter-value="midterm"><i class="fas fa-calendar-day"></i> Midterm</span>
                            <span class="chip" data-filter-group="type" data-filter-value="annual"><i class="fas fa-graduation-cap"></i> Annual</span>
                            <span class="chip active" data-filter-group="status" data-filter-value="all" style="margin-left:auto;"><i class="fas fa-layer-group"></i> All Status</span>
                            <span class="chip" data-filter-group="status" data-filter-value="published"><i class="fas fa-circle-check"></i> Published</span>
                            <span class="chip" data-filter-group="status" data-filter-value="processing"><i class="fas fa-spinner"></i> Processing</span>
                            <span class="chip" data-filter-group="status" data-filter-value="archived"><i class="fas fa-box-archive"></i> Archived</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-3" id="examsGrid">
                @foreach($exams as $e)
                    @php
                        $statusKey = strtolower($e['status']);
                        $statusClass = $statusKey === 'published' ? 'status-published' : ($statusKey === 'archived' ? 'status-archived' : 'status-processing');
                    @endphp
                    <div class="col-lg-4 exam-item" data-title="{{ strtolower($e['title']) }}" data-region="{{ strtolower($e['region']) }}" data-type="{{ strtolower($e['type']) }}" data-status="{{ $statusKey }}">
                        <div class="exam-card" data-aos="fade-up" data-aos-delay="100">
                            <div class="exam-top">
                                <div class="exam-icon"><i class="fas fa-clipboard-list"></i></div>
                                <span class="pill {{ $statusClass }}"><i class="fas fa-flag"></i> {{ $e['status'] }}</span>
                            </div>

                            <div class="exam-title">{{ $e['title'] }}</div>
                            <div class="exam-meta">
                                <span class="pill"><i class="fas fa-location-dot"></i> {{ $e['region'] }}</span>
                                <span class="pill"><i class="fas fa-layer-group"></i> {{ $e['level'] }}</span>
                                <span class="pill"><i class="fas fa-calendar"></i> {{ $e['academic_year'] }}</span>
                                <span class="pill"><i class="fas fa-book"></i> {{ $e['subjects'] }} Subjects</span>
                                <span class="pill"><i class="fas fa-school"></i> {{ $e['schools'] }} Schools</span>
                            </div>

                            <div class="exam-actions">
                                <a href="{{ route('landing.examinations.show', $e['slug']) }}" class="btn btn-primary btn-primary-pill">
                                    <i class="fas fa-arrow-up-right-from-square me-1"></i>Open Exam
                                </a>
                                <a href="#" class="btn btn-soft" aria-disabled="true">
                                    <i class="fas fa-file-export me-1"></i>Export
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4" id="examsEmpty" style="display:none;">
                <div class="empty-state">No examinations match your filters.</div>
            </div>
        </div>
    </section>

    @include('landing.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({ duration: 1000, once: true });

            const empty = document.getElementById('examsEmpty');
            const search = document.getElementById('examSearch');
            const items = Array.from(document.querySelectorAll('.exam-item'));
            const chips = Array.from(document.querySelectorAll('.chip'));

            const filters = {
                region: 'all',
                type: 'all',
                status: 'all'
            };

            function setChipActive(group, value) {
                chips.forEach(c => {
                    if ((c.dataset.filterGroup || '') === group) {
                        c.classList.toggle('active', (c.dataset.filterValue || '') === value);
                    }
                });
            }

            function applyFilters() {
                const q = (search && search.value ? search.value : '').toLowerCase().trim();
                let visibleCount = 0;

                items.forEach(el => {
                    const title = el.dataset.title || '';
                    const region = el.dataset.region || '';
                    const type = el.dataset.type || '';
                    const status = el.dataset.status || '';

                    const okQuery = !q || title.includes(q);
                    const okRegion = filters.region === 'all' || region === filters.region;
                    const okType = filters.type === 'all' || type === filters.type;
                    const okStatus = filters.status === 'all' || status === filters.status;

                    const show = okQuery && okRegion && okType && okStatus;
                    el.style.display = show ? '' : 'none';
                    if (show) visibleCount++;
                });

                if (empty) {
                    empty.style.display = visibleCount === 0 ? '' : 'none';
                }
            }

            chips.forEach(chip => {
                chip.addEventListener('click', function() {
                    const group = (chip.dataset.filterGroup || '').toLowerCase();
                    const value = (chip.dataset.filterValue || '').toLowerCase();

                    if (!group || !value) return;

                    filters[group] = value;
                    setChipActive(group, value);
                    applyFilters();
                });
            });

            if (search) {
                search.addEventListener('input', applyFilters);
            }

            applyFilters();
        });
    </script>
</body>
</html>
