<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($product)
 * @method static where(string $string, int $id)
 * @method static create(array $all)
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
        'link_image',
        'category',
        'material',
//        'stock',
        'size',
        'status',
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }
}
