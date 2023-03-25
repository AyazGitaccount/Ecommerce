<?php

namespace App\Http\Livewire\Frontend\NewArrival;

use App\Models\Product;
use Livewire\Component;

class NewArrivalProducts extends Component
{
    public function render()
    {
        $new_products = Product::latest()->take(10)->get();
        return view('livewire.frontend.new-arrival.new-arrival-products',compact('new_products'));
    }
}
