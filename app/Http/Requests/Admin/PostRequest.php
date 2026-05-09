<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $postId = $this->route('post')?->id;

        return [
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255', 'unique:posts,title,'.$postId],
            'slug' => ['required', 'string', 'max:255', 'unique:posts,slug,'.$postId],
            'description' => ['required', 'string'],
            'content' => ['required', 'string'],
            'image_path' => ['nullable', 'string'],
            'published_at' => ['nullable', 'date'],
            'status' => ['required', 'string', 'in:draft,published,deleted'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ];
    }
}
