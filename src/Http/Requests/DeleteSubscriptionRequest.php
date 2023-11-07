<?php

namespace Sixincode\HiveNewsletter\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Sixincode\HiveNewsletter\Models\Newsletter;
use Sixincode\HiveNewsletter\Models\NewsletterSubscription;

class DeleteSubscriptionRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'email'        => 'required|email|exists:Sixincode\HiveNewsletter\Models\NewsletterSubscription,email',
      'newsletter'   => 'required|string|exists:Sixincode\HiveNewsletter\Models\Newsletter,slug',
      'subscription' => 'required|string|exists:Sixincode\HiveNewsletter\Models\NewsletterSubscription,slug',
    ];
  }

  // public function newsletter()
  // {
  //   return Newsletter::where('slug', $this->input('newsletter'))->firstOrFail();
  // }
  //
  // public function subscription()
  // {
  //   return NewsletterSubscription::where('email', $this->input('email'))->firstOrFail();
  // }
}
