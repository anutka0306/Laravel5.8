<?php

namespace App\Http\Controllers;

use App\Categories;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        return view('news.news')->with('news', News::getNews());
    }
    public function show($id){
        return view('news.new')->with([
        'news'=> News::getNewsId($id),
         'category_name'=>News::getCategoryNameByNewId($id),
            ]);
    }

}
