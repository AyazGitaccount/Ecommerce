<?php

namespace App\Http\Livewire\Frontend\Featured;

use App\Models\Product;
use Livewire\Component;

class FeaturedProducts extends Component
{
    public function render()
    {
        $featured_products = Product::where('featured','1')->latest()->get();
        return view('livewire.frontend.featured.featured-products',compact('featured_products'));
    }
}
