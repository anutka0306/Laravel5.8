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
       return view('admin.index',['news'=> $news]);

    }

    public function edit(Request $request, News $news){
        //dd($news);
        return view('admin.create',[
            'news'=>$news,
            'categories'=>Categories::query()->select(['id','name'])->get()
        ]);
    }

    public function update(Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            $inputData = $request->except(['_token']);
            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public/images', $request->file('image'));
                $url = Storage::url($path);
                $inputData['image'] = $url;
            }
            $news->fill($inputData)->save();
            return redirect()->route('admin.index')->with('success', 'Новость успешно изменена');
        }
    }

    public function create(Request $request)
    {
        $news = new News();
        $this->update($request, $news);
        return view('admin.create',
            [
                'categories'=>Categories::all(),
                'news'=> $news,
            ]);
    }

    public function destroy(News $news){
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость успешно удалена');
    }


}
