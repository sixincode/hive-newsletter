<?php

namespace Sixincode\HiveNewsletter\Components\Central\Newsletters;

use Illuminate\View\Component;
use Sixincode\HiveNewsletter\Models\Newsletter;

class ShowNewsletter extends Component
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
    return view('hive-newsletter::components.central.newsletters.showNewsletter');
  }
}
