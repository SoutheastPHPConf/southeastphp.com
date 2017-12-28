<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Transformers\Api\SocialAuthLink;
use App\User;

class GithubController extends Controller
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

    public function githubLogin()
    {
        $link = Socialite::driver('github')->stateless()->redirect()->getTargetUrl();

        return $this->response->setContent(fractal($link)->transformWith($this->transformer)->toArray());
    }

    public function handleGithubCallback()
    {
        $github = Socialite::driver('github')->stateless()->user();

        $user = User::findByEmail($github->getEmail());

        if (is_null($user)) {
            unset($user);

            $user = new User();
            $user->name = $github->getEmail();
            $user->email = $github->getEmail();
            $user->first_name = preg_split("/[\s]+/", $github->getName())[0];
            $user->last_name = preg_split("/[\s]+/", $github->getName())[1];
            $user->image_link = $github->getAvatar();

            $user->save();

            $user->socialAccount()->save(new SocialAccount([
                'token' => $github->token,
                'refresh_token' => $github->refreshToken,
                'token_ttl' => $github->expiresIn,
                'secret' => null,
                'facebook_id' => null,
                'google_id' => null,
                'github_id' => $github->getId(),
                'twitter_id' => null,
            ]));
        }

        Auth::login($user, 'true');

        $token = $user->createToken('SoutheastPHP')->accessToken;

        return response([
            'token' => $token,
            'user' => $user,
        ])->redirectTo('/');
    }
}
