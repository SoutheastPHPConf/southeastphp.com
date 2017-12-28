<?php

namespace App\Transformers\Api;

use League\Fractal\TransformerAbstract;

class SocialAuthLink extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(string $link)
    {
        return [
            'link' => $link,
        ];
    }
}
