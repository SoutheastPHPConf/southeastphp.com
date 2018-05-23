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

    public function getBio()
    {
        return $this->bio;
    }

    public function getTwitter()
    {
        return $this->twitter;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getSessionId() : int
    {
        return $this->id;
    }

    public function scopeByKeynote(Builder $query)
    {
        return $query->where('category', '=', 'Keynote');
    }

    public function scopeWithImage(Builder $query)
    {
        return $query->where('image', '!=', '');
    }

    public function scopeWithoutKeynote(Builder $query)
    {
        return $query->where('category', '!=', 'Keynote');
    }
}
