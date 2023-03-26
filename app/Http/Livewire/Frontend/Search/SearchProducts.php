<?php

namespace App\Http\Livewire\Frontend\Search;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SearchProducts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $search,$search_products;


    public function mount()
    {
        $search=$this->search;
    }
    public function render()
    {
        if($this->search)
        {
            $this->search_products = Product::where('name','like','%'.$this->search.'%')->latest(15)->paginate();
        }
        else
        {
            return redirect()->back()->with('message','no products found');
        }
        return view('livewire.frontend.search.search-products',['search_products'=>$this->search_products])->extends('layouts.app')->section('title','search');
    }
}
