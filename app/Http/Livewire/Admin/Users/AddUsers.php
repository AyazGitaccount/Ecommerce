<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AddUsers extends Component
{
    public $name,$email,$password,$role;

    public function rules(){
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|integer'
        ];
    }
     
    public function restInput(){
        $this->name = Null;
        $this->email = Null;
        $this->password = Null;
        $this->role = Null;
        
    }

    public function closeModal()
    {
        $this->restInput();
    }

    public function add_user()
    {
        $vaidate = $this->validate();
        User::create([
            'name' => $this->name,
            'email'=> $this->email,
            'password' =>  Hash::make($this->password),
            'role_as' => $this->role
        ]);

        session()->flash('message','Brand added successfully');
        $this->restInput();
    }

    public function render()
    {
        return view('livewire.admin.users.add-users')->extends('layouts.admin')->section('content');
    }
}
