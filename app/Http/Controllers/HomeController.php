<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ()
    {
        $title = 'Anasayfa';
        $products = Product::where('is_published', 1)->get();
        return view('home', compact('title', 'products'));
    }

}
