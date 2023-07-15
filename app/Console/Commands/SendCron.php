<?php

namespace App\Console\Commands;

use App\Models\Charge;
use App\Models\PendingTransaction;
use App\Models\Transaction;
use App\Models\Transfer;
use App\Models\User;
use App\Models\Webtransfer;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Log;

class SendCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        Webtransfer::where('created_at', '<', Carbon::now()->subMinutes(2))->delete();
        Webtransfer::where('created_at', '<', Carbon::now()->subMinutes(5))->where('status', 1)->delete();

        // $message = "Web Transfer Records Deleted";
        // send_notification($message);
    }
}
