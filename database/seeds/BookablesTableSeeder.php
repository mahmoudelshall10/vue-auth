<?php

use Illuminate\Database\Seeder;
use App\Model\Bookable;

class BookablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Bookable::class,100)->create();
    }
}
