<?php

namespace Sixincode\HiveNewsletter\Components\Central\Newsletters;

use Illuminate\View\Component;
use Sixincode\HiveNewsletter\Models\Newsletter;

class ShowNewsletter extends Component
{
  public Newsletter $newsletter;
  public string $component;
  public string $color;

  public function __construct(
    Newsletter  $newsletter,
    $color = 'blue',
    $component = '',
    )
  {
    $this->newsletter = $newsletter;
    $this->component = $component;
    $this->color = $color;
  }

  public function render()
  {
    return view('hive-newsletter::components.central.newsletters.showNewsletter');
  }
}
