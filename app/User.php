<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static findOrFail($id)
 * @method static create(array $val)
 */
class User extends Authenticatable
{
    use Notifiable;


//    public $table ='users';
        protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone_number',
        'is_admin',
        'alamat_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany('App\Order','user_id','id');
    }



//    public function transactions(){
//        return $this->hasMany(Transaction::class,'user_id');
//    }

//    public function bags(){
//
//        return $this->hasMany(Bag::class);
//    }

//    public function fabrics(){
//
//        return $this->hasMany(Fabric::class);
//    }

//    public function masks(){
//
//        return $this->hasMany(Mask::class);
//    }
//
//    public function mugs(){
//
//        return $this->hasMany(Mug::class);
//    }
//
//    public function totebags(){
//
//        return $this->hasMany(Totebag::class);
//    }
//
//    public function tshirts(){
//
//        return $this->hasMany(Tshirt::class);
//    }
}
