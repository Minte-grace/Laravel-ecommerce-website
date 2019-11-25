<?php
//user side routes
Route::get('/', 'indexController@index')->name('home');
Route::get('/products', 'productsController@index')->name('products.show');
Route::get('/products/{product}', 'productsController@show')->name('product.show');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}','CartController@destroy')->name('cart.destroy');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/thankyou', 'CheckoutController@thankyou')->name('thanks');


Auth::routes();

Route::get('/', 'indexController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/my-orders', 'OrdersController@index')->name('orders.index');

//admin side routes

Route::prefix('admin')->group(function() {

//routes for admin guard authentication
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

//Admin Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

Route::get('/admin-add-user', 'AdminController@adduser')->name('add-user');
Route::post('/admin-add-user', 'AdminAddUserController@register')->name('admin-add-user');

Route::get('/add-product','AdminController@addproduct')->name('add.product');
Route::post('/add-product','AddProductController@store')->name('store.product');

//route for adding categories
Route::get('/add-category','AdminController@addcategory')->name('add.category');
Route::post('/add-category','AddCategoryController@addcategory')->name('store.category');


Route::get('/order-details/{id}','OrdersController@show')->name('order.details');
//route for deleting categories

Route::get('/admin/{id}','OrdersController@destroy')->name('order.delete');
Route::get('/add-category/{id}','AddCategoryController@destroy')->name('category.delete');

Route::get('/products-details/{id}','productsController@productdetail')->name('product.details');
Route::get('/admin/products-details/{id}','AddProductController@destroy')->name('product.delete');

//route for product updates
Route::get('/product-update/{id}', 'AdminController@edit')->name('product.edit');
Route::put('/{id}', 'AddProductController@update')->name('product.update');


Route::get('/categories', 'AdminController@categoryTable')->name('admin.category');
Route::get('/orders', 'AdminController@ordersTable')->name('admin.orders');
Route::get('/products', 'AdminController@productsTable')->name('admin.products');
Route::get('/users', 'AdminController@usersTable')->name('admin.users');
});


