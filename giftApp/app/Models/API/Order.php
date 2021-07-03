<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


     //relation with user
     public function users()
     {
         return $this->hasMany(user::class);
     }
}
