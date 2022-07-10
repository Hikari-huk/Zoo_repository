<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'category_id',
        ];
    
    function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function hashtags()
    {
        return $this->belongsToMany('App\Hashtag');
    }
    
    //Commentに対するリレーション
    //「1対多」の関係なので'comments'と複数形に
    public function comments()   
    {
        return $this->hasMany('App\Comment');  
    }
}
