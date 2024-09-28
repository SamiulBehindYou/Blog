<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingController extends Controller
{
    public function settings(){
        $blogs = Blog::where('status', 1)->where('visibility', 1)->get();
        return view('admin.settings.settings', compact('blogs'));
    }

    public function edit_about(){
        $about = About::find(1);
        return view('admin.about.update_about', compact('about'));
    }

    public function update_about(Request $request){
        if($request->image){
            $rules = [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:png,jpg,webp,gif,jpeg',
            ];
        }else{
            $rules = [
                'title' => 'required',
                'description' => 'required',
            ];
        }
        $request->validate($rules);

        if($request->author_id == 0){
            $about = About::find(1);

            if($request->image){
                if($about != null){
                    if($about->image != null){
                        //Deleting previous image
                        unlink(public_path('uploads/about/'.$about->image));
                    }
                }

                $extension = $request->image->extension();
                $file_name = uniqid().'.'.$extension;
                // create image manager with desired driver
                $manager = new ImageManager(new Driver());
                $image = $manager->read($request->image);
                $image->resize(900, 600);
                $image->save(public_path('uploads/about/'.$file_name));
                $about->image = $file_name;
            }

            $about->author_id = $request->author_id;
            $about->title = $request->title;
            $about->description = $request->description;
            $about->updated_at = Carbon::now();
            $about->save();
            return back()->withSuccess('About Section Updated.');

        }
    }
}
