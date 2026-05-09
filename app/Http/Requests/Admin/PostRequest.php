<?php

namespace App\Http\Requests\Admin;

use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $post = $this->route('post');
        $postId = $post instanceof Post ? $post->id : $post;

        return [
            'category_id' => ['required', 'exists:categories,id'],
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('posts', 'title')->ignore($postId),
            ],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('posts', 'slug')->ignore($postId),
            ],
            'description' => ['required', 'string'],
            'content' => ['required', 'string'],
            'image_path' => ['nullable', 'string', 'max:2048'],
            'published_at' => ['nullable', 'date'],
            'status' => ['required', Rule::enum(PostStatus::class)],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('published_at')) {
            $this->merge([
                'published_at' => $this->published_at ? str_replace('T', ' ', $this->published_at) : null,
            ]);
        }
    }
}
