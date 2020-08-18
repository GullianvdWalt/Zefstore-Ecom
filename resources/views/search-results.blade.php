@extends('layout')

@section('title', "Search Results")

@section('content')

@component('components.breadcrumbs')
<a href="/" class="home-link">Home</a>
<span class="breadcrumb-separator material-icons">
    arrow_forward_ios
</span>
<span>Search</span>
@endcomponent
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
<!-- Search Container Start -->
<div class="search-container">

        <h2 class="search-results-heading"> Search Results </h2>
        <div class="search-results-container">
            <p clas="search-results-container">{{$products->total()}} result(s) for '{{request()->input('query') }}'</p>
        </div>
        {{-- Search Results Table Start --}}
        <table class="search-results-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Description</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></td>
                                <td>{{ $product->details }}</td>
                                <td>{!! \Illuminate\Support\Str::limit($product->description, 80) !!}</td>
                                <td>{{ $product->presentPrice() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
        </table>
        {{-- Search Results Table End --}}
<div class="pagination-container"> <div class="pagination">     {{ $products->appends(request()->input())->links() }}</div></div>
</div><!-- Search Container End -->


@endsection

@section('extra-js')
@endsection
