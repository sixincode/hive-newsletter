<?php

namespace Sixincode\HiveNewsletter\Http\Controllers\User;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Sixincode\HiveNewsletter\Models\Newsletter;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;

class NewsletterController extends Controller
{

  public function index()
  {
    $newsletters = auth()->user()->ownedNewsletters()->get();
    return view('hive-newsletter::user.newsletters.indexUserNewsletter',[
        'newsletters' => $newsletters,
    ]);
  }

  public function create()
  {
    return view('hive-newsletter::user.newsletters.createUserNewsletter');
  }

  public function show(Request $request, $newsletter)
  {
      $newsletter = auth()->user()->ownedNewsletters()->whereSlug($newsletter)->firstOrFail();
      return view('hive-newsletter::user.newsletters.showUserNewsletter',[
        'newsletter' => $newsletter->load('subscriptions'),
      ]);
  }

  public function showSubscribers(Request $request,  $newsletter)
  {
      $newsletter = auth()->user()->ownedNewsletters()->whereSlug($newsletter)->firstOrFail();
      return view('hive-newsletter::user.newsletters.showUserNewsletterSubscribers',[
        'newsletter' => $newsletter->load('subscribers'),
      ]);
  }

  public function deactivateSubscription(Request $request, $newsletter, $subscription)
  {
      $newsletter = auth()->user()->ownedNewsletters()->whereSlug($newsletter)->firstOrFail()->subscriptions()->whereGlobal($subscription)->firstOrFail()->toggleIsActive();
      return back();
  }

}
