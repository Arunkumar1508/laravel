<?php

namespace App;
use App\Tweet;
use App\Like;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable,Followable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected
        $guarded=[];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value){
        return asset($value ? "storage/".$value:"css/bootstrap/image/avat.jpg");

    }

    public function setPasswordAttribute($value){
        $this->attributes['password']=bcrypt($value);
    }






    public function timeline(){
        $friends=$this->follows()->pluck('id');

        return Tweet::whereIn('user_id',$friends)
        ->orwhere('user_id',$this->id)
        ->withLikes()
        ->latest()->paginate(50);



    }
    public function tweets(){
        return $this->hasMany(Tweet::class)->latest();
    }




    public function getRouteKeyName(){
        return 'username';
    }

    public function path($append=''){
        $path= route('profile',$this->username);

        return $append ?"{$path}/{$append}" :$path;
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
