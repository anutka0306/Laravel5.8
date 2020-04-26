<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index(){
        $resource = Resource::query()->paginate(10);
        dd($resource);
        //return view('admin.resource',['resource'=>$resources]);
    }
}
