<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveNewsletter\Http\Controllers\Central as Controllers;

Route::middleware(
  config('hive-newsletter-middlewares.central', ['web']),
)
->name('newsletters.')
->prefix('newsletters')
->group(function () {

  Route::get('/',  [Controllers\NewsletterController::class, 'index'])->name('index');
  Route::get('{$newsletter}',  [Controllers\NewsletterController::class, 'show'])->name('show');
  Route::post('subscribe/{$newsletter}',[Controllers\SubscriberController::class, 'store'])->name('store');
  Route::get('unsubscribe/{$subscription}',[Controllers\SubscriberController::class, 'delete'])->name('delete');
  Route::get('verify/{global}/{hash}',[Controllers\SubscriberController::class, 'verify'])->name('verify');

});
