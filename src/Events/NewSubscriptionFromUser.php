<?php

namespace Sixincode\HiveNewsletter\Events;

use Illuminate\Foundation\Events\Dispatchable;

class NewSubscriptionFromUser
{
  use Dispatchable;

  /**
   * The team owner.
   *
   * @var mixed
   */
  public $email;

  /**
   * Create a new event instance.
   *
   * @param  mixed  $owner
   * @return void
   */
  public function __construct($email)
  {
      $this->email = $email;
  }
}
