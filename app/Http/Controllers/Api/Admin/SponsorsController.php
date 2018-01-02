<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Api\Admin\SponsorRequest;
use App\Models\Sponsor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class SponsorsController extends Controller
{
    /**
     * @var Response
     */
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function create(SponsorRequest $request)
    {
        $sponsor = new Sponsor();
        $sponsor->setName($request->getSponsorName());
        $sponsor->setAbout($request->getSponsorAbout());
        $sponsor->setLevel($request->getSponsorLevel());
        $sponsor->setImage($request->getSponsorImage());
        $sponsor->setWebsite($request->getSponsorWebsite());
        $sponsor->setTwitter($request->getSponsorTwitter());
        $sponsor->setFacebook($request->getSponsorFacebook());

        $sponsor->save();

        return $this->response->setStatusCode(201)->setContent('Sponsor Saved');
    }
}
