<?php

namespace App\Http\Livewire\Frontend\Orders;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class OrdersList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(3);
        return view('livewire.admin.orders.orders-list',['orders'=>$orders]);
    }
}
