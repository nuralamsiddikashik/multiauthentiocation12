<?php
namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone'    => 'nullable|string',
            'address'  => 'nullable|string',
            'state'    => 'nullable|string',
            'city'     => 'nullable|string',
            'zip'      => 'nullable|string',
        ];
    }
}