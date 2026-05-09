<?php

namespace Tests\Feature;

use App\Enums\Role;
use App\Models\Category;
use App\Models\PortfolioProject;
use App\Models\Post;
use App\Models\Service;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDeletionTest extends TestCase
{
    use RefreshDatabase;
    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create(['role' => Role::Administrator]);
        $this->actingAs($this->admin);
    }

    public function test_can_delete_user(): void
    {
        $user = User::factory()->create();
        $response = $this->delete(route('admin.users.destroy', $user));

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
        $response->assertRedirect(route('admin.users.index'));
    }

    public function test_can_delete_post(): void
    {
        $category = Category::factory()->create();
        $post = Post::factory()->create(['category_id' => $category->id]);
        $response = $this->delete(route('admin.posts.destroy', $post));

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
        $response->assertRedirect(route('admin.posts.index'));
    }

    public function test_can_delete_category(): void
    {
        $category = Category::factory()->create();
        $response = $this->delete(route('admin.categories.destroy', $category));

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
        $response->assertRedirect(route('admin.categories.index'));
    }

    public function test_can_delete_tag(): void
    {
        $tag = Tag::factory()->create();
        $response = $this->delete(route('admin.tags.destroy', $tag));

        $this->assertDatabaseMissing('tags', ['id' => $tag->id]);
        $response->assertRedirect(route('admin.tags.index'));
    }

    public function test_can_delete_portfolio_project(): void
    {
        $project = PortfolioProject::factory()->create([
            'title' => 'Test Project',
            'description' => 'Test Description',
        ]);
        $response = $this->delete(route('admin.portfolio.destroy', $project));

        $this->assertDatabaseMissing('portfolio_projects', ['id' => $project->id]);
        $response->assertRedirect(route('admin.portfolio.index'));
    }

    public function test_can_delete_service(): void
    {
        $service = Service::factory()->create([
            'title' => 'Test Service',
            'description' => 'Test Description',
        ]);
        $response = $this->delete(route('admin.services.destroy', $service));

        $this->assertDatabaseMissing('services', ['id' => $service->id]);
        $response->assertRedirect(route('admin.services.index'));
    }
}
