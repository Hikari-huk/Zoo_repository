<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    public function users()
    {
        return $this->hasMany('App\User');
    }
    
    public function getByCategory(int $limit_count = 5)
{
     return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
}
}
