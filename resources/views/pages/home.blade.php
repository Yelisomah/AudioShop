@extends('layouts.app')

@section('content')

<section class="hero">

<div class="container">

<div>
<p>NEW PRODUCT</p>

<h1>XX99 MARK II HEADPHONES</h1>

<p>
Experience natural lifelike audio and exceptional build quality.
</p>

<a href="/product/xx99-mark-two" class="btn-primary">
See Product
</a>

</div>

<img src="{{ asset('assets/home/desktop/image-hero.jpg') }}">

</div>

</section>


<section class="container categories">

@include('components.category-card',[
'title'=>'Headphones',
'image'=>'assets/shared/desktop/image-category-thumbnail-headphones.png',
'link'=>'/category/headphones'
])

@include('components.category-card',[
'title'=>'Speakers',
'image'=>'assets/shared/desktop/image-category-thumbnail-speakers.png',
'link'=>'/category/speakers'
])

@include('components.category-card',[
'title'=>'Earphones',
'image'=>'assets/shared/desktop/image-category-thumbnail-earphones.png',
'link'=>'/category/earphones'
])

</section>

@endsection