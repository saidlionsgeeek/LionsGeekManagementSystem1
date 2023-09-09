<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudioImg extends Model
{
    use HasFactory;
    protected $fillable=[
        "img_url",
        "studio_id",
    ];

    // & la relatiion entre studi et studio img
    public function studio(){
        return $this->belongsTo(Studio::class);
    }
}
