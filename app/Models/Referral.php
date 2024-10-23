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
        'investigator_pnco',
        'violator',
        'piece_of_evidence',
        'image',
    ];


    // Relationships
    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function turnoverReceipts()
    {
        return $this->belongsTo(TurnoverReceipt::class);
    }

}
