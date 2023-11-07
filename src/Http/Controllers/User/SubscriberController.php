<?php

namespace Sixincode\HiveNewsletter\Http\Controllers\User;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Sixincode\HiveNewsletter\Models\Newsletter;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;

class SubscriberController extends Controller
{

  public function index(Request $request, Newsletter $newsletter)
  {
      return view('hive-newsletters::user.subscribers.indexUserNewsletterSubscriber',[
        'newsletter' => $newsletter->load('subscribers'),
      ]);
  }

  public function show(Request $request, NewsletterSubscription $subscription)
  {
      return view('hive-newsletters::user.subscribers.showUserNewsletterSubscriber',[
        'subscription' => $subscription->load('subscription'),
      ]);
  }

}
