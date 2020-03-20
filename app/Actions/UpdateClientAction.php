<?php


namespace App\Actions;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UpdateClientAction extends Action
{
    public function storeModel(Model $client, Request $request): Model
    {
        $client->type_id = $request->input('type_id');
        $client->personal_id = $request->input('personal_id');
        $client->name = $request->input('name');
        $client->last_name = $request->input('last_name');
        $client->address = $request->input('address');
        $client->phone_number = $request->input('phone_number');
        $client->email = $request->input('email');
        $client->country_id = $request->input('country_id');
        $client->state_id = $request->input('state_id');
        $client->city_id = $request->input('city_id');
        $client->postal_code = $request->input('postal_code');

        $client->save();

        return $client;
    }
}
