<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveNewsletter\Http\Controllers\User as UserControllers;

Route::middleware(
  config('hive-stream-middlewares.user', ['web','auth:web']),
)->name('newsletters.user.')->prefix('home/newsletters')->group(function () {
  Route::get('/',  [UserControllers\NewsletterController::class, 'index'])->name('index');
  Route::get('/create',  [UserControllers\NewsletterController::class, 'create'])->name('create');
  Route::get('/settings',  [UserControllers\SettingsNewsletterController::class, 'index'])->name('settings.index');

  Route::get('/subscriptions',  [UserControllers\SubscriptionController::class, 'index'])->name('subscriptions.index');
  Route::get('/subscriptions/{subscription}',  [UserControllers\SubscriptionController::class, 'show'])->name('subscriptions.show');

  Route::get('/subscribers',  [UserControllers\SubscriberController::class, 'index'])->name('subscribers.index');
  Route::get('/subscribers/{subscription}',  [UserControllers\SubscriberController::class, 'show'])->name('subscribers.show');

  Route::get('/{newsletter}',  [UserControllers\NewsletterController::class, 'show'])->name('show');
  Route::get('/{newsletter}/subscribers',  [UserControllers\NewsletterController::class, 'showSubscribers'])->name('show.subscribers');
  Route::get('/{newsletter}/subscribers/{subscription}/deactivate',  [UserControllers\NewsletterController::class, 'deactivateSubscription'])->name('show.subscription.deactivate');
});
