<?php

namespace Sixincode\HiveNewsletter\Components\Central\Newsletters;

use Illuminate\View\Component;
use Sixincode\HiveNewsletter\Models\Newsletter;

class IndexNewsletter extends Component
{
  public $newsletters;

  public function __construct(
    //
    )
  {
    $this->newsletter = Newsletter::all();
  }

  public function render()
  {
    return view('hive-newsletter::components.central.newsletters.indexNewsletter');
  }
}
