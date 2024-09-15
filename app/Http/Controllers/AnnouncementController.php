<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function announcement(){
        return view('admin.announcement.announcement');
    }
}
