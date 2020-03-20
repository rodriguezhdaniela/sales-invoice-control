<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Routes

Route::middleware(['auth'])->group(function() {

    //Roles

   Route::post('roles/store', 'Admin\RoleController@store')->name('roles.store')
    ->middleware('permission:roles.create');

    Route::get('roles', 'Admin\RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');

    Route::get('roles/create', 'Admin\RoleController@create')->name('roles.create')
        ->middleware('permission:roles.create');

    Route::patch('roles/{role}', 'Admin\RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');

    Route::get('roles/{role}/show', 'Admin\RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');

    Route::delete('roles/{role}', 'Admin\RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');

    Route::get('roles/{role}/edit', 'Admin\RoleController@edit')->name('roles.edit')
        ->middleware('permission:roles.edit');

    //Users

    Route::get('users', 'Admin\UserController@index')->name('users.index')
        ->middleware('permission:users.index');

    Route::patch('users/{user}', 'Admin\UserController@update')->name('users.update')
        ->middleware('permission:users.edit');

    Route::get('users/{user}', 'Admin\UserController@show')->name('users.show')
        ->middleware('permission:users.show');

    Route::delete('users/{user}', 'Admin\UserController@destroy')->name('users.destroy')
        ->middleware('permission:users.destroy');

    Route::get('users/{user}/edit', 'Admin\UserController@edit')->name('users.edit')
        ->middleware('permission:users.edit');

    //Clients

    Route::post('clients/store', 'Admin\ClientController@store')->name('clients.store')
        ->middleware('permission:clients.create');

    Route::get('clients', 'Admin\ClientController@index')->name('clients.index')
        ->middleware('permission:clients.index');

    Route::get('clients/create', 'Admin\ClientController@create')->name('clients.create')
        ->middleware('permission:clients.create');

    Route::patch('clients/{client}', 'Admin\ClientController@update')->name('clients.update')
        ->middleware('permission:clients.edit');

    Route::get('clients/{client}/edit', 'Admin\ClientController@edit')->name('clients.edit')
        ->middleware('permission:clients.edit');

    Route::get('clients/{client}/show', 'Admin\ClientController@show')->name('clients.show')
        ->middleware('permission:clients.show');

    Route::delete('clients/{client}', 'Admin\ClientController@destroy')->name('clients.destroy')
        ->middleware('permission:clients.destroy');


    //Sellers

    Route::post('sellers/store', 'Admin\SellerController@store')->name('sellers.store')
        ->middleware('permission:sellers.create');

    Route::get('sellers', 'Admin\SellerController@index')->name('sellers.index')
        ->middleware('permission:sellers.index');

    Route::get('sellers/create', 'Admin\SellerController@create')->name('sellers.create')
        ->middleware('permission:sellers.create');

    Route::patch('sellers/{seller}', 'Admin\SellerController@update')->name('sellers.update')
        ->middleware('permission:sellers.edit');

    Route::get('sellers/{seller}/edit', 'Admin\SellerController@edit')->name('sellers.edit')
        ->middleware('permission:sellers.edit');

    Route::delete('sellers/{seller}', 'Admin\SellerController@destroy')->name('sellers.destroy')
        ->middleware('permission:sellers.destroy');

    //Products

    Route::post('products/store', 'Admin\ProductController@store')->name('products.store')
        ->middleware('permission:products.create');

    Route::get('products', 'Admin\ProductController@index')->name('products.index')
        ->middleware('permission:products.index');

    Route::get('products/create', 'Admin\ProductController@create')->name('products.create')
        ->middleware('permission:products.create');

    Route::patch('products/{product}', 'Admin\ProductController@update')->name('products.update')
        ->middleware('permission:products.edit');

    Route::get('products/{product}/edit', 'Admin\ProductController@edit')->name('products.edit')
        ->middleware('permission:products.edit');

    Route::delete('products/{product}', 'Admin\ProductController@destroy')->name('products.destroy')
        ->middleware('permission:products.destroy');

    //Invoices

    Route::post('invoices/store', 'Admin\InvoiceController@store')->name('invoices.store')
        ->middleware('permission:invoices.create');

    Route::get('invoices', 'Admin\InvoiceController@index')->name('invoices.index')
        ->middleware('permission:invoices.index');

    Route::get('invoices/create', 'Admin\InvoiceController@create')->name('invoices.create')
        ->middleware('permission:invoices.create');

    Route::patch('invoices/{invoice}', 'Admin\InvoiceController@update')->name('invoices.update')
        ->middleware('permission:invoices.edit');

    Route::get('invoices/{invoice}/edit', 'Admin\InvoiceController@edit')->name('invoices.edit')
        ->middleware('permission:invoices.edit');

    Route::get('invoices/{invoice}/show', 'Admin\InvoiceController@show')->name('invoices.show')
        ->middleware('permission:invoices.show');

    Route::delete('invoices/{invoice}', 'Admin\InvoiceController@destroy')->name('invoices.destroy')
        ->middleware('permission:invoices.destroy');

    //Detail of invoice

    Route::post('/invoices/{invoice}/details', 'Admin\DetailController@store')->name('details.store')
        ->middleware('permission:details.create');

    Route::get('/invoices/{invoice}/details/create', 'Admin\DetailController@create')->name('details.create')
        ->middleware('permission:details.create');

    Route::delete('/invoices/{invoice}/details/{detail}', 'Admin\DetailController@destroy')->name('details.destroy')
        ->middleware('permission:details.destroy');

    Route::post('/invoices/{invoice}/details/payment', 'Admin\PaymentAttemptController@paymentAttempt')->name('payment')
        ->middleware('permission:payment');

    Route::get('/invoices/{invoice}/details/callback', 'Admin\PaymentAttemptController@callBack')->name('payment.callback')
        ->middleware('permission:payment.callback');

    //Import

    Route::get('/import/view', 'Admin\InvoiceController@importView')->name('import.view')
        ->middleware('permission:import.view');

    Route::post('invoices/import', 'Admin\InvoiceController@importExcel')->name('invoices.import.excel')
        ->middleware('permission:invoices.import.excel');

    //Export

    Route::get('invoices/export', 'Admin\InvoiceController@export')->name('invoices.excel')
        ->middleware('permission:invoices.excel');

    Route::get('invoices/csv', 'Admin\InvoiceController@exportCSV')->name('csv')
    ->middleware('permission:csv');

    Route::get('invoices/tsv', 'Admin\InvoiceController@exportTSV')->name('tsv')
    ->middleware('permission:tsv');

    Route::get('invoices/excel', 'Admin\InvoiceController@exportExcel')->name('excel')
    ->middleware('permission:excel');
});






