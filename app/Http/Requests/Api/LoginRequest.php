<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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

    public function getEmail()
    {
        return $this->get('email');
    }

    public function getPassword()
    {
        return $this->get('password');
    }

    public function getRememberMe()
    {
        return $this->get('rememberMe');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string',
            'rememberMe' => 'required|'
        ];
    }
}
