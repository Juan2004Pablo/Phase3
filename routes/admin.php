<?php

Route::get('/admin', function () {
    return view('plantilla.admin');
})->name('admin');

Route::resource('admin/category', 'Admin\AdminCategoryController')
    ->names('admin.category')->middleware('auth');

Route::resource('admin/product', 'Admin\AdminProductController')->names('admin.product')
    ->middleware('auth');

Route::post('restoreproduct/{id}', ['as' => 'admin.product.restore', 'uses' => 'Admin\AdminProductController@restore']);

Route::post('restorecategory/{id}', ['as' => 'admin.category.restore', 'uses' => 'Admin\AdminCategoryController@restore']);

Route::resource('/product', 'ShowProductController')->names('product');

Route::resource('admin/order', 'Admin\AdminOrderController')->names('admin.order');

Route::get('order-detail', [
    'as' => 'order-detail',
    'uses' => 'Admin\AdminCartController@orderDetail',
]);
