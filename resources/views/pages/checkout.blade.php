<form method="POST" action="/checkout">

@csrf

<h2>Billing Details</h2>

<input name="name" placeholder="Name" required>
<input name="email" placeholder="Email" required>
<input name="phone" placeholder="Phone">

<h2>Shipping Info</h2>

<input name="address" placeholder="Address">
<input name="city" placeholder="City">
<input name="country" placeholder="Country">

<h2>Payment</h2>

<!-- <select name="payment_method">
<option value="cash">Cash on Delivery</option>
<option value="emoney">e-Money</option>
</select> -->
<label>
<input type="radio" name="payment_method" value="cash" checked>
Cash on Delivery
</label>

<label>
<input type="radio" name="payment_method" value="emoney">
Pay with Paystack
</label>

<button type="submit">
Continue & Pay
</button>

</form>