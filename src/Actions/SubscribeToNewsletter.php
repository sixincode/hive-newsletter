<?php

namespace Sixincode\HiveNewsletter\Actions;

use Sixincode\HiveNewsletter\Models\Newsletter;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Sixincode\HiveNewsletter\Contracts\SubscribeToNewsletters as Contract;
use Sixincode\HiveNewsletter\Events\NewSubscriptionFromUser;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;

class SubscribeToNewsletter implements Contract
{
  /**
   * Validate and create a newly registered user.
   *
   * @param  array<string, string>  $input
   */
   /**
    * Validate and create a new team for the given user.
    *
    * @param  array<string, string>  $input
    */
   public function create(Newsletter $newsletter, array $input) : NewsletterSubscription
   {
       // Gate::forUser($user)->authorize('create', Newsletter::class);

       $validated = Validator::make($input, [
         'email'        => ['required', 'email', 'max:255'],
       ])->validateWithBag('subscribeToNewsletterCentral');

       NewSubscriptionFromUser::dispatch($validated['email']);

       $subscription = NewsletterSubscription::create([
         'email'              => $validated['email'],
         'newsletter_id'      => $newsletter->id,
         'is_active'          => $newsletter->request_verification,
         'email_verified_at'  => ($newsletter->request_verification && !check_hasNewsletterSubscriptionEmailVerificationRequest()) ? now() : null,
       ]);

       if(check_hasNewsletterSubscriptionEmailVerificationRequest()) {
           $subscription->sendEmailVerificationNotification();
       }

       return $subscription;
   }
 }
