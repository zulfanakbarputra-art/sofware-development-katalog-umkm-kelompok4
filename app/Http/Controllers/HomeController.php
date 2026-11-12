<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Setting;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'products' => Product::with('sizes')->orderBy('id')->get(),
            'setting' => Setting::current(),
        ]);
    }
}
