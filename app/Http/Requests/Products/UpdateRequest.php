<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'product_id' => [
                'required',
                Rule::unique('products', 'product_id')->ignore($this->route('product')),
            ],
            'name' => [
                'required',
                'max:50',
                Rule::unique('products', 'name')->ignore($this->route('product')),
            ],
            'description' => 'required|max:225',
            'unit_price' => 'required|numeric|min:50|max:9999999999',
        ];
    }
}
