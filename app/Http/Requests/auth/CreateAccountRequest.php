<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            "firstname" => "required|string",
            "lastname" => "required|string",
            "email" => "required",
            "phone" => "required",
            "gender" => "required",
            "password" => "required"
        ];
    }
}
