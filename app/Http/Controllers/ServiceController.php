<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Page::published()
            ->where('show_on_home', true)
            ->orderBy('home_order')
            ->orderBy('title')
            ->paginate(12);

        return view('client.services.index', compact('services'));
    }
}
