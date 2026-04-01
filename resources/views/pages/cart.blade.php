@foreach($cart as $item)

<div class="cart-item">

<img src="{{ asset(is_array($item['image']) ? $item['image']['desktop'] : $item['image']) }}" width="80">
<div>

<h4>{{ $item['name'] }}</h4>

<p>$ {{ $item['price'] }}</p>

</div>

<div class="cart-qty">

<form method="POST" action="/cart/decrease/{{ $item['id'] }}">
@csrf
<button>-</button>
</form>

<span>{{ $item['quantity'] }}</span>

<form method="POST" action="/cart/increase/{{ $item['id'] }}">
@csrf
<button>+</button>
</form>

</div>

<form method="POST" action="/cart/remove/{{ $item['id'] }}">
@csrf
<button>Remove</button>
</form>

</div>

@endforeach

<div class="cart-summary">

<p>Subtotal: ${{ number_format($subtotal) }}</p>

<p>Shipping: ${{ number_format($shipping) }}</p>

<p>VAT (20%): ${{ number_format($vat) }}</p>

<h3>Grand Total: ${{ number_format($grandTotal) }}</h3>

<a href="/checkout" class="btn-primary">
Checkout
</a>

</div>