<?php

namespace App\Http\Controllers\Admin;

use App\Categories as Categories;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB, Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\Object_;

class NewsController extends Controller
{
    public function index(){
       $news = News::query()->paginate(6);
       return view('admin.news',['news'=> $news]);
    }

    public  function news(){
        $news = News::query()->paginate(6);
        return view('admin.news', ['news'=> $news]);
    }

    public function edit(Request $request, News $news){
        return view('admin.create',[
            'news'=>$news,
            'categories'=>Categories::query()->select(['id','name'])->get()
        ]);
    }

    public function update(Request $request, News $news)
    {
            $inputData = $request->except(['_token']);
            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public/images', $request->file('image'));
                $url = Storage::url($path);
                $inputData['image'] = $url;
            }
            $this->validate($request, News::rules(),[],News::attributeNames());
            $news->fill($inputData)->save();
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно изменена');
    }

    public function store(Request $request)
    {
        $news = new News();
            $inputData = $request->except(['_token']);
            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public/images', $request->file('image'));
                $url = Storage::url($path);
                $inputData['image'] = $url;
            }
            $this->validate($request, News::rules(),[],News::attributeNames());
            $news->fill($inputData)->save();
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно создана');
    }

    public function create(News $news){
        return view('admin.create',[
            'categories'=>Categories::query()->select(['id','name'])->get(),
            'news'=>$news
        ]);
    }

    public function destroy(News $news){
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена');
    }


}
