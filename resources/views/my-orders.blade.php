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

<div class="my-orders-section">
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
    <div class="my-orders-container">
        {{-- Category Product Heading --}}
        <div class="my-orders-heading-container">
            <div class="my-orders-sub-container">
                <h2 class="my-orders-heading"> My Orders </h2>
                <hr class="my-orders-heading-line">
            </div>
        </div>


        <div class="my-order-container">
            {{-- My Orders Container Start --}}
            @foreach ($orders as $order)
                <div class="my-order-details-heading">
                    <div class="my-order-details-heading-left">
                        <div class="my-order-details-col">
                            <div class="uppercase font-bold"><strong>Order Placed</strong></div>
                            <div>{{ $order->created_at }}</div>
                        </div>
                        <div class="my-order-details-col">
                            <div><strong>Order ID</strong></div>
                            <div>{{ $order->id }}</div>
                        </div>
                        <div class="my-order-details-col">
                            <div> <strong>Total</strong> </div>
                            <div class="my-orders-total">{{ 'R'. $order->billing_total }}</div>
                        </div>
                    </div>
                    <div class="my-order-details-heading-right">
                        <div class="my-order-details-col" ><a href="{{ route('orders.show', $order->id) }}" class="order-details-link"> Order Details </a></div>
                    </div>
                </div>
                <div class="my-order-details-body">
                    @foreach ($order->products as $product)
                        <div class="my-order-details-body-product-image"><img src="{{ productImage($product->image_url) }}" alt="Product Image" class="product-order-image"></div>
                        <div class="my-order-details-body-product-details">
                            <div><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></div>
                             <div>{{ presentPrice($product->price) }}</div>
                            <div>Quantity: {{ $product->pivot->quantity }}</div>
                        </div>

                    @endforeach
                <div class="spacer"></div>
                </div>
            @endforeach
            {{-- My Orders Container End --}}
        </div>
    </div>
{{-- My orders Secton End --}}
</div>

@endsection
