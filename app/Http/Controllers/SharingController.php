<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrewingDiary;

class SharingController extends Controller
{
    public function sharing()
    {
        return view('sharing.sharing_report');

    }
}
