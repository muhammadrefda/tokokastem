<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $table = 'shipping_address';
    protected $fillable = ['user_id','cities_id','detail','courier_code'];
    public function courier()
    {
        return $this->hasOne('App\Courier','courier_code','code');
    }

    public function getCourier(){
        return $this->courier_code;
    }

    public function product(){
        return $this->hasMany('App\Product','shipping_address_id');
    }

}
