<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Bookable\BookableIndexResource;
use App\Http\Resources\Bookable\BookableShowResource;
use App\Model\Bookable;
use Illuminate\Http\Request;

class BookableController extends Controller
{
    public function index()
    {
        return BookableIndexResource::collection( Bookable::all());
    }
    
    public function show($id)
    {
        return new BookableShowResource( Bookable::findorFail($id));
    }
}
