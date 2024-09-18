<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Announcement;
use App\Models\Blog;
use App\Models\Message;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Auth;


class AuthorControlController extends Controller
{
    public function author_control(){
        return view('frontend.author_controls.dashboard');
    }
    public function blog_create(){
        $subcategories = SubCategory::all();
        $tags = Tag::all();
        return view('frontend.author_controls.blog.create', compact('subcategories', 'tags'));
    }
    public function blogs(){
        $blogs = Blog::where('author_id', Auth::guard('author')->user()->id)->get();
        return view('frontend.author_controls.blog.blogs', compact('blogs'));
    }

    public function createpost(Request $request){
        $request->validate([
            'title' => 'required',
            'sub_category' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,webp,gif,jpeg|max:4096',
            'tag_id' => 'required',
            'read_time' => 'required',
        ]);


//Image proccessing
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

//Convert tag id's to string for storing
        $tag = implode(',', $request->tag_id);

        Blog::insert([
            'title' => $request->title,
            'subcategory_id' => $request->sub_category,
            'description' => $request->description,
            'image' => $file_name,
            'tag' => $tag,
            'read_time' => $request->read_time,
            'author_id' => $request->author_id,
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
        $blogs = Blog::onlyTrashed()->where('author_id', Auth::guard('author')->user()->id)->get();
        return view('frontend.author_controls.blog.trash', compact('blogs'));
    }

    public function restore($id){
        Blog::onlyTrashed()->find($id)->restore();
        return back()->withSuccess('Blog restored successfully!');
    }

    public function hard_delete($id){
        $blog = Blog::onlyTrashed()->find($id);
        unlink(public_path('uploads/blogs/'.$blog->image));
        $blog->forceDelete();
        return back()->withInfo('Blog permanatly deleted!');
    }


    // Annoucement
    public function announcement(){
        $announcements = Announcement::orderBy('id', 'DESC')->get();
        return view('frontend.author_controls.communication.announcement', compact('announcements'));
    }

}
