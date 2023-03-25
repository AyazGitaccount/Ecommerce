<?php
namespace App\Http\Controllers\frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    //  We are not using this controller
    public function index()
    {
        return view('frontend.index');
    }

    public function product($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $products = $category->products()->get();
        // dd($
        return view('frontend.products');
       
    }
}
