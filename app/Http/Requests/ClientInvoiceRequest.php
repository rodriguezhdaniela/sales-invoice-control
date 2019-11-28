<?php

namespace App\Http\Requests;

use App\client;
use Illuminate\Foundation\Http\FormRequest;

class ClientInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Client $client)
    {
        return [
            'type_id' => 'required',
            'personal_id' => 'required|min:8',
            'name' => 'required|string|max:50',
            'address' => 'required',
            'phone_number' => 'required|min:7|numeric',
            'e_mail' => 'required|email|unique:clients,e_mail,'.$client->id,
        ];
    }
}
