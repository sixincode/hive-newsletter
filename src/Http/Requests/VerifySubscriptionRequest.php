<?php

namespace Sixincode\HiveNewsletter\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Sixincode\HiveNewsletter\Models\Newsletter;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;

class VerifySubscriptionRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      // 'email' => 'required|email|exists:Sixincode\HiveNewsletter\Models\NewsletterSubscription,email',
      // 'newsletter' => 'required|string|exists:Sixincode\HiveNewsletter\Models\Newsletter,slug',
    ];
  }

  public function newsletterSlug()
  {
    return $this->subscription()->newsletter()->first()->slug;
  }

  public function subscription()
  {
    return NewsletterSubscription::whereGlobal($this->route('global'))->firstOrFail();
  }

  public function handle($request, Closure $next)
  {
    //
    return $next($request);
  }
}
