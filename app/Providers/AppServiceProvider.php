<?php

namespace App\Providers;

use App\Models\ExamType;
use App\Models\NewsPost;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('landing.partials.header', function ($view) {
            $types = collect([]);

            try {
                if (Schema::hasTable('exam_types')) {
                    $types = ExamType::query()
                        ->where('is_active', true)
                        ->orderBy('sort_order')
                        ->orderBy('name')
                        ->get(['name', 'slug']);
                }
            } catch (\Throwable $e) {
                $types = collect([]);
            }

            $view->with('navExamTypes', $types);
        });

        View::composer('landing.partials.footer', function ($view) {
            $latestNews = collect([]);

            try {
                if (Schema::hasTable('news_posts')) {
                    $latestNews = NewsPost::query()
                        ->where('is_published', true)
                        ->orderByDesc('published_at')
                        ->limit(3)
                        ->get(['title', 'slug', 'published_at']);
                }
            } catch (\Throwable $e) {
                $latestNews = collect([]);
            }

            $view->with('footerLatestNews', $latestNews);
        });
    }
}
