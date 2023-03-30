<?php

namespace App\Http\Livewire\Frontend\Search;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SearchProducts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $search;
    protected $queryString = ['search'];
    public function render()
    {
        $search_result = Product::where('name','like','%'.$this->search.'%')->paginate(3);      
        return view('livewire.frontend.search.search-products',compact('search_result'));
    }
}
