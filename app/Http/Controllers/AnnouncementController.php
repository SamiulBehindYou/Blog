<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function announcement(){
        $announcements = Announcement::all();
        return view('admin.announcement.announcement', compact('announcements'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'importance' => 'required|integer|min:1|max:100',
        ]);

        Announcement::create([
            'title' => $request->title,
            'description' => $request->description,
            'importance' => $request->importance,
        ]);

        return back()->withSuccess('Announcement successful!');
    }

    public function delete($id){
        Announcement::find($id)->delete();
        return back()->withInfo('Announcement deleted!');
    }
}
