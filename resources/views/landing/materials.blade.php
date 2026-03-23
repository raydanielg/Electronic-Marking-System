<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Materials - EMaS</title>

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

        .materials-section {
            padding: 86px 0;
            background: #ffffff;
        }

        .materials-section.alt {
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
            max-width: 920px;
            margin: 0 auto;
        }

        .materials-toolbar {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: rgba(255,255,255,0.85);
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

        .material-card {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: #ffffff;
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            padding: 22px;
            height: 100%;
            transition: all 0.25s ease;
        }

        .material-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 60px rgba(2, 6, 23, 0.12);
        }

        .material-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 12px;
        }

        .material-icon {
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

        .material-title {
            font-weight: 900;
            font-size: 1.12rem;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .material-meta {
            color: #64748b;
            font-weight: 800;
            font-size: 0.85rem;
        }

        .material-desc {
            color: #475569;
            line-height: 1.75;
            margin: 10px 0 0;
        }

        .tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 10px;
            border-radius: 9999px;
            background: rgba(251, 146, 60, 0.12);
            border: 1px solid rgba(251, 146, 60, 0.22);
            color: #7c2d12;
            font-weight: 900;
            font-size: 0.75rem;
            white-space: nowrap;
        }

        .material-actions {
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
                <div class="page-kicker"><i class="fas fa-folder-open"></i> Resources</div>
                <h1 class="page-title">Materials & Downloads</h1>
                <p class="page-desc">
                    Official templates, guides, and supporting documents for EMaS workflows.
                    Use these materials to standardize data entry and reporting across schools and councils.
                </p>

                <div class="breadcrumb-wrap">
                    <div class="breadcrumb-pill">
                        <a href="{{ route('landing') }}"><i class="fas fa-house"></i> Home</a>
                        <span class="sep">/</span>
                        <span>Materials</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="materials-section alt">
        <div class="container">
            <div class="text-center mb-4" data-aos="fade-up">
                <div class="section-badge mx-auto"><i class="fas fa-sliders"></i> Filter</div>
                <h2 class="section-title">Find what you need</h2>
                <p class="section-desc">
                    Search by keyword and pick a category.
                </p>
            </div>

            <div class="materials-toolbar" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-3 align-items-center">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-text" style="border-radius: 9999px 0 0 9999px; font-weight: 900;"><i class="fas fa-magnifying-glass"></i></span>
                            <input id="materialsSearch" type="text" class="form-control" placeholder="Search materials (e.g., template, Excel, report)..." style="border-radius: 0 9999px 9999px 0; font-weight: 800;" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                            <span class="chip active" data-filter="all"><i class="fas fa-layer-group"></i> All</span>
                            <span class="chip" data-filter="templates"><i class="fas fa-file-excel"></i> Templates</span>
                            <span class="chip" data-filter="guides"><i class="fas fa-book"></i> Guides</span>
                            <span class="chip" data-filter="reports"><i class="fas fa-chart-line"></i> Reports</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-3" id="materialsGrid">
                <div class="col-lg-4 material-item" data-category="templates" data-title="Student import template">
                    <div class="material-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="material-top">
                            <div>
                                <div class="material-icon"><i class="fas fa-file-excel"></i></div>
                            </div>
                            <span class="tag"><i class="fas fa-download"></i> Excel</span>
                        </div>
                        <div class="material-title">Student Import Template</div>
                        <div class="material-meta">Category: Templates</div>
                        <p class="material-desc">Use this Excel format to upload students in bulk with consistent validation.</p>
                        <div class="material-actions">
                            <a href="#" class="btn btn-soft" aria-disabled="true"><i class="fas fa-eye me-1"></i>Preview</a>
                            <a href="#" class="btn btn-primary btn-primary-pill" aria-disabled="true"><i class="fas fa-download me-1"></i>Download</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 material-item" data-category="templates" data-title="Marks entry template">
                    <div class="material-card" data-aos="fade-up" data-aos-delay="150">
                        <div class="material-top">
                            <div>
                                <div class="material-icon" style="background: linear-gradient(135deg, rgba(204,51,51,0.14) 0%, rgba(153,27,27,0.10) 100%); color:#991b1b;"><i class="fas fa-table"></i></div>
                            </div>
                            <span class="tag" style="background: rgba(0,136,204,0.08); border-color: rgba(0,136,204,0.18); color:#005a9e;"><i class="fas fa-clipboard-check"></i> Standard</span>
                        </div>
                        <div class="material-title">Marks Entry Template</div>
                        <div class="material-meta">Category: Templates</div>
                        <p class="material-desc">Capture marks by subject and class, then submit for manager approval.</p>
                        <div class="material-actions">
                            <a href="#" class="btn btn-soft" aria-disabled="true"><i class="fas fa-eye me-1"></i>Preview</a>
                            <a href="#" class="btn btn-primary btn-primary-pill" aria-disabled="true"><i class="fas fa-download me-1"></i>Download</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 material-item" data-category="guides" data-title="Quick start guide">
                    <div class="material-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="material-top">
                            <div>
                                <div class="material-icon" style="background: linear-gradient(135deg, rgba(6,95,70,0.14) 0%, rgba(6,95,70,0.10) 100%); color:#065f46;"><i class="fas fa-book-open"></i></div>
                            </div>
                            <span class="tag"><i class="fas fa-file-pdf"></i> PDF</span>
                        </div>
                        <div class="material-title">EMaS Quick Start Guide</div>
                        <div class="material-meta">Category: Guides</div>
                        <p class="material-desc">A short guide for managers and clerks: setup, entry, approval, and reporting.</p>
                        <div class="material-actions">
                            <a href="{{ route('landing.guideline') }}" class="btn btn-soft"><i class="fas fa-arrow-up-right-from-square me-1"></i>Open</a>
                            <a href="#" class="btn btn-primary btn-primary-pill" aria-disabled="true"><i class="fas fa-download me-1"></i>Download</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 material-item" data-category="reports" data-title="School performance report">
                    <div class="material-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="material-top">
                            <div>
                                <div class="material-icon"><i class="fas fa-chart-line"></i></div>
                            </div>
                            <span class="tag" style="background: rgba(148,163,184,0.16); border-color: rgba(148,163,184,0.25); color:#334155;"><i class="fas fa-file-lines"></i> Sample</span>
                        </div>
                        <div class="material-title">School Performance Report (Sample)</div>
                        <div class="material-meta">Category: Reports</div>
                        <p class="material-desc">See a typical report structure for rankings, trends, and summary performance.</p>
                        <div class="material-actions">
                            <a href="#" class="btn btn-soft" aria-disabled="true"><i class="fas fa-eye me-1"></i>Preview</a>
                            <a href="#" class="btn btn-primary btn-primary-pill" aria-disabled="true"><i class="fas fa-download me-1"></i>Download</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 material-item" data-category="guides" data-title="Data quality checklist">
                    <div class="material-card" data-aos="fade-up" data-aos-delay="150">
                        <div class="material-top">
                            <div>
                                <div class="material-icon" style="background: linear-gradient(135deg, rgba(251,146,60,0.18) 0%, rgba(194,65,12,0.10) 100%); color:#c2410c;"><i class="fas fa-list-check"></i></div>
                            </div>
                            <span class="tag" style="background: rgba(6,95,70,0.10); border-color: rgba(6,95,70,0.18); color:#065f46;"><i class="fas fa-shield-halved"></i> Quality</span>
                        </div>
                        <div class="material-title">Data Quality Checklist</div>
                        <div class="material-meta">Category: Guides</div>
                        <p class="material-desc">A practical checklist to reduce errors before approvals and final processing.</p>
                        <div class="material-actions">
                            <a href="#" class="btn btn-soft" aria-disabled="true"><i class="fas fa-eye me-1"></i>Preview</a>
                            <a href="#" class="btn btn-primary btn-primary-pill" aria-disabled="true"><i class="fas fa-download me-1"></i>Download</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 material-item" data-category="templates" data-title="School list template">
                    <div class="material-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="material-top">
                            <div>
                                <div class="material-icon" style="background: linear-gradient(135deg, rgba(0,136,204,0.18) 0%, rgba(204,51,51,0.10) 100%); color:#005a9e;"><i class="fas fa-school"></i></div>
                            </div>
                            <span class="tag"><i class="fas fa-file-excel"></i> Excel</span>
                        </div>
                        <div class="material-title">School List Template</div>
                        <div class="material-meta">Category: Templates</div>
                        <p class="material-desc">Standard structure for council school registration, codes, and classification.</p>
                        <div class="material-actions">
                            <a href="#" class="btn btn-soft" aria-disabled="true"><i class="fas fa-eye me-1"></i>Preview</a>
                            <a href="#" class="btn btn-primary btn-primary-pill" aria-disabled="true"><i class="fas fa-download me-1"></i>Download</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4" id="materialsEmpty" style="display:none;">
                <div class="empty-state">
                    No materials match your search.
                </div>
            </div>
        </div>
    </section>

    <section class="materials-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <div class="section-badge mx-auto"><i class="fas fa-circle-question"></i> Request</div>
                <h2 class="section-title">Need a new template?</h2>
                <p class="section-desc">
                    If you don’t find what you need, contact the support team and specify the exam type, level, and required format.
                </p>
            </div>

            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <a href="{{ route('landing.contact') }}" class="btn btn-primary btn-primary-pill" style="padding: 12px 18px;">
                    <i class="fas fa-paper-plane me-2"></i>Contact Support
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

            const chips = Array.from(document.querySelectorAll('.chip'));
            const search = document.getElementById('materialsSearch');
            const items = Array.from(document.querySelectorAll('.material-item'));
            const empty = document.getElementById('materialsEmpty');

            let activeCategory = 'all';

            function setActiveChip(target) {
                chips.forEach(c => c.classList.remove('active'));
                target.classList.add('active');
            }

            function applyFilters() {
                const q = (search && search.value ? search.value : '').toLowerCase().trim();
                let visibleCount = 0;

                items.forEach(el => {
                    const title = (el.dataset.title || '').toLowerCase();
                    const cat = (el.dataset.category || '').toLowerCase();
                    const okCategory = activeCategory === 'all' || cat === activeCategory;
                    const okQuery = !q || title.includes(q);

                    const show = okCategory && okQuery;
                    el.style.display = show ? '' : 'none';
                    if (show) visibleCount++;
                });

                if (empty) {
                    empty.style.display = visibleCount === 0 ? '' : 'none';
                }
            }

            chips.forEach(chip => {
                chip.addEventListener('click', function() {
                    activeCategory = (chip.dataset.filter || 'all').toLowerCase();
                    setActiveChip(chip);
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
