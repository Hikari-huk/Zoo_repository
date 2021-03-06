<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','category_id','profile'
    ];

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
    
    //Commentに対するリレーション
    //「1対多」の関係なので'comments'と複数形に
    public function comments()   
    {
        return $this->hasMany('App\Comment');  
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    //このユーザーがフォローしている人を取得
    public function follows()
    {
        return $this->belongsToMany(User::class, 'users_users', 'following_id', 'followed_id')->withTimestamps();    
    }
    
    //このユーザーをフォローしている人を取得
    public function followers()
    {
        return $this->belongsToMany(User::class, 'users_users', 'followed_id', 'following_id')->withTimestamps();    
    }
    
    public function cute()
    {
        return $this->belongsToMany('App\Post')->using('App\Cute');
    }
    
    public function cool()
    {
        return $this->belongsToMany('App\Post')->using('App\Cool');
    }
    
    public function weird()
    {
        return $this->belongsToMany('App\Post')->using('App\Weird');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');

    }
}
