<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FontendController extends Controller
{
    public function font_dashboard(){
        return view('fontend.dashboard');
    }
    public function font_login(){
        return view('fontend.author_auth.login');
    }
    public function font_register(){
        return view('fontend.author_auth.register');
    }
}
