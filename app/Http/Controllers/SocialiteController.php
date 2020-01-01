<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return 301 
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();   //watch out with changes due to stateless user
        } catch (Exception $e) {
            return Redirect::to('auth/google');
        }
        $user->token;
        //$authUser = $this->checkUserValidation($user);
        dd($user)->token;
    }
}
