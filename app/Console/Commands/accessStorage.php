<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class accessStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'access:storage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Give access for symbolic link in Cpanel';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        exec("chmod -R 775 storage/", $output);

        $this->comment( implode( PHP_EOL, $output ) );
    }
}
