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

        return view('client.articles.show', compact('post'));
    }
}
