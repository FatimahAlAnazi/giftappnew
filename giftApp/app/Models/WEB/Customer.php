<?php

namespace App\Models\WEB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    protected $primaryKey = ['Id'];

    protected $faillable =[  
   
        'customer_name', 	'location', 	'number_of_orders', 	'total_spending', 

    ];









}


