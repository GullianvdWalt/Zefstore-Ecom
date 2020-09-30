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
        <div class="top-nav-container" style="background-image: url('{{asset('assets/img/carbon-background.png')}}')">
            <div class="logo"><img src="assets/img/ZefStoreLogoMedium.png" alt="logo" class="logo-image"></div>
            <!-- Nav Start -->
            <div class="nav-top-container">
                <ul>
                    <li class="nav-link"><a href="#"> <img src="assets/img/icons/shop-icon.png" alt="shop"> Shop</a></li>
                    <li class="nav-link"><a href="#"> <img src="assets/img/icons/about-us-icon.png" alt="about"> About</a></li>
                </ul>
            </div>
            <div class="nav-top-container">
                <a href="{{ route('cart.index') }}" class="cart-button-top"> <span class="material-icons"> shopping_cart</span> <span class="cartcount">{{ Cart:count() }}</span></a>
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
