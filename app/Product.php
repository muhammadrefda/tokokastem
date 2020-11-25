<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($product)
 * @method static where(string $string, int $id)
 * @method static create(array $all)
 * @property mixed image
 * @property mixed material
 * @property float|int|mixed total
 */
class Product extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'unique_code',
        'quantity',
        'design_mask',
        'design_front_totebag',
        'design_back_totebag',
        'design_front_tshirt',
        'design_back_tshirt',
        'design_front_mug',
        'design_back_mug',
        'design_backpack',
        'link_goggle_drive',
        'type_fabric',
        'length_fabric',
        'width_fabric',
        'category',
        'size',
        'material',
        'note',
        'proof_of_transaction',
        'status',
        'user_id',
        'price_fabric',
        'price_mask',
        'price_mug',
        'price_totebag',
        'price_tshirt',
        'price_backpack',
        'total',
        'fabric_weight',
        'mask_weight',
        'mug_weight',
        'totebag_weight',
        'tshirt_weight',
        'backpack_weight'
];

    public function order_details()
    {
        return $this->hasMany('App\OrderDetails','product_id','id');
    }

    public function getTotalAttributes(){
        return $this->quantity * $this->price_fabric + $this->unique_code;
    }
}
