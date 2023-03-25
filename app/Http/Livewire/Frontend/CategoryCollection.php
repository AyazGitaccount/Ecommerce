<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Category;

class CategoryCollection extends Component
{
    public function render()
    {
        $cateory = Category::where('status','0')->get();
        return view('livewire.frontend.category-collection',['category'=> $cateory]);
    }
}
