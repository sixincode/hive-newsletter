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
use Sixincode\HiveNewsletter\Models\NewsletterInvitation;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @see \Sixincode\HiveNewsletter\HiveNewsletter
 */
class HiveNewsletterDefaultDatabaseSeeder extends Seeder
{
  use FieldsTrait;

  public function run()
  {
    // $users = User::all();
    // foreach($users as $user) {
    //   $newsletters = Newsletter::factory()->for(
    //         $user, 'owner'
    //     )->hasSubscriptions(6,function (array $attributes, Newsletter $newsletter) {
    //                 return ['newsletter_id' => $newsletter->id];
    //             })
    //      ->hasInvitations(4,function (array $attributes, Newsletter $newsletter) {
    //                 return ['newsletter_id' => $newsletter->id];
    //            })
    //     ->count(4)
    //     ->create();
    // }

    $user = User::whereUsername('admin')->first();
    $newsletter = $user->ownedNewsletters()->create([
       'name'         => [
          'en'    => 'Sign up to our newsletter',
          'fr'    => 'Abonnez-vous à notre lettre d\'information',
       ],
       'description'  => [
          'en'    => 'Get notify about our latest news, upcoming events and more.',
          'fr'    => 'Soyez informé de nos dernières nouvelles, des événements à venir et plus encore.',
       ],
       'slug'         => 'main_newsletter',
       'code'         => 'main_newsletter',
       'reference'    => 'newsletter',
    ]);

   }
}
