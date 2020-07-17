<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($product)
 * @method static pluck()
 * @property mixed image
 */
class Product extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'stock',
        'size',
        'status',
        'category',
    ];
}
