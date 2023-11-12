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
    
    public function deferred(OccurrenceReason $occurrencereason)
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
}
