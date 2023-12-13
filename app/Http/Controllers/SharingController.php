<?php

namespace App\Http\Controllers;

use App\Models\CrewingDiary;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class SharingController extends Controller
{
    public function sharing()
    {
        return view('sharing.sharing_report');

    }
    
       
    public function share()
    {
        return view('sharing.sharing_report');

    }
    
    public function confirm(Request $request)
    {
        $inputs=$request->all();
        
        return view('sharing.sharing_confirm', ['inputs' => $inputs]);
    }
    
    public function post(Request $request, CrewingDiary $crewingdiary, Tag $tag)
    {
        $input_post = $request['post'];
        $input_tags = $request->tags;
    
        // 正規表現を使ってハッシュタグを抽出
        preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $input_tags, $match);

        // クルーの日誌を保存
        $crewingdiary->fill($input_post)->save();

        // ハッシュタグの処理
        foreach ($match[1] as $input) {
        // すでにデータがあれば取得し、なければデータを作成する
        $tagModel = Tag::firstOrCreate(['tag' => $input]);

        // 入力されたタグのIDを取得
        $tag_id = $tagModel->id;

        // クルーの日誌とタグの紐付け
        $crewingdiary->tags()->attach($tag_id);
        }
        
        // dd($request->all(), $input_post, $input_tags, $match[1]);
        return view('posts.index');
    }
    
    public function list_display(Request $request, CrewingDiary $crewingdiary, Tag $tag)
    {
        return view('sharing.sharing_list')->with(['crewingdiarys' => $crewingdiary->getPaginateByLimit(3), 'tags' => $tag->get()]);
    }
    
   public function toggleLike($crewingDiaryId)
    {
        $user = Auth::user();
        $crewingDiary = CrewingDiary::findOrFail($crewingDiaryId);
    
        if ($crewingDiary->isLikedByUser($user->id)) {
            $crewingDiary->users()->detach($user->id);
        } else {
            $crewingDiary->users()->attach($user->id);
        }

        return redirect()->route('list_display'); 
    }

}
