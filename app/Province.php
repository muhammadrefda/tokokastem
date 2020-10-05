<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static insert($data)
 * @method static pluck(string $string, string $string1)
 * @method static create(array $array)
 */
class Province extends Model
{
//    protected $guarded = [];
    protected $table = 'provinces';
    protected $fillable = [
        'provinces_id', 'title'
    ];
}
