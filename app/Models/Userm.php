<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prodm;
use App\Models\Orders;
use App\Models\Cart;

class Userm extends Model
{
    use AuthenticatableTrait;
    use HasFactory;

    //linking model with table

    protected $table = 'userm';
    protected $primarykey = 'userid';

  protected $fillable = [
        'profilephoto', // Add profilephoto here
        'fullname',
        'email',
        'password',
        'isactive',
        'usertype',
    ];

    
  /*    The attributes that should be hidden for arrays.
     
      @var array
     
    protected $hidden = [
        'password',
        'remember_token',
    ];*/ 
    public function cart()
{
    return $this->hasOne(Cart::class, 'user_id');
}   
}
