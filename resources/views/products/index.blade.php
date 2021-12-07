@extends('layouts.app');


@section('content')
    <div class="container">
        <div class="row">
        @foreach ($products as $product)
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="card padding">
                <header>
                    <h2 class="card-title">
                        <a href="products/{{ $product->id }}">
                        {{ $product->title }}
                        </a>
                    </h2>
                    <h4 class="card-subtitle">{{ $product->price }}</h4>
                </header>
                <p class="card-text">{{ $product->description }}</p>        
            </div>
        </div>
        @endforeach
        </div>
        <div class="actions text-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection