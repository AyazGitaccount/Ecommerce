<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public function register()
    {

       $form= $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:8',
        ]);

        User::create($form);
        session()->flash('success', 'Your account has been created successfully');
        return redirect()->to('/login');
    }


    public function render()
    {
        return view('livewire.register')->layout('layouts.app');
    }
}
