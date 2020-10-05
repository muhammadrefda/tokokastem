<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kavist\RajaOngkir\Facades\RajaOngkir;

/**
 * @method static insert($dataKota)
 * @method static where(string $string, $id)
 * @method static orderBy(string $string)
 */
class City extends Model
{
//    protected $guarded = [];

    protected $table = 'cities';
    protected $fillable = [
        'province_id', 'city_id','title'
    ];

}
