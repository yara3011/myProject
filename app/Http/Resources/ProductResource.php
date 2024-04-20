<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
        'id' => $this->id,
        'name_en' => $this->name_en,    
        'namae_ar' => $this->name_ar,
        'manufactuer' =>$this->country,
        'status'=> $this->status,
        'logo'=> $this->logo,
        'category' => $this->category->category,
        'parent_category' => $this->category->parent->category,

    //     'category' => $this->category ? $this->category->category : null,
    //     'parent_category' => $this->category && $this->category->parent ? $this->category->parent->category : null,
    // ]; 
    //'parent_category' => $this->parent_category ? $this->parent_category->category : null,
    ];
    }
}
