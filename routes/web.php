<?php


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/clients','ClientController')->except('show');

Route::resource('/sellers','SellerController')->except('show');

Route::resource('/products','ProductController')->except('show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('invoices/export', 'InvoiceController@exportExcel')->name('invoices.excel');
Route::resource('/invoices','InvoiceController');
Route::get('invoices/{invoice}/pdf')->uses('InvoicesController@exportToPDF')->name('invoices.pdf');

Route::resource('/invoices/{invoice}/details', 'DetailController');

Route::get('/import', function () {
    return view('import');
})->name('import.view');


