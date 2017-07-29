<?php

Route::resource('invoices', 'InvoiceController');
Route::get('/customer', 'CustomerController@index');
Route::get('/api/customer', 'CustomerController@getData');
Route::get('/', 'HomeController@index');
Route::resource('products', 'ProductsController');
Auth::routes();
