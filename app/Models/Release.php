<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    use HasFactory;

    protected $table = 'releases'; 


    protected $fillable = [
        'name_of_skipper',
        'address',
        'violation',
        'date_of_violation',
        'time_of_violation',
        'date_of_release',
        'compensation',
        'agricultural_technologist',
        'municipal_agriculturist',
        'photo', 
    ];
    
}
