<?php

namespace App\Http\Livewire\ChangePassword;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
    public $current_password,$password,$password_confirmation;
    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $currentPasswordStatus = Hash::check($this->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($this->password),
            ]);

            return redirect()->back()->with('message','Password Updated Successfully');

        }else{

            return redirect()->back()->with('message','Current Password does not match with Old Password');
        }
    }

    public function render()
    {
        return view('livewire.change-password.change-password');
    }
}
