<h1>Thank You For Your Order</h1>

<p>Your order has been confirmed.</p>

<h3>Order Summary</h3>

@foreach($order['items'] as $item)

<p>
{{ $item['name'] }} x {{ $item['quantity'] }}
</p>

@endforeach

<p>Total: ${{ $order['total'] }}</p>

<a href="/">Back To Home</a>