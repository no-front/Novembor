<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    public $table = "tbl_location";
    public $primaryKey = "locationID";

    protected $fillable = [
        'userID', 
        'name', 
        'home_apartment', 
        'latitude', 
        'longtitude'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
