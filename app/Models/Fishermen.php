<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fishermen extends Model
{
    use HasFactory;

    protected $table = 'fishermen';

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'extension',
        'sex',
        'address',
    ];

    public function violation()
    {
        return $this->hasMany(Violation::class);
    }
}
