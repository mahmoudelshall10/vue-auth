<?php

use App\Model\Bookable;
use App\Model\Review;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookable::all()->each(function (Bookable $bookable){
            $reviews = factory(Review::class , random_int(5, 30))->make();

            $bookable->reviews()->saveMany($reviews);
            
        });
    }
}
