<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordViolation extends Model
{
    use HasFactory;

    protected $fillable = [
        'violation', 
        'location', 
        'date_of_violation', 
        'time_of_violation'
    ];

    // Define the relationship: A violation can have many violators
    public function violators()
    {
        return $this->hasMany(Violator::class, 'record_violations_id'); 
    }
    
    
}

