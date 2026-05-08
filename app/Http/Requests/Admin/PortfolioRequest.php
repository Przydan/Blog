<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
            'image_path' => ['nullable', 'string'],
            'link' => ['nullable', 'string'],
            'technologies' => ['nullable', 'string'],
        ];
    }

    protected function passedValidation()
    {
        if ($this->has('technologies')) {
            $this->merge([
                'technologies' => array_map('trim', explode(',', $this->technologies)),
            ]);
        }
        return parent::passedValidation();
    }
}
