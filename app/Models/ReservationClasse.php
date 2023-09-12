<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationClasse extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description', 
        'start_time',
        'end_time',
        'comment',
        'canceled',
        'passed',
        'user_id',
        'classe_id'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function classe() {
        return $this->belongsTo(Classe::class);
    }
}
