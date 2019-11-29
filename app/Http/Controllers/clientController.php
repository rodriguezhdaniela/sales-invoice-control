<?php

namespace App\Http\Controllers;

use App\client;
use App\Http\Requests\ClientInvoiceRequest;
use Illuminate\Http\Request;


class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientInvoiceRequest $request)
    {

        client::create($request->validated());

        return redirect()->action('clientController@index');
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
        $client = client::findOrFail($id);
        return view('clients.edit', [
            'client' => $client
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientInvoiceRequest $request, Client $client)
    {
        $client->update($request->validated());

        return redirect()->action('clientController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = client::find($id);
        $client->delete();

        return redirect()->action('clientController@index');
    }

    public function confirmDelete($id)
    {
        $client = client::find($id);

        return view('clients.confirmDelete', [
        'client' => $client
        ]);
    }
}
