<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($product)
 * @method static pluck()
 * @method static where(string $string, int $id)
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
        'material',
        'stock',
        'size',
        'status',
        'category',
    ];
}
