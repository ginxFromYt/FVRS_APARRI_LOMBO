<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancelled extends Model
{
    protected $table = 'cancelled_reports'; // Specify the table name

    protected $fillable = [
        'name',
        'address',
        'contact_number',
        'information',
        'photo',
    ];
    use HasFactory;
}
