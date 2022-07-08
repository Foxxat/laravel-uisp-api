<?php

namespace Wharfs\UISPApiClient\Commands;

use Illuminate\Console\Command;

class UISPApiClientCommand extends Command
{
    public $signature = 'laravel-uisp-api';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
