<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Trường này không được bỏ trống',
            'password.required' => 'Trường này không được bỏ trống',
            'password.min'  => 'Password must be at least 6 characters!',
        ];
    }
}
