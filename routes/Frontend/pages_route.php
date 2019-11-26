<?php
//frontend pages routes
Route::get('/', 'indexController@index')->name('home');
Route::get('/products', 'productsController@index')->name('products.show');
Route::get('/products/{product}', 'productsController@show')->name('product.show');

//routes for adding item to cart
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}','CartController@destroy')->name('cart.destroy');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');

//routes for ordering product
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/thankyou', 'CheckoutController@thankyou')->name('thanks');

//routes for authentication
Auth::routes();

Route::get('/', 'indexController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
