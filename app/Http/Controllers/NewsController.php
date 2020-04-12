<?php

namespace App\Http\Controllers;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(){
        return view('news.news')->with('news', News::query()->paginate(6));
    }
    public function show($id){
        $news = News::query()->find($id);
        if(!empty($news)) {
            return view('news.new')->with([
                'news' => $news,
                'category_name' => Categories::query()->where('id', News::query()->where('id',$id)->value('category_id'))->value('name'),
            ]);
        }else{
            return redirect()->route('news.index');
        }
    }

}
