<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuggestResource extends JsonResource
{
   /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_condition' => $this->product_condition,
            'product_name_ar' => $this->product_name_ar,
            'product_name_en' => $this->product_name_en,
            'manufacturer_company' => $this->manufacturer_company,
            'phone_num' => $this->phone_num,
            'status'  => $this->status
        ] ;
    }
}
