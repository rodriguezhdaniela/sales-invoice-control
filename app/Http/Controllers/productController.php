<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->product_id = $request->input('product_id');
        $product->name = $request->input('name');
        $product->description = $request->input('description');

       $product->save();

        return redirect()->route('products.index')->withSuccess(__('Product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::find($id);
        return view('products.edit', compact('product'));





        //public function edit($id)
        //{
        //$product = product::findOrFail($id);
        //return view('products.edit', [
            //'product' => $product
        //]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $product->product_id = $request->input('product_id');
        $product->name = $request->input('name');
        $product->description = $request->input('description');

        $product->save();

        return redirect()->route('products.index')->withSuccess(__('Product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();

        return redirect()->action('productController@index');
    }

    public function confirmDelete($id)
    {
        $product = product::find($id);
        return view('products.confirmDelete', [
            'product' => $product
        ]);
    }
}
