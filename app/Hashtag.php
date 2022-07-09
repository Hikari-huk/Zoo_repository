<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    //多対多のリレーションを定義
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
