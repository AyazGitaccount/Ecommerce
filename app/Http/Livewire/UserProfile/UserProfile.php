<?php

namespace App\Http\Livewire\UserProfile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Component
{
   public $name,$email,$phone,$zip_pin,$address;
    
   public function update_user_details()
    {
        $this->validate([
            'name'=> 'required|string',
            'phone'=> 'required|digits:11',
            'zip_pin'=> 'required|digits:6',
            'address'=> 'required|string|max:499',
        ]);

        $user =  User::findOrFail(Auth::user()->id);
        $user->update([
            'name'=>$this->name
        ]);

        $user->userDetail()->updateOrCreate(
            [
                'user_id' =>Auth::user()->id,
            ],
            [
                'phone' => $this->phone,
                'zip/pin' => $this->zip_pin,
                'address' => $this->address,
            ]
        );

        return redirect()->back()->with('message','User Profile Updated' );
    }

    public function render()
    {
        return view('livewire.user-profile.user-profile');
    }
}
