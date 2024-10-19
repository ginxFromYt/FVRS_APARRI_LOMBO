<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resolved extends Model
{
    protected $table = 'resolved_reports'; // Specify the table name

    protected $fillable = [
        'name',
        'address',
        'contact_number',
        'information',
        'photo',
    ];
    use HasFactory;
}
