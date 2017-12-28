<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\SponsorLevel;
use App\Transformers\Api\SponsorLevelTransformer;

class SponsorLevelsController extends Controller
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @var SponsorLevelTransformer
     */
    private $transformer;

    /**
     * SponsorsController constructor.
     * @param Response $response
     * @param SponsorLevelTransformer $transformer
     */
    public function __construct(Response $response, SponsorLevelTransformer $transformer)
    {
        $this->response = $response;
        $this->transformer = $transformer;
    }

    public function index()
    {
        $sponsors = SponsorLevel::all();

        return $this->response->setStatusCode(200)->setContent(fractal($sponsors, $this->transformer)->toArray());
    }
}
