<?php

namespace App\Http\Controllers;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        return view('news.categories')->with('categories', DB::table('categories')->get());
    }
    public function show($slug){
        return view('news.category')->with([
            'news'=> News::getNewsByCategorySlug($slug),
            'category_name'=> DB::table('categories')->where('slug', $slug)->value('name'),
                ]
        );
    }
}
