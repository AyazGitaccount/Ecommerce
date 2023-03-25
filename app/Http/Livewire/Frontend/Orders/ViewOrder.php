<?php

namespace App\Http\Livewire\Frontend\Orders;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ViewOrder extends Component
{
    public $order_id,$order;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }
    public function render()
    {
       
        $this->order = Order::where('user_id',Auth::user()->id)->where('id',$this->order_id)->first();
        if($this->order)
        {
            
            return view('livewire.frontend.orders.view-order',['order'=>$this->order]);
        }
        else
        {
            return redirect('/orders')->with('message','No Order Found');
        }
    }
}
