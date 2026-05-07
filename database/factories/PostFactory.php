<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(5);

        return [
            'category_id' => Category::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(2),
            'content' => $this->faker->paragraphs(5, true),
            'image_path' => 'https://picsum.photos/600/400?random='.$this->faker->numberBetween(1, 1000),
            'published_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
