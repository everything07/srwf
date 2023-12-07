<?php

namespace App\Http\Controllers;

use App\Models\DeferredRecord;
use App\Models\OccurrenceReason;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }
    
    private $stations = [
        'sina' => '品川',
        'tokyo' => '東京',
        'ueno' => '上野',
        'ikebukuro' => '池袋',
        'sinjuku' => '新宿',
        'osaki' => '大崎',
         ];
         
    public function Report(OccurrenceReason $occurrencereason)
    { 
        
         
        return view('posts.deferred_report', ['stations' => $this->stations])->with(['occurrence_reasons' => $occurrencereason->get()]);
    }
        
    public function store(Request $request, DeferredRecord $deferred_record)
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

        $query = $deferred_record->orderBy('report_date', 'desc')->orderBy('created_at', 'asc');

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
        return view('posts/deferred_detail')->with(['deferred_record' => $deferred_record]);
    }
    
    public function edit(DeferredRecord $deferred_record, OccurrenceReason $occurrencereason)
    {
        return view('posts.deferred_edit', ['stations' => $this->stations])->with(['deferred_record' => $deferred_record, 'occurrence_reasons' => $occurrencereason->get()]);
    }
    
    public function update(Request $request, DeferredRecord $deferred_record)
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
