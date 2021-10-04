<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlacklistingRequest extends FormRequest
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
            'blacklist_order' => 'required|integer',
            'blacklisting_case_disposed_off' => 'required|integer',
            'blacklisting_pending_15_to_30' => 'required|integer',
            'blacklisting_pending_more_than_30' => 'required|integer',
            'blacklisting_status' => 'required',
        ];
    }
}
