<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameofbanca',
        'nameofskipper',
        'age',
        'birthdate',
        'status',
        'educationalbackground',
        'resident',
        'violation',
        'engine',
        'engineno',
        'gridcoordinate',
        'amount',
    ];

    // Relationships
    public function referrals()
    {
        return $this->hasMany(Referral::class);
    }

    public function turnoverReceipts()
    {
        return $this->belongsTo(TurnoverReceipt::class);
    }
}
