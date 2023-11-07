<?php

namespace Sixincode\HiveNewsletter\Models;

use Sixincode\HiveNewsletter\Traits\NewsletterSubscriptionTrait;
use Sixincode\HiveNewsletter\Factories\NewsletterSubscriptionFactory;
use Sixincode\HiveAlpha\Traits as Alphatraits;
use Sixincode\HiveHelpers\Traits as HelperTraits;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sixincode\HiveNewsletter\Events\NewsletterSubscription;
use Sixincode\HiveNewsletter\Events\NewsletterUnsubscription;
use Sixincode\HiveNewsletter\Notifications\SubscriberEmailVerification;

class NewsletterSubscription extends NewsletterSubscriptionTrait
{
  use Alphatraits\HasDataAndProperties;
  use HelperTraits\IsActiveTrait;
  use SoftDeletes;

  public function __construct()
  {
    parent::__construct();
    $this->fillable[] = 'newsletter_id';
    $this->fillable[] = 'email';
    $this->fillable[] = 'role';
    $this->fillable[] = 'note';
    $this->fillable[] = 'status';
    $this->fillable[] = 'email_verified_at';
  }

  protected $dispatchesEvents = [
    'created' => NewsletterSubscription::class,
    'deleted' => NewsletterUnsubscription::class,
  ];

  public function sendEmailVerificationNotification()
  {
      $this->notify(new SubscriberEmailVerification);
  }

  /**
   * Determine if the user has verified their email address.
   *
   * @return bool
   */
  public function hasVerifiedEmail()
  {
      return ! is_null($this->email_verified_at);
  }

  /**
   * Get the email address that should be used for verification.
   *
   * @return string
   */
  public function getEmailForVerification()
  {
      return $this->email;
  }

  /**
   * Mark the given user's email as verified.
   *
   * @return bool
   */
  public function markEmailAsVerified()
  {
      return $this->forceFill([
          'email_verified_at' => $this->freshTimestamp(),
      ])->save();
  }

  public function getTable()
  {
    return config('hive-newsletter.table_names.newsletterSubscriptions');
  }

  public function newsletter(): BelongsTo
  {
      return $this->belongsTo(Newsletter::class);
  }

  protected static function newFactory(): NewsletterSubscriptionFactory
  {
      return NewsletterSubscriptionFactory::new();
  }
}
