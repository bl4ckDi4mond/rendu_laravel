<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Get the comments for the blog post.
     */

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->belongsToMany('App\Article', 'likes', 'user_id', 'post_id');
    }

    public function likedPosts()
    {
        return $this->morphedByMany('App\Article', 'like')->whereDeletedAt(null);
    }

}
