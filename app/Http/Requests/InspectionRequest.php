<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InspectionRequest extends FormRequest
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
            'inspection_internal_conducted' => 'required|integer',
            'inspection_verification_entries' => 'required|integer',
            'inspection_pending_3_to_7' => 'required|integer',
            'inspection_pending_more_than_7' => 'required|integer',
            'inspection_miscellaneous_disposed_off' => 'required|integer',
            'inspection_status' => 'required',
        ];
    }
}
