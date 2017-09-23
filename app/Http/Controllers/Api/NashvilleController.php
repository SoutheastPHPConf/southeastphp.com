<?php

namespace SoutheastPhp\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SoutheastPhp\Http\Controllers\Controller;
use SoutheastPhp\Models\Nashville;
use SoutheastPhp\Transformers\Api\NashvilleTransformer;

class NashvilleController extends Controller
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @var NashvilleTransformer
     */
    private $transformer;

    public function __construct(Response $response, NashvilleTransformer $transformer)
    {
        $this->response = $response;
        $this->transformer = $transformer;
    }

    public function index()
    {
        $nashville = Nashville::all();

        return $this->response->setStatusCode(200)->setContent(fractal($nashville, $this->transformer)->toArray());
    }
}
