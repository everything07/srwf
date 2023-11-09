<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeferredRecord extends Model
{
    use HasFactory;
    
    protected $table = 'DeferredRecord';
    
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
