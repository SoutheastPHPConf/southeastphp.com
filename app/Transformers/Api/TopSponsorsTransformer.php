<?php

namespace App\Transformers\Api;

use App\Models\Sponsor;
use League\Fractal\TransformerAbstract;

class TopSponsorsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($sponsor)
    {
        return [
            'sponsorName' => $sponsor->getName(),
            'sponsorImage' => $sponsor->getImage(),
        ];
    }
}
