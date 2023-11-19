<?php

namespace Sixincode\HiveNewsletter\Http\Controllers\Central;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Sixincode\HiveNewsletter\Models\Newsletter;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;
use Sixincode\HiveNewsletter\Events\NewsletterSubscriptionVerified;
use Sixincode\HiveNewsletter\Http\Requests\StoreSubscriptionRequest;
use Sixincode\HiveNewsletter\Http\Requests\DeleteSubscriptionRequest;
use Sixincode\HiveNewsletter\Http\Requests\VerifySubscriptionRequest;
use Sixincode\HiveNewsletter\Exceptions\SubscriberVerificationException;

class SubscriberController extends Controller
{
  public function store(StoreSubscriptionRequest $request, Newsletter $newsletter)
  {
      $subscription = NewsletterSubscription::create([
        'email'              => $request['email'],
        'newsletter_id'      => $newsletter->id,
        'is_active'          => $newsletter->request_verification,
        'email_verified_at'  => ($newsletter->request_verification && !check_hasNewsletterSubscriptionEmailVerificationRequest()) ? now() : null,
      ]);

      if(check_hasNewsletterSubscriptionEmailVerificationRequest()) {
          $subscription->sendEmailVerificationNotification();
          return redirect()->route('newsletters.central.show', $newsletter->slug)
              ->with('subscribed', __('hive-newsletters.main.notifications.verify'));
      }

      return redirect()->route('newsletters.central.show', $newsletter->slug)
                       ->with('subscribed', __('hive-newsletters.main.notifications.subscribed'));
  }

  public function delete(DeleteSubscriptionRequest $request, NewsletterSubscription $subscription)
  {
      $subscription->delete();
      return redirect()->route('newsletters.central.show', $subscription->newsletter()->getRouteKeyValue())
            ->with('unsubscribed', __('hive-newsletters.main.notifications.subscribed'));
  }

  public function verify(VerifySubscriptionRequest $request)
  {
    // dd('8888');
    $subscription = $request->subscription();

    if (!hash_equals((string) $request->route('id'), (string) sha1($subscription->getKey()))) {
        throw new SubscriberVerificationException;
    }

    if (!hash_equals((string) $request->route('hash'), sha1($subscription->getEmailForVerification()))) {
        throw new SubscriberVerificationException;
    }

    if ($subscription->hasVerifiedEmail()) {
        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->route('newsletters.central.show', $request->newsletterSlug() );
    }

    if(check_hasNewsletterSubscriptionEmailVerificationRequest()) {
        $subscription->markEmailAsVerified();
        event(new NewsletterSubscriptionVerified($subscription));
    }

    return $request->wantsJson()
        ? new Response('', 204)
        : redirect()->route('newsletters.central.show', $request->newsletterSlug() )->with('verified', __('hive-newsletters.main.notifications.subscribed'));
  }
}
