<?php

namespace App\Http\Livewire\Frontend;
use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class Products extends Component
{
    public $products,$slug,$category,$priceInput,$brandInputs=[];
    protected $queryString = [
        'brandInputs'=> ['except' => '', 'as' => 'brand'],
        'priceInput'=> ['except' => '', 'as' => 'price']
    ];
    public function mount( $slug)
    {
        $this->category = Category::where('slug',$slug)->first();
        if($this->category)
        {
           $this->products = $this->category->products()->get();
           
           return view('livewire.frontend.products');
        }
        else
        {
             redirect()->back();
        }
    }


    public function render()
    {
        
        $this->products=Product::where('category_id',$this->category->id)
        ->when($this->brandInputs,function($query){
         $query->whereIn('brand',$this->brandInputs);
           })
           ->when($this->priceInput,function($query){
             $query->when($this->priceInput=='high-to-low',function($query2){
                    $query2->orderBy('selling_price','DESC');
                })->when($this->priceInput=='low-to-high',function($query2){
                   $query2->orderBy('selling_price','ASC');
                });
           
        })->where('status','0')->get();


        return view('livewire.frontend.products');
    }
}
