<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class SponsorsImageController extends Controller
{
    /**
     * @var Response
     */
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function create(Request $request)
    {
        $image = $request->file('files');

        $s3 = Storage::disk('s3');
        $filePath = '/sponsors/' . $image->getClientOriginalName();
        $s3->put($filePath, file_get_contents($image), 'public');

        return $this->response
            ->setStatusCode(201)
            ->setContent($image->getClientOriginalName());
    }
}
