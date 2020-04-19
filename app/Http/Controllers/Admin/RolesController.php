<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function changeUserRole(Request $request){
            if($request->isMethod('post')){
                $inputData = $request->except(['_token']);
            if($inputData['isAdmin'] == 0){
                $inputData['isAdmin'] = 1;
            }else{
                $inputData['isAdmin'] = 0;
            }
                DB::update("update users set isAdmin = {$inputData['isAdmin']} where id = {$inputData['id']}");
            }

            $current_admin = Auth::user();
           $users= User::query()->paginate(6);
           return view('admin.users',[
               'users'=>$users,
               'current_admin'=>$current_admin,
           ]);

        }
}
