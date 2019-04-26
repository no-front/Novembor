<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{

    public $table = "tbl_order_detail";
    public $primaryKey = "orderDetailID";

    protected $fillable = [
        'orderID', 
        'productID',
        'total'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
