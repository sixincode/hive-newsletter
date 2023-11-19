<?php

namespace Sixincode\HiveNewsletter\Components\Newsletters\Central;

use Sixincode\HiveDisplay\Components\Base\CardTemplateElement;

class Newsletter extends CardTemplateElement
{
  public function setDefaultSource()
  {
    return $this->source = config('hive-newsletter-views.defaultViews.newslettersSourceCentral');
  }

  public function setDefaultComponent()
  {
    return $this->component = config('hive-newsletter-views.defaultViews.defaultNewsletterCentral');
  }

  public function setDefaultBase()
  {
    return $this->base = config('hive-newsletter-views.defaultViewsBase');
  }
}
