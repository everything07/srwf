<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DeferredRecord extends Model
{
    use HasFactory;
    
    
    public function occurrencereason() {
        return $this->belongsToMany(OccurrenceReason::class);
    }
    
    // protected $table = 'deferred_records';
    
    protected $fillable = [
         'employee_number',
         'train_number',
         'cars_number',
         'job_number',
         'sina_arrival_minute',
         'sina_departure_minute',
         'tokyo_arrival_minute',
         'tokyo_departure_minute',
         'ueno_arrival_minute',
         'ueno_departure_minute',
         'ikebukuro_arrival_minute',
         'ikebukuro_departure_minute',
         'sinjuku_arrival_minute',
         'sinjuku_departure_minute',
         'osaki_arrival_minute',
         'osaki_departure_minute',
         'remarks',
         'sina_arrival_second',
         'sina_departure_second',
         'tokyo_arrival_second',
         'tokyo_departure_second',
         'ueno_arrival_second',
         'ueno_departure_second',
         'ikebukuro_arrival_second',
         'ikebukuro_departure_second',
         'sinjuku_arrival_second',
         'sinjuku_departure_second',
         'osaki_arrival_second',
         'osaki_departure_second'
    ];
}
