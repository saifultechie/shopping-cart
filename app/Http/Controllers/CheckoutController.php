<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Address;
use App\Order;

class CheckoutController extends Controller
{
    public function index()
    {
    	if(Auth::check()){
    		$cartItems = Cart::content();
    		return view('cart.checkout',compact('cartItems'));
    	}else{
    		return redirect('login');
    	}
    }

    public function address(Request $request)
    {
    	$this->validate($request,[
    		'fullname' => 'required|min:5|max:25',
    		'state' => 'required',
    		'city' => 'required',
    		'country' => 'required',
    		'pincode' => 'required|numeric'

    	]);

    	$request['user_id'] = Auth::user()->id;

    	Address::create($request->all());

    	Order::createOrder();
    	Cart::destroy();

    	return view('profile.thank_you');
    }
}
