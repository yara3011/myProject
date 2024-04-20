<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
  public function savedProducts()
    {
      return $this->belongsToMany(User::class, 'user_list', 'user_id', 'product_id')->withTimestamps();
    }

    public function category(){
      return $this->belongsTo(Category::class,'category_id');
      }
 

     public function alternatives(){
       return $this->belongsToMany(Product::class, 'product_alternative', 'product_id', 'alternative');
       }
      

    use HasFactory;


    protected $fillable = [
      'category_id',
      'name_en',
      'name_ar',
      'country',
      'logo',
      'status',
    ];
}
