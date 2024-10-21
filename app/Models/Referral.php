<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'date',
        'violation',
        'time',
        'date_of_violation',
        'location',
        'complainant',
        'violator',
        'piece_of_evidence',
        'attach_evidence',
    ];


    // Relationships
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
