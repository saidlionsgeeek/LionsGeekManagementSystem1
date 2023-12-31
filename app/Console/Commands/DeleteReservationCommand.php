<?php

namespace App\Console\Commands;

use App\Models\Equipement;
use App\Models\ReservationClasse;
use App\Models\ReservationStudio;
use Carbon\Carbon;
use Illuminate\Console\Command;

use function PHPUnit\Framework\isNull;

class DeleteReservationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:reservation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Scheduled Reservations';

     /**
     * Create a new Command Instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $reservations_studio = ReservationStudio::where('passed', false)->get();
        $reservations_classe = ReservationClasse::where('passed', false)->get();

        foreach ($reservations_studio as $reservation_studio) {
            $end_time = Carbon::parse($reservation_studio->end_time);
            if($end_time->isCurrentHour()){
                foreach ($reservation_studio->reservation_studio_equipment as $rse) {
                    $e = Equipement::where('id', $rse->equipement_id)->first();
                    $e->stock += $rse->stock;
                    $rse->history = true;
                    $rse->save();
                    $e->save();
                }
                $reservation_studio->update(['passed' => true]);
            }
        }

        foreach ($reservations_classe as $reservation_classe) {
            $end_time = Carbon::parse($reservation_classe->end_time);
            if($end_time->isCurrentHour()){
                $reservation_classe->update(['passed' => true]);
            }
        }

        
    }
}
