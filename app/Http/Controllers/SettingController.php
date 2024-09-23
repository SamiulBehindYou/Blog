<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settings(){
        $blogs = Blog::where('status', 1)->where('visibility', 1)->get();
        return view('admin.settings.settings', compact('blogs'));
    }
}
