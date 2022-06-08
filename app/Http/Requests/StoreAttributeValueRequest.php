<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAttributeValueRequest extends FormRequest
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
            'value' => ['required', Rule::unique('attribute_values', 'value')->where('attribute_id', $this->attribute->id)],
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'value.unique' => 'This attribute value already exist.',
        ];
    }
}
