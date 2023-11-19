<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveNewsletter\Http\Controllers\Central as Controllers;

Route::middleware(
  config('hive-newsletter-middlewares.central', ['web']),
)
->name('newsletters.central.')
->prefix('newsletters')
->group(function () {

  Route::get('/',  [Controllers\NewsletterController::class, 'index'])->name('index');
  Route::post('subscribe/{newsletter}',[Controllers\SubscriberController::class, 'store'])->name('store');
  Route::get('unsubscribe/{subscription}',[Controllers\SubscriberController::class, 'delete'])->name('delete');
  Route::get('verify/{id}/{hash}/{global}',[Controllers\SubscriberController::class, 'verify'])->name('verify');
  Route::get('/{newsletter}',  [Controllers\NewsletterController::class, 'show'])->name('show');

});
