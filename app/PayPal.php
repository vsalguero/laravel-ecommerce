<?php
namespace App;

use URL;
use Config;

use PayPal\Core\PayPalHttpClient;
use PayPal\v1\Payments\PaymentCreateRequest;
use PayPal\v1\Payments\PaymentExecuteRequest;

use PayPal\Core\SandboxEnvironment; //ProductionEnvironment;

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
               "cancel_url" => URL::route('shopping_cart.show'),
               "return_url" => URL::route('payments.execute'),
           ]
        ];

        $request->body = $body;

        return $request;
    }

    public function charge($amount){
        return $this->client->execute($this->buildPaymentRequest($amount));
    }

    public function execute($paymentId, $payerId){
        $paymentExecute = new PaymentExecuteRequest($paymentId);
        $paymentExecute->body = [
            "payer_id" => $payerId
        ];

        return $this->client->execute($paymentExecute);
    }
}


?>