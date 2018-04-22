<?php

namespace App\Http\Controllers\Api;

use App\Models\Speaker;
use App\Transformers\Api\KeynoteSpeakerTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class KeynoteSpeakerController extends Controller
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @var KeynoteSpeakerTransformer
     */
    private $transformer;

    public function __construct(Response $response, KeynoteSpeakerTransformer $transformer)
    {
        $this->response = $response;
        $this->transformer = $transformer;
    }

    public function index() : Response
    {
        $speakers = Speaker::byKeynote()->get();

        return $this->response->setContent(fractal($speakers)->transformWith($this->transformer)->toArray());
    }
}
