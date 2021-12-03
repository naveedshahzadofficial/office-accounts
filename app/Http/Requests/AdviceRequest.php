<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdviceRequest extends FormRequest
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
            'advice_issued' => 'required|integer',
            'advice_pending_3_to_7' => 'required|integer',
            'advice_pending_more_than_7' => 'required|integer',
        ];
    }
}
