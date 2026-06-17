<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\SiteSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrapFour();

        View::composer('layouts.client.*', function ($view) {
            $view->with('footerPages', Page::published()
                ->where('show_in_footer', true)
                ->orderBy('footer_order')
                ->orderBy('title')
                ->get(['title', 'slug']));
            $view->with('siteSetting', SiteSetting::current());
        });
    }
}
