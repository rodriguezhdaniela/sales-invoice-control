<?php


namespace App\Actions;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UpdateProductAction extends Action
{
    public function storeModel(Model $product, Request $request): Model
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        $product->save();

        return $product;
    }
}
