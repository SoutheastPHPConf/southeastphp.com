<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact_messages';

    public function setFirstName(string $firstName)
    {
        $this->first_name = $firstName;
    }

    public function setLastName(string $lastName)
    {
        $this->last_name = $lastName;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getFirstName() : string
    {
        return $this->first_name;
    }

    public function getLastName() : string
    {
        return $this->last_name;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function getMessage() : string
    {
        return $this->message;
    }
}
