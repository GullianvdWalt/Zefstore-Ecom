@extends('layout')

@section('title', 'My Order')

@section('content')

@component('components.breadcrumbs')
<a href="/" class="home-link">Home</a>
<span class="breadcrumb-separator material-icons">
    arrow_forward_ios
</span>
<span>My Order</span>
@endcomponent

<div class="container">
    @if (session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
    @endif

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="my-order-container">
    {{-- My Order Nav Starts --}}
    <aside class="my-order-nav">
        <ul class="profile-menu">
            <li class="active" class="my-order-menu-item">
                <a href="{{ route('users.edit') }}" class="my-orders-menu-item-link">
                    My Profile
                </a>
            </li>
            <li class="active" class="my-orders-menu-item">
                <a href="{{ route('orders.index') }}" class="my-orders-menu-item-link">
                    My Orders
                </a>
            </li>
     </ul>
    </aside>
    {{-- My Orders Nav Ends --}}
    {{-- My Orders Section Starts --}}
    <div class="my-order-section">
        {{-- Category Product Heading --}}
        <div class="my-order-heading-container">
            <div class="my-order-sub-container">
                <h2 class="my-order-heading"> Order ID: {{ $order->id }}</h2>
                <hr class="my-order-heading-line">
            </div>
        </div>


        <div class="my-order-container">
            {{-- My Order Container Start --}}
                <div>{{ $order->id }}</div>
                <div class="my-orders-total">{{ presentPrice($order->billing_total) }}</div>

                @foreach ($products as $product)
                    <div>{{ $product->name }}</div>
                    <div><img src="{{ productImage($product->image_url) }}" alt="Product Image" class="product-order-image"></div>
                @endforeach
                <div class="spacer"></div>
            {{-- My Order Container End --}}
        </div>
    </div>
{{-- My orders Secton End --}}
</div>

@endsection
