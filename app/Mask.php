<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mask extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity',
        'design_left',
        'design_right',
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
