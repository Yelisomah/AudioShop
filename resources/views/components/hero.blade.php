<div class="hero container">
        @if(isset($title))
            <h1 class="hero-title">{{ strtoupper($title) }}</h1>
        @else
            <div class="hero-home">

                <p class="hero-new">NEW PRODUCT</p>

                <h1>XX99 MARK II HEADPHONES</h1>

                <p class="hero-description">
                    Experience natural, lifelike audio and exceptional build quality made for the passionate music enthusiast.
                </p>

                <a href="/product/xx99-mark-two-headphones" class="btn-primary">
                    SEE PRODUCT
                </a>

            </div>
        @endif
</div>
    