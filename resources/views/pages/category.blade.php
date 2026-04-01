@extends('layouts.app')

@section('content')

<section class="hero">

<div class="container">
<h1>{{ $category }}</h1>
</div>

</section>

<section class="container">

<div class="products-grid">

@foreach($products as $product)

@include('components.product-card',['product'=>$product])

@endforeach

</div>

</section>

@endsection