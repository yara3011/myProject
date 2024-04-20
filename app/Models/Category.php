<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function products(){
        return $this->hasMany(Products::class);

    }
    public function children(){
        return $this->hasMany(Category::class, 'parent_category');

    }
      public function parent(){
        return $this->belongsTo(Category::class,'parent_category');

    }
    // public function getSubCategoryAttribute()
    // {
    //     return $this->children->map->only(['category_id', 'parent_category']);
    // }

    use HasFactory;
    protected $fillable =[
        'category',
        'parent_category'
    ];
}
