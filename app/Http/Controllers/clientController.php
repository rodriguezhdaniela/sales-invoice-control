<?php

namespace App\Http\Controllers;

use App\client;
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
    public function store(Request $request, client $client)
    {
        $validDate = $request->validate([
            'type_id' => 'required|in:Card ID, Foreign ID, Passport, Other',
            'personal_id' => 'required',
            'name' => 'required|string|max:20',
            'last_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required|min:7|numeric',
            'e_mail' => 'required|e_mail|unique:clients,e_mail,'.$client->id,
        ]);

        $client = new client();
        $client->type_id = $validDate['type_id'];
        $client->personal_id = $validDate['personal_id'];
        $client->name = $validDate['name'];
        $client->last_name = $validDate['last_name'];
        $client->address = $validDate['address'];
        $client->phone_number = $validDate['phone_number'];
        $client->e_mail = $validDate['e_mail'];
        $client->save();

        return redirect('/clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        return view('clients.show', [
            'client' => $client
        ]);
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
    public function update(Request $request, Client $client)
    {
        $client->update($request->all());

        return redirect('/clients');
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

        return redirect('/clients');
    }

    public function confirmDelete($id) {
        $client = client::find($id);
        return view('clients.confirmDelete', [
            'client' => $client
        ]);
    }
}
