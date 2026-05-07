<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $tagId = $this->route('tag')?->id;

        return [
            'name' => ['required', 'string', 'max:255', 'unique:tags,name,'.$tagId],
            'slug' => ['required', 'string', 'max:255', 'unique:tags,slug,'.$tagId],
        ];
    }
}
