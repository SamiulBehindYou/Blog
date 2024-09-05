<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FontendController extends Controller
{
    public function font_dashboard(){
        return view('fontend.dashboard');
    }
}
