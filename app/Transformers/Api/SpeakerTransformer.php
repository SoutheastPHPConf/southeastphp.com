<?php

namespace App\Transformers\Api;

use League\Fractal\TransformerAbstract;
use App\Models\Speaker;

class SpeakerTransformer extends TransformerAbstract
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
            'image' => $speaker->getImage(),
            'sessionName' => $speaker->getSessionName(),
            'sessionInfo' => $speaker->getSessionInfo(),
            'bio' => $speaker->getBio(),
            'level' => $speaker->getLevel(),
            'category' => $speaker->getCategory(),
            'twitterLink' => 'https://twitter.com/'  . $speaker->getTwitter(),
            'twitter' => $speaker->getTwitter(),
        ];
    }
}
