<?php


namespace App\Http\Controllers\Api\Admin;


use App\Actions\StoreProductAction;
use App\Actions\UpdateProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreRequest;
use App\Http\Requests\Products\UpdateRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(StoreRequest $request, Product $product, StoreProductAction $action)
    {
        return $action->execute($product, $request);
    }

    public function update(UpdateRequest $request, Product $product, UpdateProductAction $action)
    {
        return $action->execute($product, $request);
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return __('The Product was successfully deleted');
    }
}
