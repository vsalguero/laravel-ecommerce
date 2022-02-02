<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PayPal;


class PaymentsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('shopping_cart');
    }

    public function pay(Request $request){
        $amount = $request->shopping_cart->amount();

        $paypal = new PayPal();
        $response = $paypal->charge($amount);
    }
}
