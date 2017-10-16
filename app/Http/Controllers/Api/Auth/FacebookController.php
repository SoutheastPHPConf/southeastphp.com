<?php

namespace SoutheastPhp\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use SoutheastPhp\Http\Controllers\Controller;
use SoutheastPhp\Models\SocialAccount;
use SoutheastPhp\Transformers\Api\SocialAuthLink;
use SoutheastPhp\User;

class FacebookController extends Controller
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

    public function facebookLogin()
    {
        $link = Socialite::driver('facebook')->stateless()->redirect()->getTargetUrl();

        return $this->response->setContent(fractal($link)->transformWith($this->transformer)->toArray());
    }

    public function handleFacebookCallback()
    {
        $facebook = Socialite::driver('facebook')->stateless()->user();

        $user = User::findByEmail($facebook->getEmail());

        if (is_null($user)) {
            unset($user);

            $user = new User();
            $user->name = $facebook->getEmail();
            $user->email = $facebook->getEmail();
            $user->first_name = preg_split("/[\s]+/", $facebook->getName())[0];
            $user->last_name = preg_split("/[\s]+/", $facebook->getName())[1];
            $user->image_link = $facebook->getAvatar();

            $user->save();

            $user->socialAccount()->save(new SocialAccount([
                'token' => $facebook->token,
                'refresh_token' => $facebook->refreshToken,
                'token_ttl' => $facebook->expiresIn,
                'secret' => null,
                'facebook_id' => $facebook->getId(),
                'google_id' => null,
                'twitter_id' => null,
            ]));
        }

        Auth::login($user, 'true');

        return response()->redirectTo('/');
    }
}
