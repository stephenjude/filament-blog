<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illusive\Blog\Models\Author;
use Illusive\Blog\Models\Category;
use Illusive\Blog\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->words(4);

        return [
            'blog_author_id' => Author::factory(),
            'blog_category_id' => Category::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->words(10),
            'content' => $this->faker->paragraph,
            'published_at' => now(),
        ];
    }
}
