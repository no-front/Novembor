<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public $table = "tbl_order";
    public $primaryKey = "orderID";

    protected $fillable = [
        'userID', 
        'locationID', 
        'phone', 
        'totalPrice',
        'firebaseID'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
