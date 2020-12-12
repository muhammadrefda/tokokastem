<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($product)
 * @method static where(string $string, int $id)
 * @method static create(array $all)
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
        'backpack_weight',
//        'shipping_address_id',
];

//    public function order_details()
//    {
//        return $this->hasMany('App\OrderDetails','product_id','id');
//    }

//    public function shipping_address(){
//        return $this->belongsTo(ShippingAddress::class,'shipping_address_id');
//    }


    public function getTotalAttributes(){
        return $this->quantity * $this->price_fabric + $this->unique_code;
    }

    public function getMaskTotalAttributes(){
        return $this->quantity * $this->price_mask + $this->unique_code;
    }

    public function getTotebagTotalAttributes(){
        return $this->quantity * $this->price_totebag + $this->unique_code;
    }

    public function getTshirtTotalAttributes(){
        return $this->quantity * $this->price_tshirt + $this->unique_code;
    }

    public function getMugTotalAttributes(){
        return $this->quantity * $this->price_mug + $this->unique_code;
    }

    public function getBagTotalAttributes(){
        return $this->quantity * $this->price_backpack + $this->unique_code;
    }

    public function specifics(){
        return $this->hasManyThrough(User::class, ShippingAddress::class, 'user_id');
    }
}
