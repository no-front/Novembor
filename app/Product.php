<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use Notifiable;

    public $table = "tbl_product";
    public $primaryKey = "productID";

    protected $fillable = [
        'productTypeID', 
        'name', 
        'price', 
        'image'
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