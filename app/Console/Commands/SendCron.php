<?php

namespace App\Console\Commands;

use App\Models\PendingTransaction;
use App\Models\Transfertransaction;
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


        //Webtransfer::where('status', 0)->where('created_at', '<', Carbon::now()->subHour())->delete();

        Transfertransaction::where('status', 0)->where('created_at', '<', Carbon::now()->subHour())->update(['status' => 3]);

        Transfertransaction::where('status', 3)
            ->whereBetween('created_at', [Carbon::yesterday()->startOfDay(), Carbon::yesterday()->endOfDay()])
            ->delete();

        //$message = "Web Transfer Records updated";
        //send_notification($message);
    }
}
