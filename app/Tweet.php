<?php

namespace App;


use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Psy\Readline\Hoa\FileLinkReadWrite;

class Tweet extends Model
{

    use Likable;

    protected $table="tweety_tweets";
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
