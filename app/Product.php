<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($product)
 * @method static where(string $string, int $id)
 * @method static create(array $all)
 * @property mixed image
 * @property mixed material
 */
class Product extends Model
{
    const price_fabric = 10000;
    const price_backpack = 50000;

    const price_mask = 5000;


    /**
     * @var string[]
     */
    protected $fillable = [
        'unique_code',
        'quantity',
        'design_left_mask',
        'design_right_mask',
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
        'weigth',
//        'ongkir',

];
//    public function displayFabricPrice(){
//        return $this->price_fabric == Product::price_fabric;
//    }

    public function order_details()
    {
        return $this->hasMany('App\OrderDetails','product_id','id');
    }

    public function getTotalAttributes(){
        return $this->quantity * $this->price_fabric + $this->unique_code;
    }


    //qty * 5000 GRAM
    public function getFabricWeightTotal(){
        return $this->quantity * 5000;
    }

    public function getBagTotalAttributes(){
        return $this->quantity * $this->price_backpack + $this->unique_code;
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
}
