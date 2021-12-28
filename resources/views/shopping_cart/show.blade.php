@extends('layouts.app');


@section('content')
    <div class="container">
        <div class="row justify-content-sm-center">
        
        <div class="col-xs-12 col-sm-10 col-md-7 col-lg-6">
            <div class="card">
                <header class="padding text-center bg-primary">
                    <h2>Mi carrito de compras</h2>
                </header>
                <div class="card-body padding">
                   @foreach ($shopping_cart->products as $product)
                   <div class="">
                    <h4>{{$product->title}}</h4>

                   </div>
                       
                   @endforeach
                </div>        
            </div>
        </div>
        
        </div>
    </div>
@endsection