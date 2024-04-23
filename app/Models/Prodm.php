<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Userm;
use App\Models\Orders;
use App\Models\Cart;

class Prodm extends Model
{
    use HasFactory;
    
    protected $table = 'prodm';
    protected $primaryKey = 'proid';
    protected $fillable = ['instock','prodphoto', 'proname', 'brand', 'color', 'original_price', 'discounted_price', 'description'];
    public $incrementing = false;
    
    public function orders()
    {
        return $this->hasMany(Orders::class, 'product_id', 'proid');
    }
    
    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }
}
