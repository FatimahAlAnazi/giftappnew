<?php

namespace App\Models\WEB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $guarded = [];

   

    protected $faillable =[  

    'category_id',  
    ('name'),
    'product_image',
    ('description'),
    ('price'),
    ('discount'),
    ('stock'),
    ('color'),
    ('warp_paper'),
    ('card'),
    
];


}
