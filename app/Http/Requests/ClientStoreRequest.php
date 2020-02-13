<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'type_id' => 'required',
            'personal_id' =>'required|unique:clients,personal_id|min:8',
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:clients,email',
            'address' => 'required',
            'phone_number' => 'required|min:7|numeric',
            'country_id' => 'required|numeric|exists:countries,id',
            'state_id' => 'required|numeric|exists:states,id',
            'city_id' => 'required|numeric|exists:cities,id',
            'postal_code' => 'required|numeric|digits:6',
        ];
    }
}
