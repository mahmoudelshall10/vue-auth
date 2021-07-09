<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Address;
use App\Model\Bookable;
use App\Model\Booking;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'customer.first_names'   => 'required|string|min:2',
            'customer.last_name'     => 'required|string|min:2',
            'customer.street'        => 'required|string|min:2',
            'customer.email'         => 'required|email',
            'customer.city'          => 'required|string|min:2',
            'customer.country'       => 'required|string|min:2',
            'customer.state'         => 'required|string|min:2',
            'customer.zip'           => 'required|string|min:2',

            'bookings'               => 'required|array|min:1',
            'bookings.*.bookable_id' => 'required|integer|exists:bookables,id',
            'bookings.*.from'        => 'required|date_format:Y-m-d|after_or_equal:now',
            'bookings.*.to'          => 'required|date_format:Y-m-d|after_or_equal:bookings.*.from'

        ]);

        $data = array_merge($data, $request->validate([
            'bookings.*' =>['required', function ($attribute,$value,$fail){
                $bookable  = Bookable::findOrFail($value['bookable_id']);

                if(!$bookable->availableFor($value['from'],$value['to'])){
                    $fail("The object is not available in given dates");
                }

            }]
        ]));
        
        $bookingsData = $data['bookings'];
        $addressData = $data['customer'];

        $bookings = collect($bookingsData)->map( function($bookingData) use ($addressData){
            $bookable = Bookable::findOrFail($bookingData['bookable_id']);
            
            $booking = new Booking();
            $booking->from = $bookingData['from'];
            $booking->to = $bookingData['to'];
            $booking->price = $bookable->priceFor($booking->from,$booking->to)['total'];
            $booking->bookable()->associate($bookable);
            $booking->address()->associate(Address::create($addressData));

            $booking->save();

            return $booking;

        });

        return $bookings;


    }
}
