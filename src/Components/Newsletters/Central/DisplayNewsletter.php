<?php

namespace Sixincode\HiveNewsletter\Components\Newsletters\Central;

use Sixincode\HiveDisplay\Components\Base\BlankTemplateElement; 

class DisplayNewsletter extends BlankTemplateElement
{
  public function setDefaultSource()
  {
    return $this->source = config('hive-newsletter-views.defaultViews.newslettersDisplaySourceCentral');
  }

  public function setDefaultComponent()
  {
    return $this->component = config('hive-newsletter-views.defaultViews.defaultDisplayNewsletterCentral');
  }

  public function setDefaultBase()
  {
    return $this->base = config('hive-newsletter-views.defaultViewsBase');
  }
}
