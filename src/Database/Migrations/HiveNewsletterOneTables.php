<?php

namespace Sixincode\HiveNewsletter\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Sixincode\HiveNewsletter\Traits\Database\HiveNewsletterDatabaseDefinitions;

/**
 * @see \Sixincode\HiveNewsletter\HiveNewsletter
 */
class HiveNewsletterOneTables
{
  public static function up()
  {
      $tableNames  = config('hive-newsletter.table_names');
      $columnNames = config('hive-newsletter.column_names');

      if (empty($tableNames)) {
        throw new \Exception('Error: config/hive-newsletter.php not loaded. Run [php artisan config:clear] and try again.');
      }
      if (empty($columnNames)) {
        throw new \Exception('Error: config/hive-newsletter.php not loaded. Run [php artisan config:clear] and try again.');
      }

      if(!Schema::hasTable($tableNames['newsletterGroups'])) {
        Schema::create($tableNames['newsletterGroups'], function (Blueprint $table) {
          $table->addNewsletterGroupsFields($table);
        });
      }

      // if(!Schema::hasTable($tableNames['newsletterRoles'])) {
      //   Schema::create($tableNames['newsletterRoles'], function (Blueprint $table) {
      //     $table->addNewsletterRolesFields($table);
      //   });
      // }

      if(!Schema::hasTable($tableNames['newsletterInvitations'])) {
        Schema::create($tableNames['newsletterInvitations'], function (Blueprint $table) {
          $table->addNewsletterInvitationsFields($table);
        });
      }

      if(!Schema::hasTable($tableNames['newsletterSubscriptions'])) {
        Schema::create($tableNames['newsletterSubscriptions'], function (Blueprint $table) {
          $table->addNewsletterSubscriptionsFields($table);
        });
      }

  }

  public static function down()
  {
      $tableNames  = config('hive-newsletter.table_names');
      $columnNames = config('hive-newsletter.column_names');

      if (empty($tableNames)) {
        throw new \Exception('Error: config/hive-newsletter.php not loaded. Run [php artisan config:clear] and try again.');
      }
      if (empty($columnNames)) {
        throw new \Exception('Error: config/hive-newsletter.php not loaded. Run [php artisan config:clear] and try again.');
      }

      Schema::dropIfExists($tableNames['newsletterSubscriptions']);
      Schema::dropIfExists($tableNames['newsletterInvitations']);
      // Schema::dropIfExists($tableNames['newsletterRoles']);
      Schema::dropIfExists($tableNames['newsletterGroups']);
  }
}
