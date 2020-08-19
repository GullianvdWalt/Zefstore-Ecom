@extends('layout')

@section('title', 'About')

@section('content')

@component('components.breadcrumbs')
<a href="/" class="home-link">Home</a>
<span class="breadcrumb-separator material-icons">
    arrow_forward_ios
</span>
<span>About</span>
@endcomponent
 <div class="about-section">
    <div>
            <h1 class="about-heading">About Us</h1>
            <hr class="about-heading-line">
    </div>
     <div class="about-body-container">
            <p class="about-content">The Zef Store is owned by a bunch of engineers which could be contacted at: <span><a href="www.hhrl.co.za">www.hhrl.co.za</a></span></p>
    </div>
 </div>

@endsection
