<?php


namespace App\Http\Controllers\Api\Admin;


use App\Actions\StoreClientAction;
use App\Actions\UpdateClientAction;
use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;


class ClientController extends Controller
{
    public function index()
    {
        return Client::all();
    }

    public function store(ClientStoreRequest $request, Client $client, StoreClientAction $action)
    {
        return $action->execute($client, $request);
    }


    public function update(ClientUpdateRequest $request, Client $client, UpdateClientAction $action)
    {
        return $action->execute($client, $request);
    }

    public function show(Client $client)
    {
        return $client;
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return response()->json(__('The Client was successfully deleted'));
    }
}
