<?php

namespace App\Http\Controllers;

use App\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SosialController extends Controller
{
    public function index() {
    	return Socialite::driver('vkontakte')->redirect();
    }

    public function callback() {
    	$user = Socialite::driver('vkontakte')->user();
    	$email = $user->getEmail();
    	$name = $user->getName();
    	$password = Hash::make('12345678');
    	$data = ['email' => $email,'password' => $password, 'name' => $name];
    	$u = User::where("email", $email)->first();    		
    	if ($u) {
    		$u->fill(['name' => $name]);
    		return redirect()->route('home');
    	}else {
   			User::create($data);
   			return redirect()->route('home');
   		}
    }
}
