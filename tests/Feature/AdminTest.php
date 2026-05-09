<?php

namespace Tests\Feature;

use App\Enums\Role;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_administrator_can_access_user_management(): void
    {
        $admin = User::factory()->create(['role' => Role::Administrator]);
        $this->actingAs($admin);

        $this->get('/admin/users')->assertStatus(200);
    }

    public function test_author_cannot_access_user_management(): void
    {
        $author = User::factory()->create(['role' => Role::Author]);
        $this->actingAs($author);

        $this->get('/admin/users')->assertStatus(403);
    }

    public function test_administrator_can_create_user(): void
    {
        $admin = User::factory()->create(['role' => Role::Administrator]);
        $this->actingAs($admin);

        $response = $this->post('/admin/users', [
            'name' => 'New User',
            'email' => 'new@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => 'reader',
        ]);

        $this->assertDatabaseHas('users', ['email' => 'new@example.com']);
        $response->assertRedirect('/admin/users');
    }

    public function test_administrator_cannot_delete_self(): void
    {
        $admin = User::factory()->create(['role' => Role::Administrator]);
        $this->actingAs($admin);

        $response = $this->delete("/admin/users/{$admin->id}");

        $response->assertSessionHas('error');
        $this->assertDatabaseHas('users', ['id' => $admin->id]);
    }

    public function test_author_can_manage_posts(): void
    {
        $author = User::factory()->create(['role' => Role::Author]);
        $this->actingAs($author);

        $this->get('/admin/posts')->assertStatus(200);
        $this->get('/admin/posts/create')->assertStatus(200);
    }

    public function test_author_can_create_post(): void
    {
        $author = User::factory()->create(['role' => Role::Author]);
        $category = Category::factory()->create();
        $this->actingAs($author);

        $response = $this->post('/admin/posts', [
            'category_id' => $category->id,
            'title' => 'Test Post',
            'slug' => 'test-post',
            'description' => 'Short desc',
            'content' => 'Long content',
            'status' => 'published',
            'tags' => [],
        ]);

        $this->assertDatabaseHas('posts', ['slug' => 'test-post']);
        $response->assertRedirect('/admin/posts');
    }

    public function test_author_can_update_post_with_date(): void
    {
        $author = User::factory()->create(['role' => Role::Author]);
        $category = Category::factory()->create();
        $post = Post::factory()->create(['category_id' => $category->id]);
        $this->actingAs($author);

        $response = $this->put("/admin/posts/{$post->id}", [
            'category_id' => $category->id,
            'title' => 'Updated Title With Date',
            'slug' => 'updated-slug',
            'description' => 'Updated desc',
            'content' => 'Updated content',
            'status' => 'published',
            'published_at' => '2026-05-09T15:30',
            'tags' => [],
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'Updated Title With Date',
            'published_at' => '2026-05-09 15:30:00',
        ]);
        $response->assertRedirect('/admin/posts');
    }

    public function test_author_can_update_post_tags(): void
    {
        $author = User::factory()->create(['role' => Role::Author]);
        $category = Category::factory()->create();
        $post = Post::factory()->create(['category_id' => $category->id]);
        $tags = Tag::factory()->count(3)->create();
        $this->actingAs($author);

        $response = $this->put("/admin/posts/{$post->id}", [
            'category_id' => $category->id,
            'title' => 'Updated Title',
            'slug' => $post->slug,
            'description' => 'Updated desc',
            'content' => 'Updated content',
            'status' => 'published',
            'tags' => [$tags[0]->id, $tags[1]->id],
        ]);

        $this->assertDatabaseHas('posts', ['title' => 'Updated Title']);
        $this->assertEquals(2, $post->fresh()->tags()->count());
        $response->assertRedirect('/admin/posts');
    }
}
