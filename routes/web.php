<?php


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/clients','ClientController')->except('show');

Route::resource('/sellers','SellerController')->except('show');

Route::resource('/products','ProductController')->except('show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/import/view', 'InvoiceController@importView')->name('import.view');

Route::post('invoices/import', 'InvoiceController@importExcel')->name('invoices.import.excel');

Route::get('invoices/export', 'InvoiceController@exportExcel')->name('invoices.excel');

Route::get('invoices/csv', 'InvoiceController@exportCSV')->name('csv');

Route::get('invoices/txt', 'InvoiceController@exportTXT')->name('txt');

Route::get('invoices/excel', 'InvoiceController@export')->name('excel');

Route::resource('/invoices','InvoiceController');

Route::resource('/invoices/{invoice}/details', 'DetailController')->except('show', 'edit', 'update');

Route::get('/getStates', 'ClientController@getStates');

Route::get('/getCities', 'ClientController@getCities');

Route::post('/invoices/{invoice}/details/payment', 'PaymentAttemptController@paymentAttempt')->name('payment');

Route::get('/invoices/{invoice}/details/callback', 'PaymentAttemptController@callBack')->name('payment.callback');


