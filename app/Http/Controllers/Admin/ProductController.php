<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;
use App\Models\ProductColor;

class ProductController extends Controller
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status','0')->get();
        return view('admin.products.create', compact('categories', 'brands','colors'));
    }

    public function store(ProductFormRequest $request)
    {
        $validated_data = $request->validated();
        $category =  Category::findOrFail($validated_data['category_id']);

        $product = $category->products()->create([
            'category_id' => $validated_data['category_id'],
            'name' => $validated_data['name'],
            'slug' => Str::slug($validated_data['slug']),
            'brand' => $validated_data['brand'],
            'small_description' => $validated_data['small_description'],
            'description' => $validated_data['description'],
            'original_price' => $validated_data['original_price'],
            'selling_price' => $validated_data['selling_price'],
            'quantity' => $validated_data['quantity'],
            'trending' => $request->trending == true ? '1' : '0',
            'featured' => $request->featured == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',
            'meta_title' => $validated_data['meta_title'],
            'meta_keyword' => $validated_data['meta_keyword'],
            'meta_description' => $validated_data['meta_description'],
        ]);

        if ($request->hasFile('image'))
        {
           $uploadPath = 'uploads/products/';
           foreach ($request->file('image') as $imageFile) {
               $extention = $imageFile->getClientOriginalExtension();
               $filename = time() . '.' . $extention;
               $imageFile->move($uploadPath, $filename);
               $finalImagePathName = $uploadPath . $filename;

               $product->productImages()->create([
                   'product_id' => $product->id,
                   'image' => $finalImagePathName,
               ]);
           }
       }

        if($request->colors)
        {
            foreach($request->colors as $key=> $color ){
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' =>$color,
                    'quantity' =>$request->color_quantity[$key] ?? 0
                ]);
            }
        }

        return redirect('/admin/products')->with('message', 'Product added successfully');
    }

    public function edit(int $product_id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($product_id);

        $product_color = $product->productColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id',$product_color)->get();
        return view('admin.products.edit', compact('categories', 'brands', 'product','colors'));
    }

    public function update(ProductFormRequest $request, int $product_id)
    {
        $validated_data = $request->validated();

        $product = Category::findOrFail($validated_data['category_id'])
            ->products()->where('id', $product_id)->first();

        if ($product) {
            $product->update([
                'category_id' => $validated_data['category_id'],
                'name' => $validated_data['name'],
                'slug' => Str::slug($validated_data['slug']),
                'brand' => $validated_data['brand'],
                'small_description' => $validated_data['small_description'],
                'description' => $validated_data['description'],
                'original_price' => $validated_data['original_price'],
                'selling_price' => $validated_data['selling_price'],
                'quantity' => $validated_data['quantity'],
                'trending' => $request->trending == true ? '1' : '0',
                'featured' => $request->featured == true ? '1' : '0',
                'status' => $request->status == true ? '1' : '0',
                'meta_title' => $validated_data['meta_title'],
                'meta_keyword' => $validated_data['meta_keyword'],
                'meta_description' => $validated_data['meta_description'],
            ]);

            if ($request->hasFile('image'))
             {
                $uploadPath = 'uploads/products/';
                foreach ($request->file('image') as $imageFile) {
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time() . '.' . $extention;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . $filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }

            if($request->colors) 
                {
                    foreach($request->colors as $key=> $color ){
                        $product->productColors()->create([
                            'product_id' => $product->id,
                            'color_id' =>$color,
                            'quantity' =>$request->color_quantity[$key] ?? 0
                        ]);
                    }
                }
            return redirect('/admin/products')->with('message', 'Product updated successfully');

        } 

        else 
        {
            return redirect('admin/products')->with('message', 'No such product ID found');
        }
    }

    public function destoryImage(int $product_image_id)
    {
        $product_image = ProductImage::findOrFail($product_image_id);
       if(File::exists($product_image->image)){
          File::delete($product_image->image);
       }
        $product_image->delete();

        return redirect()->back()->with('message', 'Product image Deleted successfully');

    }

    public function destory(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        if($product->productImages)
        {
            foreach($product->productImages as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                } 
            }
        }
        
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted successfully');
       
        
    }

    public function updateProductColorQty(Request $request, $prod_color_id)
    {
        $productColorData = Product::findorFail($request->product_id)->productColors()->where('id',$prod_color_id)->first();
        $productColorData->update([
        'quantity' => $request->quantity
        ]);
       
        return response()->json(['message'=>'Product Color Quantity updated']);
        
    }


    public function delete_product_color($prod_color_id)  
    {
        $product_color = ProductColor::findOrFail($prod_color_id);
        $product_color->delete();
        return response()->json(['message'=>'Product Color Deleted']);

    }
}
