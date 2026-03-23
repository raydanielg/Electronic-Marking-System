<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>News - EMaS</title>

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

        .content {
            padding: 86px 0;
            background: #ffffff;
        }

        .news-toolbar {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: rgba(255,255,255,0.92);
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            padding: 18px;
        }

        .post-card {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: #ffffff;
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            overflow: hidden;
            height: 100%;
            transition: all 0.25s ease;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
        }

        .post-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 60px rgba(2, 6, 23, 0.12);
        }

        .post-cover {
            position: relative;
            height: 200px;
            background: #0f172a;
        }

        .post-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.92;
        }

        .post-cover::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(2,6,23,0.15) 0%, rgba(2,6,23,0.55) 100%);
        }

        .post-meta {
            position: absolute;
            left: 14px;
            right: 14px;
            bottom: 14px;
            display: flex;
            justify-content: space-between;
            gap: 10px;
            z-index: 2;
            color: #ffffff;
            font-weight: 900;
            font-size: 0.82rem;
        }

        .meta-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 10px;
            border-radius: 9999px;
            background: rgba(15, 23, 42, 0.55);
            border: 1px solid rgba(148, 163, 184, 0.25);
            backdrop-filter: blur(6px);
        }

        .post-body {
            padding: 18px 18px 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .post-title {
            font-weight: 900;
            font-size: 1.15rem;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .post-excerpt {
            color: #475569;
            line-height: 1.75;
            margin: 0;
            flex: 1;
        }

        .post-cta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: 14px;
            font-weight: 900;
            color: #005a9e;
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
                <div class="page-kicker"><i class="fas fa-newspaper"></i> Updates</div>
                <h1 class="page-title">News & Announcements</h1>
                <p class="page-desc">
                    Official updates, guidance notes, and announcements from the EMaS team.
                </p>

                <div class="breadcrumb-wrap">
                    <div class="breadcrumb-pill">
                        <a href="{{ route('landing') }}"><i class="fas fa-house"></i> Home</a>
                        <span class="sep">/</span>
                        <span>News</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="news-toolbar" data-aos="fade-up">
                <div class="row g-3 align-items-center">
                    <div class="col-lg-7">
                        <div class="input-group">
                            <span class="input-group-text" style="border-radius: 9999px 0 0 9999px; font-weight: 900;"><i class="fas fa-magnifying-glass"></i></span>
                            <input id="newsSearch" type="text" class="form-control" placeholder="Search news (e.g., training, security, rollout)..." style="border-radius: 0 9999px 9999px 0; font-weight: 800;" />
                        </div>
                    </div>
                    <div class="col-lg-5 d-flex justify-content-lg-end">
                        <span style="font-weight: 900; color:#475569;">Showing <span id="newsCount">0</span> posts</span>
                    </div>
                </div>
            </div>

            @if($posts->count())
                <div class="row g-4 mt-2" id="newsGrid">
                    @foreach($posts as $p)
                        <div class="col-lg-4 news-item" data-title="{{ strtolower($p->title) }}" data-excerpt="{{ strtolower($p->excerpt ?? '') }}">
                            <a class="post-card" href="{{ route('landing.news.show', $p->slug) }}" data-aos="fade-up" data-aos-delay="100">
                                <div class="post-cover">
                                    <img src="{{ $p->cover_image ? asset($p->cover_image) : asset('hero/students-paying-attention-class.jpg') }}" alt="{{ $p->title }}">
                                    <div class="post-meta">
                                        <span class="meta-pill"><i class="fas fa-calendar"></i> {{ optional($p->published_at)->format('d M Y') ?? '—' }}</span>
                                        <span class="meta-pill"><i class="fas fa-user"></i> {{ $p->author_name ?? 'EMaS' }}</span>
                                    </div>
                                </div>
                                <div class="post-body">
                                    <div class="post-title">{{ $p->title }}</div>
                                    <p class="post-excerpt">{{ $p->excerpt }}</p>
                                    <div class="post-cta">Read more <i class="fas fa-arrow-right"></i></div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4" id="newsEmpty" style="display:none;">
                    <div class="empty-state">No posts match your search.</div>
                </div>
            @else
                <div class="mt-4" data-aos="fade-up">
                    <div class="empty-state">No news blogs yet. Check back soon for updates.</div>
                </div>
            @endif
        </div>
    </section>

    @include('landing.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({ duration: 1000, once: true });

            const search = document.getElementById('newsSearch');
            const items = Array.from(document.querySelectorAll('.news-item'));
            const empty = document.getElementById('newsEmpty');
            const count = document.getElementById('newsCount');

            function render() {
                const q = (search && search.value ? search.value : '').toLowerCase().trim();
                let visible = 0;

                items.forEach(el => {
                    const title = el.dataset.title || '';
                    const excerpt = el.dataset.excerpt || '';
                    const show = !q || title.includes(q) || excerpt.includes(q);
                    el.style.display = show ? '' : 'none';
                    if (show) visible++;
                });

                if (count) count.textContent = String(visible);
                if (empty) empty.style.display = visible === 0 && items.length ? '' : 'none';
            }

            if (search) search.addEventListener('input', render);
            render();
        });
    </script>
</body>
</html>
