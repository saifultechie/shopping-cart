<?php

namespace App;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $primaryKey = "id";
    protected $fillable = ["status","user_id","total"];

    public function ordersFields()
    {
    	return $this->belongsToMany(Product::class)->withPivot('qty','total');
    }

    public static function  createOrder()
    {
    	$user = Auth::user();
    	$order = $user->orders()->create(['total'=>Cart::total(),'status'=>'pending']);
    	$cartItems = Cart::content();
    	foreach($cartItems as $cartItem){
    		$order->ordersFields()->attach($cartItem->id,['qty'=>$cartItem->qty,'tax'=>(int)Cart::tax(),'total'=>$cartItem->qty*$cartItem->price]);
    	}
    }
}
