<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

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
  public function definition()
  {
    return [
      'title' => $this->faker->sentence,
      'description' => $this->faker->paragraph,
      'image' => $this->faker->uuid() . '.jpg',
      'user_id' => $this->faker->numberBetween(1, 3),
    ];
  }
}
