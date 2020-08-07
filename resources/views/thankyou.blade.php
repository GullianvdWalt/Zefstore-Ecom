@extends('layout')

@section('title', 'Thank You')

@section('content')

   <div class="thank-you-section">
       <h1 class="thankyou-header"> Thank You!, your order has been placed </h1>
       <p class="thankyou-text">A confirmation email was sent</p>
       <div class="spacer"></div>
       <div class="thankyou-home-button-container">
           <a href="{{ url('/') }}" class="thankyou-home-button">Home</a>
       </div>
   </div>




@endsection
