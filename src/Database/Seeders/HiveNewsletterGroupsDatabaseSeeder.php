<?php

namespace Sixincode\HiveNewsletter\Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Provider\fr_FR\Text as TextFR;
use Sixincode\HiveHelpers\Traits\FieldsTrait;
use App\Models\User;
// use Sixincode\HivePosts\Models\Category;
// use Sixincode\HivePosts\Models\Tag;
use Sixincode\HiveNewsletter\Models\Newsletter;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @see \Sixincode\HiveNewsletter\HiveNewsletter
 */
class HiveNewsletterGroupsDatabaseSeeder extends Seeder
{
  use FieldsTrait;

  public function run()
  {
    $faker = \Faker\Factory::create();
    $fakerFR = \Faker\Factory::create('fr_FR');

    $users = User::all();
    $categories = Category::all();
    $tags = Tag::all();

    $newsletters = Newsletter::factory()->count(80)->for(
        User::factory(), 'owner'
    )->has(NewsletterSubscription::factory()->count(16), 'subscriptions')
     ->has(NewsletterInvitationTrait::factory()->count(6), 'invitations')
     ->create();

    // foreach(range(0, 28)  as $key => $value) {
    //     $post = Model::create([
    //            'name' => [
    //              'en'=> $faker->catchPhrase(),
    //              'fr'=> $faker->catchPhrase(),
    //            ],
    //            'description' => [
    //              'en'=> $faker->paragraphs(4, true),
    //              'fr'=> $fakerFR->paragraphs(4, true),
    //            ],
    //            self::globalUserFieldName() => $users->random()->slug,
    //      ]);
    //
    //      $post->categories()->syncWithoutDetaching($categories->random(4));
    //      $post->attachTags($tags->random(8));
   }

  }
}
