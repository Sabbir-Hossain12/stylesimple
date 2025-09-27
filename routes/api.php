<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FrontendController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//API Start 23 September

Route::name('api.')->group(function () {

    Route::post('/register', [FrontendController::class, 'userRegister'])->name('user.register');
    Route::post('/login', [FrontendController::class, 'userLogin'])->name('user.login');
    Route::post('/forgot-password', [FrontendController::class, 'userForgotPassword'])->name('user.forgot-password');
    Route::post('/reset-password', [FrontendController::class, 'userResetPassword'])->name('user.reset-password');

    Route::get('/settings', [FrontendController::class, 'settings'])->name('user.settings');
    Route::get('/sliders', [FrontendController::class, 'sliders'])->name('user.sliders');
    Route::get('/big-banner', [FrontendController::class, 'bigBanner'])->name('user.big-banner');
    Route::get('/small-banner', [FrontendController::class, 'smallBanner'])->name('user.small-banner');

    Route::get('/pages',[FrontendController::class, 'pages'])->name('user.pages');

    //Subscription
    Route::post('/subscription', [FrontendController::class, 'subscription'])->name('user.subscription');

    //Categories
    Route::get('/featured-categories', [FrontendController::class, 'featuredCategories'])->name('user.front-categories');
    Route::get('/nav-categories', [FrontendController::class, 'navCategories'])->name('user.nav-categories');
    Route::get('/shop-categories', [FrontendController::class, 'shopCategories'])->name('user.shop-categories');
    Route::get('/front-categories', [FrontendController::class, 'frontCategories'])->name('user.front-categories');

    //Products
    Route::get('/shop-products/', [FrontendController::class, 'shopProducts'])->name('user.shop-products');
    Route::get('/search-products/{keyword?}', [FrontendController::class, 'searchProducts'])->name('user.search-products');
    Route::get('/products-by-category/{slug}', [FrontendController::class, 'productsByCategory'])->name('user.products-by-category');
//  Route::get('/front-category-products/{slug}', [FrontendController::class, 'frontCategoryProducts'])->name('user.front-category-products');
    Route::get('/product-details/{slug}', [FrontendController::class, 'productDetails'])->name('user.product-details');

    //Related Products
    Route::get('/related-products/{slug}', [FrontendController::class, 'relatedProducts'])->name('user.related-products');

    //Shipping Area
    Route::get('/shipping-area', [FrontendController::class, 'shippingArea'])->name('user.shipping-area');

});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [FrontendController::class, 'userLogout'])->name('api.user.logout');
    Route::post('/confirm-password', [FrontendController::class, 'userConfirmPassword'])->name('api.user.confirm-password');

    //Profile
    Route::get('/user-profile', [FrontendController::class, 'userProfile'])->name('api.user.profile');
    Route::post('/update-profile', [FrontendController::class, 'updateProfile'])->name('api.update.profile');
    Route::get('/user-order-history', [FrontendController::class, 'userOrderHistory'])->name('api.user.order-history');

    //Wishlist
    Route::get('/wishlists', [FrontendController::class, 'wishlist'])->name('user.wishlist');
    Route::post('/add-to-wishlist', [FrontendController::class, 'addToWishlist'])->name('user.add-to-wishlist');
    Route::post('/remove-from-wishlist', [FrontendController::class, 'removeFromWishlist'])->name('user.remove-from-wishlist');

    //Cart
    Route::get('/cart-products', [FrontendController::class, 'cartProducts'])->name('user.cart-products');
    Route::post('/add-to-cart', [FrontendController::class, 'addToCart'])->name('user.add-to-cart');
    Route::post('/remove-from-cart', [FrontendController::class, 'removeFromCart'])->name('user.remove-from-cart');
    Route::post('/clear-cart', [FrontendController::class, 'clearCart'])->name('user.clear-cart');
    Route::post('/cart-increment', [FrontendController::class, 'cartIncrement'])->name('user.cart-increment');
    Route::post('/cart-decrement', [FrontendController::class, 'cartDecrement'])->name('user.cart-decrement');

    //Order place
    Route::post('/order-place', [FrontendController::class, 'orderPlace'])->name('user.place-order');
});
