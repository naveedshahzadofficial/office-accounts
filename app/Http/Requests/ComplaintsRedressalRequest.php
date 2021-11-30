<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplaintsRedressalRequest extends FormRequest
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
            'complaint_disposed' => 'required|integer',
            'complaint_pending_more_than_7' => 'required|integer',
            'complaint_total_other_more_than_7' => 'required|integer',
            'complaint_pending_other_more_than_7' => 'required|integer',
        ];
    }
}
