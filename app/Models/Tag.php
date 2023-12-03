<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tag extends Model
{
    use HasFactory;
      
    public function crewing_diaries() {
        return $this->belongsToMany(CrewingDiary::class);
    }
    
    protected $fillable = [
        'tag'
        ];
}
