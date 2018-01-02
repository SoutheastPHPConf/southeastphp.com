<?php

namespace App\Http\Requests\Api\Admin;

use App\Models\SponsorLevel;
use Illuminate\Foundation\Http\FormRequest;

class SponsorRequest extends FormRequest
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

    public function getSponsorName()
    {
        return $this->get('name');
    }

    public function getSponsorLevel()
    {
        $sponsor = $this->get('level');

        switch($sponsor) {
            case "fan-level":
                return SponsorLevel::FAN_LEVEL;
                break;
            case "session-player-level":
                return SponsorLevel::SESSION_LEVEL;
                break;
            case "touring-level":
                return SponsorLevel::TOURING_LEVEL;
                break;
            case "with-the-band-level":
                return SponsorLevel::WITH_THE_BAND;
                break;
            case "star-level":
                return SponsorLevel::STAR_LEVEL;
                break;
        }

        return $sponsor;
    }

    public function getSponsorAbout()
    {
        return $this->get('about');
    }

    public function getSponsorImage()
    {
        return $this->get('sponsorImage');
    }

    public function getSponsorTwitter()
    {
        return $this->get('twitter');
    }

    public function getSponsorFacebook()
    {
        return $this->get('facebook');
    }

    public function getSponsorWebsite()
    {
        return $this->get('website');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
