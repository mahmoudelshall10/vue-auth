<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Bookable\BookableReviewIndexResource;
use App\Model\Bookable;
use Illuminate\Http\Request;
use App\Model\Review;

class BookableReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, Request $request)
    {
        $bookable = Bookable::findorFail($id);
        
        return BookableReviewIndexResource::collection(
            $bookable->reviews()->latest()->get()
        );
    }
}
