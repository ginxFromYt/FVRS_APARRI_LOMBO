<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurnoverReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'municipal_agriculturist',
        'date_of_violation',
        'time_of_violation',
        'name_of_violation',
        'name_of_skipper',
        'name_of_banca',
        'investigator_pnco',
    ];
}

