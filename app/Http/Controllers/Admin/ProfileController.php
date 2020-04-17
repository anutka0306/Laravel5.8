<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function update(Request $request){
        $user = Auth::user();
        return view('admin.profile',[
           'user'=>$user
        ]);
    }
}
