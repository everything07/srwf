<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CrewingDiary extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
   

    
    protected $fillable = [
        'job_title',
        'weather',
        'time_period',
        'title',
        'body',
        'sympathy',
        ];
}
