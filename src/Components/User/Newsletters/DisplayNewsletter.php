<?php

namespace Sixincode\HiveNewsletter\Components\User\Newsletters;

use Illuminate\View\Component;
use Sixincode\HiveNewsletter\Models\Newsletter;

class DisplayNewsletter extends Component
{
  public Newsletter $newsletter;

  public function __construct(
    Newsletter  $newsletter
    )
  {
    $this->newsletter = $newsletter;
  }

  public function render()
  {
    return view('hive-newsletter::components.user.newsletters.displayNewsletter');
  }
}
