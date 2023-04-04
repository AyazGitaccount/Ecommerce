<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        try {
        
            $user = Socialite::driver('github')->user();
         
            $finduser = User::where('github_id', $user->id)->first();
         
            if($finduser){
         
                Auth::login($finduser);
        
                return redirect()->intended('/home');
         
            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'github_id'=> $user->id,
                        'password' => encrypt($user->password)
                    ]);
        
                Auth::login($newUser);
        
                return redirect()->intended('/home');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

