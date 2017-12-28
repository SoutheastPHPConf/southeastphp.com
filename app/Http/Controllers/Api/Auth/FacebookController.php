<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Transformers\Api\SocialAuthLink;
use App\User;

class FacebookController extends Controller
{
    /**
     * @var SocialAuthLink
     */
    private $transformer;

    public function __construct(SocialAuthLink $transformer)
    {
        $this->transformer = $transformer;
    }

    public function facebookLogin()
    {
        $link = Socialite::driver('facebook')->stateless()->redirect()->getTargetUrl();

        return response(fractal($link)->transformWith($this->transformer)->toArray());
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
                'github_id' => null,
                'twitter_id' => null,
            ]));
        }

        Auth::login($user, 'true');

        $token = $user->createToken('SoutheastPHP')->accessToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }
}
