@extends('layouts.app')

@section('content')

<div class="container product-layout">

<picture>

    <source 
        media="(min-width:1024px)" 
        srcset="{{ asset(ltrim($product['image']['desktop'], './')) }}">

    <source 
        media="(min-width:768px)" 
        srcset="{{ asset(ltrim($product['image']['tablet'], './')) }}">

    <img 
        src="{{ asset(ltrim($product['image']['mobile'], './')) }}" 
        alt="{{ $product['name'] }}">

</picture>

<div class="product-info">

<h2>{{ $product['name'] }}</h2>

<p>{{ $product['description'] }}</p>

<h3>${{ number_format($product['price']) }}</h3>

<form method="POST" action="/cart/add">

@csrf

<input type="hidden" name="product_id" value="{{ $product['id'] }}">

<button class="btn-primary">
Add To Cart
</button>

</form>

</div>

</div>

@endsection