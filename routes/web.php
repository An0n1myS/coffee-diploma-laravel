<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\PageController@main' )->name('main');

Route::get('/shake', 'App\Http\Controllers\CocktailController@shake' )->name('shake');
Route::get('/catalog', 'App\Http\Controllers\CatalogController@catalog' )->name('catalog');

Route::get('/blogs', 'App\Http\Controllers\BlogController@blogsList' )->name('blogs');
Route::get('/blogs/{blog}', 'App\Http\Controllers\BlogController@blogs' )->name('blog');

Route::get('/products/{product}', 'App\Http\Controllers\PageController@product' )->name('product');

Route::get('/cart', 'App\Http\Controllers\CartController@cart' )->name('cart');
Route::get('/wishlist', 'App\Http\Controllers\WishlistController@wishlist' )->name('wishlist');

Route::post('/new_cart', 'App\Http\Controllers\CartController@new_cart' )->name('new_cart');
Route::post('/new_wishlist', 'App\Http\Controllers\WishlistController@new_wishlist' )->name('new_wishlist');

Route::post('/send-cocktail', 'App\Http\Controllers\CocktailController@send_cocktail' )->name('send_cocktail');

Route::get('/login', 'App\Http\Controllers\AuthController@show_login' )->name('login');
Route::post('/login_proc', 'App\Http\Controllers\AuthController@login' )->name('login_proc');

Route::get('/register', 'App\Http\Controllers\AuthController@show_register' )->name('register');
Route::post('/register_proc', 'App\Http\Controllers\AuthController@register' )->name('register_proc');

Route::get('/logout', 'App\Http\Controllers\AuthController@logout' )->name('logout');

Route::get('/profile', 'App\Http\Controllers\AuthController@profile' )->name('profile');

Route::post('/removeFromWishlist', 'App\Http\Controllers\WishlistController@removeFromWishlist' )->name('removeFromWishlist');
Route::post('/update-cart-item', 'App\Http\Controllers\CartController@updateCartItem')->name('updateCartItem');

Route::get('/createOrder', 'App\Http\Controllers\OrderController@createOrder' )->name('createOrder');
Route::post('/update-cart-items', 'App\Http\Controllers\CartController@updateCartItems')->name('updateCartItems');
Route::post('/changeOrder', 'App\Http\Controllers\OrderController@changeOrder' )->name('changeOrder');

Route::post('/addReview', 'App\Http\Controllers\BlogController@addReview' )->name('addReview');
