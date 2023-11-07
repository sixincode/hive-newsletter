<?php

namespace Sixincode\HiveNewsletter\Traits\Database;

use Sixincode\HiveNewsletter\Database\Seeders as Seeders;

trait HiveNewsletterSeedersTrait
{
  public function seedAll(): void
  {
    \HiveAlpha::seed();
    $thid->seed();
    // $thid->seedTwo();
    // $thid->seedthree();

  }

  public function seed(): void
  {
    $seeder = new Seeders\HiveNewsletterDatabaseSeeder;
    $seeder->run();
  }

}
