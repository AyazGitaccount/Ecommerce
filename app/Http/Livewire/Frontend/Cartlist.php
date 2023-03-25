<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cartlist extends Component
{
    public $cart,$total_price=0;

    public function decrementQuantity($item_id)
    {
        $cartData = Cart::where('id',$item_id)->where('user_id',auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->quantity > 1)
            {
                $cartData->decrement('quantity');
            }
                       
        }
        else
        {
              session()->flash('message','Something Went Worng');
              return false;
            
        }
    }

    public function incrementQuantity($item_id)
    {
        $cartData = Cart::where('id',$item_id)->where('user_id',auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->productColor()->where('id',$cartData->product_color_id)->exists()){
                $productColor = $cartData->productColor()->where('id',$cartData->product_color_id)->first();
                
                if($productColor->quantity > $cartData->quantity){
                  $cartData->increment('quantity');
              
                }else{
                 session()->flash('message','Only'.$productColor->quantity.'products avilable');

                }
            }
            else{
                if($cartData->product->quantity > $cartData->quantity)
                {
                    $cartData->increment('quantity');
                }
                else{
                    session()->flash('message','Only '.$cartData->product->quantity. 'products avilable');
   
                }
            }           
        }
        else
        {
            session()->flash('message','Something Went Worng');
            return false;
        }
    }

    public function remove_cart_item($item_id)
    {
        $cart_item = Cart::where('user_id',auth()->user()->id)->where('id',$item_id)->first();
       if($cart_item)
        {
            $cart_item->delete();
            $this->emit('CartUpdated');
            session()->flash('message','Cart Item Removed'); 
        }
        else
        {
            session()->flash('message','Something went worng !'); 
            return false;
        }
       
    }

    public function render()
    {
        $this->cart = Cart::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.cartlist',['cart'=>$this->cart]);
    }
    
        
}
