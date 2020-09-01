<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $attributes = [
        'status' => 'pending',
    ];

    protected $fillable = [
        'quantity',
        'total',
        'status',
//        'customer_phone',
//        'customer_province',
//        'customer_city',
//        'customer_district',
//        'customer_address',
//        'customer_postal_code',
//        'proof_of_transaction',
        'product_id',
    ];

    public function product (){
        return $this->hasMany(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
