<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prodm;
use App\Models\Userm;
use App\Models\Cart;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = ['userid', 'proid', 'quantity'];

    public function user()
    {
        return $this->belongsTo(Userm::class,'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Prodm::class,'product_id');
    }
}
