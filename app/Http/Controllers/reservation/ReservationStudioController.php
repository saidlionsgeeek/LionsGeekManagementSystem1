<?php

namespace App\Http\Controllers\reservation;

use App\Http\Controllers\Controller;
use App\Models\Equipement;
use App\Models\ReservationStudio;
use App\Models\ReservationStudioEquipment;
use App\Models\Studio;
use App\Models\TeamMember;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationStudioController extends Controller
{
    public function calendar(Studio $studio)
    {
        $studios = Studio::all();
        return view('studios.studios', compact('studio', 'studios'));
    }

    public function store(Request $request, Studio $studio)
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


        $reservations_studio = ReservationStudio::where('studio_id', $studio->id)->get(); // Get all studio reservations.

        if ($request_start > $request_end) { // Check if reservation's start is after reservation's end. Example: starts at 10, ends at 9
            return back();
        }

        foreach ($reservations_studio as $reservation) {
            if ($reservation->start_time == $start_time and $reservation->end_time == $end_time) { // Check if the reservation starts and ends at the same time as another reservation
                return back();
            } else if ($request->day_date == substr($reservation->start_time, 0, 10)) { // Check if the reservation day match with any other reservation, if so proceed to the next validations 


                $r_start = intval(substr($reservation->start_time, -8, -6)); // Get the hour of the already existing reservation, change it to an Int. example: from '2023-09-08 08:00:00' to 8 
                $r_end = intval(substr($reservation->end_time, -8, -6));

                // clarifying names ==> Old reservation hour = $r_end & r_start // New reservation hour = $request_start & $request_end
                $condition1 = ($r_start <= $request_start) && ($request_start < $r_end); // Check if the New reservation start_hour is between the Old reservatinon start and end hours
                $condition2 = ($r_start < $request_end) && ($request_end <= $r_end); // Check if the New reservation end_hour is between the Old reservatinon start and end hours
                $condition3 = ($request_start <= $r_start) && ($r_start < $request_end); // Check if the Old reservation start_hour is between the New reservatinon start and end hours
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
            'studio_id' => $studio->id,
        ];

        ReservationStudio::create($data);
        return back();
    }

    public function info(Studio $studio, ReservationStudio $reservation_studio)
    {
        $equipments = Equipement::all();
        $reservation_studio_equipments = ReservationStudioEquipment::where('reservation_studio_id', $reservation_studio->id)->get();
        $team = TeamMember::where('reservation_studio_id', $reservation_studio->id)->get();
        $users = User::whereNot('id', 1)->get();
        return view('studios.components.info', compact('studio', 'reservation_studio', 'equipments', 'reservation_studio_equipments', 'team', 'users'));
    }

    public function destroy(ReservationStudio $reservation_studio)
    {

        foreach ($reservation_studio->reservation_studio_equipment as $rse) {
            $e = Equipement::where('id', $rse->equipement_id)->first();
            $e->stock += $rse->stock;
            $e->save();
        }

        $reservation_studio->delete();
        return redirect()->route('studios.calendar', $reservation_studio->studio_id);
    }
}
