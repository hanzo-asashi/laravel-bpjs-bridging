<?php

namespace HanzoAsashi\LaravelBpjsBridging\Commands;

use Illuminate\Console\Command;

class LaravelBpjsBridgingCommand extends Command
{
    public $signature = 'laravel-bpjs-bridging';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
