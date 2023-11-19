<?php

namespace Sixincode\HiveNewsletter\Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Sixincode\HiveNewsletter\Models\Newsletter;

class NewsletterFactory extends Factory
{
  protected $model = Newsletter::class;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
      $faker = \Faker\Factory::create();
      $users = User::all();
      return [
          'name'           => $faker->catchPhrase(),
          'description'    => $faker->unique()->realText(600,4),
          'code'           => '',
          'reference'      => 'newsletter',
          'url'            => $this->faker->unique()->url,
          // 'owner_id'       => '',
          // 'owner_type'     => '',
          // 'user_global'    => $users->random()->global,
      ];
  }

}
