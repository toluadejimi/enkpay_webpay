<?php

namespace App\Console;

use App\Models\Webtransfer;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
       
            $schedule->call(function () {
                Webtransfer::where('created_at', '<', Carbon::now()->subMinutes(1))->delete();
                Webtransfer::where('status', 1)->delete();

            })->daily();

            $message = "Web Transfer Records Deleted";
            send_notification($message);
     
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
