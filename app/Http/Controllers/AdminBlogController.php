<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;

class AdminBlogController extends Controller
{
    public function create(){
        $subcategories = SubCategory::all();
        return view('admin.blog.create', compact('subcategories'));
    }
    public function store(Request $request){
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
            'status' => 1,
        ]);

        return back()->withSuccess('Blog posted successfully!');
    }
    public function view_adminblogs(){
        $blogs = Blog::where('author_id', 0)->get();
        return view('admin.blog.admin_blogs', compact('blogs'));
    }
    public function view_blogs(){
        $blogs = Blog::all();
        return view('admin.blog.blogs', compact('blogs'));
    }
    public function view_trash(){
        $blogs = Blog::onlyTrashed()->get();
        return view('admin.blog.trash', compact('blogs'));
    }

    public function review(){
        $blogs = Blog::whereNot('author_id', 0)->where('status', 0)->get();
        return view('admin.blog.review', compact('blogs'));
    }

    public function approve($id){
        $blog = Blog::find($id);
        $blog->status = 1;
        $blog->visibility = 1;
        $blog->save();
        return back()->withSuccess('Blog approved successfully!');
    }
    public function reject($id){
        $blog = Blog::find($id);
        $blog->status = 2;
        $blog->visibility = 0;
        $blog->save();
        return back()->withInfo('Blog rejected!');
    }
}