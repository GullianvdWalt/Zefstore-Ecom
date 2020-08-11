@extends('layout')
@section('title', 'Shopping Cart')
@section('content')

<!-- Breadcrums -->
@component('components.breadcrumbs')
<a href="/" class="home-link">Home</a>
<span class="material-icons">
    arrow_forward_ios
</span>
<span class="span-cart-breadcrum">Shopping Cart</span>
@endcomponent

<!-- Cart Section Starts -->
<div class="cart-section">
<!-- Message Container Start -->
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
    <!-- Message Container End -->



    <h2 class="cart-heading"> My Cart</h2>
    <hr class="cart-heading-line">
    {{-- Check If there is items in the cart --}}
    @if (Cart::count() > 0)
    {{-- Cart Table Container Start --}}
    <div class="cart-table-container">
        <div class="spacer"></div>
        <div class="cart-item-count-header-container">
            <h3 class="cart-header"> {{ Cart::count() }} item(s) in Shopping Cart</h3>
        </div>
        @foreach (Cart::content() as $item)
        <div class="cart-item-container">
            <div class="cart-row-left">
                {{-- Model is the Product Model --}}
                <div> <a href="{{route('shop.show', $item->model->slug)}}"><img src="{{ productImage($item->model->image_url) }}" alt="item" class="cart-img"></a></div>
                <div class="cart-item-details-col">
                    <div class="cart-product-name"><a href="{{route('shop.show', $item->model->slug)}}">{{$item->model->name}}</a></div>
                    <div class="cart-product-details">{{ $item->model->details }}</div>
                </div>
            </div>
            <div class="cart-row-right">
                <div class="actions">
                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST" class="cart-actions">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" title="Remove Item" class="cart-remove"><i class="material-icons">delete</i>Remove</button>
                    </form>

                    <form action="{{ route('cart.addToWishlist', $item->rowId) }}" method="POST" class="cart-actions">
                        {{ csrf_field() }}
                        <button type="submit" title="Add To Wishlist" class="cart-wishlist"><i class="material-icons">star_outline</i>Add to wishlist</button>
                    </form>
                </div>
                <div class="cart-quantity-container">
                    <select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity }}">
                        {{-- data-id - used for quantity selector --}}
                    @for ($i = 1; $i < 5 + 1 ; $i++)
                        <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="cart-price">{{ presentPrice($item->subtotal) }}</div>
            </div>
        </div>
        @endforeach
        {{-- Voucher Container Start --}}
        @if (!session()->has('voucher'))
        <div class="cart-voucher">
           <div class="voucher-input-container">
            <form action="{{ route('voucher.store') }}" method="POST">
                    {{ csrf_field() }}
                <label for="voucher" class="voucher-label">Have a Code?</label>
                <input type="text" id="voucher_code" name="voucher_code">
                <button class="apply-voucher-button" type="submit">Apply</button>
            </div>
            </form>
        </div>
        @endif
        {{-- Voucher Container End --}}

        {{-- Totals Secion Start --}}
        <div class="cart-total-row">
            <div class="cart-total-row-left">
                <h4 class="cart-total-description"> Exludes shipping costs</h4>
            </div>
            <div class="cart-total-container">
                <div class="subtotal-container">
                    <p class="subotal-label">Subtotal </p> <p class="subtotal">{{ presentPrice((Cart::subtotal())) }}</p>
                </div>
                {{-- If There is a voucher applied --}}
                @if (session()->has('voucher'))
                    <div class="voucher-container">
                        <p class="voucher-label"> Code ({{ session()->get('voucher')['name'] }})</p>
                        <p class="voucher-value">{{ presentPrice($discount) }}</p>
                    </div>
                    {{-- Remove Voucher --}}
                    <div class="voucher-remove-container">
                         <form action="{{ route('voucher.destroy') }}" method="POST" style="display:block">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="remove-voucher-button">Remove Voucher</button>
                    </form>
                    </div>
                    <div class="new-subtotal-container">
                        <p class="new-subtotal-label">New Subtotal</p>
                         <p class="new-subotal-value">{{ presentPrice($newSubtotal) }} </p>
                    </div>
                @endif
                <div class="tax-container"> <p class="tax-label"> Tax (15%) </p> <p class="tax">{{ presentPrice($newTax) }}</p></div>
                <div class="total-container"> <p class="total-label"> <b>Total</b> </p> <p class="total"> {{ presentPrice($newTotal) }} </p></div>
            </div>
        </div>
        <div class="cart-button-row">
            <a  href="{{ route('shop.index') }}" class="continue-shopping-button"><span class="material-icons">store</span> Continue Shopping</a>
            <a  href="{{ route('checkout.index') }}" class="checkout-button" title="checkout" value="Checkout"><span class="material-icons">shopping_bag</span> Checkout</a>
        </div>
        {{-- Totals Secion Start --}}

</div>
    {{-- Cart Table Container End --}}
@else
{{-- If car is empty show message --}}
    <div class="empty-cart">
        <div class="empty-cart-header-container">
            <h3 class="empty-cart-header">There are no items in your cart!</h3>
        </div>
        <div class="empty-cart-button-container">
            <a href="{{ route('shop.index') }}" class="continue-shopping-button-removed"><span class="material-icons">store</span>  Continue Shopping</a>
        </div>
    </div>
@endif
{{-- Cart-Section Ends --}}

{{-- Wishlist Section Start --}}
@if (Cart::instance('wishlist')->count() > 0)

<h2> There is {{ Cart::instance('wishlist')->count() }} item(s) in your wishlist.</h2>
{{-- Wishlist Container Starts --}}
<div class="wishlist-container">
@foreach (Cart::instance('wishlist')->content() as $item)
{{-- Wishlist product row starts --}}
<div class="wishlist-item-row">
    <div class="wishlist-item-image">
{{-- Wishlist Product Details --}}
        <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ asset('assets/img/product-images/'.$item->model->slug.'.jpg')}}" alt="product" class="wishlist-product-image"></a>
    </div>
    <div class="wishlist-item-details">
        <div class="wishlist-item-product-name"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
        <div class="wishlist-item-product-details">{{ $item->model->details }}</div>
    </div>
    {{-- Wishlist Actions Start --}}
    <div class="wishlist-item-actions">
            {{-- Remove Item from wishlist --}}
            <form action="{{ route('wishlist.destroy', $item->rowId) }}" method="POST">

                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" class="wishlist-actions">Remove</button>

            </form>
            {{-- Add Wishlist item to cart --}}
            <form action="{{ route('wishlist.switchToCart', $item->rowId) }}" method="POST">

                 {{ csrf_field() }}

                <button type="submit" class="wishlist-actions">Move to Cart</button>
            </form>
    </div>
    {{-- Wishlist Actions Ends --}}
    <div class="wishlist-item-price">{{ $item->model->presentPrice() }}</div>
</div>
@endforeach
</div>

@else
{{-- Empty Wishlist --}}
<div class="empty-wishlist-container">
<h3 class="wishlist-empty-heading">There are no items in your wishlist.</h3>
</div>

@endif
</div>
{{-- Wishlist Section Start --}}


@include('partials.might-like')
@section('extra-js')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    // Product Quantity Selector
    (function(){
        const classname = document.querySelectorAll('.quantity');

        Array.from(classname).forEach(function(element){
            // Event Listener
            element.addEventListener('change', function(){
                // Get Selector id
              const id = element.getAttribute('data-id');
              axios.patch(`/cart/${id}`, {
                    quantity: this.value
                })
                .then(function (response) {
                    //console.log(response);
                    window.location.href = '{{ route('cart.index') }}'
                })
                .catch(function (error) {
                    console.log(error);
                    window.location.href = '{{ route('cart.index') }}'
                });
            })
        })

    })();
</script>
@endsection
@endsection
