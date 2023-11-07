<?php

namespace Sixincode\HiveNewsletter\Models;

use Sixincode\HiveNewsletter\Traits\IsNewsletter;
use Sixincode\HiveNewsletter\Factories\NewsletterFactory;
use Sixincode\HiveAlpha\Traits\HiveModelTraits;
use Sixincode\HivePosts\Traits as HivePostsTraits;
use Sixincode\HiveHelpers\Traits as HelperTraits;
use Illuminate\Support\Str;

class Newsletter extends IsNewsletter
{
  use HiveModelTraits;
  use HelperTraits\HasCodeTrait;
  use HelperTraits\HasReferenceTrait;
  use HelperTraits\IsActiveTrait;
  use HelperTraits\IsDefaultTrait;
  use HelperTraits\IsFeaturedTrait;
  use HelperTraits\IsPrivateTrait;
  use HelperTraits\SortOrderTrait;
  use HivePostsTraits\HasCategories;
  use HivePostsTraits\HasTags;
  use HasFactory;

  protected $with = ['categories', 'tags'];

  public function __construct()
  {
    parent::__construct();
    $this->filterable[] = 'url';
    $this->fillable[] = 'url';
    $this->appends[] = 'short_name';
  }

  public $translatable = [];
  public $filterable = [];
  public $orderable = [];

  public function getTable()
  {
    return config('hive-newsletter.table_names.newsletterGroups');
  }

  public function getShortNameAttribute()
  {
    return Str::limit($this->name,16,'...') ;
  }

  public function getDetailsAttributes()
  {
    return [
      "name"         => $this->name,
      "description"  => $this->description,
      "body"         => $this->content,
      "icon"         => "newsletter",
      "url"          => $this->url,
      "created_at"   => $this->created_at->diffForHumans(),
      "modified_at"  => $this->modified_at,
    ];
  }

  public function getForeignKey()
  {
      return 'id';
  }

  public static function slugOriginElement()
  {
    return 'name'.now();
  }

  public function getRouteKeyName()
  {
      return 'slug';
  }

  protected static function newFactory(): NewsletterFactory
  {
      return NewsletterFactory::new();
  }
}
