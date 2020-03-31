<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Auth::routes();

Route::resource('products', 'Api\Admin\ProductController')->except(['edit', 'create']);

Route::resource('clients', 'Api\Admin\ClientController')->except(['edit', 'create']);

Route::resource('sellers', 'Api\Admin\SellerController')->except(['edit', 'create']);

Route::resource('invoices', 'Api\Admin\InvoiceController')->except(['edit', 'create']);

Route::resource('details', 'Api\Admin\DetailController')->except(['edit', 'create', 'index', 'show']);

Route::resource('invoices.details', 'Api\Admin\DetailController')->only(['index', 'store']);
