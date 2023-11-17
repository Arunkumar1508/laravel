<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class RequestController extends Controller
{
    use AuthenticatesUsers;

    public function view(){
        $user=auth()->user()->id;

        $result=DB::table('tweety_follows')
        ->join('users','users.id','=','tweety_follows.user_id')
        ->select('users.id','tweety_follows.following_user_id','users.username','users.name','users.avatar','tweety_follows.request')
        ->where('tweety_follows.following_user_id',$user)
        ->get();

        $new=$result->toArray();
        return view('request',compact('new'));


    }

    public function update($request){
    //    dd($request);
        $user1=auth()->user()->id;
        Follow::where('user_id',$request)
        ->where('following_user_id', $user1)
        ->update(['request'=>1]);
        return back();

    }

    public function delete($request){
        // dd($request);
        $user1=auth()->user()->id;
        Follow::where('user_id',$request)
        ->where('following_user_id',$user1)
        ->update(['request'=>0]);
        return back();


    }

    public function userloggedout(Request $request)
    {
        // dd($request->toArray());
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/amazon/listproduct');
    }


}
