<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreAddress extends Model
{
    protected $table = 'alamat_toko';
    protected $fillable = [
        'city_id'
    ];

}
