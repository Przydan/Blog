<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicBlogTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_displays_published_posts(): void
    {
        Post::factory()->create([
            'title' => 'Published Post',
            'published_at' => now(),
        ]);
        Post::factory()->create([
            'title' => 'Draft Post',
            'published_at' => null,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Published Post');
        $response->assertDontSee('Draft Post');
    }

    public function test_blog_filtering_by_category(): void
    {
        $cat1 = Category::factory()->create(['slug' => 'cat1']);
        $cat2 = Category::factory()->create(['slug' => 'cat2']);

        Post::factory()->create(['category_id' => $cat1->id, 'title' => 'Post 1', 'published_at' => now()]);
        Post::factory()->create(['category_id' => $cat2->id, 'title' => 'Post 2', 'published_at' => now()]);

        $response = $this->get('/?category=cat1');

        $response->assertSee('Post 1');
        $response->assertDontSee('Post 2');
    }

    public function test_blog_filtering_by_tag(): void
    {
        $tag1 = Tag::factory()->create(['slug' => 'tag1']);
        $tag2 = Tag::factory()->create(['slug' => 'tag2']);

        $post1 = Post::factory()->create(['title' => 'Post 1', 'published_at' => now()]);
        $post1->tags()->attach($tag1);

        $post2 = Post::factory()->create(['title' => 'Post 2', 'published_at' => now()]);
        $post2->tags()->attach($tag2);

        $response = $this->get('/?tag=tag1');

        $response->assertSee('Post 1');
        $response->assertDontSee('Post 2');
    }

    public function test_can_view_single_post(): void
    {
        $post = Post::factory()->create([
            'title' => 'Single Post',
            'slug' => 'single-post',
            'published_at' => now(),
        ]);

        $response = $this->get('/posts/single-post');

        $response->assertStatus(200);
        $response->assertSee('Single Post');
    }

    public function test_cannot_view_draft_post(): void
    {
        Post::factory()->create([
            'slug' => 'draft-post',
            'published_at' => null,
        ]);

        $response = $this->get('/posts/draft-post');

        $response->assertStatus(404);
    }

    public function test_custom_pages_load_successfully(): void
    {
        $this->get('/portfolio')->assertStatus(200);
        $this->get('/services')->assertStatus(200);
    }
}
