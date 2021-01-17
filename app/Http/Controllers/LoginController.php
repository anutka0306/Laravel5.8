<?php

namespace App\Http\Controllers;

use App\Adaptors\Adaptor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function loginVK(){
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK(Adaptor $userAdaptor){
    $user = Socialite::driver('vkontakte')->user();
    $userInSystem = $userAdaptor->getUserBySocId($user,'vk');
    Auth::login($userInSystem);
    return redirect()->route('Home');
    }
}
