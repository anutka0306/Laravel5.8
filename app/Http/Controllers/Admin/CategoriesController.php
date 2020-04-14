<?php

namespace App\Http\Controllers\Admin;

use App\Categories as Categories;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB, Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\Object_;

class CategoriesController extends Controller
{
    public function categories(){
        $categories = Categories::query()->paginate(6);
        return view('admin.categories',['categories'=>$categories]);
    }

    public function edit(Request $request, Categories $categories){
        return view('admin.create-category',[
            'categories'=>$categories
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

    public function destroy(News $news){
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость успешно удалена');
    }
}

