<?php
  if (! function_exists('getDefaultBase')) {
      function getDefaultBase()
      {
        return config('hive-newsletter-views.defaultBase') ?: config('hive-display-views.defaultBase');
      }
  }

  function check_newsletterSubscriptionEmailVerification()
  {
    if(function_exists('newsletterSubscriptionEmailVerification')) {
        return newsletterSubscriptionEmailVerification();
    }else{
        return config('hive-newsletter.emailVerification');
    }
  }
