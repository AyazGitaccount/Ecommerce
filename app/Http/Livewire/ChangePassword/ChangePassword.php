<?php

namespace App\Http\Livewire\ChangePassword;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
     
        public $current_password;
        public $new_password;
        public $confirm_password;
    
        public function changePassword()
        {
            // Validate the form data
            $this->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|same:new_password'
            ]);
    
            // Get the authenticated user
            $user = Auth::user();
    
            // Check if the current password is correct
            if (!Hash::check($this->current_password, $user->password)) {
                $this->addError('current_password', 'The current password is incorrect.');
                return;
            }
    
            // Update the user's password
            $user->password = Hash::make($this->new_password);
            $user->save();
    
            // Reset the form fields
            $this->current_password = '';
            $this->new_password = '';
            $this->confirm_password = '';
    
            // Emit an event to notify other components that the password has been changed
            $this->emit('passwordChanged');
    
            // Show a success message
            session()->flash('message', 'Password has been changed successfully!');
        }
    
    
    
  
  
  
    // public function changePassword()
    // {
    //     $this->validate([
    //         'current_password' => 'required',
    //         'password' => 'required',
    //         'password_confirmation' => 'required|same:password',
    //     ]);
    //     // $user = User::where('id', session('u_id'))->with('department')->with('position')->first();
    //     $user = User::where('id', auth()->user()->id)->first();
    //     $this->current_password = md5($this->current_password);
    //     $this->password = md5($this->password);
    //     if ( Hash::check($this->current_password ,$user->password)) {
    //         $user = User::where('id', session('u_id'))->first();
    //         $user->password = $this->password;
    //         if ($user->save()) {
                           
    //             $this->current_password = "";
    //             $this->password = "";
    //             $this->password_confirmation = "";
    //         }
    //     } else {
    //         $this->current_password = "";
    //         $this->password = "";
    //         $this->password_confirmation = "";
    //         return redirect()->back()->with('message','Current Password does not match with Old Password');
    //     }
    // }

    // public function changePassword()
    // {
    //     $this->validate([
    //         'current_password' => 'required|string|min:8',
    //         'password' => 'required|string|min:8|confirmed'
    //     ]);

    //     $current_Password_Status = Hash::check($this->current_password, auth()->user()->password);
       
    //     if($current_Password_Status){

    //         User::findOrFail(Auth::user()->id)->update([
    //             'password' => Hash::make($this->password),
    //         ]);

    //         return redirect()->back()->with('message','Password Updated Successfully');

    //     }else{

    //         return redirect()->back()->with('message','Current Password does not match with Old Password');
    //     }
    // }

    public function render()
    {
        return view('livewire.change-password.change-password');
    }
}
