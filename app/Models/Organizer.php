<?php

namespace SoutheastPhp\Models;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    protected $table = 'organizers';

    public function getName() : string
    {
        return $this->name;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function getTwitter() : string
    {
        return $this->twitter;
    }

    public function getImage() : string
    {
        return $this->image;
    }

    public function getAbout() : string
    {
        return $this->about;
    }
}
