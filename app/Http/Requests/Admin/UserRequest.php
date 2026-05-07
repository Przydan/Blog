<?php

namespace App\Http\Requests\Admin;

use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('user')?->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$userId],
            'password' => [$this->isMethod('POST') ? ['required', 'confirmed', Password::defaults()] : ['nullable', 'confirmed']],
            'role' => ['required', 'string', 'in:'.implode(',', array_column(Role::cases(), 'value'))],
        ];
    }
}
