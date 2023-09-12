<?php

namespace App\Http\Controllers\reservation;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\ReservationClasse;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationClasseController extends Controller
{
    public function calendar(Classe $classe)
    {
        $classes = Classe::all();
        return view('classes.classes', compact('classe', 'classes'));
    }

    public function store(Request $request, Classe $classe)
    {
        $start_time = $request->day_date . ' ' . $request->start_time . ':00'; // Add chosen date to chosen time. Example-Result: '2023-09-08 09:00:00'  
        $end_time = $request->day_date . ' ' . $request->end_time . ':00';

        $request_start = intval(substr($request->start_time, 0, 2)); // Get the hour, change it to an Int. example: form '09' to 9 
        $request_end = intval(substr($request->end_time, 0, 2));

        $currentDateTime = Carbon::now();
        $currentHour = $currentDateTime->hour; // Current hour
        $currentDate = $currentDateTime->toDateString(); // Current date in YYYY-MM-DD format
        if ($request->day_date == $currentDate) { 
            if (($request_start < $currentHour) or ($request_end < $currentHour)) { // So you can't make a reservation in the past
                return back();
            }
        }


        $reservations_classe = ReservationClasse::where('classe_id', $classe->id)->where('canceled', 0)->get(); // Get all classe reservations.

        if ($request_start > $request_end) { // Check if reservation's start is after reservation's end. Example: starts at 10, ends at 9
            return back();
        }

        foreach ($reservations_classe as $reservation) {
            if ($reservation->start_time == $start_time and $reservation->end_time == $end_time) { // Check if the reservation starts and ends at the same time as another reservation
                return back();
            } else if ($request->day_date == substr($reservation->start_time, 0, 10)) { // Check if the reservation day match with any other reservation, if so proceed to the next validations 

                $r_start = intval(substr($reservation->start_time, -8, -6)); // Get the hour of the already existing reservation, change it to an Int. example: from '2023-09-08 08:00:00' to 8 
                $r_end = intval(substr($reservation->end_time, -8, -6));
                
                // clarifying names ==> Old reservation hour = $r_end & r_start // New reservation hour = $request_start & $request_end
                $condition1 = ($r_start <= $request_start) && ($request_start < $r_end); // Check if the New reservation start_hour is between the Old reservatinon start and end hours
                $condition2 = ($r_start < $request_end) && ($request_end <= $r_end); // Check if the New reservation end_hour is between the Old reservatinon start and end hours
                $condition3 = ($request_start <= $r_start) && ($r_start< $request_end); // Check if the Old reservation start_hour is between the New reservatinon start and end hours
                $condition4 = ($request_start < $r_end) && ($r_end <= $request_end); // Check if the Old reservation end_hour is between the New reservatinon start and end hours

                if ($condition1 || $condition2 || $condition3 || $condition4) { // If one of the conditions are met, don't create a reservation
                    // dd('fuck yes');
                    return back();
                }
            }
        }

        // If all is good.. then ==>>
        $data = [
            'name' => $request->title,
            'description' => $request->description,
            'comment' => $request->comment,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'user_id' => auth()->user()->id,
            'classe_id' => $classe->id,
        ];

        ReservationClasse::create($data);
        return back();
    }

    public function info(Classe $classe, ReservationClasse $reservation_classe) {
        return view('classes.components.info', compact('classe', 'reservation_classe'));
    }

    public function destroy(ReservationClasse $reservation_classe) {
        
        $reservation_classe->delete();
        return back();
    }

    public function cancel(ReservationClasse $reservation_classe) {

        $reservation_classe->update([
            'canceled' => true
        ]);

        return redirect()->route('classes.calendar', $reservation_classe->classe_id);
    }
}
