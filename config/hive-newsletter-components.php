<?php

use Sixincode\HiveNewsletter\Components as Components;
use Sixincode\HiveNewsletter\Http\Livewire   as Livewires;

// config for Sixincode/HiveNewsletter Components
return [
 'blade' => [
   'central-newsletter'            => Components\Newsletters\Central\Newsletter::class,
   'user-newsletter'               => Components\Newsletters\User\Newsletter::class,
   'user-newsletter-subscriber'    => Components\Newsletters\User\NewsletterSubscriber::class,
   'central-newsletters-index'     => Components\Central\Newsletters\IndexNewsletter::class,
   'central-newsletters-show'      => Components\Central\Newsletters\ShowNewsletter::class,

   'user-newsletters-index'        => Components\User\Newsletters\IndexNewsletter::class,
   'user-newsletters-create'       => Components\User\Newsletters\CreateNewsletter::class,
   'user-newsletters-show'         => Components\User\Newsletters\ShowNewsletter::class,
   'user-subscribers-display'      => Components\User\Subscribers\DisplaySubscriber::class,
   'user-subscriptions-display'    => Components\User\Subscription\DisplaySubscription::class,
  ],
  'livewire' => [
    ///////////////////////////////// CENTRAL  ///////////////////////////////////////////////////////////////

   'central-newsletters-index'     => Livewires\Central\Newsletters\IndexNewsletter::class,
   'central-newsletters-show'      => Livewires\Central\Newsletters\ShowNewsletter::class,

   /////////////////////////////////// USER /////////////////////////////////////////////////////////////////

   'user-newsletters-index'      => Livewires\User\Newsletters\IndexUserNewsletter::class,
   'user-newsletters-create'       => Livewires\User\Newsletters\CreateUserNewsletter::class,
   'user-newsletters-show'       => Livewires\User\Newsletters\ShowUserNewsletter::class,
   'user-newsletters-show-subscribers'       => Livewires\User\Newsletters\ShowUserNewsletterSubscribers::class,

   'user-subscribers-index'      => Livewires\User\Subscribers\IndexUserSubscriber::class,
   'user-subscribers-show'       => Livewires\User\Subscribers\ShowUserSubscriber::class,

   'user-subscriptions-index'    => Livewires\User\Subscriptions\IndexUserSubscription::class,
   'user-subscriptions-show'     => Livewires\User\Subscriptions\ShowUserSubscription::class,
   'user-settings'               => Livewires\User\Settings\IndexUserSettings::class,
  ],
  'prefix' => 'hive-newsletter',
];
