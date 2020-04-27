<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index(){
        $resource = Resource::query()->paginate(10);
        //dd($resource);
        return view('admin.resource',['resource'=>$resource]);
    }

    public function create(Request $request, Resource $resource){
        if($request->isMethod('post')) {
            $inputData = $request->except(['_token']);
            $resource->fill($inputData)->save();
            return redirect()->route('admin.resource')->with('success', 'Ресурс успешно добавлен');
        }
            return view('admin.create-recourse');

    }
}
