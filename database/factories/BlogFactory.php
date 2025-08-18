<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
         'title' => $this->faker->title(),
         'body' => $this->faker->paragraph(10, true),
         'category' => $this->faker->word(),
         'user_id' => User::factory(),
        ];
    }
}
