<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        $dob = Carbon::parse($this->dob);
        $age = $dob->diffInYears(Carbon::now());

        return [
            'name' => $this->name,
            'email' => $this->email,
            'gender'=> $this->gender,
            'dob'=> $this->dob,
            'age'=>$age,
            'is_admin' => $this ->is_admin
        ];
    }
}
