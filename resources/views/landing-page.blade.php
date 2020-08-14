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
            <div class="logo">
                <a href="/"> <img src="assets/img/ZefStoreLogoMedium.png" alt="logo" class="logo-image"></a>
            </div>
            <!-- Menu Nav Start -->
                {{ menu('main','partials.menus.main') }}
            <div class="nav-menu-right">
                    @include('partials.menus.main-right')
            </div>
        </div>
        <!-- Menu Nav End -->
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
                <div class="product-image"><a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image_url) }}" alt="product" class="main-image"></a></div>
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
