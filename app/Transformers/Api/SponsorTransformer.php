<?php

namespace App\Transformers\Api;

use League\Fractal\TransformerAbstract;
use App\Models\Sponsor;

class SponsorTransformer extends TransformerAbstract
{
    public function transform(Sponsor $sponsor)
    {
        return [
            'name' => $sponsor->getName(),
            'website' => $sponsor->getWebsite(),
            'image' => $sponsor->getImage(),
            'sponsorLevel' => $sponsor->getSponsorLevel->name,
            'about' => $sponsor->getAbout(),
            'twitter' => $sponsor->getTwitter(),
            'facebook' => $sponsor->getFacebook(),
        ];
    }
}
