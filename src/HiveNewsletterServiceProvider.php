<?php

namespace Sixincode\HiveNewsletter;

use Sixincode\ModulesInit\Package;
use Sixincode\ModulesInit\PackageServiceProvider;
use Sixincode\HiveNewsletter\Commands\HiveNewsletterCommand;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use Sixincode\HiveNewsletter\Traits\Database as DatabaseTraits;
use Illuminate\Database\Schema\Blueprint;

class HiveNewsletterServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/sixincode/hive-template
         */
        $package
            ->name('hive-newsletter')
            ->hasConfigFile(['hive-newsletter','hive-newsletter-components','hive-newsletter-features','hive-newsletter-layouts','hive-newsletter-middlewares','hive-newsletter-views'])
            ->hasViews()
            ->hasAssets()
            ->hasTranslations()
            ->hasBladeComponents()
            // ->hasLayouts()
            // ->hasIcons()
            ->hasRoutes(['web','api','admin','user'])
            ->hasMigration('create_hive-newsletter_table')
            // ->runsMigrations()
            ->hasCommand(HiveNewsletterCommand::class);

          $this->registerHiveNewsletterDatabaseMethods();
    }

    private function registerHiveNewsletterDatabaseMethods(): void
    {
      Blueprint::macro('addNewsletterGroupsFields', function (Blueprint $table, $properties = []) {
        DatabaseTraits\HiveNewsletterDatabaseDefinitions::addNewsletterGroupsFields($table, $properties);
      });

      // Blueprint::macro('addNewsletterRolesFields', function (Blueprint $table, $properties = []) {
      //   DatabaseTraits\HiveNewsletterDatabaseDefinitions::addNewsletterRolesFields($table, $properties);
      // });

      Blueprint::macro('addNewsletterSubscriptionsFields', function (Blueprint $table, $properties = []) {
        DatabaseTraits\HiveNewsletterDatabaseDefinitions::addNewsletterSubscriptionsFields($table, $properties);
      });

      Blueprint::macro('addNewsletterInvitationsFields', function (Blueprint $table, $properties = []) {
        DatabaseTraits\HiveNewsletterDatabaseDefinitions::addNewsletterInvitationsFields($table, $properties);
      });
    }
}
