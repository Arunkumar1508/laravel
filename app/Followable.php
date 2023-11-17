<?php

namespace App;

use App\User;

trait Followable{
    public function follow(User $user){
        return $this->follows()->save($user);
    }

    public function Unfollow(User $user){
        return $this->follows()->detach($user);
    }


    public function following(User $user){
        return $this->follows()->where('following_user_id',$user->id)->exists();

    }

    public function follows(){
        return $this->belongsToMany(User::class,'tweety_follows','user_id','following_user_id');
    }

    public function followers(){
        return $this->belongsToMany(User::class,'tweety_follows','user_id','following_user_id')->where('request',1);
    }



}
