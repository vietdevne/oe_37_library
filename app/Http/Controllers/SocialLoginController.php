<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite, Auth, Redirect, Session, URL;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;

class SocialLoginController extends Controller
{
    public function redirectToProvider($provider)
    {
        if(!Session::has('pre_url')){
            Session::put('pre_url', URL::previous());
        }else{
            if(URL::previous() != URL::to('login')) Session::put('pre_url', URL::previous());
        }
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return Redirect::to(Session::get('pre_url'));
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'username' => $user->id,
            'password' => $user->id,
            'fullname' => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id,
            'role' => config('app.user_role')
        ]);
    }
}
