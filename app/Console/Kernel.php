<?php

namespace App\Console;

use App\Models\ReservationClasse;
use App\Models\ReservationStudio;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        'App\Console\Commands\DeleteReservationCommand'
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $reservations_studio = ReservationStudio::all();
        $reservations_classe = ReservationClasse::all();

        foreach ($reservations_studio as $reservation_studio) {
            $end_time = Carbon::parse($reservation_studio->end_time);
            
            if ($end_time->isCurrentHour()) {
                $schedule->command('delete:reservation')->when($end_time->isCurrentHour())->withoutOverlapping();
            } 
        }
        
        foreach ($reservations_classe as $reservation_classe) {
            $end_time = Carbon::parse($reservation_classe->end_time);
            
            if ($end_time->isCurrentHour()) {
                $schedule->command('delete:reservation')->when($end_time->isCurrentHour())->withoutOverlapping();
            } 
        }

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
