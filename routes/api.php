<?php

use App\Model\Bookable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['namespace'=> 'Api\\'] , function(){
    Route::apiResource('bookables','BookableController')->only(['index','show']);
    
    Route::get('bookables/{bookable}/availability', 'BookableAvailabilityController')
        ->name('bookables.availability.show');

    Route::get('bookables/{bookable}/reviews', 'BookableReviewController')
        ->name('bookables.reviews.index');

    Route::get('/booking-by-review/{review_key}','BookingByReviewController')
        ->name('booking.by-review.show');

    Route::get('bookables/{bookable}/price', 'BookablePriceController')
        ->name('bookables.price.show');

    Route::apiResource('reviews','ReviewController')->only(['show','store']);

    Route::post('checkout','CheckoutController')->name('checkout');
});