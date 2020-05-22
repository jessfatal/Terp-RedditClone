<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{

    public function index($username)
    {
        $wrongUser = $username;
        $username = User::where('username',$username)->first();

        if($username){
            return view('profiles.index', [
                'username' => $username,
            ]);
        }else{
            return view('profiles.notfound', [
                'wrongUser' => $wrongUser,
            ]);
        }


    }
}
