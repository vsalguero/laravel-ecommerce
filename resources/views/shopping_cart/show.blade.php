@extends('layouts.app');


@section('content')
    <div class="container">
        <div class="row justify-content-sm-center">
        
        <div class="col-xs-12 col-sm-10 col-md-12 col-lg-12">
            <div class="card">
                <header class="padding text-center">
                    <h2>Mi carrito de compras</h2>
                </header>
                <div class="card-body padding">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <products-shopping-component></products-shopping-component>
                        </div>
                        <div class="col-12 col-md-6 payments">
                            <p>Paga tu total facilmente con cualquiera de estos métodos a través de PayPal</p>
                            <img src="/images/paypal.png" width="160">
                            <img src="/images/Payment-method.png" width="300">
                            <div>
                                <a href="/pagar" class="btn btn-primary">Proceder al pago</a>
                            </div>
                            
                        </div>
                    </div>
                   
                </div>        
            </div>
        </div>
        
        </div>
    </div>
@endsection