<?php

namespace Sixincode\HiveNewsletter\Http\Middlewares;

use Closure;

class HiveNewsletterOneMiddleware
{
  public function handle($request, Closure $next)
  {
    //
    return $next($request);
  }
}
