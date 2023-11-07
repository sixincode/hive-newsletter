<?php

namespace Sixincode\HiveNewsletter\Commands;

use Illuminate\Console\Command;

class HiveNewsletterCommand extends Command
{
    public $signature = 'hive-newsletter';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
