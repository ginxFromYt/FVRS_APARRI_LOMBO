<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violator extends Model
{
    use HasFactory;

    protected $fillable = [
        'violator',
        'sex',
        'address',
        'record_violations_id',  // Make sure this field exists
    ];

    public function recordViolation()
    {
        return $this->belongsTo(RecordViolation::class, 'record_violations_id'); 
    }
    

}

