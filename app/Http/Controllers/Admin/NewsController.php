<?php

namespace App\Http\Controllers\Admin;

use App\Categories as Categories;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB, Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(){
       $news = News::query()->paginate(6);
       return view('admin.index',['news'=> $news]);

    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $inputData = $request->except(['_token']);
            $url = null;
            if($request->file('image')){
                $path = Storage::putFile('public/images', $request->file('image'));
                $url= Storage::url($path);
            }
            $inputData['image'] = $url;
            DB::table('news')->insert(
                [
                    'title'=>$inputData['title'],
                    'text'=>$inputData['text'],
                    'image'=>$inputData['image'],

                ]
            );
            return redirect()->route('admin.index')->with('success','Новость успешно добавлена');
        }
        return view('admin.create',
            [
                'categories'=>Categories::all()
            ]);
    }
}
