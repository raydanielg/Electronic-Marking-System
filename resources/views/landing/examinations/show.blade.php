<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $exam['title'] }} - EMaS</title>

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
            font-size: 2.4rem;
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

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 11px;
            border-radius: 9999px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: rgba(255,255,255,0.85);
            color: #0f172a;
            font-weight: 900;
            font-size: 0.78rem;
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

        .exam-section {
            padding: 86px 0;
            background: #ffffff;
        }

        .exam-card {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: #ffffff;
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            padding: 22px;
            height: 100%;
        }

        .table-wrap {
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
            border-bottom: 1px solid rgba(148, 163, 184, 0.28);
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 9999px;
            display: inline-block;
            margin-right: 8px;
        }

        .dot-uploaded { background: #16a34a; }
        .dot-pending { background: #f59e0b; }
        .dot-review { background: #0ea5e9; }
        .dot-locked { background: #94a3b8; }

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

        @media (max-width: 576px) {
            .page-title { font-size: 1.85rem; }
        }
    </style>
</head>
<body>
    @include('landing.partials.header')

    @php
        $statusKey = strtolower($exam['status']);
        $statusClass = $statusKey === 'published' ? 'status-published' : ($statusKey === 'archived' ? 'status-archived' : 'status-processing');
    @endphp

    <section class="page-hero">
        <div class="network-layer">
            <div class="network-lines"></div>
            <div class="network-nodes"></div>
        </div>
        <div class="container">
            <div class="page-hero-inner" data-aos="fade-up">
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start gap-3">
                    <div>
                        <div class="page-kicker"><i class="fas fa-file-signature"></i> Examination Details</div>
                        <h1 class="page-title">{{ $exam['title'] }}</h1>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="pill"><i class="fas fa-location-dot"></i> {{ $exam['region'] }}</span>
                            <span class="pill"><i class="fas fa-layer-group"></i> {{ $exam['level'] }}</span>
                            <span class="pill"><i class="fas fa-calendar"></i> {{ $exam['academic_year'] }}</span>
                            <span class="pill"><i class="fas fa-tag"></i> {{ $exam['type'] }}</span>
                            <span class="pill {{ $statusClass }}"><i class="fas fa-flag"></i> {{ $exam['status'] }}</span>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-start align-items-lg-end gap-2">
                        <div class="breadcrumb-pill">
                            <a href="{{ route('landing') }}"><i class="fas fa-house"></i> Home</a>
                            <span class="sep">/</span>
                            <a href="{{ route('landing.examinations.index') }}">Examinations</a>
                            <span class="sep">/</span>
                            <span>View</span>
                        </div>

                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('landing.examinations.index') }}" class="btn btn-soft">
                                <i class="fas fa-arrow-left me-1"></i>Back to List
                            </a>
                            <a href="#" class="btn btn-primary btn-primary-pill" aria-disabled="true">
                                <i class="fas fa-cloud-arrow-up me-1"></i>Upload Marks
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="exam-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="exam-card">
                        <div class="d-flex align-items-center gap-3">
                            <div style="width:54px;height:54px;border-radius:16px;display:flex;align-items:center;justify-content:center;background: linear-gradient(135deg, rgba(0,136,204,0.18) 0%, rgba(0,90,158,0.10) 100%); color:#005a9e; font-size:1.3rem;">
                                <i class="fas fa-upload"></i>
                            </div>
                            <div>
                                <div style="font-weight: 900; font-size: 1.1rem;">Uploads Summary</div>
                                <div style="color:#64748b; font-weight:800;">Subjects uploaded and pending</div>
                            </div>
                        </div>

                        @php
                            $total = $subjects->count();
                            $uploaded = $subjects->where('upload_status', 'Uploaded')->count();
                            $pending = $subjects->where('upload_status', 'Pending')->count();
                            $review = $subjects->where('upload_status', 'In Review')->count();
                            $locked = $subjects->where('upload_status', 'Locked')->count();
                            $progress = $total > 0 ? round(($uploaded / $total) * 100) : 0;
                        @endphp

                        <div class="mt-3">
                            <div class="d-flex justify-content-between" style="font-weight: 900; color:#0f172a;">
                                <span>Completion</span>
                                <span>{{ $progress }}%</span>
                            </div>
                            <div class="progress" style="height: 10px; border-radius: 9999px; background: rgba(148,163,184,0.18);">
                                <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%; border-radius: 9999px; background: linear-gradient(135deg, #0088cc 0%, #005a9e 100%);"></div>
                            </div>

                            <div class="d-flex flex-wrap gap-2 mt-3">
                                <span class="pill"><span class="status-dot dot-uploaded"></span> Uploaded: {{ $uploaded }}</span>
                                <span class="pill"><span class="status-dot dot-review"></span> In Review: {{ $review }}</span>
                                <span class="pill"><span class="status-dot dot-pending"></span> Pending: {{ $pending }}</span>
                                <span class="pill"><span class="status-dot dot-locked"></span> Locked: {{ $locked }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="150">
                    <div class="table-wrap">
                        <div class="p-3 p-md-4" style="border-bottom: 1px solid rgba(148, 163, 184, 0.22);">
                            <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
                                <div>
                                    <div style="font-weight: 900; font-size: 1.15rem;">Uploaded Subjects</div>
                                    <div style="color:#64748b; font-weight: 800;">Each subject shows its upload file and status.</div>
                                </div>
                                <div style="max-width: 360px;" class="w-100">
                                    <div class="input-group">
                                        <span class="input-group-text" style="border-radius: 9999px 0 0 9999px; font-weight: 900;"><i class="fas fa-magnifying-glass"></i></span>
                                        <input id="subjectSearch" type="text" class="form-control" placeholder="Search subject..." style="border-radius: 0 9999px 9999px 0; font-weight: 800;" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th style="min-width: 220px;">Subject</th>
                                        <th>Status</th>
                                        <th>Uploaded By</th>
                                        <th>Uploaded At</th>
                                        <th>File</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="subjectsTbody">
                                    @foreach($subjects as $s)
                                        @php
                                            $st = strtolower($s['upload_status']);
                                            $dot = $st === 'uploaded' ? 'dot-uploaded' : ($st === 'pending' ? 'dot-pending' : ($st === 'in review' ? 'dot-review' : 'dot-locked'));
                                        @endphp
                                        <tr class="subject-row" data-title="{{ strtolower($s['name']) }} {{ strtolower($s['code']) }} {{ strtolower($s['upload_status']) }}">
                                            <td>
                                                <div style="font-weight: 900;">{{ $s['name'] }}</div>
                                                <div style="color:#64748b; font-weight: 800; font-size: 0.86rem;">Code: {{ $s['code'] }}</div>
                                            </td>
                                            <td>
                                                <span class="pill"><span class="status-dot {{ $dot }}"></span>{{ $s['upload_status'] }}</span>
                                            </td>
                                            <td style="font-weight: 800; color:#334155;">{{ $s['uploaded_by'] ?? '—' }}</td>
                                            <td style="font-weight: 800; color:#334155;">{{ $s['uploaded_at'] ?? '—' }}</td>
                                            <td style="font-weight: 800; color:#334155;">{{ $s['file'] ?? '—' }}</td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-soft btn-sm" aria-disabled="true"><i class="fas fa-eye me-1"></i>View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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

            const search = document.getElementById('subjectSearch');
            const rows = Array.from(document.querySelectorAll('.subject-row'));

            function apply() {
                const q = (search && search.value ? search.value : '').toLowerCase().trim();

                rows.forEach(r => {
                    const text = (r.dataset.title || '');
                    r.style.display = (!q || text.includes(q)) ? '' : 'none';
                });
            }

            if (search) {
                search.addEventListener('input', apply);
            }
        });
    </script>
</body>
</html>
