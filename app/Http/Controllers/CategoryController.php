<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categroy(){
        return view('admin.category.category');
    }
    public function subcategroy(){
        return view('admin.category.subcategory');
    }

    public function add_categroy(){
        return view('admin.category.add_category');
    }
    public function add_subcategroy(){
        return view('admin.category.add_subcategory');
    }
}
