<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Whishlist;

class WishlistPage extends Component
{


    public function remove_whishlist_item($item_id)
    {
        Whishlist::where('user_id',auth()->user()->id)->where('product_id',$item_id)->delete();
        $this->emit('WishlistUpdated');
        session()->flash('message','Item removed from wishlist successfully');
    }
    public function render()
    {
        $wishlist = Whishlist::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-page',['wishlist'=> $wishlist]);
    }
}
