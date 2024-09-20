<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request){
        $request->validate([
            'comment' => 'required|max:1000',
        ]);
        if(Auth::guard('author')->id()){
            $author = Auth::guard('author')->id();
        }else{
            $author = 0; // All admins comment id will be 0 to identify admin comment.
        }
        Comment::create([
            'author_id' => $author,
            'blog_id' => $request->blog_id,
            'comment' => $request->comment,
        ]);
        return back()->withSuccess('Comment posted!');
    }
}
