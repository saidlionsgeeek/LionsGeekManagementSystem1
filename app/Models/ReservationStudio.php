<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationStudio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description', 
        'start_time',
        'end_time',
        'comment',
        'history',
        'user_id',
        'studio_id'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        
    ];

    public function user() {
        $this->belongsTo(User::class);
    }

    public function studio() {
        $this->belongsTo(Studio::class);
    }
}
