<?php

namespace App\Http\Controllers;
use App\Product;
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

    public function index()
    {
        $products = Product::all();
        return view('frontend.home',compact('products'));
    }

    public function shop()
    {
        $products = Product::all();
        return view('frontend.shop',compact('products'));
    }

    public function category_product($id)
    {
        $categories_product = Product::where('category_id',$id)->get();
        $id_=$id;
        return view('frontend.category_list_pro',compact('categories_product','id_'));
    }

    public function productDetails($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.product_details',compact('product'));
    }
}
