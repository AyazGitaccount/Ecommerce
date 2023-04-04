<?php

namespace App\Http\Controllers;

use Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
  public function stripe()
  {
    return view('stripe');
  }

  public function stripePost(Request $request)

  {

    Stripe\Stripe::setApiKey(env('sk_test_51Mg1P3Edxa4bD5xvaTsR7EIHFL0o6CQKQYrJAEpET9TKUZlYdfSOxxNqaZksnnYCDvdyJLJKHCqPwsvgtzxXq8XE00cJbGCH9o'));

    $customer = Stripe\Customer::create(array(

      "address" => [

        "line1" => "Virani Chowk",

        "postal_code" => "360001",

        "city" => "Rajkot",

        "state" => "GJ",

        "country" => "IN",

      ],

      "email" => "demo@gmail.com",

      "name" => "Hardik Savani",

      "source" => $request->stripeToken

    ));
    
    Stripe\Charge::create([

      "amount" => 100 * 100,

      "currency" => "usd",

      "customer" => $customer->id,

      "description" => "Test payment from itsolutionstuff.com.",

      "shipping" => [

        "name" => "Jenny Rosen",

        "address" => [

          "line1" => "510 Townsend St",

          "postal_code" => "98140",

          "city" => "San Francisco",

          "state" => "CA",

          "country" => "US",

        ],

      ]

    ]);

    Session::flash('success', 'Payment successful!');
    return back();
  }
}
