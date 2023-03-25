<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public $cart_count;

    protected $listeners = ['CartUpdated' => 'Cart_count'];
    public function Cart_count()
    {
        if(Auth::check())
        {
            return $this->cart_count = Cart::where('user_id',auth()->user()->id)->count();
        }
        else
        {
            return $this->cart_count = 0 ;
        }
    }


    public function render()
    {
        $this->cart_count = $this->Cart_count();
        return view('livewire.frontend.cart-count',['Cart_count'=>$this->cart_count]);
    }
}
