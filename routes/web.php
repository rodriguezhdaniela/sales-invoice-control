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
Route::get('/', function () {
    return view('welcome');
});

Route::resource('/clients','clientController');

Route::get('/clients/{id}/confirmDelete', 'clientController@confirmDelete');

Route::resource('/sellers','sellerController');

Route::get('/sellers/{id}/confirmDelete', 'sellerController@confirmDelete');

Route::resource('/products','productController');

Route::get('/products/{id}/confirmDelete', 'productController@confirmDelete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/sales_invoices','saleInvoiceController');

Route::get('/sales_invoices/{id}/confirmDelete', 'saleInvoiceController@confirmDelete');
