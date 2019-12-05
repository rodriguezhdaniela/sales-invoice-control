<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SellerUpdateRequest extends FormRequest
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
            'personal_id' => [
                'required',
                'min:8',
                Rule::unique('sellers', 'personal_id')->ignore($this->route('seller')),
            ],
            'name' => 'required|string|max:50',
            'address' => 'required',
            'phone_number' => 'required|min:7|numeric',
            'e_mail' => ['required',
                'email',
                Rule::unique('clients', 'e_mail')->ignore($this->route('seller')->id),
            ]
        ];
    }
}
