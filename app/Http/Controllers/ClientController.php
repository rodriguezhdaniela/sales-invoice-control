<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
use Illuminate\Http\Response;


class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $clients = client::all();

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $client = new client;

        return view('clients.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientStoreRequest $request
     * @return Response
     */
    public function store(ClientStoreRequest $request)
    {

        client::create($request->validated());

        return redirect()->route('clients.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param client $client
     * @return Response
     */
    public function edit(client $client)
    {

        return view('clients.edit', compact('client'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientStoreRequest $request
     * @param client $client
     * @return Response
     */
    public function update(ClientUpdateRequest $request, Client $client)
    {
        $client->update($request->validated());

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param client $client
     * @return Response
     * @throws \Exception
     */
    public function destroy(client $client)
    {
        $client->delete();

        return redirect()->route('clients.index');
    }


}
