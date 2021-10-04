<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViolationExaminationRequest extends FormRequest
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
            'violation_website' => 'required|integer',
            'violation_newspaper' => 'required|integer',
            'violation_identified' => 'required|integer',
            'violation_removed' => 'required|integer',
            'violation_pending' => 'required|integer',
            'violation_file' => 'nullable|mimes:xlsx,xls|max:5120',
        ];
    }
}
