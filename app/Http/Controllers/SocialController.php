<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialite;
class SocialController extends Controller
{
     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        // $user->token;
        $user_id=$user->getId();
        $user_email=$user->getEmail();
        
       $user_data=User::where('provider_id',$user_id)->where('email',$user_email)->first();
        
       if($user_data){
        auth()->login($user_data);
       }
       else{
            $user_login= User::create([
                'name' => $user->getNickname(),
                'email' => $user->getEmail(),
                'provider_id' => $user->getId(),
                'provider_name' => 'github',
            ]);
            auth()->login($user_login);
        }
         return redirect('/home');
    }
}
