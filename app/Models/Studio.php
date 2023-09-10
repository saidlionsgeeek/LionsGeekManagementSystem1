<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;
    protected $fillable=[
        "name",
        "description",
    ];

    // & la relatiion entre studi et studio img
    public function studioimgs(){
        return $this->hasMany(StudioImg::class);
    }

}
