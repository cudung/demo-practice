<?php

namespace App\Http\Controllers;
 use Illuminate\Http\Request;
//  use Validator,Redirect,Response,File;
 use Laravel\Socialite\Facades\Socialite;
 use App\Model\User;

 class SocialController extends Controller
 {
    public function login()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callback()
    {
        // $getInfo = Socialite::driver($provider)->user(); 
        // $user = $this->createUser($getInfo,$provider); 
        // auth()->login($user); 
        // return redirect()->to('/home');
        echo 123;
    }
    // function createUser($getInfo,$provider){
    //     $user = User::where('provider_id', $getInfo->id)->first();
    //     if (!$user) {
    //         $user = User::create([
    //             'name'     => $getInfo->name,
    //             'email'    => $getInfo->email,
    //             'provider' => $provider,
    //             'provider_id' => $getInfo->id
    //         ]);
    //     }
    //     return $user;
    // }
 }