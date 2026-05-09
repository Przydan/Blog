<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController
{
    public function home(Request $request): View
    {
        $query = Post::published()->orderBy('published_at', 'desc');

        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->has('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }

        $posts = $query->paginate(9);
        $categories = Category::all();
        $tags = Tag::all();

        return view('blog.home', compact('posts', 'categories', 'tags'));
    }
}
