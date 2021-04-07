<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $fillable = [
        'id_member','name', 'price', 'category','brand','sale','num_sale','namecompany','detail','image'
    ];
}
