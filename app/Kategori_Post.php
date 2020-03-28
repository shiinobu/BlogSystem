<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori_Post extends Model
{
	protected $table = 'kategori__posts';
    protected $fillable = ['post_id', 'kategori_id'];
}
