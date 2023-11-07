<?php

namespace Sixincode\HiveNewsletter\Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * @see \Sixincode\HiveNewsletter\HiveNewsletter
 */
class HiveNewsletterDatabaseSeeder extends Seeder
{
  public function run()
  {
    $this->call([
      HiveNewsletterGroupsDatabaseSeeder::class,
    ]);
  }
}
