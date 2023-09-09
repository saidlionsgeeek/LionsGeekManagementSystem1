<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "ref",
        "state",
        "stock",
        "img_url",
    ];

    public function reservationstudios(){
        return $this->belongsToMany(reservationstudio::class , "reservation_studio_equipements");
    }


}