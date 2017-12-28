<?php

namespace App\Transformers\Api;

use League\Fractal\TransformerAbstract;
use App\Models\Nashville;

class NashvilleTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Nashville $nashville)
    {
        return [
            'activity' => $nashville->getActivity(),
            'description' => $nashville->getDescription(),
            'activityType' => $nashville->getActivityType(),
            'map' => $nashville->getGoogleMap(),
            'link' => $nashville->getWebsite(),
            'yelp' => $nashville->getYelp(),
        ];
    }
}
