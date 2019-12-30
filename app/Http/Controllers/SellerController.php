<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerStoreRequest;
use App\Http\Requests\SellerUpdateRequest;
<<<<<<< HEAD
use App\Seller;
=======
use App\seller;
>>>>>>> 28363c4c22a2c3ec9f43d2f0f9d0d62572744232
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
<<<<<<< HEAD
     * @return Response
=======
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
>>>>>>> 28363c4c22a2c3ec9f43d2f0f9d0d62572744232
     */
    public function index(Request $request)
    {
        $name = $request->get('name');
        $personal_id = $request->get('personal_id');

        $sellers = seller::name($name)
            ->personal_id($personal_id)
            ->paginate(10);

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

        return redirect()->route('sellers.index')->withSuccess(__('Seller created successfully'));

    }


    /**
     * Display the specified resource.
     *
     * @param Seller $seller
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

        return redirect()->route('sellers.index')->withSuccess(__('Seller updated successfully'));
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

        return redirect()->route('sellers.index')->withSuccess(__('Seller deleted successfully'));
    }


}
