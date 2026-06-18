<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class InfoController extends Controller
{
    public function orderGuide(): View
    {
        return view('client.order-guide');
    }

    public function pricing(): View
    {
        return view('client.pricing');
    }
}
