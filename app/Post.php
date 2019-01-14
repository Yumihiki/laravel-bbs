<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'body',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
