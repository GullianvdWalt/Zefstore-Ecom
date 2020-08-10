@extends('layout')

@section('title', 'Shop')

@section('content')

@component('components.breadcrumbs')
<a href="/" class="home-link">Home</a>
<span class="breadcrumb-separator material-icons">
    arrow_forward_ios
</span>
<span>Shop</span>
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

<div class="shop-container">
    <aside class="category-nav">
        <h3 class="category-header">By Category</h3>
        <ul class="categories-menu">
        @foreach ($categories as $category)
            <li class="{{ setActiveCategory($category->slug) }}" class="categories-menu-item"><a href="{{ route('shop.index',['category'=>$category->slug]) }}" class="categories-menu-item-link"><img src="{{ asset('storage/'.$category->icon)}}" alt="category" class="category-icon"> {{ $category->name }}</a></li>
         @endforeach
     </ul>
    </aside>
    {{-- Category Nav Ends --}}
    <div class="category-product-section">
        {{-- Category Product Heading --}}
        <div class="category-product-heading-container">
            <div class="category-product-heading-sub-container">
                <h2 class="category-products-heading"> {{ $categoryName }}</h2>
                <hr class="category-heading-line">
            </div>
            <div class="product-sort-container">
                <p><Strong>Sort By Price:</Strong></p>
                <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low to High</a> |
                <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}"> High to Low</a>
            </div>

        </div>
        {{-- Category Products Section --}}
            <div class="category-products-container">

                @forelse ($products as $product)
                                    <div class="product-container">
                    <div class="product-image"><a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image_url) }}" alt="product" class="main-image"></a></div>
                    <div class="product-name"><a href="{{ route('shop.show', $product->slug) }}" class="product-name">
                            <p>{{ $product->name }}</p>
                        </a></div>
                    <div class="product-price">
                        <p> {{ $product->presentPrice() }}</p>
                    </div>
                </div>
                @empty
                    {{-- If there are no products --}}
                    <div><h3>No items found!</h3></div>
                @endforelse
                <div class="spacer"></div>
                {{-- Pagination --}}
            </div>
               <div class="pagination-container"> <div class="pagination">     {{ $products->appends(request()->input())->links() }}</div></div>
    </div>
</div>

@endsection
