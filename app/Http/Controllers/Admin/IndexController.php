<?php

namespace App\Http\Controllers\Admin;

use App\Categories as Categories;
use App\Http\Controllers\NewsController;
use App\News as News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public  function index(){
        return view('admin.index');
    }
    public function create(Request $request){
        if($request->isMethod('post')){
            return redirect()->route('admin.create');
        }
        return view('admin.create',
        [
            'categories'=>Categories::getCategories()
        ]);
    }
}
