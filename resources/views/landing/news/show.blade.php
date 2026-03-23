<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $post->title }} - EMaS</title>

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

        .hero {
            position: relative;
            min-height: 420px;
            display: flex;
            align-items: flex-end;
            padding: 90px 0 50px;
            overflow: hidden;
            background: #0b1220;
        }

        .hero img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.78;
        }

        .hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(1200px circle at 20% 0%, rgba(0, 136, 204, 0.40), transparent 62%),
                radial-gradient(900px circle at 85% 20%, rgba(204, 51, 51, 0.26), transparent 60%),
                linear-gradient(180deg, rgba(2,6,23,0.20) 0%, rgba(2,6,23,0.85) 70%, rgba(2,6,23,0.92) 100%);
        }

        .hero-inner {
            position: relative;
            z-index: 2;
        }

        .kicker {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 14px;
            border-radius: 9999px;
            background: rgba(15, 23, 42, 0.55);
            border: 1px solid rgba(148, 163, 184, 0.25);
            color: #ffffff;
            font-weight: 900;
            font-size: 0.75rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 14px;
            backdrop-filter: blur(6px);
        }

        .kicker i { color: #fb923c; }

        .title {
            font-size: 2.35rem;
            font-weight: 900;
            color: #ffffff;
            line-height: 1.2;
            margin-bottom: 12px;
            max-width: 980px;
        }

        .meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            color: rgba(226, 232, 240, 0.95);
            font-weight: 900;
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

        .content {
            padding: 86px 0;
            background: #ffffff;
        }

        .article {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: #ffffff;
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            padding: 28px;
        }

        .article p {
            color: #334155;
            line-height: 1.85;
            font-weight: 700;
            margin-bottom: 14px;
            white-space: pre-line;
        }

        .side-card {
            border-radius: 22px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: #ffffff;
            box-shadow: 0 18px 45px rgba(2, 6, 23, 0.08);
            padding: 18px;
        }

        .related-item {
            display: flex;
            gap: 12px;
            padding: 10px;
            border-radius: 16px;
            text-decoration: none;
            color: inherit;
            transition: all 0.2s ease;
        }

        .related-item:hover {
            background: rgba(0, 136, 204, 0.08);
        }

        .related-thumb {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid rgba(148, 163, 184, 0.22);
            background: #0f172a;
            flex: 0 0 auto;
        }

        .related-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.92;
        }

        .related-title {
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 4px;
            line-height: 1.3;
        }

        .related-date {
            color: #64748b;
            font-weight: 900;
            font-size: 0.85rem;
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
            .title { font-size: 1.8rem; }
            .article { padding: 18px; }
        }
    </style>
</head>
<body>
    @include('landing.partials.header')

    <section class="hero">
        <img src="{{ $post->cover_image ? asset($post->cover_image) : asset('hero/students-paying-attention-class.jpg') }}" alt="{{ $post->title }}">
        <div class="container hero-inner">
            <div class="kicker"><i class="fas fa-newspaper"></i> News</div>
            <h1 class="title" data-aos="fade-up">{{ $post->title }}</h1>
            <div class="meta" data-aos="fade-up" data-aos-delay="100">
                <span class="meta-pill"><i class="fas fa-calendar"></i> {{ optional($post->published_at)->format('d M Y') ?? '—' }}</span>
                <span class="meta-pill"><i class="fas fa-user"></i> {{ $post->author_name ?? 'EMaS' }}</span>
                <span class="meta-pill"><i class="fas fa-link"></i> <a href="{{ route('landing.news.index') }}" style="color:inherit; text-decoration:none;">All News</a></span>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="50">
                    <div class="article">
                        <p>{{ $post->content }}</p>
                        <a href="{{ route('landing.news.index') }}" class="btn btn-soft mt-2"><i class="fas fa-arrow-left me-1"></i>Back to News</a>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="120">
                    <div class="side-card">
                        <div style="font-weight: 900; font-size: 1.1rem; margin-bottom: 10px;">Latest posts</div>

                        @if(isset($related) && $related->count())
                            <div class="d-grid gap-2">
                                @foreach($related as $r)
                                    <a class="related-item" href="{{ route('landing.news.show', $r->slug) }}">
                                        <div class="related-thumb">
                                            <img src="{{ $r->cover_image ? asset($r->cover_image) : asset('hero/analyzing-business-activity.jpg') }}" alt="{{ $r->title }}">
                                        </div>
                                        <div>
                                            <div class="related-title">{{ $r->title }}</div>
                                            <div class="related-date"><i class="fas fa-calendar"></i> {{ optional($r->published_at)->format('d M Y') ?? '—' }}</div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div style="color:#64748b; font-weight: 800;">No related posts.</div>
                        @endif
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
        });
    </script>
</body>
</html>
