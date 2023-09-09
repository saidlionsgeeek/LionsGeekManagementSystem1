<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $fillable=[
        "name",
        "description",
    ];

    // & la relation entre classe et classe img
    public function classimgs(){
        return $this->hasMany(ClasseImg::class);
    }

// // *reservation class
//     public function reservationclasses(){
//         return $this->hasMany(ReservationClass::class);
//     }
}
