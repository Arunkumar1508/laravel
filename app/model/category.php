<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table="amazon_categories";


    protected $guarded=[];

    public function listproduct(){
        return $this->hasMany(product::class,'categories_id')->limit(4);
    }
}
