<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\DiversityRequest;
use App\Models\Diversity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class DiversityController extends Controller
{
    /**
     * @var Response
     */
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function create(DiversityRequest $request)
    {
        $sponsor = new Diversity();

        $sponsor->setName($request->getContactName());
        $sponsor->setEmail($request->getContactEmail());
        $sponsor->setCompany($request->getContactCompany());
        $sponsor->setTwitter($request->getContactTwitter());
        $sponsor->setTicketAmount($request->getTicketAmount());
        $sponsor->setContactReason($request->getContactReason());

        $sponsor->save();

        return $this->response->setStatusCode(201);
    }
}
