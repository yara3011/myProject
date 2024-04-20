<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    
    public function rules(): array
    {
        return [
            'category' => 'required',
            'sub_category' => 'required',
            'name_en' => 'required',
            'name_ar' => 'required',
            'manufacturing_country' => 'required',
            'logo_url' => 'required',
        ];
    }
}
