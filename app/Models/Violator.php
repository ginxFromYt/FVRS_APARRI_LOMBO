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
        'record_violations_id'
    ];

    // Define the inverse of the relationship: A violator belongs to one violation
    public function recordViolation()
    {
        return $this->belongsTo(RecordViolation::class, 'record_violations_id');
    }
}
