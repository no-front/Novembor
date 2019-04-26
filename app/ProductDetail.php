<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    // use Notifiable;

    public $table = "tbl_product_detail";
    public $primaryKey = "productDetailID";

    protected $fillable = [
        'productID', 
        'detail'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password'
    // ];
}