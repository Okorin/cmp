<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class osuAuthController extends Controller
{
    //

    public function redirectToProvider() 
    {
        return \Socialite::with('osu')->redirect();
    }

    public function handleProviderCallback() 
    {
        $user = \Socialite::with('osu')->user();
        dd($user);
    }
}
