<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class Bookable extends Model
{
    protected $fillable = ['title','description','price'];

      /**
     * Get all of the comments for the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function availableFor($from , $to):bool
    {
        return 0 === $this->bookings()->BetweenDates($from,$to)->count();
    }

    public function priceFor($from , $to): array
    {
        $days = (new Carbon($from))->diffInDays(new Carbon($to)) + 1;
        $price = $days * $this->price;

        return [
            'total'     => $price,
            'breakdown' => [
                $this->price => $days
            ] 
        ];
    }
}
