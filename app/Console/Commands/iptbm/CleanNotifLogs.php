<?php

namespace App\Console\Commands\iptbm;


use App\Models\IptbmSendNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanNotifLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean-notif-logs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cleaning Logs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//

        IptbmSendNotification::truncate();
        DB::table('deadline_end_tasks')->truncate();
    }
}
