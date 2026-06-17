<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\SiteSetting;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $siteSetting = SiteSetting::current();
        $waUrl = $siteSetting->whatsappUrl();

        $recentPosts = Post::published()
            ->latest('published_at')
            ->latest()
            ->take(5)
            ->get(['id', 'title', 'slug', 'published_at', 'created_at']);

        $footerPages = Page::published()
            ->where('show_in_footer', true)
            ->orderBy('footer_order')
            ->orderBy('title')
            ->get(['title', 'slug']);

        $featuredServices = Page::published()
            ->where('is_featured', true)
            ->orderBy('home_order')
            ->get();

        $homeServices = Page::published()
            ->where('show_on_home', true)
            ->orderBy('home_order')
            ->get(['title', 'slug', 'icon', 'home_order']);

        $visibleHomeServices = $homeServices->take(9);
        $moreHomeServices = $homeServices->slice(9)->values();

        return view('welcome', compact(
            'siteSetting',
            'waUrl',
            'recentPosts',
            'footerPages',
            'featuredServices',
            'visibleHomeServices',
            'moreHomeServices',
        ));
    }
}
