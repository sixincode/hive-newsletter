<?php

namespace Sixincode\HiveNewsletter\Http\Controllers\User;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class SettingsNewsletterController extends Controller
{

  public function index()
  {
    return view('hive-newsletters::user.settings.indexUserSettings');
  }

}
