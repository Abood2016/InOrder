<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Message;
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

        $products = Product::orderBy('id','desc');
        if (request()->has('search') && request()->get('search')  != '') {
          $products = $products->where('name' , 'like' , "%".request()->get('search')."%");
        }
        $products = $products->paginate(30);
        return view('home',compact('products'));
    }


    public function welcome()
    {
        $products = Product::inRandomOrder()->take(4)->get();
        $topSilling = Product::inRandomOrder()->take(4)->get();
        return view('front-end.index',compact('products','topSilling'));
    }

    public function product($id)
    {

    $product = Product::findOrFail($id);
    $setting = Setting::orderBy('created_at' , 'desc')->limit(1)->get()->first();
    $colors = Color::get();
    $sizes = Size::get();
    $relatedProduct = Product::inRandomOrder()->take(4)->get();
   
     if ($product->quantity > $setting->stock_threshold) { //is true
        $stockLevel = 'In Stock';
    } elseif($product->quantity <= $setting->stock_threshold && $product->quantity > 0) {
        $stockLevel = 'Low Stock';
    } else {
        $stockLevel = 'Not availabel';
    }

    return view('front-end.product',
    compact('product','setting','stockLevel','sizes','colors','relatedProduct'));
}

    public function category($id)
    {
    $category = Category::findOrFail($id);
    $products = Product::where('category_id',$id)->orderBy('id' , 'desc')->paginate(10);
    return view('front-end.category.index',compact('products','category'));
    }

    public function search()
    {
        $products = Product::orderBy('id','desc');
        if (request()->has('search') && request()->get('search')  != '') {
          $products = $products->where('name' , 'like' , "%".request()->get('search')."%");
        }
        dd($product);
        $products = $products->paginate(10);
        return view('home',compact('products'));
    }

    public function showMessege ()
    {
      
      return view('front-end.messages.index');

    }

    public function storeMessege (\App\Http\Requests\frontend\Message\Store $request)
    {
      Message::create($request->all());
      alert()->success('Your Message Sent Successfully','Done');
      return redirect()->route('landing.index');

    }


}
