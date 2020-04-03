<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public  function index(){
        return view('admin.index');
    }
    public function create(Request $request){
        if($request->isMethod('post')){
            $request->flash();
            return redirect()->route('admin.create');
        }
        return view('admin.create',
        [
            'categories'=>Categories::getCategories()
        ]);
    }
}
