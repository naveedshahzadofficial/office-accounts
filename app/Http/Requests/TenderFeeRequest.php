<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenderFeeRequest extends FormRequest
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
            'fee_document_examined' => 'required|integer',
            'fee_violations_identified' => 'required|integer',
            'fee_verification_deposit' => 'required|integer',
            'fee_status' => 'required',
        ];
    }
}
