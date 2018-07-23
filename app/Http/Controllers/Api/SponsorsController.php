<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use App\Transformers\Api\SponsorTransformer;

class SponsorsController extends Controller
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @var SponsorTransformer
     */
    private $transformer;

    /**
     * SponsorsController constructor.
     * @param Response $response
     * @param SponsorTransformer $transformer
     */
    public function __construct(Response $response, SponsorTransformer $transformer)
    {
        $this->response = $response;
        $this->transformer = $transformer;
    }

    public function index()
    {
        $sponsors = Sponsor::all();

        return $this->response->setStatusCode(200)
            ->setContent(fractal($sponsors)
                ->transformWith($this->transformer)
                ->toArray()
            );
    }

    public function fetch(Request $request)
    {
        $sponsor = Sponsor::byFrontPage()->get();

        return $this->response->setStatusCode(200)
            ->setContent(fractal($sponsor)
                ->transformWith($this->transformer)
                ->toArray()
            );
    }
}
