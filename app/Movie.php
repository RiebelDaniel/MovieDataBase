<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = ['id'];


    public function peoples(){
        return $this->belongsToMany(User::class,'users_movies','movie_id','user_id');
    }

}
