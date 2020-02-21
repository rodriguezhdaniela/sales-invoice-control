<?php

namespace App\Http\Controllers;

use App\Client;
use App\Country;
use App\State;
use App\City;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
use Illuminate\Http\RedirectResponse;
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

        $clients = Client::name($name)
            ->personal_id($personal_id)
            ->paginate(10);

        return response()->view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return response()->view('clients.create', [
            'client' => new Client,
            'countries' => Country::all(),
            'states' => State::all(),
            'cities' => City::all(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ClientStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ClientStoreRequest $request)
    {

        Client::create($request->validated());

        return redirect()->route('clients.index')->withSuccess(__('Client created successfully'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param client $client
     * @return Response
     */
    public function edit(Client $client)
    {

        return response()->view('clients.edit', [
            'client' => $client,
            'countries' => Country::all(),
            'states' => State::all(),
            'cities' => City::all(),
        ]);

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
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->withSuccess(__('Client deleted sucessfully'));
    }



}
