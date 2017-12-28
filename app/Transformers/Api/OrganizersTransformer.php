<?php

namespace App\Transformers\Api;

use League\Fractal\TransformerAbstract;
use App\Models\Organizer;

class OrganizersTransformer extends TransformerAbstract
{
    public function transform(Organizer $organizer)
    {
        return [
            'name' => $organizer->getName(),
            'image' => 'https://s3.amazonaws.com/southeastphp/' . $organizer->getImage(),
            'about' => $organizer->getAbout(),
            'twitterLink' => 'https://twitter.com/' . $organizer->getTwitter(),
            'twitter' => $organizer->getTwitter(),
            'email' => $organizer->getEmail(),
        ];
    }
}
