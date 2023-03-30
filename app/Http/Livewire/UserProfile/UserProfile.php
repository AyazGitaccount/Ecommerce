<?php

namespace App\Http\Livewire\UserProfile;

use App\Models\User;
use App\Models\UserDetail;
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
            'zip_pin'=> 'required|digits:5',
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
                'zip_code' => $this->zip_pin,
                'address' => $this->address,
            ]
        );

        return redirect()->back()->with('message','User Profile Updated' );
    }

  public function mount()
  {
    $user =  User::findOrFail(Auth::user()->id);
    $this->phone = $user->userDetail->phone;
    $this->zip_pin = $user->userDetail->zip_code;
    $this->address = $user->userDetail->address;
    
  }
    public function render()
    {
        $user =  User::findOrFail(Auth::user()->id);
        foreach($user->toArray() as $key => $value){
            $this->{$key} = $value;
        }
       
        return view('livewire.user-profile.user-profile',compact('user'));
    }
}
