<?php

namespace SoutheastPhp\Http\Controllers\Api;

use Illuminate\Http\Response;
use SoutheastPhp\Http\Controllers\Controller;
use SoutheastPhp\Models\Organizer;
use SoutheastPhp\Transformers\Api\OrganizersTransformer;

class OrganizersController extends Controller
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @var OrganizersTransformer
     */
    private $transformer;

    public function __construct(Response $response, OrganizersTransformer $transformer)
    {
        $this->response = $response;
        $this->transformer = $transformer;
    }

    public function index()
    {
        $organizers = Organizer::all();

        return $this->response->setStatusCode(200)->setContent(fractal($organizers, $this->transformer)->toArray());
    }
}
