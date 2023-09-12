<?php

namespace App\Http\Controllers;

use App\Models\ReservationClasse;
use App\Models\ReservationStudio;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index() {
        $reservations_studio = ReservationStudio::all();
        $reservations_classe = ReservationClasse::all();
        return view('admin.history.index', compact('reservations_studio', 'reservations_classe'));
    }
}
