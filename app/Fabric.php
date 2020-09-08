<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity',
        'link_goggle_drive',
        'type',
        'length',
        'width',
        'note',
        'proof_of_transaction',
        'status',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
