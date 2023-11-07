<?php

namespace Sixincode\HiveNewsletter\Http\Controllers\Central;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Sixincode\HiveNewsletter\Models\Newsletter;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;

class NewsletterController extends Controller
{

  public function index()
  {
    $newsletters = Newsletter::all();
    return view('hive-newsletters::central.newsletters.indexNewsletter',[
        'newsletters' => $newsletters,
    ]);
  }

  public function show(Request $request, Newsletter $newsletter)
  {
      return view('hive-newsletters::central.newsletters.showNewsletter',[
        'newsletter' => $newsletter,
      ]);
  }

}
