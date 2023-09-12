<?php

namespace App\Http\Controllers\Api\ReservationClasse;

use App\Http\Controllers\Controller;
use App\Models\ReservationClasse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RCContoller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $reservation_classe = ReservationClasse::all() // Get all the existing classes reservations & transform them to the object-format that our calendar understands
            ->map(function (ReservationClasse $reservationclasse): array {
                return [
                    "id" => $reservationclasse->id,
                    "title" => $reservationclasse->name,
                    "color" => 'DarkSlateBlue',
                    "start" => $reservationclasse->start_time->format('Y-m-d H:i:s'),
                    "end" => $reservationclasse->end_time->format('Y-m-d H:i:s'),
                    "borderColor" => 'DarkSlateBlue',
                    "classe_id" => $reservationclasse->classe_id,
                    "user_id" => $reservationclasse->user_id,
                    'canceled' => $reservationclasse->canceled,
                    'passed' => $reservationclasse->passed,
                ];
            });

        return response()->json([ // Return our object as a JSON response
            "reservation_classe" => $reservation_classe,
        ]);
    }
}
