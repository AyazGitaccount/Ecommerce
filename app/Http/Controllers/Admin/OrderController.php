<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public function orderview(Request $request)
    {
        $today_date = Carbon::now()->format('Y-m-d'); 
        $orders = Order::when($request->date !=null, function($q) use ($request){

            return $q->whereDate('created_at',$request->data);
            }, function($q) use ($today_date){  

                return $q->whereDate('created_at',$today_date);
        })
        -> when($request->status !=null, function ($q) use ($request){
            return $q->where('status_message',$request->status);
        })->paginate(10);
                
        return view('admin.orders.display_order_list',['orders'=>$orders]);
    }

    
    public function display(int $order_id)
    {
        $order = Order::where('id',$order_id)->first();
        if($order)
        {
            return view('admin.orders.order_view',['order'=>$order]);
        }
        else
        {
            return redirect('admin/orders')->with('Message','Order ID not found');
        }
    }

    public function Update_order_status(int $order_id, Request $request )
    {
        $order = Order::where('id',$order_id)->first();
        if($order)
        {
            $order->update([
                'status_message'=>$request->order_status
            ]);
            return redirect('admin/orders/'.$order_id)->with('message','Order Status Updated');
        }
        else
        {
            return redirect('admin/orders'.$order_id)->with('Message','Order ID not found');
        }
    }


    public function generate_inovice(int $order_id)
    {
        $order = Order::findOrFail($order_id);
        return view('admin.invoice.generate_invoice',compact('order'));
    }

    public function download_inovice(int $order_id)
    {
        $order = Order::findOrFail($order_id);
        $data = ['order'=>$order];
        
        $pdf = Pdf::loadView('admin.invoice.generate_invoice', $data);
        $today_date = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-'.$order->id.'-'.$today_date.'.pdf');
    }
    
}
