<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\StoreRequest;
use App\Http\Requests\Products\UpdateRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $name = $request->get('name');
        $description = $request->get('description');

        $products = Product::name($name)
            ->description($description)
            ->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $product = new product;

        return view('products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('products.index')->withSuccess(__('Product created sucessfully'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Product $product
     * @return Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('products.index')->withSuccess(__('Product updated sucessfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->withSuccess(__('Product deleted sucessfully'));
    }
}
