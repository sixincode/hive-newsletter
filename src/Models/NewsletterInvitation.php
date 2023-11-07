<?php

namespace Sixincode\HiveNewsletter\Models;

use Sixincode\HiveNewsletter\Traits\NewsletterMembership;
use Sixincode\HiveNewsletter\Factories\NewsletterInvitationFactory;
use Sixincode\HiveHelpers\Traits as HelperTraits;

class NewsletterInvitation extends NewsletterInvitationTrait
{
  use HelperTraits\HasCodeTrait;

  public function __construct()
  {
    parent::__construct();
    $this->fillable[] = 'newsletter_id';
    $this->fillable[] = 'email';
    $this->fillable[] = 'role';
    $this->fillable[] = 'post_id';
    $this->fillable[] = 'status';
  }

  public function getTable()
  {
      return config('hive-newsletter.table_names.newsletterInvitations');
  }

  public function newsletter(): BelongsTo
  {
    return $this->belongsTo(Newsletter::class, 'newsletter_id', 'id');
  }

  protected static function newFactory(): NewsletterInvitationFactory
  {
      return NewsletterInvitationFactory::new();
  }
}
