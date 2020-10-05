<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $table = 'shipping_address';
    protected $fillable = ['user_id','cities_id','detail'];
}
