<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OccurrenceReason extends Model
{
    use HasFactory;
    
     public function deferredrecord() {
        return $this->belongsToMany(DeferredRecord::class);
    }
    
    public function reasonCompare($target1, $target2) {
        if(in_array($target1, $target2->pluck('id')->toArray()))
        {
            return "checked";
        }else{
            return " ";
        }
    }
     
}
