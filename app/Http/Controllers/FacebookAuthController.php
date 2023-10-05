<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{
   public function redirect()
   {
    return Socialite::driver('facebook')->redirect();
   }
   public function callbackfacebook()
   {
    $user = Socialite::driver('facebook')->user();
    dd($user);
   }
}
