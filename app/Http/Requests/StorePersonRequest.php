<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:people,email',
            'dni' => 'required|string|max:20|unique:people,dni',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'parish' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'voting_center' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ];
    }
}
