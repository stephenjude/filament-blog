<?php

namespace Illusive\Blog\Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illusive\Blog\Models\Author;
use Illusive\Blog\Models\Category;
use Illusive\Blog\Models\Post;

class PostFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Post::class;

    public function definition(): array
    {
//        return [
//            'title' => $title = $this->faker->unique()->sentence(4),
//            'slug' => Str::slug($title),
//            'content' => $this->faker->realText(),
//            'published_at' => $this->faker->dateTimeBetween('-6 month', '+1 month'),
//            'created_at' => $this->faker->dateTimeBetween('-1 year', '-6 month'),
//            'updated_at' => $this->faker->dateTimeBetween('-5 month', 'now'),
//        ];

        return [
            'blog_author_id' => Author::factory(),
            'blog_category_id' => Category::factory(),
            'title' => $title = $this->faker->unique()->sentence(4),
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->words(10),
            'content' => $this->faker->paragraph,
            'published_at' => $this->faker->dateTimeBetween('-6 month', '+1 month'),
            'created_at' => $this->faker->dateTimeBetween('-1 year', '-6 month'),
            'updated_at' => $this->faker->dateTimeBetween('-5 month', 'now'),
        ];
    }
}
