<?php

namespace Sixincode\HiveNewsletter\Traits;

use Illuminate\Database\Eloquent\Relations\Pivot;

abstract class NewsletterSubscriptionTrait extends Pivot
{
  public $incrementing = true;

}
