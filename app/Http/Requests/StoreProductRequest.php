<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'product_name' => "required|unique:products,product_name",
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'unit_price' => 'required',
            'shipping_type' => 'required',
            'product_status' => 'required',

        ];
    }
}
