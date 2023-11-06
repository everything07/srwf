<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $table = 'deferred_record';
    
    protected $fillable = [
        'enpoyeeNumber',
        'trainNumber',
        'carsNumber',
        'jobNumber',
        'sinaArrival',
        'sinaDeparture',
        'tokyoArrival',
        'tokyoDeparture',
        'uenoArrival',
        'uenoDeparture',
        'ikebukuroArrival',
        'ikebukuroDeparture',
        'sinjukuArrival',
        'sinjukuDeparture',
        'osakiArrival',
        'osakiDeparture',
        'occurrenceReasons',
        'remarks',
    ];
}
