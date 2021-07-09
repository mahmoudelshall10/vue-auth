<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    // protected $fillable = 
    //     [
    //     "first_names" ,
    //     "last_name",
    //     "email",
    //     "street",
    //     "city",
    //     "country",
    //     "state",
    //     "zip"
    //     ];
    
    protected $guarded = ['id'];
}
