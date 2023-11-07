<?php

use Sixincode\HiveNewsletter\Components as Components;
use Sixincode\HiveNewsletter\Http\Livewire   as Livewires;

// config for Sixincode/HiveNewsletter Components
return [
 'blade' => [
   'central-newsletters-index'     => Components\Central\Newsletters\IndexNewsletter::class,
   'central-newsletters-display'   => Components\Central\Newsletters\DisplayNewsletter::class,

   'user-newsletters-index'        => Components\User\Newsletters\IndexNewsletter::class,
   'user-newsletters-display'      => Components\User\Newsletters\DisplayNewsletter::class,
   'user-subscribers-display'      => Components\User\Subscribers\DisplaySubscriber::class,
   'user-subscriptions-display'    => Components\User\Subscription\DisplaySubscription::class,
  ],
  'livewire' => [
    ///////////////////////////////// CENTRAL  ///////////////////////////////////////////////////////////////

   'central-newsletters-index'     => Livewires\Central\Newsletters\IndexNewsletter::class,
   'central-newsletters-show'      => Livewires\Central\Newsletters\ShowNewsletter::class,

   /////////////////////////////////// USER /////////////////////////////////////////////////////////////////

   'user-newsletters-index'      => Livewires\User\Newsletters\IndexUserNewsletter::class,
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
