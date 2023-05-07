<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'role' => 'required',
            'name' => 'required|string|max:255',
            'permissions' => 'required|array|min:1',
        ];
    }
}
