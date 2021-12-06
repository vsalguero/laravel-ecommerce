@extends('layouts.app');

@section('content')

<div class="container">
  <div class="card">
      <header>Create new Product</header>

      <div class="card-body">
         @include('products.form')
      </div>
</div>
</div>

@endsection

