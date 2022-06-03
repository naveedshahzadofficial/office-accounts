<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required',
            'username' => "required|unique:users,username,{$this->user->id},id",
            'email' => "required|unique:users,email,{$this->user->id},id",
            'phone_number' => "required|unique:users,phone_number,{$this->user->id},id",
            'password' => 'sometimes|nullable',
            'role_id' => 'required',
            'hire_date' => 'required_if:role_id,4',
            'commission' => 'required_if:role_id,4',
            'salary' => 'required_if:role_id,4',
            'user_status' => 'required',
        ];
    }
}
