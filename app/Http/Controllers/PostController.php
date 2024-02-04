<?php

namespace App\Http\Controllers;

use App\Models\DeferredRecord;
use App\Models\OccurrenceReason;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
   
    private $stations = [
        'sina' => '品川',
        'tokyo' => '東京',
        'ueno' => '上野',
        'ikebukuro' => '池袋',
        'sinjuku' => '新宿',
        'osaki' => '大崎',
        ];
         
         
    public function index(Request $request)
    {
        
        return view('posts.index');
    }
    
    public function notfound()
    {
        return view('posts.not_found');
    }
         
    public function Report(OccurrenceReason $occurrencereason)
    { 
        $employee_number = session('employee_number');
      
        $user = User::where('employee_number', Auth::user()->employee_number)->first();
        
        if ($user) {
        $user_name = $user->name;
        return view('posts.deferred_report', compact('user_name', 'employee_number'), ['stations' => $this->stations])->with(['occurrence_reasons' => $occurrencereason->get()]);
        } else {
        return "User not found";
        }
        
        // return view('posts.deferred_report', compact('user_name'), ['stations' => $this->stations])->with(['occurrence_reasons' => $occurrencereason->get()]);
    }
        
    public function store(PostRequest $request, DeferredRecord $deferred_record)
    {
       $input_post = $request['post'];
       $input_reasons = $request->reasons_array;
       $deferred_record->fill($input_post)->save();
       
    //   dd($deferred_record->id);
       $deferred_record->occurrencereason()->attach($input_reasons);
       
       return view('posts.index');
    }
    
    
    public function table(Request $request, DeferredRecord $deferred_record)
    {
        $from = $request->input('from');
        $until = $request->input('until');

        $query = $deferred_record->orderBy('report_date', 'desc')->orderBy('created_at', 'desc');

        if (isset($from) && isset($until)) 
        {
            $query->whereBetween('report_date', [$from, $until]);
        }
        
        // $query->dd();

        $deferred_list = $query->get();

        return view('posts.deferred_list', compact('deferred_list', 'from', 'until'))->with(['deferred_records' => $deferred_record]);
    }
    
    
    public function detail(DeferredRecord $deferred_record)
    {
        $user = User::where('employee_number', $deferred_record->employee_number)->first();

        $user_name = $user->name;
        return view('posts/deferred_detail', compact('user_name'))->with(['deferred_record' => $deferred_record]);
    }
    
    public function edit(DeferredRecord $deferred_record, OccurrenceReason $occurrencereason)
    {
        $user = User::where('employee_number', $deferred_record->employee_number)->first();
        // user　社員番号で名前の検索　else追加　その他関連する箇所　未修正
        $userId = $user->id;
        $authUser = Auth::user();
        $authUserId = $authUser->id;
        // dd($userId,$authUserId );
        if ($userId == $authUserId) {
        $user_name = $user->name;
        return view('posts.deferred_edit', compact('user_name'), ['stations' => $this->stations])->with(['deferred_record' => $deferred_record, 'occurrence_reasons' => $occurrencereason->get()]);
        }else{
            return redirect('/')->with('success', 'あなたはこの報告書を変更することはできません');
        }
    }
    
    public function update(PostRequest $request, DeferredRecord $deferred_record)
    {
        $input_post = DeferredRecord::find($deferred_record->id);

        $input_post->fill($request['post']);
    
        $input_reasons = $request->reasons_array;
       
        $deferred_record->fill($input_post->toArray())->save();
    
        $deferred_record->occurrencereason()->sync($input_reasons);
        
       
       
        return view('posts.index');
    }
    
    public function delete(DeferredRecord $deferred_record) 
    {
        $deferred_record->delete();
        
        return view('posts.index');
    }
    
 
}
