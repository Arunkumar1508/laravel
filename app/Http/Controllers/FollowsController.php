<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(User $user){

    if(auth()->user()->following($user)){

        auth()
        ->user()
        ->Unfollow($user);
        return back();
    }else{
        auth()
        ->user()
        ->follow($user);
        return back();
    }

    }

 


}
