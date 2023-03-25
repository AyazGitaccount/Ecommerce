<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Whishlist;
use Illuminate\Support\Facades\Auth;

class ViewProduct extends Component
{
    public $slug, $product_slug, $category, $product, $prod_color_selected_quantity, $quantityCount = 1,$product_colorID;

    public function colorSelected($product_colorID)
    {
        $this->product_colorID = $product_colorID;
        $productColor = $this->product->productColors()->where('id', $product_colorID)->first();
        $this->prod_color_selected_quantity = $productColor->quantity;

        if ($this->prod_color_selected_quantity == 0) {
            $this->prod_color_selected_quantity = 'outOfStock';
        }
    }

    public function mount($slug, $product_slug)
    {
        $this->category = Category::where('slug', $slug)->first();
        if ($this->category) {
            $this->product = $this->category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if ($this->product) {
                return view('livewire.frontend.view-product');
            }
        } else {
            redirect()->back();
        }
    }

    public function addToWhishlist($product_id)
    {
        $product_name = Product::where('id', $product_id)->first();
        if (Auth::check()) {
            if (Whishlist::where('user_id', auth()->user()->id)->where('product_id', $product_id)->exists()) {
                session()->flash('message', 'Product already exists in Whishlist');
                return false;
            } else {
                Whishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product_id,
                    'product_name' => $product_name->name
                ]);
                $this->emit('WishlistUpdated');
                session()->flash('message', 'Product added successfully to Whishlist');
            }
        } else {
            session()->flash('message', 'Please Login to continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }

    public function addToCart($product_id)
    {
        if (Auth::check())
        {
            if ($this->product->where('id', $product_id)->where('status', '0')->exists())
            {
                if($this->product->productColors()->count()>0)
                {
                      if( $this->prod_color_selected_quantity != Null)
                      {
                        if(Cart::where('user_id',auth()->user()->id)->where('product_id',$product_id)->where('product_color_id',$this->product_colorID)->exists())
                        {
                            session()->flash('message', 'Product Already Exists in Cart');
                            return false;
                        }
                        else
                        {
                            $productColor = $this->product->productColors()->where('id',$this->product_colorID)->first();
                            if($productColor->quantity >0)
                            {
                                if ($this->product->quantity > $this->quantityCount)
                                {
                                  Cart::create([
                                    'user_id'=> auth()->user()->id,
                                    'product_id'=>$product_id,
                                    'product_color_id'=>$this->product_colorID,
                                    'quantity'=>$this->quantityCount
                                  ]);
                                  $this->emit('CartUpdated');
                                  session()->flash('message', 'Product added to Cart');

                                }
                                else 
                                {
                                    session()->flash('message', 'Only'.$productColor->quantity.'Quantity avilable');
                                    return false;
                                }                            
                            }
                            else
                            {
                                session()->flash('message', 'Only'.$productColor->quantity.'Quantity avilable');
                                return false; 
                            }
                        }

                            
                        }
                      else
                      {
                        session()->flash('message', 'Product color not selected');
                        return false;
                      }
                }
                else
                {
                    if(Cart::where('user_id',auth()->user()->id)->where('product_id',$product_id)->exists())
                    {
                        session()->flash('message', 'Product Already Exists in Cart');
                        return false;
                    }
                    else
                    {                    
                        if ($this->product->quantity > 0)
                        {
                            if ($this->product->quantity > $this->quantityCount)
                            {
                                Cart::create([
                                    'user_id'=> auth()->user()->id,
                                    'product_id'=>$product_id,
                                    'quantity'=>$this->quantityCount
                                ]);
                                $this->emit('CartUpdated');

                                session()->flash('message', 'Product added to Cart');
                            }
                            else {
                                session()->flash('message', 'only '.$this->product->quantity.' product avilable');
                                return false;
                            }
                        } 
                        else 
                        {
                            session()->flash('message', 'Product out of stock');
                            return false;
                        }
                    }
                }
                
            } 
            else 
            {
                session()->flash('message', 'Product Dose not exists');
                return false;
            }
        } 
        else 
        {
            session()->flash('message', 'Please Login to continue');
            return false;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function incrementQuantity()
    {
        $this->quantityCount++;
    }

    public function render()
    {
        $this->product = $this->category->products()->where('slug', $this->product_slug)->where('status', '0')->first();

        return view('livewire.frontend.view-product');
    }
}
