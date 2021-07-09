<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Booking\BookingByReviewShowResource;
use App\Model\Booking;
use Illuminate\Http\Request;

class BookingByReviewController extends Controller
{
    public function __invoke($review_key, Request $request)
    {
        $booking = Booking::findByReviewKey($review_key);
        return $booking ? new BookingByReviewShowResource($booking) : abort(404);
    }
}
