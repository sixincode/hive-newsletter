<?php

namespace Sixincode\HiveNewsletter\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sixincode\HiveNewsletter\HiveNewsletter
 */
class HiveNewsletter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Sixincode\HiveNewsletter\HiveNewsletter::class;
    }
}
