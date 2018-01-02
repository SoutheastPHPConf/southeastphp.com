<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @return string
     */
    public function getAbout(): string
    {
        return $this->about;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getTwitter(): string
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
}
