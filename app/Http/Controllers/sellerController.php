<?php

namespace App\Http\Controllers;

use App\seller;
use App\Http\Requests\SellerinvoiceRequest;
use Illuminate\Http\Request;

class sellerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = seller::all();
        return view('sellers.index', compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sellers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(SellerinvoiceRequest $request)
    {
        seller::create($request->validated());

        return redirect()->action('sellerController@index');

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
        $seller = seller::findOrFail($id);
        return view('sellers.edit', [
            'seller' => $seller
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SellerinvoiceRequest $request, seller $seller)
    {
        $seller->update($request->validated());

        return redirect()->action('sellerController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seller = seller::find($id);
        $seller->delete();

        return redirect()->action('sellerController@index');
    }

    public function confirmDelete($id)
    {
        $seller = seller::find($id);
        return view('sellers.confirmDelete', [
            'seller' => $seller
        ]);
    }


}
