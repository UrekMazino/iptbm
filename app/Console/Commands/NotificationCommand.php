<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use function Clue\StreamFilter\fun;

class NotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending email for deadline notifications';

    /**
     * Execute the console command.
     */


    public function handle(): void
    {


    }
}
