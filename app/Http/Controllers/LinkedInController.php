<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LinkedInController extends Controller
{
    public function redirect(){
        return Socialite::driver('linkedin-openid')->redirect();
    }
    public function callback(){
        $githubUser = Socialite::driver('linkedin-openid')->user();
 
        $user = User::updateOrCreate([
            'linkedin_id' => $githubUser->id,
        ], [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'password'=>Hash::make(12345),
        ]);
     
        Auth::login($user);
     
        return redirect('/dashboard');
    }


}
