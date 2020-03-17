<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Routes

Route::middleware(['auth'])->group(function() {

    //Roles

   Route::post('roles/store', 'RoleController@store')->name('roles.store')
    ->middleware('permission:roles.create');

    Route::get('roles', 'RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');

    Route::get('roles/create', 'RoleController@create')->name('roles.create')
        ->middleware('permission:roles.create');

    Route::patch('roles/{role}', 'RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');

    Route::get('roles/{role}/show', 'RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('permission:roles.edit');

    //Users

    Route::get('users', 'UserController@index')->name('users.index')
        ->middleware('permission:users.index');

    Route::patch('users/{user}', 'UserController@update')->name('users.update')
        ->middleware('permission:users.edit');

    Route::get('users/{user}', 'UserController@show')->name('users.show')
        ->middleware('permission:users.show');

    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
        ->middleware('permission:users.destroy');

    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
        ->middleware('permission:users.edit');

    //Clients

    Route::post('clients/store', 'ClientController@store')->name('clients.store')
        ->middleware('permission:clients.create');

    Route::get('clients', 'ClientController@index')->name('clients.index')
        ->middleware('permission:clients.index');

    Route::get('clients/create', 'ClientController@create')->name('clients.create')
        ->middleware('permission:clients.create');

    Route::patch('clients/{clients}', 'ClientController@update')->name('clients.update')
        ->middleware('permission:clients.edit');

    Route::get('clients/{clients}/edit', 'ClientController@edit')->name('clients.edit')
        ->middleware('permission:clients.edit');

    Route::get('clients/{clients}/show', 'ClientController@show')->name('clients.show')
        ->middleware('permission:clients.show');

    Route::delete('clients/{clients}', 'ClientController@destroy')->name('clients.destroy')
        ->middleware('permission:clients.destroy');


    //Sellers

    Route::post('sellers/store', 'SellerController@store')->name('sellers.store')
        ->middleware('permission:sellers.create');

    Route::get('sellers', 'SellerController@index')->name('sellers.index')
        ->middleware('permission:sellers.index');

    Route::get('sellers/create', 'SellerController@create')->name('sellers.create')
        ->middleware('permission:sellers.create');

    Route::patch('sellers/{seller}', 'SellerController@update')->name('sellers.update')
        ->middleware('permission:sellers.edit');

    Route::get('sellers/{seller}/edit', 'SellerController@edit')->name('sellers.edit')
        ->middleware('permission:sellers.edit');

    Route::delete('sellers/{seller}', 'SellerController@destroy')->name('sellers.destroy')
        ->middleware('permission:sellers.destroy');

    //Products

    Route::post('products/store', 'ProductController@store')->name('products.store')
        ->middleware('permission:products.create');

    Route::get('products', 'ProductController@index')->name('products.index')
        ->middleware('permission:products.index');

    Route::get('products/create', 'ProductController@create')->name('products.create')
        ->middleware('permission:products.create');

    Route::patch('products/{product}', 'ProductController@update')->name('products.update')
        ->middleware('permission:products.edit');

    Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')
        ->middleware('permission:products.edit');

    Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')
        ->middleware('permission:products.destroy');

    //Invoices

    Route::post('invoices/store', 'InvoiceController@store')->name('invoices.store')
        ->middleware('permission:invoices.create');

    Route::get('invoices', 'InvoiceController@index')->name('invoices.index')
        ->middleware('permission:invoices.index');

    Route::get('invoices/create', 'InvoiceController@create')->name('invoices.create')
        ->middleware('permission:invoices.create');

    Route::patch('invoices/{invoice}', 'InvoiceController@update')->name('invoices.update')
        ->middleware('permission:invoices.edit');

    Route::get('invoices/{invoice}/edit', 'InvoiceController@edit')->name('invoices.edit')
        ->middleware('permission:invoices.edit');

    Route::get('invoices/{invoice}/show', 'InvoiceController@show')->name('invoices.show')
        ->middleware('permission:invoices.show');

    Route::delete('invoices/{invoice}', 'InvoiceController@destroy')->name('invoices.destroy')
        ->middleware('permission:invoices.destroy');

    //Detail of invoice

    Route::post('/invoices/{invoice}/details', 'DetailController@store')->name('details.store')
        ->middleware('permission:details.create');

    Route::get('/invoices/{invoice}/details/create', 'DetailController@create')->name('details.create')
        ->middleware('permission:details.create');

    Route::delete('/invoices/{invoice}/details/{detail}', 'DetailController@destroy')->name('details.destroy')
        ->middleware('permission:details.destroy');

    Route::post('/invoices/{invoice}/details/payment', 'PaymentAttemptController@paymentAttempt')->name('payment')
        ->middleware('permission:payment');

    Route::get('/invoices/{invoice}/details/callback', 'PaymentAttemptController@callBack')->name('payment.callback')
        ->middleware('permission:payment.callback');

    //Import

    Route::get('/import/view', 'InvoiceController@importView')->name('import.view')
        ->middleware('permission:import.view');

    Route::post('invoices/import', 'InvoiceController@importExcel')->name('invoices.import.excel')
        ->middleware('permission:invoices.import.excel');

    //Export

    Route::get('invoices/export', 'InvoiceController@export')->name('invoices.excel')
        ->middleware('permission:invoices.excel');

    Route::get('invoices/csv', 'InvoiceController@exportCSV')->name('csv')
    ->middleware('permission:csv');

    Route::get('invoices/tsv', 'InvoiceController@exportTSV')->name('tsv')
    ->middleware('permission:tsv');

    Route::get('invoices/excel', 'InvoiceController@exportExcel')->name('excel')
    ->middleware('permission:excel');
});






