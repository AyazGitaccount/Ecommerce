<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Order;

class dashboardController extends Controller
{
   public function index()  
   {
    $total_products = Product::count();
    $total_cats = Category::count();
    $total_brands = Brand::count();

    $total_all_users = User::count();
    $total_users_normal = User::where('role_as','0')->count();
    $total_admin = User::where('role_as','1')->count();

    $today_date = Carbon::now()->format('d-m-Y');
    $this_month = Carbon::now()->format('m');
    $this_year = Carbon::now()->format('Y');

    
    $total_orders = Order::count();
    $today_orders = Order::whereDate('created_at',$today_date)->count();
    $this_month = Order::whereMonth('created_at',$this_month)->count();
    $this_year = Order::whereYear('created_at',$this_year)->count();
     return view('admin.dashboard',compact('total_products','total_cats','total_brands',
     'total_all_users','total_users_normal','total_admin','total_orders','today_orders','this_month','this_year'));
   }
}
