<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class AdminMessageController extends Controller
{
    public function view_messgae(){
        $messages = Message::orderBy('id', 'DESC')->paginate(10);
        return view('admin.communication.author_message', compact('messages'));
    }
    public function make_read($id){
        $message = Message::find($id);
        $message->read_recipt = 1;
        $message->save();
        return back()->withSuccess('Oparation success!');
    }
}
