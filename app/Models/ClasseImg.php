<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasseImg extends Model
{
    use HasFactory;

    protected $fillable=[
        "img_url",
        "classe_id",
    ];



    public function classe(){
        return $this->belongsTo(Classe::class);
    }
}
