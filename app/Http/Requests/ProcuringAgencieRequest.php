<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcuringAgencieRequest extends FormRequest
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
            'agency_procuring_registered' => 'required|integer',
            'public_sector_organization_59e_registered' => 'required|integer',
            'suppliers_registered' => 'required|integer',
            'psmu_registered' => 'required|integer',
        ];
    }
}
