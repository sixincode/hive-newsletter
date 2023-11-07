<?php

namespace Sixincode\HiveNewsletter\Http\Controllers\User;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;

class SubscriptionController extends Controller
{

  public function index()
  {
    return view('hive-newsletters::user.subscriptions.indexUserSubscription',[
        'subscriptions' => auth()->user()->subscriptions()->get(),
    ]);
  }

  public function show(Request $request, $subscription)
  {
    $subscription = auth()->user()->subscriptions()->where('slug', $subscription)->first();
    return view('hive-newsletters::user.subscriptions.showUserSubscription',[
        'subscription' => $subscription,
    ]);
  }

}
