<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name,$slug,$status,$brand_id,$category_id;

    public function rules(){
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'category_id' => 'required|integer',
            'status' => 'nullable'
        ];
    }
     
    public function restInput(){
        $this->name = Null;
        $this->slug = Null;
        $this->status = Null;
        $this->category_id = Null;
        
    }

    public function closeModal()
    {
        $this->restInput();
    }

    public function openModal()
    {
        
    }

    public function storeBrand()
    {
        $vaidate = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug'=> Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
            'category_id' => $this->category_id
        ]);

        session()->flash('message','Brand added successfully');
        $this->restInput();
    }

    public function edit_Brand(int $brand_id)
    {      
            $this->brand_id = $brand_id;
            $brand = Brand::findOrFail($brand_id);
            $this->name = $brand->name;
            $this->slug = $brand->slug;
            $this->status = $brand->status;
            $this->category_id = $brand->category_id;
    }

    public function Update_Brand()
    {
        $vaidate = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug'=> Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
            'category_id' => $this->category_id
        ]);

        session()->flash('message','Brand updated successfully');
        $this->restInput();        
    }

    public function delete_brand($brand_id)
    {
        $this->brand_id = $brand_id;
    }
     
    public function destory_Brand()
    {
         Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'Brand Deleted !');
    }


    public function render()
    {
       $category = Category::where('status','0')->get();
       $brand = Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brand.index', compact('brand','category'))
        ->extends('layouts.admin')->section('content');
    }
}
