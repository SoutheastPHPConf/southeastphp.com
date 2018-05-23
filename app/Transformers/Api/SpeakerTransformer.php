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
    public function transform(Speaker $speaker) : array
    {
        return [
            'name' => $speaker->getName(),
            'image' => $speaker->getImage(),
            'sessionId' => $speaker->getSessionId(),
            'sessionName' => $speaker->getSessionName(),
            'sessionInfo' => $speaker->getSessionInfo(),
            'bio' => $speaker->getBio(),
            'level' => $speaker->getLevel(),
            'category' => $speaker->getCategory(),
            'twitter' => $speaker->getTwitter(),
            'links' => [
                'twitterLink' => 'https://twitter.com/'  . $speaker->getTwitter(),
                'sessionLink' => 'https://southeastphp.com/sessions#' . $speaker->getSessionId()
            ],
        ];
    }
}
