<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use App\Model\Bookable;

$suffix=
    [
        'Villa',
        'House',
        'Cottage',
        'Luxury Villas',
        'Cheap House',
        'Rooms',
        'Cheap Rooms',
        'Luxury Rooms',
        'fancy Rooms'
    ];


$factory->define(Bookable::class, function (Faker $faker) use ($suffix){
    return [
        'title'      => $faker->city() . ' ' . Arr::random($suffix),
        'description'=> $faker->text(),
        'price'      => random_int(15 ,600)
    ];
});
