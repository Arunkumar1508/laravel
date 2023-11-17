<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function view(){
        return view('message');
    }

    public function sending($user){

        $find=User::findOrFail($user);
        $convert=$find->toArray();



        $id=$find->toArray()['id'];
        $finds=auth()->user()->id;

        $incoming=DB::table('tweety_chat')
        ->select('current_user_chat_id','message')
        ->where('current_user_chat_id',$finds)
        ->where('receive_user_chat_id',$id)
        ->get();

        $outgoing=DB::table('tweety_chat')
        ->select('current_user_chat_id','message')
        ->where('current_user_chat_id',$id)
        ->where('receive_user_chat_id',$finds)
        ->get();



        return view('usermessage',compact('convert','incoming','outgoing'));
    }

    public function save($id){
        $message=request()->validate(['typing_msg'=>['string','required','max:255']]);
        // dd( $message);
        $find=auth()->user()->id;
        Chat::create([
            "current_user_chat_id"=>$find,
            "receive_user_chat_id"=>$id,
            "message"=>$message['typing_msg']
        ]);
        return back();

    }







}
