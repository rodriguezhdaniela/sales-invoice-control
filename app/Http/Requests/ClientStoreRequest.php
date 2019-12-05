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
            'address' => 'required',
            'phone_number' => 'required|min:7|numeric',
            'e_mail' => 'required|email|unique:clients,e_mail,',
        ];
    }
}
