<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'postsCount' => Post::count(),
            'categoriesCount' => Category::count(),
            'tagsCount' => Tag::count(),
            'usersCount' => User::count(),
            'recentPosts' => Post::with(['category', 'user'])->latest()->take(5)->get(),
        ]);
    }
}
