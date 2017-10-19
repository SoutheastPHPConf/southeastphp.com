<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Socialite;
//use Laravel\Socialite\Facades\Socialite;
use Auth;
class AuthController extends Controller
{
    //
    public function redirectToFacebook()
{
    return Socialite::with('facebook')->redirect();
}

public function getFacebookCallback()
{
    $data = Socialite::with('facebook')->user();
    $user = User::where('email', $data->email)->first();
    
    if(!is_null($user)) {
        Auth::login($user);
        $user->name = $data->user['name'];
        $user->provider_id = $data->id;
        $user->save();
        echo($data->email);
    } else {
        $user = User::where('provider_id', $data->id)->first();
        if(is_null($user)){
            // Create a new user
            $user = new User();
            $user->name = $data->user['name'];
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->save();
        }
// we will need to create a default password for every user that uses social authentication.
        Auth::login($user);
    }
    return redirect('/home')->with('notification', 'Successfully logged in!');
}
public function redirectToGoogle()
{
    return Socialite::with('google')->redirect();
}
public function getGoogleCallback()
{
    $data = Socialite::with('google')->user();
    $user = User::where('email', $data->email)->first();
   
    if(!is_null($user)) {
        Auth::login($user);
        $user->email = $data->email;
        $user->provider_id = $data->id;
        $user->save();
        echo $data->getEmail();
    } else {
        $user = User::where('provider_id', $data->id)->first();
        if(is_null($user)){
            // Create a new user
            echo $data->getName();
            $user = new User();
            $user->name = $data->getName();
            $user->email = $data->getEmail();
            $user->provider_id = $data->id;
            $user->save();
        }
        Auth::login($user);
    }
    return redirect('/home')->with('notification', 'Successfully logged in!');
}
public function redirectToTwitter()
{
    return Socialite::with('twitter')->redirect();
}
public function getTwitterCallback()
{
    $data = Socialite::with('twitter')->user();
    $user = User::where('email', $data->email)->first();
   
    if(!is_null($user)) {
        Auth::login($user);
        $user->email = $data->email;
        $user->provider_id = $data->id;
        $user->save();
        
    } else {
        $user = User::where('provider_id', $data->id)->first();
        if(is_null($user)){
            // Create a new user
            echo $data->getEmail();
            $user = new User();
             $user->name = $data->getName();
            $user->email = $data->getEmail();
            $user->provider_id = $data->id;
            $user->save();
        }
        Auth::login($user);
    }
    return redirect('/home')->with('notification', 'Successfully logged in!');
}
}
