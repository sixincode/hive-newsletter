<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveNewsletter\Http\Controllers\User as UserControllers;

Route::middleware(
  config('hive-newsletter-middlewares.user', ['web','auth:web']),
)->name('user.newsletters.')->prefix('home/newsletters')->group(function () {
  Route::get('/',  [UserControllers\Home\NewsletterController::class, 'index'])->name('index');
  Route::get('/settings',  [UserControllers\Settings\SettingsNewsletterController::class, 'index'])->name('settings.index');

  Route::get('/subscriptions',  [UserControllers\Home\SubscriptionController::class, 'index'])->name('subscriptions.index');
  Route::get('/subscriptions/{$subscription}',  [UserControllers\Home\SubscriptionController::class, 'show'])->name('subscriptions.show');

  Route::get('/subscribers',  [UserControllers\Home\SubscriberController::class, 'index'])->name('subscribers.index');
  Route::get('/subscribers/{$subscription}',  [UserControllers\Home\SubscriberController::class, 'show'])->name('subscribers.show');

  Route::get('/{$newsletter}',  [UserControllers\Home\NewsletterController::class, 'show'])->name('show');
  Route::get('/{$newsletter}/subscribers',  [UserControllers\Home\NewsletterController::class, 'showSubscribers'])->name('show.subscribers');
});
