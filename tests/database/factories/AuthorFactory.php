<?php

namespace Illusive\Blog\Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illusive\Blog\Models\Author;

class AuthorFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Author::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'bio' => $this->faker->realTextBetween(),
            'github_handle' => $this->faker->userName(),
            'twitter_handle' => $this->faker->userName(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', '-6 month'),
            'updated_at' => $this->faker->dateTimeBetween('-5 month', 'now'),
        ];
    }
}
