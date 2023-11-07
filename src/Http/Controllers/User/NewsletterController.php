<?php

namespace Sixincode\HiveNewsletter\Http\Controllers\User;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Sixincode\HiveNewsletter\Models\Newsletter;

class NewsletterController extends Controller
{

  public function index()
  {
    $newsletters = Newsletter::all();
    return view('hive-newsletters::user.newsletters.indexUserNewsletter',[
        'newsletters' => $newsletters,
    ]);
  }

  public function show(Request $request, Newsletter $newsletter)
  {
      return view('hive-newsletters::user.newsletters.showUserNewsletter',[
        'newsletter' => $newsletter,
      ]);
  }

  public function showSubscribers(Request $request, Newsletter $newsletter)
  {
      return view('hive-newsletters::user.newsletters.showUserNewsletterSubscribers',[
        'newsletter' => $newsletter->load('subscribers'),
      ]);
  }

}
