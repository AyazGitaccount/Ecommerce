<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class Login_With_GoogleController extends Controller
{
    public function redirect_to_Google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handle_Google_Callback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect()->intended('/home');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
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

