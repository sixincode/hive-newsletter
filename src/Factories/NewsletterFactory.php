<?php

namespace Sixincode\HiveNewsletter\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class NewsletterFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
      $users = User::all();
      return [
          'name'           => $this->faker->title(),
          'description'    => $this->faker->unique()->realText(600,4),
          'code'           => '',
          'reference'      => 'newsletter',
          'url'            => $this->faker->unique()->url,
          'owner_id'       => '',
          'owner_type'     => '',
          // 'user_global'    => $users->random()->global,
      ];
  }

}
