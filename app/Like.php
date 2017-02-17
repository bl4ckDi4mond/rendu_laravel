<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{

    use SoftDeletes;

    protected $fillable = [

        'user_id',
        'like_id',
        'like_type',

    ];

    public function articles()
    {
        return $this->morphedByMany('App\Article', 'like');
    }

    public function comments()
    {
        return $this->morphedByMany('App\Comment', 'like');
    }

}
