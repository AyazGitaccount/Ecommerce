<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Whishlist;
use Illuminate\Support\Facades\Auth;

class WishlistCount extends Component
{
    public $wishlist_count;
    protected $listeners = ['WishlistUpdated' => 'wishlistCount'];
    public function wishlistCount()
    {
        if(Auth::check())
        {
            return $this->wishlist_count = Whishlist::where('user_id',auth()->user()->id)->count();

        }
        else
        {
            return $this->wishlist_count = 0;
        }
    }


    public function render()
    {
        $this->wishlist_count = $this->wishlistCount();
        return view('livewire.frontend.wishlist-count',['wishlistCount'=>$this->wishlist_count]);
    }
}
