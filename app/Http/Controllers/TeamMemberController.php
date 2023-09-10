<?php

namespace App\Http\Controllers;

use App\Models\ReservationStudio;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function add(ReservationStudio $reservation_studio, User $user) {
        $data = [
            'user_id' => $user->id,
            'reservation_studio_id' => $reservation_studio->id,
        ];

        TeamMember::create($data);
        return back();
    }

    public function destroy(TeamMember $team_member) {
        $team_member->delete();

        return back();
    }
}
