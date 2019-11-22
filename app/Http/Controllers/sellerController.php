<?php

namespace App\Http\Controllers;

use App\seller;
use Illuminate\Http\Request;

class sellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
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
    public function store(Request $request)
    {
        $seller = new seller();
        $seller->type_id = $request->get('type_id');
        $seller->personal_id = $request->get('personal_id');
        $seller->name = $request->get('name');
        $seller->last_name = $request->get('last_name');
        $seller->address = $request->get('address');
        $seller->phone_number = $request->get('phone_number');
        $seller->e_mail = $request->get('e_mail');
        $seller->save();

        return redirect('/sellers');
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
        $seller = seller::find($id);
        return view('sellers.edit', [
            'seller' => $seller
        ]);
    }

    //public function edit(seller $seller)
    //    {
    //        return view('sellers.edit', [
    //            'seller' => $seller
    //        ]);
    //    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $seller = seller::find($id);
        $seller->type_id = $request->get('type_id');
        $seller->personal_id = $request->get('personal_id');
        $seller->name = $request->get('name');
        $seller->last_name = $request->get('last_name');
        $seller->address = $request->get('address');
        $seller->phone_number = $request->get('phone_number');
        $seller->e_mail = $request->get('e_mail');
        $seller->save();

        return redirect('/sellers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
