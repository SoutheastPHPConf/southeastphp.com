<?php

namespace App\Transformers\Api;

use League\Fractal\TransformerAbstract;
use App\Models\SponsorLevel;

class SponsorLevelTransformer extends TransformerAbstract
{
    public function transform(SponsorLevel $sponsorLevel)
    {
        return [
            'name' => $sponsorLevel->getName(),
            'information' => $sponsorLevel->getInformation(),
            'remaining' => $sponsorLevel->getRemaining()
        ];
    }
}
