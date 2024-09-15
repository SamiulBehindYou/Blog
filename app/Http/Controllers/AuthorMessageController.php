<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;


class AuthorMessageController extends Controller
{
    public function messages(){
        $messages = Message::where('author_id', Auth::guard('author')->user()->id)->get();
        return view('frontend.author_controls.communication.message_admin', compact('messages'));
    }

    public function store(Request $request){
        //
    }
}
