<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function add_tag(){
        return view('admin.tags.add_tag');
    }
    public function tags(){
        $tags = Tag::orderBy('id', 'DESC')->paginate(10);
        return view('admin.tags.tags', compact('tags'));
    }

    public function store(Request $request){
        $request->validate([
            'tag' => 'required|regex:/^\S*$/u|regex:/^[a-zA-Z]+$/u|max:10|unique:tags',
        ]);

        Tag::insert([
            'tag' => $request->tag,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Tag added successfully!');
    }

    public function tag_delete($id){
        Tag::find($id)->delete();
        return back()->withInfo('Tag Deleted!');
    }
}
