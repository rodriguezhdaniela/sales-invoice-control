<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceStoreRequest extends FormRequest
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
            //'expedition_date' => 'required|date',
            //'invoice_date' => 'required|date',
            //'expiration_date' => 'required|after:invoice_date',
            //'state' => 'required',
            //'client_id' => 'required',
            //'seller_id' => 'required',
        ];
    }
}
