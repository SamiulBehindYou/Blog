<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
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


        $blogs = Blog::where('status', 1)->orderBy('id', 'DESC')->paginate(8);
        $sliders = Blog::where('status', 1)->where('visibility', 1)->latest()->limit(4)->get();
        $populers = Blog::inRandomOrder()->paginate(5);

        return view('frontend.dashboard', compact('blogs', 'sliders', 'categories', 'subcategory', 'tags', 'populers'));
    }

    public function view_blog($id){
        //Sub Category
        $subcategory[] = 0;
        $subcat = SubCategory::all();
        foreach($subcat as $index=>$sub){
            $subcategory[$sub->id] = $sub->subcategory_name;
        }

        $blog = Blog::find($id);
        $author = Author::find($blog->author_id);
        $tag_id = explode(',', $blog->tag);

        //Tag
        $tags_name[] = 0;
        $tags = Tag::all();
        foreach($tags as $index=>$tag){
            $tags_name[$tag->id] = $tag->tag;
        }

        // Comment
        $comments = Comment::where('blog_id', $id)->orderBy('id', 'DESC')->simplePaginate(3);
        $total_comments = Comment::where('blog_id', $id)->count();

        return view('frontend.view_blog', compact('blog', 'subcategory', 'author', 'tag_id', 'tags_name', 'comments', 'total_comments'));
    }

    public function author_blogs($id){
        if($id == 0){
            $author = null;
        }else{
            $author = Author::find($id);
        }
        $blogs = Blog::where('status', 1)->where('visibility', 1)->where('author_id', $id)->get();
        $subcategories = SubCategory::all();
        $tags = Tag::inRandomOrder()->limit(20)->get();
        return view('frontend.author_blog', compact('blogs', 'author', 'subcategories', 'tags'));
    }

    public function about(){
        $about = About::find(1);
        return view('frontend.about.about', compact('about'));
    }

    public function by_tag($id){
        $tag = Tag::find($id);
        $blogs = Blog::where('tag', 'like', '%'.$id.'%')->get();

        return view('frontend.by_tag', compact('blogs', 'tag'));
    }
    public function by_subcategory($id){
        $subcategory = SubCategory::find($id);
        $blogs = Blog::where('subcategory_id', $id)->paginate(10);
        return view('frontend.by_subcategory', compact('blogs', 'subcategory'));
    }

    public function search(Request $request){

        if($request->keyword == null){
            return back()->withError('Search field is blank!');
        }
        $keyword = $request->keyword;
        $blogs = Blog::where('title', 'like', '%'.$request->keyword.'%')->get();
        $subcategories = SubCategory::all();
        $tags = Tag::all();
        $populars = Blog::inRandomOrder()->paginate(5);
        return view('frontend.search', compact('blogs', 'keyword', 'subcategories', 'tags', 'populars'));
    }
}
