@extends('layout')
@section('title', 'Checkout')

@section('extra-css')

    <style>
        .mt-32 {
            margin-top: 32px;
        }
    </style>

    <script src="https://js.stripe.com/v3/"></script>

@endsection
@section('content')

{{-- Checkout Section Start --}}
<div class="checkout-wrapper">
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
    {{-- Checkout main section starts --}}
    <div class="checkout-section">
        <div class="checkout-form-section">
            <div class="checkout-header-container">
                <h2 class="checkout-heading">Checkout</h2>
            </div>
             <div class="checkout-form-container">
                {{-- Checkout form Starts --}}
                <form action="{{ route('checkout.store') }}" method="POST" class="checkout-form" id="payment-form">
                    {{ csrf_field() }}
                    <h3 class="checkout-form-heading">Billing Details</h3>
                    <div class="checkout-form-group">
                        <label for="email" class="checkout-form-label">Email Address</label>
                        <input type="text" id="email" name="email" class="checkout-form-input" value="{{ old('email') }}" required>
                    </div>
                    <div class="checkout-form-group">
                        <label for="fullName" class="checkout-form-label">Name & Surname</label>
                        <input type="text" id="fullName" name="fullName" class="checkout-form-input"  value="{{ old('fullName') }}" required>
                    </div>
                    <div class="checkout-form-group">
                        <label for="address" class="checkout-form-label">Address</label>
                        <input type="text" id="address" name="address" class="checkout-form-input" value="{{ old('address') }}" required>
                    </div>
                    <div class="checkout-half-form-group">
                        <div class="checkout-form-group">
                            <label for="city" class="checkout-half-form-label">City</label>
                            <input type="text" id="city" name="city" class="checkout-half-form-input" value="{{ old('city') }}" required>
                         </div>
                        <div class="checkout-form-group">
                            <label for="province" class="checkout-half-form-label">Province</label>
                            <input type="text" id="province" name="province" class="checkout-half-form-input" value="{{ old('province') }}" required>
                         </div>
                    </div>
                    <div class="checkout-half-form-group">
                        <div class="checkout-form-group">
                            <label for="postalCode" class="checkout-half-form-label">Postal Code</label>
                            <input type="text" id="postalCode" name="postalCode" class="checkout-half-form-input" value="{{ old('postalCode') }}" required>
                        </div>
                        <div class="checkout-form-group">
                            <label for="phone" class="checkout-half-form-label">Phone</label>
                            <input type="text" id="phone" name="phone" class="checkout-half-form-input" value="{{ old('phone') }}" required>
                        </div>
                    </div>

                    <div class="space"></div>

                    <h3 class="checkout-form-heading"> Payment Details</h3>

                    <div class="checkout-form-group">
                        <label for="name_on_card" class="checkout-form-label">Name On Card</label>
                        <input type="text" id="name_on_card" name="name_on_card" class="checkout-form-input">
                    </div>

                    <div class="checkout-form-group">
                        <label for="card-element">
                        Credit or debit card
                        </label>
                        <div id="card-element" style="width: 30em" #stripecardelement id="card-element">
                        <!-- A Stripe Element will be inserted here. -->

                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <div class="space"></div>

                    <button type="submit" class="checkout-form-button" id="complete-order">Complete Order</button>
                </form>
                {{-- Checkout form Ends--}}
            </div>

        </div>
        {{-- Checkout Order Section Starts --}}
        <div class="checkout-order-section">
            <h2 class="checkout-order-heading">Your Order</h2>
                @foreach (Cart::content() as $item)
                {{-- Checkout  Product Details Row Start --}}
                <div class="checkout-order-row">
                    <div class="checkout-order-product-image-container">
                        <img src="{{ asset('assets/img/'.$item->model->image)}}" alt="item" class="checkout-order-product-image">
                    </div>
                    <div class="checkout-order-product-details-container">
                        <div class="checkout-order-product-name"><p>{{ $item->model->name }}</p></div>
                        <div class="checkout-order-product-details"><p>{{ $item->model->details }}</p></div>
                        <div class="checkout-order-product-price"><p>{{ $item->model->presentPrice() }}</p></div>
                    </div>
                    <div class="checkout-order-product-quantity-container">
                        <p class="checkout-product-quantity">{{ $item->qty }}</p>
                    </div>
                </div>
                @endforeach
                    {{-- Checkout  Product Details Row End --}}

                    {{-- Checkout Order Price Row Start --}}
                 <div class="checkout-order-price-row">
                    <div class="checkout-order-subotal-container">
                        <p class="checkout-subtotal-label">Subtotal</p>
                        <p class="checkput-subotal-value">{{ 'R'.((DOUBLE)(Cart::subtotal())) }}</p>
                    </div>
                      @if (session()->has('voucher'))
                    <div class="voucher-container">
                        <p class="voucher-label"> Code ({{ session()->get('voucher')['name'] }})</p>
                        <p class="voucher-value">{{ presentPrice($discount) }}</p>
                    </div>
                    <div class="new-subtotal-container">
                        <p class="new-subtotal-label">New Subtotal</p>
                         <p class="new-subotal-value">{{ presentPrice($newSubtotal) }} </p>
                    </div>
                    @endif
                    <div class="checkout-order-tax-container">
                        <p class="checkout-tax-label">Tax (15%)</p>
                        <p class="checkout-tax-value">{{ presentPrice($newTax) }}</p>
                    </div>
                    <div class="checkout-order-total-container">
                        <p class="checkout-total-label">Total</p>
                        <p class="checkout-total-value"> {{ presentPrice($newTotal) }} </p>
                    </div>
                </div>
                     {{-- Checkout Orders Price Row End --}}

        </div>
         {{-- Checkout Order Section Ends --}}
    </div>
{{-- Checkout Section End --}}
</div>

@endsection

@section('extra-js')
{{-- Stripe JS --}}
<script>


        // Create a Stripe client.
        var stripe = Stripe('pk_test_51HCQ8hG8ox0ZkhTABbqxPIR7d3kL2VqOn6F9qb1ZCVNmiVwPTTZQLAOYlMsJMtNbycFExNjW8wiXZIFap2VlLvTG00avOjBUp1');
                    // Create an instance of Elements.
        var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Roboto", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
            event.preventDefault();

            // Disable submit button, prevent repeated clicks
            document.getElementById('complete-order').disabled = true;

            // Form Values
            var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalCode').value
              }

            stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;

                // Enable submit button to catch errors
                document.getElementById('complete-order').disabled = false;

                } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
                }
            });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit Form
            form.submit();
            }

</script>
@endsection
