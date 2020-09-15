<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
	// front end location
// Route::get('/', function () {
//     return view('frontend.home');
// });


Route::get('/shop', 'HomeController@shop')->name('shop');
Route::get('/category/{id}', 'HomeController@category_product');
Route::get('/contact',function(){
	return view('frontend.contact');
});
Route::get('productDetails/{id}','HomeController@productDetails');
Route::get('/profile','ProfileController@index');
Route::get('/orders','ProfileController@orders');

//cart

Route::get('/cart','CartController@index');
Route::get('/cart/add-item/{id}','CartController@addItem');
Route::PUT('cart/update/{id}','CartController@update');
Route::get('/cart/remove/{id}','CartController@destroy');
Route::get('/checkout','CheckoutController@index');


// admin location
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
	Route::get('/', function () {
    return view('admin.index');
    });

    Route::resource('/products','ProductController');
    Route::resource('/category','CategoryController');
    // for address you have to must login for here 
    Route::post('/formvalidate','CheckoutController@address');

});