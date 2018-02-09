<?php

namespace App\Console;

use App\Traits\Order;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    use Order;
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
//    protected function schedule(Schedule $schedule)
//    {
//        // $schedule->command('inspire')
//        //          ->hourly();
//
//        $schedule->call(function () {
//        })->daily();
//
//        $schedule->command('inspire')->everyTenMinutes();
//
//        $schedule->command('route:list')->dailyAt('02:00');
//    }



    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function () {
            $this->orderDoctorSettle();
        })->dailyAt('03:14');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
