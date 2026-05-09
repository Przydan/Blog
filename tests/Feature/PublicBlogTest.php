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
        Post::factory()->published()->create([
            'title' => 'Published Post',
        ]);
        Post::factory()->draft()->create([
            'title' => 'Draft Post',
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

        Post::factory()->published()->create(['category_id' => $cat1->id, 'title' => 'Post 1']);
        Post::factory()->published()->create(['category_id' => $cat2->id, 'title' => 'Post 2']);

        $response = $this->get('/?category=cat1');

        $response->assertSee('Post 1');
        $response->assertDontSee('Post 2');
    }

    public function test_blog_filtering_by_tag(): void
    {
        $tag1 = Tag::factory()->create(['slug' => 'tag1']);
        $tag2 = Tag::factory()->create(['slug' => 'tag2']);

        $post1 = Post::factory()->published()->create(['title' => 'Post 1']);
        $post1->tags()->attach($tag1);

        $post2 = Post::factory()->published()->create(['title' => 'Post 2']);
        $post2->tags()->attach($tag2);

        $response = $this->get('/?tag=tag1');

        $response->assertSee('Post 1');
        $response->assertDontSee('Post 2');
    }

    public function test_can_view_single_post(): void
    {
        $post = Post::factory()->published()->create([
            'title' => 'Single Post',
            'slug' => 'single-post',
        ]);

        $response = $this->get('/posts/single-post');

        $response->assertStatus(200);
        $response->assertSee('Single Post');
    }

    public function test_cannot_view_draft_post(): void
    {
        Post::factory()->draft()->create([
            'slug' => 'draft-post',
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
