<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
class CartController extends Controller
{
    public function index()
    {
    	$cartItems = Cart::content();
    	return view('cart.index',compact('cartItems'));
    }

    public function addItem($id)
    {
    	$product = Product::find($id);
    	Cart::add($id,$product->pro_name,1,$product->pro_price,['img'=>$product->pro_image,'stock'=>$product->stock]);
    	return back();
    }

    public function update(Request $request,$id)
    {
    	$proId = $request->proId;
    	$qty = $request->qty;

    	$product = Product::find($proId);
    	$stock = $product->stock;
    	if($qty<$stock){
    		Cart::update($id,$request->qty);
    		return back()->with('status','cart updated successfully');
    	}else{
    		return back()->with('error','your qty is more then stock');
    	}
    }

    public function destroy($id)
    {
    	Cart::remove($id);
    	return  back();
    }
}
