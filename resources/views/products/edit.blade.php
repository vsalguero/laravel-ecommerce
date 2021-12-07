@extends('layouts.app');

@section('content')

<div class="container">
  <div class="card">
      <header>Edit Product</header>
      <p>{{ $product->title }}</p>

      <div class="card-body">
         @include('products.form')
      </div>
</div>
</div>

@endsection

