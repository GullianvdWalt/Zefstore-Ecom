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
    <div class="message-container">
        <!-- Check for message -->
        @if (session()->has('success_message'))
        <div class="alert-message-container">
            <p> {{ session()->get('success_message') }}</p>
        </div>
        @endif
        <!-- Check for errors -->
        @if(count($errors) > 0)
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

<!-- Product View Start -->
<div class="product-view-container">
    <!-- Product Image Section Start -->
    <div class="product-image-container">
        <div class="product-main-image">
            <img src="{{ productImage($product->image_url) }}" alt="product" class="main-image active" id="currentImage">
        </div>
        {{-- Product Images --}}
        <div class="product-images-container">
                <div class="thumbnail-container selected">
                        <img src="{{ productImage($product->image_url) }}"  alt="product-thumbnail" class="thumbnail-image">
                </div>
            @if ($product->images)
                        {{-- Array From DB of Product Imagess --}}
                     @foreach (json_decode($product->images, true) as $image)
                    <div class="thumbnail-container">
                        <img src="{{ productImage($image) }}"  alt="product-thumbnail" class="thumbnail-image">
                    </div>
                    @endforeach
            @endif
        </div>
    </div>
    <!-- Product Image Section End -->
    <!-- Product Information Section Start -->
    <div class="product-information-container">
        <div class="product-title-container">
            <h3 class="product-title">{{ $product->name }}</h3>
        </div>
        <div class="product-status-container">
            {!! $stockLevel !!}
        </div>
        <div class="product-details-container">
            <p class="product-details"> {{ $product->details}}</p>
        </div>
        <div class="product-price-container">
            <p class="product-price"> {{ ($product->presentPrice()) }}</p>
        </div>
        <div class="product-descritpion-container">
            <p class="product-description">
                    {!! $product->description !!}
            </p>
        </div>
        <p>&nbsp;</p>
        @if($product->quantity > 0)
            <!-- Add To Cart Button -->
            <form action="{{ route('cart.store', $product) }}" method="POST">
                <!-- Prevents  cross-site request forgery attacks -->
                {{ csrf_field() }}
                <button type="submit" class="add-to-cart-button">Add To Cart</button>
            </form>
        @endif

    </div>
    <!-- Product Information Section End -->
</div>
@include('partials.might-like')
@endsection

@section('extra-js')
<script>
    (function(){
        // Declare Variables
        const currentImage = document.querySelector('#currentImage');
        // Get Thumbnail Images
        const images = document.querySelectorAll('.thumbnail-container');
        // Add Event Listener
        images.forEach((element) => element.addEventListener('click', thumbnailClick));
        // Event Listener
       function thumbnailClick(e){
            currentImage.src = this.querySelector('img').src;


            images.forEach((element) => element.classList.remove('selected'));
            this.classList.add('selected');
        }

    })();
</script>
@endsection
