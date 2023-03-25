<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;




class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // $validateData = $request->validate();
        $validateData = $request->validate([
            'name' => 'required|string',
            'description' => 'required',
            'slug' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg',
            'meta_title' => 'required|string',            
            'meta_keyword' => 'required|string',            
            'meta_description' => 'required|string',
            
          ]);
        
        $category = new Category;
        $category->name = $validateData['name'];
        $category->slug = Str::slug($validateData['slug']);
        $category->description = $validateData['description'];
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category/', $filename);
            $category->image = 'uploads/category/'.$filename;
        }
        
        $category->meta_title = $validateData['meta_title'];
        $category->meta_keyword = $validateData['meta_keyword'];
        $category->meta_description= $validateData['meta_description'];
        
        $category->status =$request['status'] == true ? '1':'0';
        $category->save();

        return redirect('admin/category')->with('message','Category Added Successfully');
    
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $category)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'description' => 'required',
            'slug' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg',
            'meta_title' => 'required|string',            
            'meta_keyword' => 'required|string',            
            'meta_description' => 'required|string',
            
          ]);

          $category = Category::findOrFail($category);

          $category->name = $validateData['name'];
          $category->slug = Str::slug($validateData['slug']);
          $category->description = $validateData['description'];
         
          if($request->hasFile('image')){

            $path = 'uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category/', $filename);
            $category->image = 'uploads/category/'.$filename;
        }

         
        $category->meta_title = $validateData['meta_title'];
        $category->meta_keyword = $validateData['meta_keyword'];
        $category->meta_description= $validateData['meta_description'];
        
        $category->status =$request['status'] == true ? '1':'0';
        $category->update();

        return redirect('admin/category')->with('message','Category update Successfully');

    }

}
