<?php

namespace Sixincode\HiveNewsletter\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Sixincode\HiveNewsletter\Models\Newsletter;

class StoreSubscriptionRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'email' => 'required|email',
      'newsletter' => 'required|string|exists:Sixincode\HiveNewsletter\Models\Newsletter,slug',
    ];
  }

  public function newsletter()
  {
    return Newsletter::where('slug', $this->input('newsletter'))->firstOrFail();
  }

  public function handle($request, Closure $next)
  {
    //
    return $next($request);
  }
}
