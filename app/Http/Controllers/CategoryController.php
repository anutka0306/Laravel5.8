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
        $cat_id = Categories::query()->where('slug',$slug)->value('id');
        return view('news.category')->with([
            'news'=> News::query()->where('category_id',$cat_id)->get(),
            'category_name'=> Categories::query()->where('slug',$slug)->value('name'),
                ]
        );
    }
}
