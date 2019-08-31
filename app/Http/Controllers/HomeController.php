<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::inRandomOrder()->take(4)->get();
        $topSilling = Product::inRandomOrder()->take(4)->get();
        return view('front-end.index',compact('products','topSilling'));
    }

    public function product($id)
    {

    $product = Product::findOrFail($id);

    return view('front-end.product',compact('product'))->with('category','colors','sizes');;
    }

}
