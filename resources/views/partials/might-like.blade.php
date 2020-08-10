<div class="might-like-secton">
    <h3 class="might-like-header"> You might also like...</h3>
    <div class="might-like-container">
        @foreach ($mightAlsoLike as $product)
        <div class="might-like-product-container">
            <!-- Product slug -->
            <a href="{{ route('shop.show', $product->slug) }}" class="might-like-product">
                <div>
                    <!-- Product iamge -->
                     <img src="{{ productImage($product->image_url) }}" alt="product" class="might-like-product-image">
                </div>
                <div>
                        <!-- Product Names -->
                        <p class="might-like-product-name">{{ $product->name }}</p>
                </div>
                <div>
                     <p class="might-like-product-price">{{ $product->presentPrice() }}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
