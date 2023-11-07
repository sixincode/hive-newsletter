<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveNewsletter\Http\Controllers\Api\V1 as V1Controllers;

Route::middleware(
  config('hive-newsletter-middlewares.api', ['web']),
)
)->name('api.central.')->prefix('api/v1')->group(function () {
->group(function () {

   // Route::post('/apiroute',  [V1Controllers\Central\ApiCentralNewslettersController::class, 'mainCentral'])->name('central.main');

});
