<?php


namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UpdateSellerAction extends Action
{
    public function storeModel(Model $seller, Request $request): Model
    {
        $seller->type_id = $request->input('type_id');
        $seller->personal_id = $request->input('personal_id');
        $seller->name = $request->input('name');
        $seller->last_name = $request->input('last_name');
        $seller->address = $request->input('address');
        $seller->phone_number = $request->input('phone_number');
        $seller->email = $request->input('email');

        $seller->save();

        return $seller;
    }
}
