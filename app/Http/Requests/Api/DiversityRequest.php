<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class DiversityRequest extends FormRequest
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

    public function getContactName()
    {
        return $this->get('contactName');
    }

    public function getContactEmail()
    {
        return $this->get('contactEmail');
    }

    public function getContactCompany()
    {
        return $this->get('contactCompany');
    }

    public function getContactTwitter()
    {
        return $this->get('contactTwitter');
    }

    public function getTicketAmount()
    {
        return $this->get('ticketAmount');
    }

    public function getContactReason()
    {
        return $this->get('contactReason');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'contactName' => 'required|string',
            'contactEmail' => 'required|email',
            'contactCompany' => 'required|string',
            'contactTwitter' => 'required|string',
            'ticketAmount' => 'required|integer',
            'contactReason' => 'required|string',
        ];
    }
}
