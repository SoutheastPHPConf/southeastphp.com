<?php

namespace SoutheastPhp\Http\Controllers\Api\Auth;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use SoutheastPhp\Http\Controllers\Controller;
use SoutheastPhp\Transformers\Api\SocialAuthLink;
use SoutheastPhp\User;

class GoogleController extends Controller
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @var SocialAuthLink
     */
    private $transformer;

    public function __construct(Response $response, SocialAuthLink $transformer)
    {
        $this->response = $response;
        $this->transformer = $transformer;
    }

    public function googleLogin()
    {
        $link = Socialite::driver('google')->stateless()->redirect()->getTargetUrl();

        return $this->response->setContent(fractal($link)->transformWith($this->transformer)->toArray());
    }

    public function handleGoogleCallback()
    {
        $google = Socialite::driver('google')->stateless()->user();

        $user = User::findByEmail($google->getEmail());

        if (is_null($user)) {
            unset($user);

            $user = new User();
            $user->name = $google->getEmail();
            $user->email = $google->getEmail();
            $user->first_name = preg_split("/[\s]+/", $google->getName())[0];
            $user->last_name = preg_split("/[\s]+/", $google->getName())[1];
            $user->image_link = $google->getAvatar();

            $user->save();

            $user->socialAccount()->save(new SocialAccount([
                'token' => $google->token,
                'refresh_token' => $google->refreshToken,
                'token_ttl' => $google->expiresIn,
                'secret' => null,
                'facebook_id' => $google->getId(),
                'google_id' => null,
                'twitter_id' => null,
            ]));
        }

        Auth::login($user, 'true');

        $user->createToken('SoutheastPHP')->accessToken;

        return response()->redirectTo('/');
    }
}
