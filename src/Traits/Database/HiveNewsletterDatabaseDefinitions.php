<?php

namespace Sixincode\HiveNewsletter\Traits\Database;

use Illuminate\Database\Schema\Blueprint;
use Sixincode\HiveHelpers\Traits\FieldsTrait;

trait HiveNewsletterDatabaseDefinitions
{
  public static function addNewsletterGroupsFields(Blueprint $table, $properties =[]): void
  {
    $table->addAlphaModelFields($table);
    $table->codeField();
    $table->referenceField();
    $table->string('url')->nullable()->unique();
    $table->isActiveField();
    $table->isDefaultField();
    $table->isFeaturedField();
    $table->isPrivateField();
    $table->sortOrderField();
    $table->morphToOwner();
  }

  // public static function addNewsletterRolesFields(Blueprint $table, $properties =[]): void
  // {
  //   $table->addAlphaModelFields($table);
  //   $table->codeField();
  //   $table->referenceField();
  //   $table->isActiveField();
  //   $table->isDefaultField();
  //   $table->isFeaturedField();
  //   $table->sortOrderField();
  //   $table->isPrivateField();
  //   $table->foreignId('newsletter_id');
  //
  //   $table->unique(['newsletter_id', 'id']);
  //
  // }

  public static function addNewsletterSubscriptionsFields(Blueprint $table, $properties =[]): void
  {
    $table->id();
    $table->foreignId('newsletter_id')->constrained()->cascadeOnDelete();
    // $table->string('role')->nullable();
    $table->string('email');
    $table->isActiveField();
    $table->timestamp('email_verified_at')->nullable();
    $table->globalField();
    $table->propertiesSchemaField();
    $table->dataSchemaField();
    $table->softDeletes();
    $table->timestamps();

    $table->unique(['newsletter_id', 'email']);
  }

  public static function addNewsletterInvitationsFields(Blueprint $table, $properties =[]): void
  {
    $table->id();
    $table->foreignId('newsletter_id')->constrained()->cascadeOnDelete();
    $table->string('email');
    // $table->string('role')->nullable();
    $table->foreignId('post_id')->nullable();
    $table->tinyInteger('status')->default(0);
    $table->codeField();
    $table->timestamps();

    $table->unique(['newsletter_id', 'email']);
  }
}
