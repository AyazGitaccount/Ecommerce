<?php

namespace App\Http\Livewire\Frontend\Chekcout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\Order_item;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Catch_;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Checkout extends Component
{
    public $cart, $grand_total=0;

    public $fullname,$email, $phone,  $pincode, $address, $payment_mode=Null,$payment_id=Null;
    
    protected $listeners = [
        'validationForAll',
        'transactionEmit' => 'online_payment'
    ];
    
    public function validationForAll()
    {
        $this->validate();
    }
    
    public function rules()
    {
       return [
            'fullname' => 'required|string|max:121',
            'email' =>    'required|email|max:121',
            'phone' =>    'required|string|max:11|min:10',
            'pincode' =>  'required|string|max:6|min:6',
            'address' =>  'required|string|max:500',

        ];
    }

    public function Place_order()
    {
        $this->validate(); 
        $order = Order::create([
            'user_id'=>auth()->user()->id,
            'tracking_no'=> 'Ecom-'.Str::random(10),
            'fullname'=>$this->fullname,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'pincode'=>$this->pincode,
            'address'=>$this->address,
            'status_message'=> 'in progress',
            'payment_mode'=>$this->payment_mode,
            'payment_id'=>'' ,
            
        ]);
       
        foreach($this->cart as $cartitem)
        {
             Order_item::create([
            'order_id'=>$order->id,
            'product_id'=>$cartitem->product_id,
            'product_color_id'=>$cartitem->product_color_id,
            'quantity'=>$cartitem->quantity,
            'price'=>$cartitem->product->selling_price
           ]);
           if($cartitem->product_color_id != Null)
           {
            $cartitem->productColor()->where('id',$cartitem->product_color_id)->decrement('quantity',$cartitem->quantity);
           }
           else
           {
            $cartitem->product()->where('id',$cartitem->product_id)->decrement('quantity',$cartitem->quantity);
           }
        }
        return $order;         
    }

    public function cod()
    {
        $this->payment_mode = 'Cash on Delivery';
        $cod_order = $this->Place_order();
        if($cod_order)
        {
           Cart::where('user_id',auth()->user()->id)->delete();
           session()->flash('message','Order Placed Successfully');
           return redirect()->to('Thank_you');
        }
        else
        {
            session()->flash('message','Something went worng');
            return false;
        }
    }

    public function products_total_amount()
    {   $this->grand_total = 0 ;
        $this->cart =Cart::where('user_id',auth()->user()->id)->get();
        foreach($this->cart as $cartitem)
        {
            $this->grand_total += $cartitem->product->selling_price * $cartitem->quantity;
        }
        return $this->grand_total;
    }
   
    public function online_payment($transaction_id )
    {     
           
      $this->payment_id = $transaction_id;   
      $this->payment_mode = "Paid by Paypal";
      $cod_order = $this->Place_order();
      if($cod_order)
      {
         Cart::where('user_id',auth()->user()->id)->delete();
         session()->flash('message','Order Placed Successfully');
         return redirect()->to('Thank_you');
      }
      else
      {
          session()->flash('message','Something went worng');
          return false;
      }
    }

    public function success()
    {
       
         
    }

    public function cancel()
    {
        # code...
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->grand_total = $this->products_total_amount();
        return view('livewire.frontend.checkout.checkout',['grand_total'=>$this->grand_total]);
    }
}
