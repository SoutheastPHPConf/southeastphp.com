<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Sponsor extends Model
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getSponsorLevel()
    {
        return $this->belongsTo(SponsorLevel::class, 'sponsor_level', 'id');
    }

    public function sponsorLevel()
    {
        return $this->sponsor_level;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @return string
     */
    public function getAbout()
        {
        return $this->about;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setAbout(string $about)
    {
        $this->about = $about;
    }

    public function setLevel(string $level)
    {
        $this->sponsor_level = $level;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setTwitter(string $twitter)
    {
        $this->twitter = $twitter;
    }

    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    public function setWebsite(string $website)
    {
        $this->website = $website;
    }

    public function getFrontPage() : int
    {
        return $this->front_page;
    }

    public function setFrontPage(int $frontPage)
    {
        $this->front_page = $frontPage;
    }

    public function scopeByFrontPage(Builder $query)
    {
        return $query->where('front_page', '=', 1);
    }

    public function scopeBySpnsorPage(Builder $query)
    {
        return $query->where('sponsor_page', '=', 1);
    }
}
