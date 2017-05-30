<?php

namespace SoutheastPhp\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SoutheastPhp\Http\Controllers\Controller;
use SoutheastPhp\Http\Requests\Api\EmailRequest;
use SoutheastPhp\Models\Email;

class EmailController extends Controller
{
    /**
     * @var Response
     */
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function store(EmailRequest $request) : Int
    {
        dd($request->getEmail());

        $email = new Email();
        $email->email = $request->getEmail();
        $email->active = 1;

        $email->save();

        return $this->response->status();
    }
}
