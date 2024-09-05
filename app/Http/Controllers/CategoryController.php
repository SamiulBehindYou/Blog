<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;



class CategoryController extends Controller
{
    public function categroy(){
        $categories = Category::all();
        return view('admin.category.category', compact('categories'));
    }
    public function trashed_categroy(){
        $categories = Category::onlyTrashed()->get();
        // print_r($categories);
        // die();
        return view('admin.category.trashed_category', compact('categories'));
    }
    public function add_categroy(){
        return view('admin.category.add_category');
    }
    public function store_categroy(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories',
            'category_image' => 'required|max:10000|mimes:png,jpg,webp,gif',
        ]);

        $extension = $request->category_image->extension();
        $file_name = uniqid().'.'.$extension;

        // create image manager with desired driver
        $manager = new ImageManager(new Driver());

        // read image from file system
        $image = $manager->read($request->category_image);

        // resize image proportionally to 300px width
        $image->resize(300, 200);

        // save modified image in new format
        $image->save(public_path('uploads/categories/'.$file_name));

        Category::insert([
            'category_name' => $request->category_name,
            'category_image' => $file_name,
            'created_at' =>Carbon::now(),
        ]);
        return back()->withSuccess('Category added Successfully!');
    }
    public function delete_category($id){
        Category::find($id)->delete();
        return back()->withSuccess('Category successfully move to trush!');
    }
    public function restore_categroy($id){
        Category::onlyTrashed()->find($id)->restore();
        return back()->withSuccess('Category successfully restored!');
    }
    public function delete_trashed_categroy($id){
        Category::onlyTrashed()->find($id)->forceDelete();
        return back()->withSuccess('Category permanently deleted!');
    }

    //sub categories
    public function subcategroy(){
        return view('admin.category.subcategory');
    }

    public function add_subcategroy(){
        return view('admin.category.add_subcategory');
    }
}
