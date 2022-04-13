<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:255|unique:users,name',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6|string',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'Please enter the name!',
            'name.max' => 'Name should not exceed 30 characters',
            'name.unique' => 'Name already exists',
            'email.required'  => 'Please enter the email!',
            'email.max' => 'Email should not exceed 255 characters',
            'email.unique' => 'Email already exists',
            'email.email' => 'Please enter correct email format',
            'password.min'  => 'Password must be at least 6 characters!',
            'password.required'  => 'Please enter the password!',
            'confirm_password.same'  => 'Confirm password does not match password!',
            'password.string'  => 'The password must not contain any spaces',
            'confirm_password.required'  => 'Please enter the confirmPassword!',
        ];
    }
}
