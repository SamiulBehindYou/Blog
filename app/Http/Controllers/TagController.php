<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function add_tag(){
        return view('admin.tags.add_tag');
    }
    public function tags(){
        return view('admin.tags.tags');
    }
}
