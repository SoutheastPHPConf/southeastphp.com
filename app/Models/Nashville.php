<?php

namespace SoutheastPhp\Models;

use Illuminate\Database\Eloquent\Model;

class Nashville extends Model
{
    protected $table = 'nashville';

    public function getActivity()
    {
        return $this->activity;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getActivityType()
    {
        return $this->topic;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    public function getYelp()
    {
        return $this->yelp_link;
    }

    public function getGoogleMap()
    {
        return $this->google_map;
    }
}
