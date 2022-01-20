<?php
namespace App;

use URL;
use Config;

use PayPal\Core\PayPalHttpClient;
use PayPal\v1\Payments\PaymentsCreateRequest;
use PayPal\v1\Payments\PaymentsExecuteRequest;

use PayPal\Core\ProductionEnvironment;

Class PayPal{
    public $client, $environment;

    public function __constructor(){
        
        $clientid = Config::get('services.paypal.clientid');
        $secret = Config::get('services.paypal.secret');


        $this->environment = new SanboxEnvironment($clientid, $secret);

        $this->client = new PayPalHttpClient($this->environment);
    }

    //solicitud de cobro
    public function buildPaymentRequest($amount){
        $request = new PaymentCreateRequest();

        $body = [
           "intent" => "sale",
           "transactions" => [
               "amount" => ["total" => $amount, "currency" => "USD"]
           ],
           "payer" => [
               "payment_method" => "paypal",
           ],
           "redirect_urls" => [
               "cancel_url" => "/",
               "return_url" => "/"
           ]
        ];

        $request->body = $body;

        return $request;
    }
}


?>