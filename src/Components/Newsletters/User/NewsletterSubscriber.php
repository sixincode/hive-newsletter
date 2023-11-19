<?php

namespace Sixincode\HiveNewsletter\Components\Newsletters\User;

use Sixincode\HiveDisplay\Components\Base\CardTemplateElement;

class NewsletterSubscriber extends CardTemplateElement
{
  public function setDefaultSource()
  {
    return $this->source = config('hive-newsletter-views.defaultViews.newslettersSourceUser');
  }

  public function setDefaultComponent()
  {
    return $this->component = config('hive-newsletter-views.defaultViews.defaultNewsletterSubscriberUser');
  }

  public function setDefaultBase()
  {
    return $this->base = config('hive-newsletter-views.defaultViewsBase');
  }
}
