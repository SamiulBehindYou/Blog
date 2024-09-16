<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function front_dashboard(){
        $subcategory[] = 0;
        $subcat = SubCategory::all();
        foreach($subcat as $index=>$sub){
            $subcategory[$sub->id] = $sub->subcategory_name;
        }

        $categories = Category::limit(10)->get();
        $tags = Tag::limit(10)->get();

        $blogs = Blog::orderBy('id', 'DESC')->paginate(8);
        $populers = Blog::inRandomOrder()->paginate(5);

        return view('frontend.dashboard', compact('blogs', 'categories', 'subcategory', 'tags', 'populers'));
    }
}
