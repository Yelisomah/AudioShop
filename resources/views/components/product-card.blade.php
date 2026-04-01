<div class="product-card">

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

<h3>{{ $product['name'] }}</h3>

<p>${{ number_format($product['price']) }}</p>

<a href="/product/{{ $product['slug'] }}" class="btn-primary">
See Product
</a>

</div>