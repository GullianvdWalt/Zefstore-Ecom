@extends('layout')

@section('title', $product->name)

@section('content')

@component('components.breadcrumbs')
<a href="/" class="home-link">Home</a>
<span class="material-icons">
    arrow_forward_ios
</span>
<span><a href="{{ route('shop.index') }}">Shop</a></span>
<span class="material-icons">
    arrow_forward_ios
</span>
<span>{{ $product->name }}</span>
@endcomponent
<!-- Product View Start -->
<div class="product-view-container">
    <!-- Product Image Section Start -->
    <div class="product-image-container">
        <div class="product-main-image">
            <img src="{{ asset('assets/img/'.$product->image)}}" alt="product" class="main-image">
        </div>
        <div class="product-thumbnail-container">
            <div class="thumbnail-container"><img src="{{ asset('assets/img/'.$product->image)}}" alt="product" class="thumbnail-image"></div>
            <div class="thumbnail-container"><img src="{{ asset('assets/img/'.$product->image)}}" alt="product" class="thumbnail-image"></div>
            <div class="thumbnail-container"><img src="{{ asset('assets/img/'.$product->image)}}" alt="product" class="thumbnail-image"></div>
            <div class="thumbnail-container"><img src="{{ asset('assets/img/'.$product->image)}}" alt="product" class="thumbnail-image"></div>
        </div>
    </div>
    <!-- Product Image Section End -->
    <!-- Product Information Section Start -->
    <div class="product-information-container">
        <div class="product-title-container">
            <h3 class="product-title">{{ $product->name }}</h3>
        </div>
        <div class="product-status-container">
            <h4 class="product-status">In Stock</h4>
        </div>
        <div class="product-details-container">
            <p class="product-details"> {{ $product->details}}</p>
        </div>
        <div class="product-price-container">
            <p class="product-price"> {{ $product->presentPrice() }}</p>
        </div>
        <div class="product-descritpion-container">
            <p class="product-description">
                    {!! $product->description !!}
            </p>
        </div>
        <p>&nbsp;</p>
        <!-- Add To Cart Button -->
        <form action="{{ route('cart.store', $product) }}" method="POST">
            <!-- Prevents  cross-site request forgery attacks -->
            {{ csrf_field() }}
            <button type="submit" class="add-to-cart-button">Add To Cart</button>
        </form>


    </div>
    <!-- Product Information Section End -->
</div>
@include('partials.might-like')
@endsection
