<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;

class AdminBlogController extends Controller
{
    public function create(){
        $subcategories = SubCategory::all();
        $tags = Tag::all();
        return view('admin.blog.create', compact('subcategories', 'tags'));
    }
    public function store(Request $request){
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
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        return back()->withSuccess('Blog posted successfully!');
    }
    public function view_adminblogs(){
        $blogs = Blog::where('author_id', 0)->get();
        return view('admin.blog.admin_blogs', compact('blogs'));
    }
    public function view_blogs(){
        $blogs = Blog::orderBy('id', 'DESC')->paginate(15);
        return view('admin.blog.blogs', compact('blogs'));
    }
    public function view_trash(){
        $blogs = Blog::onlyTrashed()->where('author_id', 0)->get();
        return view('admin.blog.trash', compact('blogs'));
    }

    public function review(){
        $blogs = Blog::where('status', 0)->paginate(15);
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

    public function blog_delete($id){
        Blog::find($id)->forceDelete();
        return back()->withSuccess('Blog deleted successfully!');
    }

    public function visibility($id){
        $blog = Blog::find($id);
        if($blog->visibility == 0){
            $blog->visibility = 1;
            $blog->save();
        }
        else{
            $blog->visibility = 0;
            $blog->save();
        }
        return back()->withSuccess('Blog visibility changed!');
    }

    public function blog_edit($id){
        $blog = Blog::find($id);
        $subcategories = SubCategory::all();
        $tags = Tag::all();
        $selected_tags = explode(',', $blog->tag);

        return view('admin.blog.edit', compact('blog', 'subcategories', 'tags', 'selected_tags'));
    }

    public function blog_update(Request $request){
        if($request->image != null){
            $rules = [
                'title' => 'required',
                'sub_category' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:png,jpg,webp,gif,jpeg|max:4096',
                'tag_id' => 'required',
                'read_time' => 'required',
            ];

        }else{
            $rules = [
                'title' => 'required',
                'sub_category' => 'required',
                'description' => 'required',
                'tag_id' => 'required',
                'read_time' => 'required',
            ];
        }
        $request->validate($rules);

        $blog = Blog::find($request->blog_id);

//Convert tag id's to string for storing
        $tag = implode(',', $request->tag_id);

        if($request->image != null){
//Image proccessing
            //Deleting previous image
            unlink(public_path('uploads/blogs/'.$blog->image));
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

            $blog->title = $request->title;
            $blog->subcategory_id = $request->sub_category;
            $blog->description = $request->description;
            $blog->image = $file_name;
            $blog->tag = $tag;
            $blog->read_time = $request->read_time;
            $blog->updated_at = Carbon::now();
            $blog->save();
        return back()->withSuccess('Blog Updated.');
        }

// Saving without image
            $blog->title = $request->title;
            $blog->subcategory_id = $request->sub_category;
            $blog->description = $request->description;
            $blog->tag = $tag;
            $blog->read_time = $request->read_time;
            $blog->updated_at = Carbon::now();
            $blog->save();
        return back()->withSuccess('Blog Updated.');
    }


    public function delete($id){
        Blog::find($id)->delete();
        return back()->withSuccess('Blog move to trash!');
    }

    public function restore($id){
        Blog::onlyTrashed()->find($id)->restore();
        return back()->withSuccess('Blog restore successfully!');
    }

    public function hard_delete($id){
        Blog::onlyTrashed()->find($id)->forceDelete();
        return back()->withInfo('Blog permanatly deleted!');
    }
}
