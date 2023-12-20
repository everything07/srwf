<?php

namespace App\Http\Controllers;

use App\Models\CrewingDiary;
use App\Models\Tag;
use App\Models\User;
use App\Models\DeletingOrder;
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
        $crewingdiary->user_id = Auth::id();
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
    
    public function detail(CrewingDiary $crewingdiary, Tag $tag)
    {
        return view('sharing.sharing_detail')->with(['crewingdiary' => $crewingdiary, 'tags' => $tag->get()]);
    }
    
    public function editRepost(CrewingDiary $crewingdiary, Tag $tag)
    {
        $tagsAsString =  '#' .implode(' #', $crewingdiary->tags->pluck('tag')->toArray());
    
        return view('sharing.sharing_edit_repost', compact('tagsAsString'))->with(['crewingdiary' => $crewingdiary, 'tags' => $tag->get()]);
    }
    
    public function reconfirm(Request $request, CrewingDiary $crewingdiary)
    {
        $inputs = $request->all();
        
        // セッションにデータを保存
        session(['reconfirm_data' => $inputs]);

        return view('sharing.sharing_reconfirm')->with(['crewingdiary' => $crewingdiary]);
    
    }
    
    public function repost(Request $request, CrewingDiary $crewingdiary, Tag $tag)
    {
        $input_post = $request['post'];
        $input_tags = $request->tags;

        $diaryId = $input_post['id'];
        $userId = CrewingDiary::getUserIdForDiary($diaryId);

        $tagIds = [];

        preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $input_tags, $match);

        foreach ($match[1] as $input) {
            $tagModel = Tag::firstOrCreate(['tag' => $input]);
            $tagIds[] = $tagModel->id;
            
        }
        
        if (1=== Auth::id()) {
            // 更新・「更新」タグ自動追加
            $crewingdiary->fill($input_post)->save();
            $tagIds[] = 2; // タグIDが2のタグ
            $crewingdiary->tags()->sync($tagIds);
        } else {
            // 新規投稿・「再投稿」自動タグ追加
            $crewingdiary = new CrewingDiary;
            $crewingdiary->user_id = 1;
            $crewingdiary->fill($input_post)->save();
            $tagIds[] = 1; // タグIDが1のタグを追加
            $crewingdiary->tags()->sync($tagIds);
        }
    
        return view('posts.index');
    }
    
    public function delete(CrewingDiary $crewingdiary)
    {
        $crewingdiary->delete();
        return view('posts.index');
    }
    
    public function deletingOrder(CrewingDiary $crewingdiary, DeletingOrder $deletingorder)
    {
        $like = $crewingdiary->likesCount($crewingdiary->id);
        $delet = $deletingorder->getDeleteCount($crewingdiary->id);
    
        if($deletingorder->check($crewingdiary->id, Auth::id()) ){
            return redirect()->back()->with('success', '削除依頼はすでにされています。');
        }
        
        $delet++;
    
        if ($like < $delet) {
            $crewingdiary->delete();
            return redirect('/')->with('success', '日記が削除されました');
        } else {
            // 削除依頼の履歴を作成
            $deletingorder->create([
                'crewing_diary_id' => $crewingdiary->id,
                'user_id' => Auth::id(),
            ]);
    
            return redirect()->back()->with('success', '削除依頼が送信されました');
        }
    }


}
