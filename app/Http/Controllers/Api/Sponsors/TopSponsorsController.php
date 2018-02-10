<?php

namespace App\Http\Controllers\Api\Sponsors;

use App\Models\Sponsor;
use App\Transformers\Api\TopSponsorsTransformer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TopSponsorsController extends Controller
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @var TopSponsorsTransformer
     */
    private $transformer;

    public function __construct(Response $response, TopSponsorsTransformer $transformer)
    {
        $this->response = $response;
        $this->transformer = $transformer;
    }

    public function index()
    {
        $sponsors = Sponsor::all();

        $topSponsors = $sponsors->filter(function ($value, $key) {
            return $value->sponsor_level === 5;
        });

        return $this->response->setContent(fractal($topSponsors->all(), $this->transformer)->toArray());
    }
}
