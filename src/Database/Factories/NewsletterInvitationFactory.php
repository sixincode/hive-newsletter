<?php

namespace Sixincode\HiveNewsletter\Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Sixincode\HiveNewsletter\Models\Newsletter;
use Sixincode\HiveNewsletter\Models\NewsletterInvitation;

class NewsletterInvitationFactory extends Factory
{
  protected $model = NewsletterInvitation::class;

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
          // 'user_global'    => $users->random()->global,
      ];
  }

}
