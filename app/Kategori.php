<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
	protected $table = 'kategoris';
	protected $incrementing = false;
    protected $fillable = ['name', 'slug', 'image'];

    public function post()
    {
    	return $this->belongsToMany(Post::class, 'kategori__posts', 'kategori_id');
    }
}
