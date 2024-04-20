<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suggestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_condition', 
        'product_name_ar',
        'product_name_en',
        'manufacturer_company',
        'phone_num',
        'status',
    ];
}
