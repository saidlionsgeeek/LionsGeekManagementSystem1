<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reservation_studio_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function reservation_studio() {
        return $this->belongsTo(ReservationStudio::class);
    }
}
