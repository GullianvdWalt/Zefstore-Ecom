<?php

use Gloudemans\Shoppingcart\Facades\Cart;
// Main Route File

// Home Page
Route::get('/', 'LandingPageController@index')->name('landing-page');

// Shop
// Shop Page
Route::get('/shop', 'ShopController@index')->name('shop.index');
// ShopController Returns Product View
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

// Cart
// CartController returns cart routes
Route::get('/cart', 'CartController@index')->name('cart.index');
// Route for adding product to cart
Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
// Product Quantity
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
// For Removing Item from cart
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
// Cart Wishlist
Route::post('/cart/addToWishlist/{product}', 'CartController@addToWishlist')->name('cart.addToWishlist');
// Empty Cart
Route::delete('/wishlist/{product}', 'WishlistController@destroy')->name('wishlist.destroy');
Route::post('/wishlist/switchToCart/{product}', 'WishlistController@switchToCart')->name('wishlist.switchToCart');

// Vouchers
Route::post('/voucher', 'VouchersController@store')->name('voucher.store');
Route::delete('/voucher', 'VouchersController@destroy')->name('voucher.destroy');

//Checkout
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

// Guest Checkout
Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');

// Confimration
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Mail
Route::get('/mailable', function () {
    $order = App\Order::find(1);

    return new App\mail\OrderPlaced($order);
});

// Search
Route::get('/search', 'ShopController@search')->name('search');

// Account
Route::middleware('auth')->group(function () {
    // My Profile
    // Edit Edit My Profile Form
    Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
    // Update Profile
    Route::patch('/my-profile', 'UsersController@update')->name('users.update');
    // My Profile Orders
    // Get My Orders View
    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    // Show Order Details
    Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
});

// About
Route::get('/about', 'AboutController@index')->name('about.index');
