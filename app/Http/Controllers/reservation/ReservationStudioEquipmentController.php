<?php

namespace App\Http\Controllers\reservation;

use App\Http\Controllers\Controller;
use App\Models\Equipement;
use App\Models\ReservationStudio;
use App\Models\ReservationStudioEquipment;
use Illuminate\Http\Request;

class ReservationStudioEquipmentController extends Controller
{
    public function add(ReservationStudio $reservation_studio, Equipement $equipement) {

        $reservation_studio_equipment = ReservationStudioEquipment::where('reservation_studio_id', $reservation_studio->id)->where('equipement_id', $equipement->id)->first();

        if($reservation_studio_equipment) {
            $reservation_studio_equipment->stock += 1;
            $reservation_studio_equipment->save();
            $equipement->stock -= 1;
            $equipement->save();
            return back();
        }

        $data = [
            'reservation_studio_id' => $reservation_studio->id,
            'equipement_id' => $equipement->id,
            'stock' => 1,
        ];

        if ($equipement->stock >= 1) {
            $equipement->stock -= 1;
            $equipement->save();
        }

        ReservationStudioEquipment::create($data);

        return back();
    }

    public function destroy(ReservationStudioEquipment $reservation_studio_equipment) {

        $equipement = Equipement::where('id', $reservation_studio_equipment->equipement->id)->first();
        $equipement->stock += $reservation_studio_equipment->stock;
        $equipement->save();
        $reservation_studio_equipment->delete();

        return back();
    }
}
