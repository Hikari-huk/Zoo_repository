<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Postに対するリレーション
    //「1対多」の関係なので単数系に
    public function Post()
    {
        return $this->belongsTo('App\Post');
    }
    
    //Userに対するリレーション
    //「1対多」の関係なので単数系に
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
