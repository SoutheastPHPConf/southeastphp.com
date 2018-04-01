<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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

    public function getFirstName()
    {
        return $this->get('firstName');
    }

    public function getLastName()
    {
        return $this->get('lastName');
    }

    public function getEmail()
    {
        return $this->get('email');
    }

    public function getMessage()
    {
        return $this->get('message');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => 'required|string',
            'lastName'  => 'required|string',
            'email'     => 'required|email',
            'message'   => 'required|string',
        ];
    }
}
