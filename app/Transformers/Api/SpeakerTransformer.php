<?php

namespace SoutheastPhp\Transformers\Api;

use League\Fractal\TransformerAbstract;
use SoutheastPhp\Models\Speaker;

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
            'session_name' => $speaker->getSessionName(),
            'session_info' => $speaker->getSessionInfo(),
            'detail_link' => $speaker->getDetailLink(),
            'twitter' => $speaker->getTwitter(),
        ];
    }
}
