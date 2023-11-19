<?php

namespace Sixincode\HiveNewsletter\Traits;

use Illuminate\Database\Eloquent\Relations\Pivot;

abstract class NewsletterSubscriptionTrait extends Pivot
{
  public $incrementing = true;

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

}
