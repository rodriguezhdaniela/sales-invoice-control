<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $name = $request->get('name');
        $personal_id = $request->get('personal_id');

        $clients = client::name($name)
            ->personal_id($personal_id)
            ->paginate(10);

        return response()->view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
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
     * @return RedirectResponse
     */
    public function store(ClientStoreRequest $request)
    {

        client::create($request->validated());

        return redirect()->route('clients.index')->withSuccess(__('Client created successfully'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param client $client
     * @return Factory|View
     */
    public function edit(client $client)
    {

        return view('clients.edit', compact('client'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientUpdateRequest $request
     * @param client $client
     * @return RedirectResponse
     */
    public function update(ClientUpdateRequest $request, Client $client)
    {
        $client->update($request->validated());

        return redirect()->route('clients.index')->withSuccess(__('Client updated sucessfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param client $client
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->withSuccess(__('Client deleted sucessfully'));
    }


}
