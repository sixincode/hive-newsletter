<?php

namespace Sixincode\HiveNewsletter\Traits\Database;

use Sixincode\HiveNewsletter\Database\Migrations as Migrations;

trait HiveNewsletterMigrationsTrait
{
  public function migrateUp(): void
  {
    $this->migrateHiveNewsletterOneUp();
    // $this->migrateHiveNewsletterTwoUp();
    // $this->migrateHiveNewsletterThreeUp();
  }

  public function migrateUpAll(): void
  {
    \HiveAlpha::migrateUp();
    // \HiveStream::migrateUp();
    // \HivePosts::migrateUp();
    // \HiveCalendar::migrateUp();
    $this->migrateUp();
  }

  public function migrateDown(): void
  {
    $this->migrateHiveNewsletterOneDown();
    // $this->migrateHiveNewsletterTwoDown();
    // $this->migrateHiveNewsletterThreeDown();
  }

  public function migrateDownAll(): void
  {
    // \HiveCalendar::migrateDown();
    // \HivePosts::migrateDown();
    // \HiveStream::migrateDown();
    \HiveAlpha::migrateDown();
    $this->migrateDown();
  }

  public function migrateHiveNewsletterOneUp(): void
  {
    $migration = new Migrations\HiveNewsletterOneTables;
    $migration->up();
  }

  public function migrateHiveNewsletterOneDown(): void
  {
    $migration = new Migrations\HiveNewsletterOneTables;
    $migration->down();
  }
}
