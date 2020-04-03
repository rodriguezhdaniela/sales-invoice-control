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

Route::resource('products', 'Api\Admin\ProductController')->except(['edit', 'create'])
        ->middleware('auth:api');

Route::resource('clients', 'Api\Admin\ClientController')->except(['edit', 'create'])
    ->middleware('auth:api');

Route::resource('sellers', 'Api\Admin\SellerController')->except(['edit', 'create'])
    ->middleware('auth:api');

Route::resource('invoices', 'Api\Admin\InvoiceController')->except(['edit', 'create'])
    ->middleware('auth:api');

Route::resource('details', 'Api\Admin\DetailController')->except(['edit', 'create', 'index', 'show'])
    ->middleware('auth:api');

Route::resource('invoices.details', 'Api\Admin\DetailController')->only(['index', 'store', 'delete'])
    ->middleware('auth:api');

Route::delete('/invoices/{invoice}/details/{product}', 'Api\Admin\DetailController@destroy');

Route::put('/invoices/{invoice}/details/{product}', 'Api\Admin\DetailController@update');

Route::group(['prefix' => 'auth'], function ()
{
    Route::post('login', 'Api\Admin\AuthController@login');
    Route::post('signup', 'Api\Admin\AuthController@signup');

    Route::group(['middleware' => 'auth:api'], function (){
        Route::get('logout', 'Api\Admin\AuthController@logout');
        Route::get('user', 'Api\Admin\AuthController@user');

    });
});
