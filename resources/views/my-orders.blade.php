@extends('layout')

@section('title', 'My Orders')

@section('content')

@component('components.breadcrumbs')
<a href="/" class="home-link">Home</a>
<span class="breadcrumb-separator material-icons">
    arrow_forward_ios
</span>
<span>My Orders</span>
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

<div class="my-orders-container">
    {{-- My orders Nav Starts --}}
    <aside class="my-orders-nav">
        <ul class="profile-menu">
            <li class="active" class="my-orders-menu-item">
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
    <div class="my-orders-section">
        {{-- Category Product Heading --}}
        <div class="my-orders-heading-container">
            <div class="my-orders-sub-container">
                <h2 class="my-orders-heading"> My Orders </h2>
                <hr class="my-orders-heading-line">
            </div>
        </div>


        <div class="my-orders-container">
            {{-- My Orders Container Start --}}
            @foreach ($orders as $order)
                <div>{{ $order->id }}</div>
                <div><a href="{{ route('orders.show', $order->id) }}" class="order-details-link"> Order Details </a></div>
                <div class="my-orders-total">{{ presentPrice($order->billing_total) }}</div>

                @foreach ($order->products as $product)
                    <div>{{ $product->name }}</div>
                    <div><img src="{{ productImage($product->image_url) }}" alt="Product Image" class="product-order-image"></div>
                @endforeach
                <div class="spacer"></div>
            @endforeach
            {{-- My Orders Container End --}}
        </div>
    </div>
{{-- My orders Secton End --}}
</div>

@endsection
