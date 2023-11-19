<?php
  if (! function_exists('getDefaultBase')) {
      function getDefaultBase()
      {
        return config('hive-newsletter-views.defaultBase') ?: config('hive-display-views.defaultBase');
      }
  }

  function check_hasNewsletterSubscriptionEmailVerificationRequest()
  {
    if(function_exists('hasNewsletterSubscriptionEmailVerificationRequest')) {
        return hasNewsletterSubscriptionEmailVerificationRequest();
    }else{
        return config('hive-newsletter.emailVerificationRequired');
    }
  }
