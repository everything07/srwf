<?php

namespace App\Http\Controllers;

use App\Models\DeferredRecord;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }
    
    public function deferred()
    {
        $stations = [
        'sina' => '品川',
        'tokyo' => '東京',
        'ueno' => '上野',
        'ikebukuro' => '池袋',
        'sinjuku' => '新宿',
        'osaki' => '大崎',
         ];
         
        return view('posts.deferredReport', compact('stations'));
    }
        
    public function store(Request $request, DeferredRecord $deferredrecord)
    {
        $input = $request['post'];
        $deferredrecord->fill($input)->save();
        return view('posts.index');
    }
}
