<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['nullable', 'string'],
            'details' => ['nullable', 'string'],
        ];
    }

    protected function passedValidation()
    {
        if ($this->has('details')) {
            $this->merge([
                'details' => array_map('trim', explode(',', $this->details)),
            ]);
        }

        return parent::passedValidation();
    }
}
