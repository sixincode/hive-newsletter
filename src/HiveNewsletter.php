<?php

namespace Sixincode\HiveNewsletter;

use Sixincode\HiveNewsletter\Traits\Database as DatabaseTrait;

class HiveNewsletter
{
  use DatabaseTrait\HiveNewsletterMigrationsTrait;
  use DatabaseTrait\HiveNewsletterSeedersTrait;
}
