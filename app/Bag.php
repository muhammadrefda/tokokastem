<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity',
        'design',
        'size',
        'material',
        'note',
        'proof_of_transaction',
        'status',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
