<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerStoreRequest;
use App\Http\Requests\SellerUpdateRequest;
use App\seller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class sellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
        $seller = new seller;
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
        seller::create($request->validated());

        return redirect()->route('sellers.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */


    public function edit(seller $seller)
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
    public function update(SellerUpdateRequest $request, seller $seller)
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
    public function destroy(seller $seller)
    {

        $seller->delete();

        return redirect()->route('sellers.index');
    }


}
