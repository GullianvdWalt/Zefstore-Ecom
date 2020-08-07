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
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

// Confimration
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');
