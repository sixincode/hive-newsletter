<?php

namespace Sixincode\HiveNewsletter\Models;

use Sixincode\HiveNewsletter\Traits\NewsletterInvitationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Sixincode\HiveNewsletter\Database\Factories\NewsletterInvitationFactory;
use Sixincode\HiveHelpers\Traits as HelperTraits;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsletterInvitation extends NewsletterInvitationTrait
{
  use HelperTraits\HasCodeTrait;
  use HasFactory;

  // public function __construct()
  // {
  //   parent::__construct();
  //   $this->fillable[] = 'newsletter_id';
  //   $this->fillable[] = 'email';
  //   $this->fillable[] = 'role';
  //   $this->fillable[] = 'post_id';
  //   $this->fillable[] = 'status';
  // }
  // protected $fillable = [
  //   'newsletter_id',
  //   'email',
  //   'role',
  //   'post_id',
  //   'status',
  // ];

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
