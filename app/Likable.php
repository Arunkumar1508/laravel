<?php

namespace App;
use App\User;
use App\Like;
use Illuminate\Database\Eloquent\Builder;

trait Likable{

    public function scopeWithLikes(Builder $query){
        $query->leftJoinSub(
            'select tweet_id, sum(liked) As likes, sum(!liked) AS dislikes from tweety_likes group by tweet_id',
            'tweety_likes',
            'tweety_likes.tweet_id',
            'tweety_tweets.id'
        );

    }

    public function like($user=null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' =>$user ? $user->id : auth()->id(),
        ], [

            'liked' => $liked,
        ]);


    }

    public function dislike($user = null)
    {

        return $this->like($user ,false);

    }

    public function isLikedBy(User $user){
        return (bool) $user->likes->where('tweet_id',$this->id)->where('liked',true)->count();
    }

    public function isDisLikedBy(User $user){
        return (bool) $user->likes->where('tweet_id',$this->id)->where('liked',false)->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
