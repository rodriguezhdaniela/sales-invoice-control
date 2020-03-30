<?php


namespace App\Http\Controllers\Api\Admin;

use App\Actions\StoreSellerAction;
use App\Actions\UpdateSellerAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\SellerStoreRequest;
use App\Http\Requests\SellerUpdateRequest;
use App\Seller;

class SellerController extends Controller
{
    public function index()
    {
        return Seller::all();
    }

    public function store(SellerStoreRequest $request, Seller $seller, StoreSellerAction $action)
    {
        return $action->execute($seller, $request);
    }

    public function update(SellerUpdateRequest $request, Seller $seller, UpdateSellerAction $action)
    {
        return $action->execute($seller, $request);
    }

    public function show(Seller $seller)
    {
        return $seller;
    }

    public function destroy(Seller $seller)
    {
        $seller->delete();

        return response()->json(__('The Seller was successfully deleted'));
    }
}
