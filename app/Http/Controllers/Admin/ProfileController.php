<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request){
        $user = Auth::user();
        $errors = [];
        if($request->isMethod('post')){
            if(Hash::check($request->post('password'), $user->password)){
                $user->fill(
                    [
                        'name'=>$request->post('name'),
                        'password'=>Hash::make($request->post('new-password')),
                        'email'=>$request->post('email')
                    ]
                );
                $user->save();
                $request->session()->flash('success','Данные пользователя изменены успешно');
            }else{
               $errors['password'][] = 'Неверно введен текущий пароль';
            }
            return redirect()->route('admin.updateProfile')->withErrors($errors);
        }
        return view('admin.profile',[
           'user'=>$user
        ]);
    }
}
