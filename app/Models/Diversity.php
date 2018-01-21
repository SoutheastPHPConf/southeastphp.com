<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diversity extends Model
{
    protected $table = 'diversity_sponsors';

    public function setName(string $name)
    {
        $this->contact_name = $name;
    }

    public function setEmail(string $email)
    {
        $this->contact_email = $email;
    }

    public function setCompany(string $company)
    {
        $this->contact_company = $company;
    }

    public function setTwitter(string $twitter)
    {
        $this->contact_twitter = $twitter;
    }

    public function setTicketAmount(int $amount)
    {
        $this->ticket_amount = $amount;
    }

    public function setContactReason(string $reason)
    {
        $this->contact_reason = $reason;
    }
}
