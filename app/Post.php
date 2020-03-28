<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $incrementing = false;
    protected $fillable = ['title', 'slug', 'image', 'body', 'view_count'];

    public function kategori()
    {
    	return $this->belongsToMany(Kategori::class, 'kategori__posts', 'post_id');
    }

    public function tag()
    {
    	return $this->belongsToMany(Tag::class, 'post__tags', 'post_id');
    }

    public function postTag()
    {
        return $this->hasMany(Post_Tag::class, 'post__tags', 'post_id');
    }
}
