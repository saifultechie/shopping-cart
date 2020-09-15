<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $formInput = $request->except('image');
        $this->validate($request,[
            'pro_name' => 'required',
            'pro_price' => 'required',
            'pro_code' => 'required',
            'stock'    => 'required',
            'category_id' => 'required',
            'pro_info' => 'required',
            'pro_image' => 'image|mimes:png,jpg,jpeg|max:10000',
            'sp1_price' => 'required'
        ]);



        $image = $request->image;

        if($image){
            $filename = $image->getClientOriginalName();
            $image->move('images',$filename);
            $formInput['pro_image'] = $filename;
        }

        Product::create($formInput);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }
}
