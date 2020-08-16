@extends('layout')

@section('title', 'My Profile')

@section('content')

@component('components.breadcrumbs')
<a href="/" class="home-link">Home</a>
<span class="breadcrumb-separator material-icons">
    arrow_forward_ios
</span>
<span>My Profile</span>
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

<div class="my-profile-container">
    {{-- My Profile Nav Starts --}}
    <aside class="my-profile-nav">
        <ul class="my-profile-menu">
            <li class="active" class="my-profile-menu-item">
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
    {{-- My Profile Nav Ends --}}
    {{-- My Profile Section Starts --}}
    <div class="my-profile-section">
        {{-- Category Product Heading --}}
        <div class="my-profile-heading-container">
            <div class="my-profile-sub-container">
                <h2 class="my-profile-heading">My Profile </h2>
                <hr class="my-profile-heading-line">
            </div>
        </div>


        <div class="my-profile-form-container">
            {{-- My Profile Form Start --}}
            <form action="{{ route('users.update') }}" class="my-profile-form" method="POST">
                @method('patch')
                @csrf
                <div class="form-row">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="form-row">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
                <div class="form-row">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                    <div>Leave password blank to keep current password</div>
                </div>
                <div class="form-row">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="form-row">
                    <button type="submit" class="my-profile-button">Update Profile</button>
                </div>
            </form>
            {{-- My Profile Form End --}}
        </div>

    </div>
{{-- My Profile Secton End --}}
</div>

@endsection
