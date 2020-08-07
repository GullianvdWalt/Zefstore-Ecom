<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Zefstore</title>

    <!-- Styles -->
    <link href="{{  asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <!-- Google Material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>

    <!-- Header Start -->
    <header>
        <!-- Top-nav-container-Start -->
        <div class="top-nav-container" style="background-image: url('{{asset('assets/img/carbon-background.png')}}');">
            <div class="logo"><img src="assets/img/ZefStoreLogoMedium.png" alt="logo" class="logo-image"></div>
            <!-- Nav Start -->
            <div class="nav-top-container">
                <ul>
                    <li class="nav-link"><a href="{{ route('shop.index') }}"> <img src="assets/img/icons/shop-icon.png" alt="shop"> Shop</a></li>
                    <li class="nav-link"><a href="#"> <img src="assets/img/icons/about-us-icon.png" alt="about"> About</a></li>
                </ul>
            </div>
            <div class="nav-top-container">
            {{-- Cart Button --}}
            <a href="{{ route('cart.index') }}" class="cart-button-top"><span class="material-icons">shopping_cart</span>
            @if (Cart::instance('default')->count() > 0)
                <span class="cart-count">{{ Cart::instance('default')->count() }}</span>
            @endif
            </a>
            {{-- Account Button --}}
                <div class="account-button-top">
                    <div class="dropdown"><a class="dropbtn" title="My Account"><span class="material-icons">account_circle</span> Account</a>
                        <div class="dropdown-content">
                            <a href="#" id="login-modal-open">Login</a>
                            <a href="#" id="register-modal-open">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav End -->
        </div>
        <!-- Top-nav-container-end -->
        <!-- Hero Section Start -->
        <div class="hero-container" style="background-image: url('{{asset('assets/img/head.jpg')}}');">
            <div class="hero-heading">
                <h1>Welcome To <br> The <span>Zef</span> Store</h1>
            </div>
        </div>
        <!-- Hero Section End -->
    </header>
    <!-- Header End -->
    <!-- Featured Section Start -->
    <div class="featured-section">
        <div class="featured-section-head">
            <h2>Browse through our selection of <span>kief</span> products</h2>
            <hr class="feauture-section-line">
        </div>
        <!-- Featured Products Container Starts -->
        <div class="home-featured-products-container">
            @foreach ($products as $product)
            <div class="home-product-container">
                <div class="product-image"><a href="{{ route('shop.show', $product->slug) }}"><img src="{{ asset('assets/img/'.$product->image)}}" alt="product"></a></div>
                <div class="product-name"><a href="{{ route('shop.show', $product->slug) }}" class="product-name">
                        <p>{{ $product->name }}</p>
                    </a></div>
                <div class="product-price">
                    <p> {{ $product->presentPrice() }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Featured Products Container End -->
        <div class="view-products-button-container">
            <div class="view-products-button"><a href="{{ route('shop.index') }}" class="view-product-link">View More Products</a></div>
        </div>
    </div>
    <!-- Featured Section Start -->

    @include('partials.footer')
</body>

</html>
