<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $table = 'speakers';

    public function getName()
    {
        return $this->name;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getSessionName()
    {
        return $this->session_name;
    }

    public function getSessionInfo()
    {
        return $this->session_info;
    }

    public function getDetailLink()
    {
        return $this->detail_link;
    }

    public function getTwitter()
    {
        return $this->twitter;
    }

    public function scopeByKeynote(Builder $query)
    {
        return $query->where('category', '=', 'keynote');
    }
}
