<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleInvoiceRequest extends FormRequest
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
            'invoice_number' => 'required',
            'invoice_data' => 'required|date',
            'expiration_date' => 'required|after:invoice_date',
            'invoice_state' => 'required',
            'client' => 'required',
            'seller' => 'required',
            'product_name' => 'required',
            'product_description' => 'required',
            'quantity' => 'required|numeric|between:1,999',

        ];
    }
}
