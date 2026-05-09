<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController
{
    public function show(string $slug): View
    {
        $post = Post::published()->where('slug', $slug)->first();

        if (! $post) {
            throw new NotFoundHttpException('Post not found.');
        }

        return view('blog.show', compact('post'));
    }
}
