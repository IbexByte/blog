<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        $startDate = Carbon::create(2023, 1, 1, 0, 0, 0); // Start date
        $endDate = Carbon::create(2023, 12, 31, 23, 59, 59); // End date
        return [
            'title' => fake()->realText(20),
            'body' => fake()->realText(600),
            'author' => fake()->name(),
            'created_at' =>  fake()->dateTimeBetween($startDate, $endDate),
            'updated_at' => fake()->dateTimeBetween($startDate, $endDate),
        ];
    }
}
