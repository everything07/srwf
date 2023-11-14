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
    
    public function Report(OccurrenceReason $occurrencereason)
    { 
        $stations = [
        'sina' => '品川',
        'tokyo' => '東京',
        'ueno' => '上野',
        'ikebukuro' => '池袋',
        'sinjuku' => '新宿',
        'osaki' => '大崎',
         ];
         
        return view('posts.deferredReport', compact('stations'))->with(['occurrence_reasons' => $occurrencereason->get()]);
    }
        
    public function store(Request $request, DeferredRecord $deferredrecord)
    {
       $input_post = $request['post'];
       $input_reasons = $request->reasons_array;
       
       $deferredrecord->fill($input_post)->save();
       
       $deferredrecord->occurrencereason()->attach($input_reasons);
       
       return view('posts.index');
    }
    
    public function table(DeferredRecord $deferredrecord)
    {
     
        // $arrival_times = [];
        // $departure_times = [];
        
        // foreach ($stations as $key => $station) {
        //     $arrival_minute_key = "${key}_arrival_minute";
        //     $arrival_second_key = "${key}_arrival_second";
        //     $arrival_time = $deferredrecord[$arrival_minute_key] . ':' . $deferredrecord[$arrival_second_key];
        //     $arrival_times[$key] = $arrival_time;
        // }
        // foreach ($stations as $key => $station) {
        //     $arrival_minute_key = "${key}_departure_minute";
        //     $arrival_second_key = "${key}_departure_second";
        //     $arrival_time = $deferredrecord[$arrival_minute_key] . ':' . $deferredrecord[$arrival_second_key];
        //     $arrival_times[$key] = $arrival_time;
        // }
    return view('posts.deferredList')->with(['deferred_records' => $deferredrecord->get()]);

    }
    
    // public function detail(DeferredRecord $deferredrecord)
    // {
    //     return view('post/deferredDetail')->with(['deferredrecord' => $deferredrecord]);
    // }
    public function detail(DeferredRecord $deferred_record)
    {
        return view('posts.deferredDetail')->with(['deferredrecord' => $deferred_record]);
    }


}
