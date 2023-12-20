<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletingOrder extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'crewing_diary_id',
        'user_id',
        'updated_at',
        'created_at'
    ];
    
    public function crewingDiary()
    {
        return $this->belongsTo(CrewingDiary::class, 'crewing_diary_id');
    }

    public function getDeleteCount($diaryId)
    {
        return $this->where('crewing_diary_id', $diaryId)->count();
    }
    
    public function check($diaryId, $userId){
        return $this->where('crewing_diary_id', $diaryId)->where('user_id', $userId)->exists();
    }
}
