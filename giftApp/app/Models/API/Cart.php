<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'user_id', 'gift_id',
    ];

    //relation with category
    public function categorys()
    {
    	return $this->belongsTo(Category::class);
    } 


}
