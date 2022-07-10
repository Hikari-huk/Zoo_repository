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
        'images_url'
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
}
