<?php

namespace App\Http\Requests;

use App\seller;
use Illuminate\Foundation\Http\FormRequest;

class ProductInvoiceRequest extends FormRequest
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
            'product_id' => 'required',
            'name' => 'required|string|max:50',
            'description' => 'required| max:225',
            'unit_price' => 'required|numeric|min:50|max:9999999999',

        ];
    }
}
