<?php

namespace Sixincode\HiveNewsletter\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class NewsletterSubscriptionFactory extends Factory
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
          'newsletter_id'  => Newsletter::factory(),
          'email'          => $this->faker->unique()->email,
          'email_verified_at'  => now(),
          // 'user_global'    => $users->random()->global,
      ];
  }

}
