<?php

namespace SoutheastPhp\Transformers\Api;

use League\Fractal\TransformerAbstract;
use SoutheastPhp\Models\SponsorLevel;

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
