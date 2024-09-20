<?php

namespace App\Http\Controllers;

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
        $populers = Blog::inRandomOrder()->paginate(5);

        return view('frontend.dashboard', compact('blogs', 'categories', 'subcategory', 'tags', 'populers'));
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
}
