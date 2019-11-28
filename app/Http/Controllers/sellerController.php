<?php

namespace App\Http\Controllers;

use App\seller;
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
    public function store(seller $seller)
    {
        $valiDate = request()->validate([
            'type_id' => 'required',
            'personal_id' => 'required',
            'name' => 'required|string|max:20',
            'address' => 'required',
            'phone_number' => 'required|min:7|numeric',
            'e_mail' => 'required|email|unique:sellers,e_mail,'.$seller->id,
        ]);

        seller::create($valiDate);

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
    public function update(Request $request, seller $seller)
    {
        $seller->update($request->all());

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
