<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
    
class UsersPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $name,$email,$password,$role,$user_id;  
     
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
         $this->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8',
                'role' => 'required|integer'
            ]
         );
        User::create([
            'name' => $this->name,
            'email'=> $this->email,
            'password' =>  Hash::make($this->password),
            'role_as' => $this->role
        ]);

        session()->flash('message','User added successfully');
        $this->restInput();
    }

    public function edit_user(int $user_id)
    {      
            $this->id = $user_id;
            $user = User::findOrFail($user_id);
            $this->name = $user->name;
            $this->email = $user->email;
            // $this->password = $user->password;
            $this->role = $user->role;
    }

    public function update_user_details()
    {
        $this->validate([
            'name' => 'required|string',
            'password' => 'required|string|min:8',
            'role' => 'required|integer'
        ]);

        User::findOrFail($this->user_id)->update([
            'name' => $this->name,
            'password'=> Hash::make($this->password),
            'role_as' => $this->role
        ]);

        session()->flash('message','User details updated successfully');
        $this->restInput();        
    }

    public function delete_user($user_id)
    {
        $this->user_id = $user_id;
    }
     
    public function destory_user()
    {
         User::findOrFail($this->user_id)->delete();
        session()->flash('message', 'User Deleted !');
    }

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.admin.users.users-page',compact('users'))->extends('layouts.admin')->section('content');
    }
}
