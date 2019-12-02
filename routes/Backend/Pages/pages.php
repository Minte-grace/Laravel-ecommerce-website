<?php

Route::prefix('admin')->group(function() {
Route::get('/admin-add-user', 'AdminAddUserController@index')->name('add-user');
Route::post('/admin-add-user', 'AdminAddUserController@register')->name('admin-add-user');

Route::get('/add-product','AddProductController@index')->name('add.product');
Route::post('/add-product','AddProductController@store')->name('store.product');

//route for adding categories
Route::get('/add-category','AddCategoryController@index')->name('add.category');
Route::post('/add-category','AddCategoryController@store')->name('store.category');


Route::get('/order-details/{id}','OrdersController@show')->name('order.details');
//route for deleting categories

Route::get('/admin/{id}','OrdersController@destroy')->name('order.delete');
Route::get('/add-category/{id}','AddCategoryController@destroy')->name('category.delete');

Route::get('/products-details/{id}','AddProductController@show')->name('product.details');
Route::get('/admin/products-details/{id}','AddProductController@destroy')->name('product.delete');

//route for product updates
Route::get('/product-update/{id}', 'AddProductController@edit')->name('product.edit');
Route::put('/Backend/Pages/product_update/{id}', 'AddProductController@update')->name('product.update');

//route for user profile updates and deletes
Route::get('/update-user/{id}', 'AdminAddUserController@edit')->name('user.edit');
Route::put('/{id}', 'AdminAddUserController@update')->name('user.update');
Route::get('/admin/update-user/{id}','AdminAddUserController@destroy')->name('user.delete');

//routes for order and category paths
Route::get('/categories', 'AdminController@categoryTable')->name('admin.category');
Route::get('/orders', 'AdminController@ordersTable')->name('admin.orders');
Route::get('/products', 'AdminController@productsTable')->name('admin.products');
Route::get('/users', 'AdminController@usersTable')->name('admin.users');
});

