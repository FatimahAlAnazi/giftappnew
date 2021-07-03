<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


     //relation with cart
     public function carts()
     {
         return $this->hasMany(Cart::class);
     }
}
