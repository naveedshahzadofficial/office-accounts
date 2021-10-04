<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourtCaseRequest extends FormRequest
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
            'case_initiated' => 'required|integer',
            'case_disposed_off' => 'required|integer',
        ];
    }
}
