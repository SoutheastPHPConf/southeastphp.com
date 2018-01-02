<?php

namespace App\Http\Controllers\Api;

use App\Transformers\Api\EmailTransformer;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EmailRequest;
use App\Models\Email;

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

    public function index()
    {
        $emailList = Email::all();

        $emails = fractal($emailList)->transformWith(new EmailTransformer())->toArray();

        return $this->response->setContent($emails);
    }

    public function store(EmailRequest $request) : Int
    {
        $email = new Email();
        $email->email = $request->getEmail();
        $email->active = 1;

        $email->save();

        return $this->response->status();
    }
}
