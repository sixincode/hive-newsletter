<?php

// config for Sixincode/HiveNewsletter
return [
  // app
  'title'             => 'hive-newsletter',
  'slogan'            => 'This is hive-newsletter.',

  'emailVerification'          => true,
  'verificationLinkExpiration' => 1440, // in minutes

  // table names
  'table_names'  => [
    'newsletterGroups'          => 'newsletters',
    'newsletterInvitations'     => 'newsletter_invitation',
    'newsletterRoles'           => 'newsletter_roles',
    'newsletterSubscriptions'   => 'newsletter_subscription',
  ],

  // columns
  'column_names'      => [
      'columnOne'     => 'columnOne',
  ],

];
