<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorSettingsController extends Controller
{
    public function facebook(Request $request){
        $request->validate([
            'facebook' => 'required',
        ]);
        $facebook = Author::find(Auth::guard('author')->id());
        $facebook->facebook = $request->facebook;
        $facebook->save();
        return back()->withSuccess('Facebook link updated successfully!');
    }
    public function instagram(Request $request){
        $request->validate([
            'instagram' => 'required',
        ]);
        $instagram = Author::find(Auth::guard('author')->id());
        $instagram->instagram = $request->instagram;
        $instagram->save();
        return back()->withSuccess('Instagram link updated successfully!');
    }
    public function twiter(Request $request){
        $request->validate([
            'twiter' => 'required',
        ]);
        $twiter = Author::find(Auth::guard('author')->id());
        $twiter->twiter = $request->twiter;
        $twiter->save();
        return back()->withSuccess('Twiter link updated successfully!');
    }
    public function youtube(Request $request){
        $request->validate([
            'youtube' => 'required',
        ]);
        $youtube = Author::find(Auth::guard('author')->id());
        $youtube->youtube = $request->youtube;
        $youtube->save();
        return back()->withSuccess('YouTube link updated successfully!');
    }
    public function about(Request $request){
        $request->validate([
            'about' => 'required',
        ]);
        $about = Author::find(Auth::guard('author')->id());
        $about->about = $request->about;
        $about->save();
        return back()->withSuccess('About link updated successfully!');
    }
}
