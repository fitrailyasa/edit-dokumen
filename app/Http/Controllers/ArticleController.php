<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $posts = Post::published()
            ->with('category')
            ->latest('published_at')
            ->latest()
            ->paginate(12);

        return view('client.articles.index', compact('posts'));
    }

    public function show(string $slug): View
    {
        $post = Post::published()
            ->with(['category', 'tags', 'user'])
            ->where('slug', $slug)
            ->firstOrFail();

        $sidebarItems = Post::published()
            ->where('id', '!=', $post->id)
            ->when($post->category_id, fn ($q) => $q->where('category_id', $post->category_id))
            ->latest('published_at')
            ->latest()
            ->take(6)
            ->get(['title', 'slug'])
            ->map(fn (Post $item) => [
                'title' => $item->title,
                'url' => route('articles.show', $item->slug),
                'icon' => '📄',
            ]);

        if ($sidebarItems->isEmpty()) {
            $sidebarItems = Post::published()
                ->where('id', '!=', $post->id)
                ->latest('published_at')
                ->latest()
                ->take(6)
                ->get(['title', 'slug'])
                ->map(fn (Post $item) => [
                    'title' => $item->title,
                    'url' => route('articles.show', $item->slug),
                    'icon' => '📄',
                ]);
        }

        $sidebarTitle = 'Artikel Lainnya';

        return view('client.articles.show', compact('post', 'sidebarItems', 'sidebarTitle'));
    }
}
