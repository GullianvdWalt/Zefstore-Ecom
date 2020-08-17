@extends('layout')
@section('title', 'Login')
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

{{-- Login Container Start --}}
<div class="login-container">
        {{-- Login Left Start --}}
        <div class="login-container-left">
            <div class="login-header-container"><h3>Returning Customer</h3></div>
            <div class="spacer"></div>
            <form method="POST" action="{{ route('login') }}" class="login-form">
               {{ csrf_field() }}
                    <div class="login-form-row">
                        <label for="email" class="login-form-label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="login-form-row">
                        <label for="password" class="login-form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="login-form-bottom-row">
                            <button type="submit" class="login-button"> Login </button>
                        <div class="remember-me-container">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="login-form-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="login-form-row">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
            </form>
        </div>
        {{-- Login Left Start --}}

        {{-- Login Right Start --}}
        <div class="login-container-right">
            <div class="login-right-heading">
                 <h3>New Customer</h3>
            </div>
            <div class="login-right-row">
                <p class="login-sub-heading"> <strong>Save time now.</strong> </p>
                <p>You don't need an account to checkout.</p>
                <a href="{{ route('guestCheckout.index') }}" class="login-button-outlined">Continue as Guest</a>
                <div class="spacer"></div>
            </div>
                &nbsp;
            <div class="login-right-row">
                <p class="login-sub-heading"> <strong>Save time later.</strong> </p>
                <p>Create an account for fsdter checkout and easy access to order history.</p>
                <div class="spacer"></div>
                <a href="{{ route('register') }}" class="login-button-outlined">Create Account</a>
            </div>
        </div>
        {{-- Login Right Ends --}}
</div>
{{-- Login Container Ends --}}
@endsection
