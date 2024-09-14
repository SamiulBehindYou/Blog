<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class AuthorControlController extends Controller
{
    public function author_control(){
        return view('frontend.author_controls.dashboard');
    }
    public function blog_create(){
        $subcategories = SubCategory::all();
        return view('frontend.author_controls.blog.create', compact('subcategories'));
    }
    public function blogs(){
        $blogs = Blog::all();
        return view('frontend.author_controls.blog.blogs', compact('blogs'));
    }

    public function createpost(Request $request){
        $request->validate([
            'sub_category' => 'required',
            'title' => 'required',
            'description' => 'required|max:1000',
            'readtime' => 'required',
            'image' => 'required|mimes:png,jpg,webp,gif,jpeg|max:4096',
        ]);

        $extension = $request->image->extension();
        $file_name = uniqid().'.'.$extension;

        // create image manager with desired driver
        $manager = new ImageManager(new Driver());

        // read image from file system
        $image = $manager->read($request->image);

        // resize image proportionally to 300px width
        $image->resize(900, 600);

        // save modified image in new format
        $image->save(public_path('uploads/blogs/'.$file_name));

        Blog::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $file_name,
            'author_id' => $request->author_id,
            'read_time' => $request->readtime,
            'subcategory_id' => $request->sub_category,
            'created_at' => Carbon::now(),
        ]);

        return back()->withSuccess('Blog post pending for admin approval.');
    }

    public function blog_edit($id){
        //
    }
    public function blog_delete($id){
        Blog::find($id)->delete();
        return back()->withSuccess('Blog move to trash!');
    }

    public function view_trash(){
        $blogs = Blog::onlyTrashed()->get();
        return view('frontend.author_controls.blog.trash', compact('blogs'));
    }

}
