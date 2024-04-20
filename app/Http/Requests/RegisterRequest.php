<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;


class RegisterRequest extends FormRequest
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
                'name' => 'required|string|unique:users',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'gender' => 'required|string|in:male,female',
                'dob' => 'required|date',///I CAN USE FORMAT FOR DATE LIKE: ..date_format:d-m-Y
        ];
    }
}
