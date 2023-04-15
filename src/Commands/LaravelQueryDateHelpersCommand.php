<?php

namespace Frameck\LaravelQueryDateHelpers\Commands;

use Illuminate\Console\Command;

class LaravelQueryDateHelpersCommand extends Command
{
    public $signature = 'laravel-query-date-helpers';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
