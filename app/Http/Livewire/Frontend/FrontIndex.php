<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use App\Models\Slider;
use Livewire\Component;

class FrontIndex extends Component
{
    public function render()
    {
        $slider = Slider::where('status','0')->get();
        $trendning_products = Product::where('trending','1')->latest()->take(15)->get();
        return view('livewire.frontend.front-index',['slider'=> $slider,'trending_products'=>$trendning_products]);
    }
}
