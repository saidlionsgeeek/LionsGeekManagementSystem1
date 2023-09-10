<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationStudioEquipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_studio_id',
        'equipement_id',
        'stock',
    ];

    public function reservation_studio() {
        return $this->belongsTo(ReservationStudio::class);
    }
    public function equipement() {
        return $this->belongsTo(Equipement::class);
    }


}
