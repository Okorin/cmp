<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;

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
        if (isset($user->id) && !is_null($user)) {
        $loginUser = User::where(['osu_user_id' => $user->id])->first();
                if (is_null($loginUser))
                {
                    $loginUser = User::create([
                        'name' => $user->name,
                        'osu_user_id' => $user->id,
                    ]);
                    $loginUser->roles()->attach(Role::ROLES['User']);
                }
                Auth::login($loginUser);
                return redirect('/');
        }
    }
}
