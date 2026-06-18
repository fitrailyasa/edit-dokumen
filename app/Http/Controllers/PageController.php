<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
    public function show(string $slug): View
    {
        $page = Page::published()->where('slug', $slug)->firstOrFail();

        $sidebarItems = Page::published()
            ->where('show_on_home', true)
            ->where('id', '!=', $page->id)
            ->orderBy('home_order')
            ->orderBy('title')
            ->take(6)
            ->get(['title', 'slug', 'icon'])
            ->map(fn (Page $item) => [
                'title' => $item->title,
                'url' => route('pages.show', $item->slug),
                'icon' => $item->icon ?: '📝',
            ]);

        $sidebarTitle = 'Layanan Lainnya';

        return view('client.pages.show', compact('page', 'sidebarItems', 'sidebarTitle'));
    }
}
