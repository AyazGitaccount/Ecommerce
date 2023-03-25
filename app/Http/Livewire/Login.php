<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    
    
    public function login()
    {
        $form = $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if(Auth::attempt($form))
        {
            if(Auth::user()->role_as == 1){

                return redirect('/admin/dashboard')->with('status','welcome to the dashboard');
            }
            else
            {
                return redirect()->to('/home');
                
            }
        }

    }

    

    public function render()
    {
        return view('livewire.login')->layout('layouts.app');
    }
}
