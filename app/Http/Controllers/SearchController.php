<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if($request->search)
        {
            $search_product = Product::where('name','like','%'.$request->search.'%')->latest()->paginate(10);
            return view('frontend.search',compact('search_product'));
        }
        else
        {
            return "No Product Found";
        }
    }
}
