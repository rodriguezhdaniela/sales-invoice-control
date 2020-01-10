<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerStoreRequest;
use App\Http\Requests\SellerUpdateRequest;
use App\Seller;
use Illuminate\Http\Response;


class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $sellers = Seller::all();

        return view('sellers.index', compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $seller = new Seller;
        return view('sellers.create', compact('seller'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SellerStoreRequest $request
     * @return Response
     */

    public function store(SellerStoreRequest $request)
    {
        Seller::create($request->validated());

        return redirect()->route('sellers.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */


    public function edit(Seller $seller)
    {

        return view('sellers.edit', compact('seller'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param SellerUpdateRequest $request
     * @param seller $seller
     * @return Response
     */
    public function update(SellerUpdateRequest $request, Seller $seller)
    {
        $seller->update($request->validated());

        return redirect()->route('sellers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param seller $seller
     * @return Response
     * @throws \Exception
     */
    public function destroy(Seller $seller)
    {

        $seller->delete();

        return redirect()->route('sellers.index');
    }


}
