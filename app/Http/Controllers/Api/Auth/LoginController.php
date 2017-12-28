<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(LoginRequest $request)
    {
        $user = User::findByEmail($request->getEmail());

        if (Hash::check('plain-text', $user->getPassword()) !== $request->getPassword()) {
            throw new \Exception('Password provided did not match what is in the database');
        }

        Auth::login($user, 'true');

        $user->createToken('SoutheastPHP')->accessToken;

        return $user;
    }
}
