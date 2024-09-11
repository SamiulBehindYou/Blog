<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorControlController extends Controller
{
    public function author_control(){
        return view('frontend.author_controls.dashboard');
    }
    public function blog_create(){
        return view('frontend.author_controls.blog.create');
    }
    public function blogs(){
        return view('frontend.author_controls.blog.blogs');
    }


}
