<?php

namespace App\Http\Controllers;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(){
        return view('news.news')->with('news', News::all());
    }
    public function show($id){
        $news = News::query()->find($id);
        if(!empty($news)) {
            return view('news.new')->with([
                'news' => $news,
                'category_name' => 'News::getCategoryNameByNewId($id)',
            ]);
        }else{
            return redirect()->route('news.index');
        }
    }

}
