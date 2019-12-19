<?php
Route::get('/', function () {
    return view('welcome');
});

Route::resource('/clients','ClientController');

Route::resource('/sellers','SellerController');

Route::resource('/products','ProductController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/invoices','InvoiceController');

Route::resource('/invoices/{invoice}/details', 'DetailController');

