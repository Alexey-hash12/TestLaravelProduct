<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Service\SocialService;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function index() {
    	return Socialite::driver('vkontakte')->redirect();
    }

    public function callback() {
    	$user = Socialite::driver("vkontakte")->user();
    	$obSocial = new SocialService();
    	if($user=$obSocial->saveSocialData($user)) {
    		Auth::login($user, true);
    		return redirect('/');
    	}
    	return back();
    }
}
