<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search_products(Request $request)
    {
        if($request->search)
        {
            $search_product = Product::where('name','like','%'.$request->search.'%')->latest(15)->paginate();
        }
    }
}
