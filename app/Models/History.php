<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
        // Allow mass assignment on these fields
        protected $fillable = [
            'violation',
            'location',
            'date_of_violation',
            'time_of_violation',
            'violator',
            'sex',                 
            'address',     
            ];
    use HasFactory;
}
