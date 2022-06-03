<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateColorRequest extends FormRequest
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
            'color_name' => "required|unique:colors,color_name,{$this->color->id},id",
            'hex_code' => "nullable",
            'rgb_code' => "nullable",
            'color_status' => 'required',
        ];
    }
}
