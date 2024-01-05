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
    
    public function users() {
        return $this->belongsToMany(User::class);
    }
   

    
    protected $fillable = [
        'user_id',
        'job_title',
        'weather',
        'time_period',
        'title',
        'body',
        ];
        
    public function getPaginateByLimit($limit_count)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function likesCount($diaryId)
    {
        $diary = self::find($diaryId);
        if ($diary) {
            return $diary->users()->count();
        }

        return 0;
    }
    
    

    public function isLikedByUser($userId)
    {
        return $this->users()->where('user_id', $userId)->exists();
    }
    
    public static function getUserIdForDiary($diaryId)
    {
        $crewingDiary = static::find($diaryId);

        if ($crewingDiary) {
            return $crewingDiary->user_id;
        } else {
            return null; 
        }
    }
    
    public function search_get($key, $match, $column)
    {
        $tag = Tag::where('tag', $key)->first();
        $tagId = $tag ? $tag->id : null;
        
        // dd($key, $match, $column);
        // もしも$columnが0なら
        if ($column == 0) {
            // 全てのテーブルから検索
            return $this->where(function ($query) use ($key, $match, $tagId) {
                if ($match == 1) 
                {
                    // 完全一致で検索
                    $query->where('job_title', '=', $key)
                          ->orWhere('weather', '=', $key)
                          ->orWhere('time_period', '=', $key)
                          ->orWhere('title', '=', $key)
                          ->orWhere('body', '=', $key);
                } else {
                    // 部分一致で検索
                    $query->where('job_title', 'like', "%$key%")
                          ->orWhere('weather', 'like', "%$key%")
                          ->orWhere('time_period', 'like', "%$key%")
                          ->orWhere('title', 'like', "%$key%")
                          ->orWhere('body', 'like', "%$key%");
                }
                
                if ($tagId) 
                {
                    $query->orWhereHas('tags', function ($tagQuery) use ($tagId)
                    {
                        $tagQuery->where('tag_id', $tagId);
                    });
                }
            })->orderBy('updated_at', 'DESC')->paginate(3);
        } else {
            // 選択されているカラム内を検索
            return $this->where(function ($query) use ($key, $match, $column) {
                $columnName = $this->getColumnName($column);

                if ($match == 1) {
                    // 完全一致で検索
                    $query->where($columnName, '=', $key);
                } else {
                    // 部分一致で検索
                    $query->where($columnName, 'like', "%$key%");
                }
            })->orderBy('updated_at', 'DESC')->paginate(3);
        }
    
        // もしも$columが０なら
        // 全てのテーブルから検索→（$match＝0の場合は完全一致、　＝１の場合は部分一致で検索）
        // elses 選択されているカラムないを検索（$match＝0の場合は完全一致、　＝１の場合は部分一致で検索）
        
    }
}
