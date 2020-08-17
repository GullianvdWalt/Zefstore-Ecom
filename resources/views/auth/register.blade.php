@extends('layout')
@section('title', 'Register')
@section('content')

{{-- Messages Start --}}
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
{{-- Messages End --}}

{{-- Register Container Start --}}
<div class="register-container">
    {{-- Register Container Left Start --}}
    <div class="register-container-left">
        <h2 class="register-heading">Create Account</h2>
        <div class="spacer"></div>
        {{-- Register Form Start --}}
        <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
            <div class="register-form-row">
                <label for="fullName" class="register-form-label"> Name & Surname</label>
                <input type="text" id="fullname" name="fullName" class="register-form-input"  value="{{ old('fullName') }}" required autofocus>
            </div>
            <div class="register-form-row">
                <label for="email" class="register-form-label"> Email </label>
               <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  required>
            </div>
            <div class="register-form-row">
                <label for="password" class="register-form-label"> Password </label>
                <input id="password" type="password" class="form-control" name="password"  required>
            </div>
            <div class="register-form-row">
                <label for="password-confirm" class="register-form-label"></label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  required>
            </div>
            <div class="register-form-row-bottom">
                <button type="submit" class="register-button">Create Account</button>
                <div class="already-have-container">
                    <p><strong>Already have an account?</strong></p>
                    <a href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </form>
        {{-- Register Form Ends --}}
    </div>
    {{-- Register Container Left End --}}

    {{-- Register Container Right Start --}}
    <div class="register-container-right">
        <h2 class="register-heading">New Customer</h2>
        <h4> Save time now. </h4>
        <p> Creating an account now will save time in the future. You will be able to checkout faster and view past orders. </p>
    </div>
    {{-- Register Container Right Ends --}}

</div>
{{-- Register Container End --}}
@endsection
