<?php

namespace App\Http\Controllers\Api\ReservationStudio;

use App\Http\Controllers\Controller;
use App\Models\ReservationStudio;
use Illuminate\Http\Request;

class RSContoller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $reservation_studio = ReservationStudio::all() // Get all the existing studio reservations & transform them to the object-format that our calendar understands
            ->map(function(ReservationStudio $reservationstudio): array {
                return [
                    "id" => $reservationstudio->id,
                    "title" => $reservationstudio->name,
                    "color" => 'DarkSlateBlue',
                    "start" => $reservationstudio->start_time->format('Y-m-d H:i:s'),
                    "end" => $reservationstudio->end_time->format('Y-m-d H:i:s'),
                    "borderColor" => 'DarkSlateBlue',
                    "studio_id" => $reservationstudio->studio_id,
                    "user_id" => $reservationstudio->user_id,
                ];
            } );

      return response()->json([ // Return our object as a JSON response
        "reservation_studio" => $reservation_studio,
      ]);      
    }
}
