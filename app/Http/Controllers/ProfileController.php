<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function update(Request $request){
        $user = Auth::user();
        $errors = [];
        if($request->isMethod('post')){
        $this->validate($request, $this->validateRules());
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
            return redirect()->route('updateProfile')->withErrors($errors);
        }
        return view('profile',[
           'user'=>$user
        ]);
    }

    protected function validateRules(){
        return [
        'name'=> 'required|string|max:10',
        'email'=>'required|email|unique:users,email,'.Auth::id(),
        'password'=>'required',
        'new-password'=>'required|string|min:3'
        ];
    }

}
