<nav class="navbar">

<div class="container">

<a href="/">
    <img src="{{asset('assets/shared/desktop/logo.svg')}}" alt="Audio Logo">
</a>

<div class="nav-links">
<a href="/">Home</a>
<a href="/category/headphones">Headphones</a>
<a href="/category/speakers">Speakers</a>
<a href="/category/earphones">Earphones</a>
</div>
<a href="/cart">

<img src="{{asset('assets/shared/desktop/icon-cart.svg')}}" alt="Cart Icon">

<span class="cart-count">
{{ count(session('cart',[])) }}
</span>

</a>
</div>
<hr style="width: 90%; margin: 0 auto; border: 1px solid var(--gray);">
</nav>
