<?php

namespace App\Transformers\Api;

use App\Models\Speaker;
use League\Fractal\TransformerAbstract;

class KeynoteSpeakerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Speaker $speaker)
    {
        return [
            'name' => $speaker->getName(),
            'twitter' => $speaker->getTwitter(),
            'image' => $speaker->getImage(),
        ];
    }
}
