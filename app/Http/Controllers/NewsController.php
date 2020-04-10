<?php

namespace App\Http\Controllers;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(){
        return view('news.news')->with('news', DB::table('news')->get());
    }
    public function show($id){
        return view('news.new')->with([
        'news'=> DB::table('news')->find($id),
         'category_name'=>News::getCategoryNameByNewId($id),
            ]);
    }

}
