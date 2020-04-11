<?php

namespace App\Http\Controllers;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        return view('news.categories')->with('categories', Categories::all());
    }
    public function show($slug){
        return view('news.category')->with([
            'news'=> News::all(),
            'category_name'=> Categories::where('slug',$slug)->value('name'),
                ]
        );
    }
}
