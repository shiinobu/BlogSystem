<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $incrementing = false;
    protected $fillable = ['name', 'slug'];

    public function post()
    {
    	return $this->belongsToMany(Post::class, 'post__tags', 'tag_id');
    }
}
